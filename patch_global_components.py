import os
import glob
import re

# SOURCE OF TRUTH (Extracted from contact.html)
TOPBAR_HTML = """    <!-- Top Bar -->
    <div class="hidden lg:block bg-[#0a192f] border-b border-white/5 py-2">
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center text-sm font-semibold text-slate-400">
            <div class="flex items-center space-x-6">
                <a href="tel:+2252720000000" class="flex items-center hover:text-[#00a4bd] transition-colors">
                    <i data-lucide="phone" class="w-4 h-4 mr-2 text-[#00a4bd]"></i>
                    +225 27 20 00 00 00
                </a>
                <a href="mailto:contact@conergies.ci" class="flex items-center hover:text-[#00a4bd] transition-colors">
                    <i data-lucide="mail" class="w-4 h-4 mr-2 text-[#00a4bd]"></i>
                    contact@conergies.ci
                </a>
            </div>
            <div class="flex items-center space-x-4">
                <a href="https://www.facebook.com/ConergiesGroup" target="_blank" class="hover:text-white transition-colors"><i data-lucide="facebook" class="w-4 h-4"></i></a>
                <a href="https://www.linkedin.com/company/groupe-conergies/" target="_blank" class="hover:text-white transition-colors"><i data-lucide="linkedin" class="w-4 h-4"></i></a>
            </div>
        </div>
    </div>"""

