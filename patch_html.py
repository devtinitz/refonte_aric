import os
import re
import glob

def patch_file(filepath):
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()

    original_content = content

    # 1. Padding py-32 and py-24
    content = re.sub(r'class="py-32', 'class="py-16 md:py-32', content)
    content = re.sub(r'class="py-24', 'class="py-16 md:py-24', content)
    # Fix potential double apply
    content = content.replace('py-16 md:py-16', 'py-16')

    # 2. Hero Header Height
    content = re.sub(r'class="relative h-\[50vh\]', 'class="relative min-h-[60vh] md:min-h-[50vh]', content)

    # 3. Mobile Menu Overlay
    content = content.replace(
        '<div id="mobile-menu" class="fixed inset-0 z-[60] bg-white shadow-2xl border-b border-slate-200 opacity-0 pointer-events-none transition-all duration-300 lg:hidden">',
        '<div id="mobile-menu" class="fixed inset-0 z-[60] bg-white/95 backdrop-blur-xl shadow-2xl border-b border-slate-200 opacity-0 pointer-events-none transition-all duration-300 lg:hidden">'
    )

    # 4. Mobile Menu Buttons 
    content = content.replace(
        '<button id="mobile-menu-btn" class="lg:hidden text-tech-navy p-2 hover:bg-white/10 rounded-xl transition-colors">',
        '<button id="mobile-menu-btn" class="lg:hidden text-tech-navy p-2 hover:bg-slate-100 rounded-xl transition-colors focus:ring-2 focus:ring-tech-cyan/50 focus:outline-none">'
    )
    content = content.replace(
        '<button id="mobile-menu-btn" class="lg:hidden text-tech-navy p-2 hover:bg-slate-100 rounded-xl transition-colors">',
        '<button id="mobile-menu-btn" class="lg:hidden text-tech-navy p-2 hover:bg-slate-100 rounded-xl transition-colors focus:ring-2 focus:ring-tech-cyan/50 focus:outline-none">'
    )

    # Close btn
    content = content.replace(
        '<button id="close-menu-btn" class="text-tech-navy p-2 hover:bg-white/10 rounded-xl transition-colors">',
        '<button id="close-menu-btn" class="text-tech-navy p-2 hover:bg-slate-100 rounded-xl transition-colors focus:ring-2 focus:ring-tech-cyan/50 focus:outline-none">'
    )

    # 5. Footer Newsletter
    old_footer = """                    <div class="flex p-1 rounded-xl glass shadow-sm">
                        <input type="email" placeholder="Email" class="bg-transparent px-4 py-2 text-sm focus:outline-none w-full placeholder-slate-400 font-semibold">
                        <button class="bg-tech-cyan text-white p-2 rounded-lg font-bold"><i data-lucide="send" class="w-4 h-4"></i></button>
                    </div>"""
    new_footer = """                    <div class="flex p-1 rounded-xl glass shadow-sm focus-within:ring-2 focus-within:ring-tech-cyan/50 transition-all">
                        <input type="email" placeholder="Email" class="bg-transparent px-4 py-2 text-sm focus:outline-none w-full placeholder-slate-400 font-semibold text-slate-800">
                        <button class="bg-tech-cyan text-white p-2 rounded-lg font-bold hover:bg-tech-blue transition-colors focus:ring-2 focus:ring-offset-1 focus:ring-tech-cyan"><i data-lucide="send" class="w-4 h-4"></i></button>
                    </div>"""
    content = content.replace(old_footer, new_footer)

    # Values grids
    content = content.replace('<div class="grid md:grid-cols-4 gap-6">', '<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">')

    # 6. Wave SVG color depending on Body
    if 'bg-gray-50' in content:
        # Check if wave exists, replace fill="#ffffff" with fill="#f9fafb" for SVG with d="M321.39...
        content = re.sub(
            r'(<svg[^>]*preserveAspectRatio="none">\s*<path d="M321\.39[^"]*" fill=") #ffffff',
            r'\g<1>#f9fafb', # Note: The space before #ffffff allows it. Let's make it more robust.
            content
        )
        content = content.replace('fill="#ffffff"></path>', 'fill="#f9fafb"></path>') 
        # But wait, there might be other white paths? The only one is the wave separator and play buttons maybe?
        # Actually in index.html, wave is fill="#ffffff". In services with bg-gray-50, wave is fill="#ffffff" but we want "#f9fafb".
        # Let's just replace the exact wave svg.
        old_wave = """<path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="#ffffff"></path>"""
        new_wave = """<path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="#f9fafb"></path>"""
        content = content.replace(old_wave, new_wave)

    if content != original_content:
        with open(filepath, 'w', encoding='utf-8') as f:
            f.write(content)
        print(f"Patched {filepath}")

if __name__ == '__main__':
    html_files = glob.glob('/Users/mac/DOSSIER_MOSES/TINITZ/refonte_aric/*.html')
    for file in html_files:
        if file.endswith('about.html'):
            continue # Already fully patched
        try:
            patch_file(file)
        except Exception as e:
            print(f"Error patching {file}: {e}")
