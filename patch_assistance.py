import os
import glob
import re

CSS_PATCH = """
        #assistance-card.active {
            opacity: 1 !important;
            visibility: visible !important;
        }
        #assistance-card.active > div:last-child {
            transform: translateY(0) !important;
        }
"""

CARD_HTML = """
    <!-- Assistance Card -->
    <div id="assistance-card" class="fixed inset-0 z-[110] flex items-center justify-center sm:items-end sm:justify-end pointer-events-none p-4 sm:p-10 opacity-0 invisible transition-all duration-300">
        <div id="assistance-overlay" class="absolute inset-0 bg-tech-navy/40 backdrop-blur-sm pointer-events-auto cursor-pointer"></div>
        <div class="relative w-full max-w-md bg-white rounded-[32px] md:rounded-[40px] shadow-2xl overflow-hidden pointer-events-auto transform translate-y-10 transition-transform duration-300">
            <div class="p-8 md:p-10">
                <div class="flex justify-between items-start mb-8">
                    <div>
                        <div class="text-xs font-black text-tech-cyan uppercase tracking-[0.2em] mb-2">Support Technique</div>
                        <h3 class="text-2xl font-extrabold text-tech-navy">Assistance 24h/7</h3>
                    </div>
                    <button id="close-assistance" class="w-10 h-10 flex items-center justify-center rounded-full bg-slate-100 hover:bg-slate-200 transition-colors">
                        <i data-lucide="x" class="w-5 h-5 text-slate-500"></i>
                    </button>
                </div>
                
                <div class="space-y-4">
                    <div class="p-6 rounded-2xl bg-tech-cyan/5 border border-tech-cyan/10">
                        <div class="flex items-center space-x-4 mb-4">
                            <div class="w-10 h-10 bg-tech-cyan/10 rounded-xl flex items-center justify-center">
                                <i data-lucide="phone-call" class="w-5 h-5 text-tech-cyan"></i>
                            </div>
                            <span class="font-bold text-tech-navy">Direct Hotlines</span>
                        </div>
                        <div class="space-y-3">
                            <a href="tel:+2252721212121" class="flex justify-between items-center group">
                                <span class="text-sm font-semibold text-slate-600">Côte d'Ivoire</span>
                                <span class="text-sm font-bold text-tech-navy group-hover:text-tech-cyan">+225 27 21 21 21 21</span>
                            </a>
                            <a href="tel:+22320211515" class="flex justify-between items-center group">
                                <span class="text-sm font-semibold text-slate-600">Mali</span>
                                <span class="text-sm font-bold text-tech-navy group-hover:text-tech-cyan">+223 20 21 15 15</span>
                            </a>
                        </div>
                    </div>

                    <!-- WhatsApp Chat -->
                    <a href="https://wa.me/2250707070707" target="_blank" class="flex items-center space-x-4 p-4 rounded-2xl bg-green-500/5 border border-green-500/10 hover:bg-green-500/10 transition-colors group">
                        <div class="w-10 h-10 bg-green-500/10 rounded-xl flex items-center justify-center group-hover:bg-green-500/20 transition-colors text-green-600">
                            <i data-lucide="message-circle" class="w-5 h-5"></i>
                        </div>
                        <div class="flex-1">
                            <div class="text-[10px] font-black text-green-600 uppercase tracking-widest mb-1">Disponible sur WhatsApp</div>
                            <div class="text-sm font-bold text-tech-navy">Chat en direct avec un expert</div>
                        </div>
                        <i data-lucide="chevron-right" class="w-4 h-4 text-green-600 transition-transform group-hover:translate-x-1"></i>
                    </a>

                    <a href="mailto:contact@conergies.ci" class="flex items-center space-x-4 p-4 rounded-2xl hover:bg-slate-50 transition-colors border border-transparent hover:border-slate-100 group">
                        <div class="w-10 h-10 bg-slate-100 rounded-xl flex items-center justify-center group-hover:bg-tech-cyan/10 transition-colors">
                            <i data-lucide="mail" class="w-5 h-5 text-slate-500 group-hover:text-tech-cyan"></i>
                        </div>
                        <div class="flex-1">
                            <div class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Email Support</div>
                            <div class="text-sm font-bold text-tech-navy">contact@conergies.ci</div>
                        </div>
                        <i data-lucide="chevron-right" class="w-4 h-4 text-slate-300 transition-transform group-hover:translate-x-1"></i>
                    </a>
                </div>

                <div class="mt-10">
                    <a href="contact.html" class="block w-full py-4 bg-tech-navy text-white text-center font-black rounded-2xl hover:scale-[1.02] transition-transform shadow-lg">
                        Demande d'intervention
                    </a>
                </div>
            </div>
        </div>
    </div>
"""