NAV_HTML = """    <!-- Navigation -->
    <nav class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-6 h-20 flex justify-between items-center">
            <!-- Logo -->
            <a href="./" class="flex items-center shrink-0 transition-transform hover:scale-105">
                <img src="logo.png" alt="ARIC Solutions Logo" class="h-16 w-auto drop-shadow-sm">
            </a>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center space-x-4 xl:space-x-8 font-bold text-[12px] uppercase tracking-wider">
                <a href="about.html" class="text-slate-600 hover:text-[#00a4bd] transition-colors">Qui sommes-nous</a>
                
                <!-- Expertise Mega Menu -->
                <div class="relative group cursor-pointer flex items-center py-4">
                    <span class="text-slate-600 group-hover:text-[#00a4bd] transition-colors">Notre Expertise</span>
                    <i data-lucide="chevron-down" class="w-3.5 h-3.5 ml-1 text-slate-500 group-hover:rotate-180 transition-transform"></i>
                    
                    <div class="absolute top-full left-1/2 -translate-x-1/2 pt-4 opacity-0 translate-y-2 pointer-events-none group-hover:opacity-100 group-hover:translate-y-0 group-hover:pointer-events-auto transition-all duration-300 z-50">
                        <div class="bg-white rounded-[32px] w-[900px] border border-slate-100 shadow-2xl p-8 normal-case tracking-normal">
                            <div class="grid grid-cols-3 gap-8">
                                <!-- Card 1: Froid -->
                                <a href="expertise-industrie.html" class="flex flex-col group/card transition-all duration-300">
                                    <div class="aspect-[16/10] rounded-2xl overflow-hidden mb-6 border border-slate-50 shadow-sm transition-transform group-hover/card:scale-[1.02]">
                                        <img src="froid-expertise.png" alt="Froid Commercial & Industriel" class="w-full h-full object-cover">
                                    </div>
                                    <h4 class="text-lg font-bold text-[#0a192f] group-hover/card:text-[#00a4bd] transition-colors mb-2 leading-snug">Froid Commercial, Industriel & Solaire</h4>
                                    <p class="text-sm text-slate-500 leading-relaxed mb-4 line-clamp-2 italic font-medium">Conception et maintenance de systèmes frigorifiques pour la grande distribution et l'industrie.</p>
                                    <span class="text-sm font-bold text-[#00a4bd] flex items-center group-hover/card:translate-x-2 transition-transform uppercase tracking-wider font-bold">
                                        Découvrir <i data-lucide="chevron-right" class="w-4 h-4 ml-1"></i>
                                    </span>
                                </a>

                                <!-- Card 2: Génie Climatique -->
                                <a href="expertise-tertiaire.html" class="flex flex-col group/card transition-all duration-300">
                                    <div class="aspect-[16/10] rounded-2xl overflow-hidden mb-6 border border-slate-50 shadow-sm transition-transform group-hover/card:scale-[1.02]">
                                        <img src="https://images.unsplash.com/photo-1621905251189-08b45d6a269e?q=80&w=800&auto=format&fit=crop" alt="Génie Climatique" class="w-full h-full object-cover">
                                    </div>
                                    <h4 class="text-lg font-bold text-[#0a192f] group-hover/card:text-[#00a4bd] transition-colors mb-2 leading-snug">Génie Climatique (CVC)</h4>
                                    <p class="text-sm text-slate-500 leading-relaxed mb-4 line-clamp-2 italic font-medium">Maîtrise de la température, de l'hygrométrie et de la qualité de l'air de vos bâtiments.</p>
                                    <span class="text-sm font-bold text-[#00a4bd] flex items-center group-hover/card:translate-x-2 transition-transform uppercase tracking-wider font-bold">
                                        Découvrir <i data-lucide="chevron-right" class="w-4 h-4 ml-1"></i>
                                    </span>
                                </a>

                                <!-- Card 3: Efficacité Énergétique -->
                                <a href="expertise-efficacite.html" class="flex flex-col group/card transition-all duration-300">
                                    <div class="aspect-[16/10] rounded-2xl overflow-hidden mb-6 border border-slate-50 shadow-sm transition-transform group-hover/card:scale-[1.02]">
                                        <img src="https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?q=80&w=800&auto=format&fit=crop" alt="Efficacité Énergétique" class="w-full h-full object-cover">
                                    </div>
                                    <h4 class="text-lg font-bold text-[#0a192f] group-hover/card:text-[#00a4bd] transition-colors mb-2 leading-snug">Efficacité Énergétique</h4>
                                    <p class="text-sm text-slate-500 leading-relaxed mb-4 line-clamp-2 italic font-medium">Audit, pilotage GTB et optimisation des consommations — accompagnement ISO 50001.</p>
                                    <span class="text-sm font-bold text-[#00a4bd] flex items-center group-hover/card:translate-x-2 transition-transform uppercase tracking-wider font-bold">
                                        Découvrir <i data-lucide="chevron-right" class="w-4 h-4 ml-1"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="mt-8 pt-6 border-t border-slate-100 flex justify-center">
                                <a href="expertise.html" class="px-10 py-3 bg-slate-50 rounded-full text-slate-600 font-bold hover:bg-[#0a192f] hover:text-white transition-all flex items-center italic text-sm">
                                    Voir toutes nos expertises <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="services.html" class="text-slate-600 hover:text-[#00a4bd] transition-colors">Services</a>
                <a href="actualites.html" class="text-slate-600 hover:text-[#00a4bd] transition-colors whitespace-nowrap">Références & Actus</a>
                <a href="recrutement.html" class="text-slate-600 hover:text-[#00a4bd] transition-colors">Recrutement</a>
                <a href="contact.html" class="text-slate-600 hover:text-[#00a4bd] transition-colors">Contact</a>
            </div>

            <!-- Utilities -->
            <div class="flex items-center space-x-6">
                <!-- Mobile Toggle -->
                <button id="mobile-menu-btn" class="lg:hidden text-[#0a192f] p-2 hover:bg-slate-100 rounded-xl transition-colors focus:ring-2 focus:ring-[#00a4bd]/50 focus:outline-none">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu Overlay -->
        <div id="mobile-menu" class="fixed inset-0 z-[60] bg-white/95 backdrop-blur-xl shadow-2xl border-b border-slate-200 opacity-0 pointer-events-none transition-all duration-300 lg:hidden text-center flex flex-col items-center justify-center">
            <div class="flex flex-col h-full w-full p-8">
                <div class="flex justify-between items-center mb-12">
                    <img src="logo.png" alt="ARIC Solutions Logo" class="h-12 w-auto drop-shadow-sm">
                    <button id="close-menu-btn" class="text-[#0a192f] p-2 hover:bg-slate-100 rounded-xl transition-colors focus:ring-2 focus:ring-[#00a4bd]/50 focus:outline-none">
                        <i data-lucide="x" class="w-6 h-6"></i>
                    </button>
                </div>
                <nav class="flex flex-col space-y-6 text-xl font-bold text-[#0a192f] uppercase tracking-widest overflow-y-auto">
                    <a href="index.html" class="hover:text-[#00a4bd] transition-colors">Accueil</a>
                    <a href="about.html" class="hover:text-[#00a4bd] transition-colors">Qui sommes-nous</a>
                    <a href="expertise.html" class="hover:text-[#00a4bd] transition-colors">Nos Expertises</a>
                    <a href="services.html" class="hover:text-[#00a4bd] transition-colors">Services</a>
                    <a href="actualites.html" class="hover:text-[#00a4bd] transition-colors">Références</a>
                    <a href="recrutement.html" class="hover:text-[#00a4bd] transition-colors">Recrutement</a>
                    <a href="contact.html" class="hover:text-[#00a4bd] transition-colors">Contact</a>
                </nav>
            </div>
        </div>
    </nav>"""

FOOTER_HTML = """    <!-- Footer -->
    <footer class="relative bg-gradient-to-b from-white to-slate-50 text-slate-600 py-16 md:py-24 overflow-hidden border-t border-slate-100">
        <!-- Brand Signature Line -->
        <div class="absolute top-0 left-0 w-full h-1 bg-[#00a4bd]"></div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12 md:mb-20">
                <div>
                    <img src="logo.png" alt="ARIC Solutions Logo" class="h-20 w-auto mb-8 drop-shadow-sm">
                    <p class="text-slate-500 text-sm leading-relaxed mb-8 font-medium">
                        Leader multitechnique en Afrique de l'Ouest. Filiale du Groupe Conergies. Innovation, Performance & Durabilité.
                    </p>
                    <div class="flex space-x-4">
                        <a href="https://www.linkedin.com/company/groupe-conergies/" target="_blank" class="w-10 h-10 rounded-xl bg-white border border-slate-200 flex items-center justify-center hover:text-[#00a4bd] hover:border-[#00a4bd] hover:shadow-lg transition-all shadow-sm"><i data-lucide="linkedin" class="w-5 h-5"></i></a>
                        <a href="https://www.facebook.com/ConergiesGroup" target="_blank" class="w-10 h-10 rounded-xl bg-white border border-slate-200 flex items-center justify-center hover:text-[#00a4bd] hover:border-[#00a4bd] hover:shadow-lg transition-all shadow-sm"><i data-lucide="facebook" class="w-5 h-5"></i></a>
                    </div>
                </div>
                <div>
                    <h5 class="font-bold mb-8 text-slate-900 uppercase text-xs tracking-widest border-l-4 border-[#00a4bd] pl-4">Filiales & Accès</h5>
                    <ul class="space-y-4 text-sm text-slate-600 font-semibold">
                        <li><a href="about.html" class="hover:text-[#00a4bd] transition-colors">ARIC – Côte d'Ivoire</a></li>
                        <li><a href="about.html" class="hover:text-[#00a4bd] transition-colors">ARIC – Mali</a></li>
                        <li><a href="expertise.html" class="hover:text-[#00a4bd] transition-colors">Espace Projets</a></li>
                        <li><a href="recrutement.html" class="hover:text-[#00a4bd] transition-colors">Recrutement</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="font-bold mb-8 text-slate-900 uppercase text-xs tracking-widest border-l-4 border-[#00a4bd] pl-4">Expertise</h5>
                    <ul class="space-y-4 text-sm text-slate-600 font-semibold">
                        <li><a href="expertise-tertiaire.html" class="hover:text-[#00a4bd] transition-colors">Génie Climatique</a></li>
                        <li><a href="expertise-industrie.html" class="hover:text-[#00a4bd] transition-colors">Froid Industriel</a></li>
                        <li><a href="expertise.html" class="hover:text-[#00a4bd] transition-colors">GTB & Smart Monitoring</a></li>
                        <li><a href="services.html" class="hover:text-[#00a4bd] transition-colors">Maintenance Multitechnique</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="font-bold mb-8 text-slate-900 uppercase text-xs tracking-widest border-l-4 border-[#00a4bd] pl-4">Nous Contacter</h5>
                    <ul class="space-y-6">
                        <li class="flex items-start space-x-3 text-sm font-semibold max-w-[200px]">
                            <i data-lucide="map-pin" class="w-5 h-5 text-tech-cyan shrink-0"></i>
                            <span>Zone 4C, Rue des Majorettes, Abidjan, CI</span>
                        </li>
                        <li class="flex items-center space-x-3 text-sm font-semibold">
                            <i data-lucide="phone" class="w-5 h-5 text-tech-cyan shrink-0"></i>
                            <a href="tel:+2252721210000" class="hover:text-tech-cyan transition-colors">+225 27 21 21 00 00</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="pt-10 border-t border-slate-100 flex flex-col md:flex-row justify-between items-center gap-6 text-xs text-slate-400 font-bold uppercase tracking-widest">
                <div>© 2026 ARIC Solutions. Tous droits réservés.</div>
                <div class="flex space-x-8">
                    <a href="contact.html" class="hover:text-[#00a4bd] transition-colors">Mentions Légales</a>
                    <a href="contact.html" class="hover:text-[#00a4bd] transition-colors">Confidentialité</a>
                </div>
            </div>
        </div>
    </footer>"""