JS_LOGIC = """
        // Assistance Card Logic
        const assistanceBtn = document.getElementById('assistance-btn');
        const closeAssistance = document.getElementById('close-assistance');
        const assistanceCard = document.getElementById('assistance-card');
        const assistanceOverlay = document.getElementById('assistance-overlay');

        function toggleAssistance(show) {
            if (show) {
                if (assistanceCard) assistanceCard.classList.add('active');
                document.body.style.overflow = 'hidden';
            } else {
                if (assistanceCard) assistanceCard.classList.remove('active');
                document.body.style.overflow = '';
            }
        }

        assistanceBtn?.addEventListener('click', () => toggleAssistance(true));
        closeAssistance?.addEventListener('click', () => toggleAssistance(false));
        assistanceOverlay?.addEventListener('click', () => toggleAssistance(false));
"""

def patch_file(filepath):
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()

    # If card already exists, replace it
    if 'id="assistance-card"' in content:
        # Regex to find the whole div from <div id="assistance-card" ... to the next </div>
        # Since I know the structure I created, I can use a more specific regex or just find the indices.
        # But wait, my CARD_HTML ends with several </div>.
        # Let's find the card and replace it.
        # We search from <!-- Assistance Card --> to the end of the div.
        card_pattern = r'<!-- Assistance Card -->[\s\S]*?<!-- Assistance Card End Placeholder -->|<!-- Assistance Card -->[\s\S]*?<div id="assistance-card"[\s\S]*?</div>\s*</div>\s*</div>'
        # Actually, let's just find the start and end of my specific block.
        start_marker = '<!-- Assistance Card -->'
        if start_marker in content:
            # We assume the card part is what we want to replace.
            # I'll use a more surgical approach by finding the start and the next script tag or end of card.
            parts = content.split(start_marker)
            # Find the end of the card in the second part.
            # My card has 3 closing divs at the very end.
            subparts = parts[1].split('</div>\n        </div>\n    </div>', 1)
            if len(subparts) > 1:
                content = parts[0] + CARD_HTML + subparts[1]
            else:
                # Fallback if structure slightly differs
                print(f"Warning: Could not find exact card end in {filepath}")
                # Try another way: find the start of the <script>
                subparts = parts[1].split('<script>', 1)
                content = parts[0] + CARD_HTML + '\n\n    <script>' + subparts[1]
    else:
        # Not yet patched, use the old logic
        # 1. Patch Button and add HTML
        button_pattern = r'<!-- Assistance -->\s*<div class="fixed bottom-6 right-6 md:bottom-10 md:right-10 z-\[100\]"[^>]*>\s*<button class="btn-assistance'
        if re.search(button_pattern, content):
            content = re.sub(button_pattern, '<!-- Assistance -->\n    <div class="fixed bottom-6 right-6 md:bottom-10 md:right-10 z-[100]" data-aos="fade-left" data-aos-delay="1000">\n        <button id="assistance-btn" class="btn-assistance', content)
            
            # Insert Card HTML after the button's closing div
            div_end_pattern = r'(<button id="assistance-btn"[\s\S]*?</button>\s*</div>)'
            content = re.sub(div_end_pattern, r'\1\n' + CARD_HTML, content)
        else:
            print(f"Warning: Could not find button pattern in {filepath}")
            content = content.replace('<button class="btn-assistance', '<button id="assistance-btn" class="btn-assistance')

        # 2. Patch CSS
        if '#assistance-card.active' not in content:
            style_end = '</style>'
            if style_end in content:
                content = content.replace(style_end, CSS_PATCH + '    ' + style_end)

        # 3. Patch JS
        if 'assistanceBtn?.addEventListener' not in content:
            js_marker = 'lucide.createIcons();'
            if js_marker in content:
                content = content.replace(js_marker, JS_LOGIC + '\n        ' + js_marker)
            else:
                content = content.replace('</script>\n</body>', JS_LOGIC + '\n    </script>\n</body>')

    with open(filepath, 'w', encoding='utf-8') as f:
        f.write(content)
    print(f"Patched {filepath}")

if __name__ == "__main__":
    files = glob.glob('*.html')
    for f in files:
        if f == 'index.html': continue 
        patch_file(f)