ASSISTANCE_HTML = """    <!-- Assistance -->
    <div class="fixed bottom-6 right-6 md:bottom-10 md:right-10 z-[100]" data-aos="fade-left" data-aos-delay="1000">
        <button id="assistance-btn" class="btn-assistance group flex items-center gap-2 md:gap-4 px-4 py-3 md:px-6 md:py-4 rounded-full text-white transition-all hover:scale-105 active:scale-95 shadow-2xl">
            <div class="p-2 bg-white/10 rounded-full group-hover:rotate-12 transition-transform">
                <i data-lucide="headset" class="w-5 h-5 md:w-6 md:h-6"></i>
            </div>
            <span class="font-bold tracking-widest text-xs md:text-sm uppercase whitespace-nowrap hidden sm:inline">Assistance 24/7</span>
            <span class="font-bold tracking-widest text-[10px] uppercase sm:hidden">SOS 24/7</span>
        </button>
    </div>

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
    </div>"""

SCRIPT_HTML = """    <script>
        // Mobile Menu Toggle Logic
        const menuBtn = document.getElementById('mobile-menu-btn');
        const closeBtn = document.getElementById('close-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        function toggleMenu(show) {
            if (show) {
                mobileMenu?.classList.remove('opacity-0', 'pointer-events-none');
                mobileMenu?.classList.add('opacity-100', 'pointer-events-auto');
                document.body.style.overflow = 'hidden';
            } else {
                mobileMenu?.classList.add('opacity-0', 'pointer-events-none');
                mobileMenu?.classList.remove('opacity-100', 'pointer-events-auto');
                document.body.style.overflow = '';
            }
        }

        menuBtn?.addEventListener('click', () => toggleMenu(true));
        closeBtn?.addEventListener('click', () => toggleMenu(false));

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

        // Close menu on link click
        mobileMenu?.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => toggleMenu(false));
        });

        // Initialize Lucide Icons
        lucide.createIcons();
        
        // Initialize AOS
        AOS.init({
            once: true,
            mirror: false,
            duration: 800
        });
    </script>"""

def patch_file(filepath):
    print(f"Patching {filepath}...")
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()

    # 1. Update Top Bar
    content = re.sub(r'<!-- Top Bar -->.*?<!-- Navigation -->', TOPBAR_HTML + '\n\n' + '    <!-- Navigation -->', content, flags=re.DOTALL)
    
    # 2. Update Navigation
    content = re.sub(r'<!-- Navigation -->.*?<!-- (Hero|ARIC Hero|Actualité|Expertise Section|Services Header|Recrutement Hero)', NAV_HTML + '\n\n' + '    <!-- \\1', content, flags=re.DOTALL)
    # Fallback for pages where hero comment is different
    if NAV_HTML not in content:
        content = re.sub(r'<!-- Navigation -->.*?</nav>', NAV_HTML, content, flags=re.DOTALL)

    # 3. Update Footer
    content = re.sub(r'<!-- Footer -->.*?<!-- Assistance -->', FOOTER_HTML + '\n\n' + '    <!-- Assistance -->', content, flags=re.DOTALL)

    # 4. Update Assistance
    content = re.sub(r'<!-- Assistance -->.*?<script>', ASSISTANCE_HTML + '\n\n\n' + '    <script>', content, flags=re.DOTALL)

    # 5. Update Scripts
    content = re.sub(r'<script>\s*// Mobile Menu Toggle Logic.*?</script>', SCRIPT_HTML, content, flags=re.DOTALL)

    with open(filepath, 'w', encoding='utf-8') as f:
        f.write(content)

if __name__ == "__main__":
    # Get all html files except contact.html (our source)
    html_files = glob.glob('*.html')
    for f in html_files:
        if f == 'contact.html':
            continue
        patch_file(f)
    print("Patching complete.")
