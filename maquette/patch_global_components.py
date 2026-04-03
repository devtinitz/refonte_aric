import os
import glob
import re

# --- SENIOR UI COMPONENTS ---

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
                <a href="https://www.facebook.com/ConergiesGroup" target="_blank" class="hover:text-[#00a4bd] transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg></a>
                <a href="https://www.linkedin.com/company/groupe-conergies/" target="_blank" class="hover:text-[#00a4bd] transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect width="4" height="12" x="2" y="9"/><circle cx="4" cy="4" r="2"/></svg></a>
            </div>
        </div>
    </div>"""

NAV_BAR_HTML = """    <!-- Navigation -->
    <nav class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-slate-200">
        <!-- Global Responsive Fix -->
        <style>
            html, body {
                overflow-x: hidden !important;
                width: 100%;
                position: relative;
                -webkit-overflow-scrolling: touch;
            }
            /* Prevent AOS from creating horizontal scroll on mobile */
            [data-aos] {
                pointer-events: none;
            }
            [data-aos].aos-animate {
                pointer-events: auto;
            }
            .senior-glass {
                background: rgba(255, 255, 255, 0.7);
                backdrop-filter: blur(12px);
                -webkit-backdrop-filter: blur(12px);
                border: 1px solid rgba(255, 255, 255, 0.3);
            }
            .shimmer {
                position: relative;
                overflow: hidden;
            }
            .shimmer::after {
                content: '';
                position: absolute;
                top: -50%;
                left: -60%;
                width: 20%;
                height: 200%;
                background: rgba(255, 255, 255, 0.2);
                transform: rotate(30deg);
                animation: shimmer 4s infinite;
            }
            @keyframes shimmer {
                0% { left: -60%; }
                20% { left: 120%; }
                100% { left: 120%; }
            }
            @keyframes pulse-soft {
                0% { transform: scale(1); box-shadow: 0 0 0 0 rgba(239, 0, 50, 0.4); }
                70% { transform: scale(1.05); box-shadow: 0 0 0 10px rgba(239, 0, 50, 0); }
                100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(239, 0, 50, 0); }
            }
            .assistance-pulse {
                animation: pulse-soft 2s infinite;
            }
        </style>
        <div class="max-w-7xl mx-auto px-6 h-16 lg:h-16 flex justify-between items-center">
            <!-- Logo -->
            <a href="./" class="flex items-center shrink-0 transition-transform hover:scale-105">
                <img src="logo.png" alt="ARIC Solutions Logo" class="h-8 lg:h-12 w-auto drop-shadow-sm">
            </a>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center space-x-6 xl:space-x-8 ml-auto mr-8 text-xs font-bold uppercase tracking-widest transition-all">
                <a href="about.html" class="text-slate-600 hover:text-[#00a4bd] transition-colors">Qui sommes-nous</a>
                
                <!-- Expertise Mega Menu -->
                <div class="relative group cursor-pointer flex items-center py-4">
                    <span class="text-slate-600 group-hover:text-[#00a4bd] transition-colors">Notre Expertise</span>
                    <i data-lucide="chevron-down" class="w-3.5 h-3.5 ml-1 text-slate-500 group-hover:rotate-180 transition-transform"></i>
                    
                    <div class="absolute top-full left-1/2 -translate-x-1/2 pt-4 opacity-0 translate-y-2 pointer-events-none group-hover:opacity-100 group-hover:translate-y-0 group-hover:pointer-events-auto transition-all duration-300 z-50">
                        <div class="bg-white rounded-[32px] w-[900px] border border-slate-100 shadow-2xl p-8 normal-case tracking-normal">
                            <div class="grid grid-cols-3 gap-8">
                                <a href="expertise-industrie.html" class="flex flex-col group/card transition-all duration-300">
                                    <div class="aspect-[16/10] rounded-2xl overflow-hidden mb-6 border border-slate-50 shadow-sm transition-transform group-hover/card:scale-[1.02]">
                                        <img src="froid-expertise.png" alt="Froid Commercial & Industriel" class="w-full h-full object-cover">
                                    </div>
                                    <h4 class="text-lg font-bold text-[#0a192f] group-hover/card:text-[#00a4bd] transition-colors mb-2 leading-snug">Froid Commercial, Industriel & Solaire</h4>
                                    <p class="text-sm text-slate-500 leading-relaxed mb-4 line-clamp-2 italic font-medium">Conception et maintenance de systèmes frigorifiques pour la grande distribution et l'industrie.</p>
                                    <span class="text-sm font-bold text-[#00a4bd] flex items-center group-hover/card:translate-x-2 transition-transform uppercase tracking-wider">
                                        Découvrir <i data-lucide="chevron-right" class="w-4 h-4 ml-1"></i>
                                    </span>
                                </a>

                                <a href="expertise-tertiaire.html" class="flex flex-col group/card transition-all duration-300">
                                    <div class="aspect-[16/10] rounded-2xl overflow-hidden mb-6 border border-slate-50 shadow-sm transition-transform group-hover/card:scale-[1.02]">
                                        <img src="https://images.unsplash.com/photo-1621905251189-08b45d6a269e?q=80&w=800&auto=format&fit=crop" alt="Génie Climatique" class="w-full h-full object-cover">
                                    </div>
                                    <h4 class="text-lg font-bold text-[#0a192f] group-hover/card:text-[#00a4bd] transition-colors mb-2 leading-snug">Génie Climatique (CVC)</h4>
                                    <p class="text-sm text-slate-500 leading-relaxed mb-4 line-clamp-2 italic font-medium">Maîtrise de la température, de l'hygrométrie et de la qualité de l'air de vos bâtiments.</p>
                                    <span class="text-sm font-bold text-[#00a4bd] flex items-center group-hover/card:translate-x-2 transition-transform uppercase tracking-wider">
                                        Découvrir <i data-lucide="chevron-right" class="w-4 h-4 ml-1"></i>
                                    </span>
                                </a>

                                <a href="expertise-efficacite.html" class="flex flex-col group/card transition-all duration-300">
                                    <div class="aspect-[16/10] rounded-2xl overflow-hidden mb-6 border border-slate-50 shadow-sm transition-transform group-hover/card:scale-[1.02]">
                                        <img src="https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?q=80&w=800&auto=format&fit=crop" alt="Efficacité Énergétique" class="w-full h-full object-cover">
                                    </div>
                                    <h4 class="text-lg font-bold text-[#0a192f] group-hover/card:text-[#00a4bd] transition-colors mb-2 leading-snug">Efficacité Énergétique</h4>
                                    <p class="text-sm text-slate-500 leading-relaxed mb-4 line-clamp-2 italic font-medium">Audit, pilotage GTB et optimisation des consommations — accompagnement ISO 50001.</p>
                                    <span class="text-sm font-bold text-[#00a4bd] flex items-center group-hover/card:translate-x-2 transition-transform uppercase tracking-wider">
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
                <button id="mobile-menu-btn" class="lg:hidden text-[#0a192f] w-12 h-12 flex items-center justify-center hover:bg-slate-100 rounded-2xl transition-all active:scale-95">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>
            </div>
        </div>
    </nav>"""

MOBILE_MENU_HTML = """    <!-- Senior Mobile Side Drawer -->
    <div id="mobile-menu" class="fixed inset-0 z-[999] invisible pointer-events-none transition-all duration-500 overflow-hidden lg:hidden">
        <!-- Backdrop -->
        <div id="mobile-menu-overlay" class="absolute inset-0 bg-[#0a192f]/60 backdrop-blur-sm opacity-0 transition-opacity duration-500 cursor-pointer"></div>
        
        <!-- Drawer Content -->
        <div id="mobile-menu-drawer" class="absolute top-0 right-0 w-[85%] max-w-sm h-full bg-[#0a192f] shadow-2xl translate-x-full transition-transform duration-500 ease-in-out flex flex-col border-l border-white/5">
            <!-- Drawer Header -->
            <div class="flex justify-between items-center p-4 border-b border-white/5">
                <img src="logo.png" alt="Logo" class="h-8 w-auto brightness-0 invert">
                <button id="close-menu-btn" class="w-10 h-10 flex items-center justify-center rounded-2xl bg-white/5 text-white hover:bg-white/10 transition-colors">
                    <i data-lucide="x" class="w-6 h-6"></i>
                </button>
            </div>

            <!-- Scrollable Links -->
            <nav class="flex-1 overflow-y-auto px-6 py-8 flex flex-col space-y-1">
                <div class="text-[10px] font-black text-white/30 uppercase tracking-[0.3em] mb-4 pl-2">Navigation Principale</div>
                <a href="index.html" class="group flex items-center justify-between py-2 pl-2 text-base font-bold text-white hover:text-[#00a4bd] transition-colors">
                    <span>Accueil</span>
                    <i data-lucide="arrow-right" class="w-5 h-5 opacity-0 group-hover:opacity-100 transition-all -translate-x-4 group-hover:translate-x-0"></i>
                </a>
                <a href="about.html" class="group flex items-center justify-between py-2 pl-2 text-base font-bold text-white hover:text-[#00a4bd] transition-colors">
                    <span>Qui sommes-nous</span>
                    <i data-lucide="arrow-right" class="w-5 h-5 opacity-0 group-hover:opacity-100 transition-all -translate-x-4 group-hover:translate-x-0"></i>
                </a>
                <a href="expertise.html" class="group flex items-center justify-between py-2 pl-2 text-base font-bold text-white hover:text-[#00a4bd] transition-colors">
                    <span>Expertises</span>
                    <i data-lucide="arrow-right" class="w-5 h-5 opacity-0 group-hover:opacity-100 transition-all -translate-x-4 group-hover:translate-x-0"></i>
                </a>
                <a href="services.html" class="group flex items-center justify-between py-2 pl-2 text-base font-bold text-white hover:text-[#00a4bd] transition-colors">
                    <span>Services</span>
                    <i data-lucide="arrow-right" class="w-5 h-5 opacity-0 group-hover:opacity-100 transition-all -translate-x-4 group-hover:translate-x-0"></i>
                </a>
                <a href="actualites.html" class="group flex items-center justify-between py-2 pl-2 text-base font-bold text-white hover:text-[#00a4bd] transition-colors">
                    <span>Références</span>
                    <i data-lucide="arrow-right" class="w-5 h-5 opacity-0 group-hover:opacity-100 transition-all -translate-x-4 group-hover:translate-x-0"></i>
                </a>
                <a href="recrutement.html" class="group flex items-center justify-between py-2 pl-2 text-base font-bold text-white hover:text-[#00a4bd] transition-colors">
                    <span>Recrutement</span>
                    <i data-lucide="arrow-right" class="w-5 h-5 opacity-0 group-hover:opacity-100 transition-all -translate-x-4 group-hover:translate-x-0"></i>
                </a>
                <a href="contact.html" class="group flex items-center justify-between py-2 pl-2 text-base font-bold text-[#00a4bd]">
                    <span>Contact</span>
                    <i data-lucide="arrow-right" class="w-5 h-5 opacity-100"></i>
                </a>
            </nav>

            <!-- Drawer Footer -->
            <div class="p-8 border-t border-white/5 bg-white/[0.02]">
                <div class="flex space-x-6 mb-8 pr-2">
                    <a href="https://www.linkedin.com/company/groupe-conergies/" target="_blank" class="w-12 h-12 rounded-2xl bg-white/5 flex items-center justify-center text-white hover:bg-[#00a4bd] transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect width="4" height="12" x="2" y="9"/><circle cx="4" cy="4" r="2"/></svg>
                    </a>
                    <a href="https://www.facebook.com/ConergiesGroup" target="_blank" class="w-12 h-12 rounded-2xl bg-white/5 flex items-center justify-center text-white hover:bg-[#00a4bd] transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                    </a>
                </div>
                <a href="contact.html" class="block w-full py-5 bg-[#00a4bd] text-[#0a192f] text-center font-black rounded-2xl shadow-xl shadow-[#00a4bd]/20 uppercase tracking-widest text-xs">
                    Lancer un Projet
                </a>
            </div>
        </div>
    </div>"""

FOOTER_HTML = """    <!-- Footer -->
    <footer class="relative bg-gradient-to-b from-white to-slate-50 text-slate-600 py-16 md:py-24 overflow-hidden border-t border-slate-100">
        <div class="absolute top-0 left-0 w-full h-1 bg-[#00a4bd]"></div>
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12 md:mb-20">
                <div>
                    <img src="logo.png" alt="ARIC Solutions Logo" class="h-20 w-auto mb-8 drop-shadow-sm">
                    <p class="text-slate-500 text-sm leading-relaxed mb-8 font-medium">
                        Leader multitechnique en Afrique de l'Ouest. Filiale du Groupe Conergies. Innovation, Performance & Durabilité.
                    </p>
                    <div class="flex space-x-4">
                        <a href="https://www.linkedin.com/company/groupe-conergies/" target="_blank" class="w-10 h-10 rounded-xl bg-white border border-slate-200 flex items-center justify-center text-slate-500 hover:text-[#00a4bd] hover:border-[#00a4bd] transition-all shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-current"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect width="4" height="12" x="2" y="9"/><circle cx="4" cy="4" r="2"/></svg>
                        </a>
                        <a href="https://www.facebook.com/ConergiesGroup" target="_blank" class="w-10 h-10 rounded-xl bg-white border border-slate-200 flex items-center justify-center text-slate-500 hover:text-[#00a4bd] hover:border-[#00a4bd] transition-all shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-current"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                        </a>
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
    <div class="fixed bottom-4 right-4 md:bottom-10 md:right-10 z-[100]" data-aos="fade-left" data-aos-delay="1000">
        <button id="assistance-btn" class="group flex items-center gap-2 md:gap-4 p-3 md:px-6 md:py-4 rounded-full text-white transition-all hover:scale-105 active:scale-95 shadow-2xl bg-[#ef0032] assistance-pulse">
            <div class="p-1 md:p-2 bg-white/10 rounded-full group-hover:rotate-12 transition-transform">
                <i data-lucide="headset" class="w-5 h-5 md:w-6 md:h-6"></i>
            </div>
            <span class="font-black tracking-widest text-xs md:text-sm uppercase hidden sm:inline">Assistance 24/7</span>
            <span class="font-black tracking-widest text-[10px] uppercase inline sm:hidden">SOS 24/7</span>
        </button>
    </div>

    <!-- Assistance Card -->
    <div id="assistance-card" class="fixed inset-0 z-[110] flex items-center justify-center sm:items-end sm:justify-end pointer-events-none p-4 sm:p-10 opacity-0 invisible transition-all duration-300">
        <div id="assistance-overlay" class="absolute inset-0 bg-tech-navy/40 backdrop-blur-sm pointer-events-auto cursor-pointer"></div>
        <div class="relative w-full max-w-md bg-white rounded-[40px] shadow-2xl overflow-hidden pointer-events-auto transform translate-y-10 transition-transform duration-300 border border-slate-100">
            <div class="p-8 md:p-10">
                <div class="flex justify-between items-start mb-8">
                    <div>
                        <div class="text-[10px] font-black text-tech-cyan uppercase tracking-[0.3em] mb-2">Support Technique</div>
                        <h3 class="text-2xl font-black text-tech-navy">SOS Assistance</h3>
                    </div>
                    <button id="close-assistance" class="w-10 h-10 flex items-center justify-center rounded-full bg-slate-50 hover:bg-slate-100 transition-colors">
                        <i data-lucide="x" class="w-5 h-5 text-slate-400"></i>
                    </button>
                </div>
                
                <div class="space-y-4">
                    <div class="p-6 rounded-3xl bg-slate-50 border border-slate-100">
                        <div class="flex items-center space-x-4 mb-4">
                            <div class="w-10 h-10 bg-[#ef0032]/10 rounded-xl flex items-center justify-center">
                                <i data-lucide="phone-call" class="w-5 h-5 text-[#ef0032]"></i>
                            </div>
                            <span class="font-black text-sm uppercase tracking-widest text-tech-navy">Hotlines Directes</span>
                        </div>
                        <div class="space-y-3 pl-2">
                            <a href="tel:+2252721212121" class="flex justify-between items-center group">
                                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">CIV</span>
                                <span class="text-sm font-black text-tech-navy group-hover:text-[#ef0032] transition-colors">+225 27 21 21 21 21</span>
                            </a>
                            <a href="tel:+22320211515" class="flex justify-between items-center group text-right">
                                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Mali</span>
                                <span class="text-sm font-black text-tech-navy group-hover:text-[#ef0032] transition-colors">+223 20 21 15 15</span>
                            </a>
                        </div>
                    </div>

                    <a href="https://wa.me/2250707070707" target="_blank" class="flex items-center space-x-4 p-5 rounded-3xl bg-green-500/5 border border-green-500/10 hover:bg-green-500/10 transition-colors group">
                        <div class="w-10 h-10 bg-green-500/10 rounded-xl flex items-center justify-center text-green-600"><i data-lucide="message-circle" class="w-5 h-5"></i></div>
                        <div class="flex-1">
                            <div class="text-[10px] font-black text-green-600 uppercase tracking-widest mb-1">WhatsApp Business</div>
                            <div class="text-sm font-black text-tech-navy">Expertise en direct</div>
                        </div>
                    </a>
                </div>

                <div class="mt-8">
                    <a href="contact.html" class="block w-full py-5 bg-[#0a192f] text-white text-center font-black rounded-2xl hover:scale-[1.02] transition-transform shadow-xl">
                        Intervention d'Urgence
                    </a>
                </div>
            </div>
        </div>
    </div>"""

SCRIPT_HTML = """    <script>
        // SENIOR MOBILE MENU LOGIC
        const menuBtn = document.getElementById('mobile-menu-btn');
        const closeBtn = document.getElementById('close-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuOverlay = document.getElementById('mobile-menu-overlay');
        const menuDrawer = document.getElementById('mobile-menu-drawer');

        function openMenu() {
            if (!mobileMenu || !menuDrawer || !menuOverlay) return;
            mobileMenu.classList.remove('invisible', 'pointer-events-none');
            // Force reflow
            mobileMenu.offsetHeight;
            menuOverlay.classList.remove('opacity-0');
            menuOverlay.classList.add('opacity-100');
            menuDrawer.classList.remove('translate-x-full');
            menuDrawer.classList.add('translate-x-0');
            // Lock scrolling on both body and html for reliability on mobile
            document.body.style.overflow = 'hidden';
            document.documentElement.style.overflow = 'hidden';
        }

        function closeMenu() {
            if (!mobileMenu || !menuDrawer || !menuOverlay) return;
            menuOverlay.classList.remove('opacity-100');
            menuOverlay.classList.add('opacity-0');
            menuDrawer.classList.remove('translate-x-0');
            menuDrawer.classList.add('translate-x-full');
            
            setTimeout(() => {
                mobileMenu.classList.add('invisible', 'pointer-events-none');
                document.body.style.overflow = '';
                document.documentElement.style.overflow = '';
            }, 500);
        }

        menuBtn?.addEventListener('click', openMenu);
        closeBtn?.addEventListener('click', closeMenu);
        menuOverlay?.addEventListener('click', closeMenu);

        // Close on link click
        mobileMenu?.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', closeMenu);
        });

        // ASSISTANCE LOGIC
        const assistanceBtn = document.getElementById('assistance-btn');
        const closeAssistance = document.getElementById('close-assistance');
        const assistanceCard = document.getElementById('assistance-card');
        const assistanceOverlay = document.getElementById('assistance-overlay');

        function toggleAssistance(show) {
            if (show) {
                assistanceCard?.classList.add('active');
                document.body.style.overflow = 'hidden';
                document.documentElement.style.overflow = 'hidden';
            } else {
                assistanceCard?.classList.remove('active');
                document.body.style.overflow = '';
                document.documentElement.style.overflow = '';
            }
        }

        assistanceBtn?.addEventListener('click', () => toggleAssistance(true));
        closeAssistance?.addEventListener('click', () => toggleAssistance(false));
        assistanceOverlay?.addEventListener('click', () => toggleAssistance(false));

        // COUNTER LOGIC
        const stats = document.querySelectorAll('[data-count]');
        const observerOptions = { threshold: 0.5 };
        
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const target = parseInt(entry.target.getAttribute('data-count'));
                    const suffix = entry.target.getAttribute('data-suffix') || '';
                    const prefix = entry.target.getAttribute('data-prefix') || '';
                    animateValue(entry.target, 0, target, 2000, prefix, suffix);
                    counterObserver.unobserve(entry.target);
                }
            });
        }, observerOptions);

        stats.forEach(s => counterObserver.observe(s));

        function animateValue(obj, start, end, duration, prefix, suffix) {
            let startTimestamp = null;
            const step = (timestamp) => {
                if (!startTimestamp) startTimestamp = timestamp;
                const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                obj.innerText = prefix + Math.floor(progress * (end - start) + start) + suffix;
                if (progress < 1) {
                    window.requestAnimationFrame(step);
                }
            };
            window.requestAnimationFrame(step);
        }

        // INITIALIZE
        lucide.createIcons();
        AOS.init({ 
            once: true, 
            duration: 800,
            disable: 'phone'
        });
    </script>"""

# --- PATCH LOGIC ---

def patch_file(filepath):
    print(f"Applying senior refactor and fixing corruption in {filepath}...")
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()

    # CRITICAL FIX: Restore corrupted body tag (\1) or literal \n if found
    # We'll assume the standard body tag for the site
    STANDARD_BODY = '<body class="bg-gray-50 font-[\'Plus_Jakarta_Sans\'] text-slate-900 overflow-x-hidden relative">'
    if '\\1' in content:
        content = content.replace('\\1', STANDARD_BODY)
    
    # Cleanup literal \n sequences
    content = content.replace('\\\\n', '\n')
    content = content.replace('\\n', '\n')

    # 1. Update Top Bar
    content = re.sub(r'<!-- Top Bar -->.*?<!-- Navigation -->', TOPBAR_HTML + '\n\n' + '    <!-- Navigation -->', content, flags=re.DOTALL)
    
    # 2. Update Navigation (Improved Regex to prevent corruption)
    content = re.sub(r'<!-- Navigation -->.*?<!-- (Hero|ARIC Hero|Actualité|Expertise Section|Services Header|Recrutement Hero|Secondary Hero Banner)', NAV_BAR_HTML + '\n\n' + '    <!-- \\1', content, flags=re.DOTALL)
    if NAV_BAR_HTML[:50] not in content:
         content = re.sub(r'<!-- Navigation -->.*?<\/nav>(\s*<\/nav>)*', NAV_BAR_HTML, content, flags=re.DOTALL)

    # 3. Inject Mobile Menu Drawer at the start of body (Safe Method)
    # Remove any existing versions first to avoid duplication
    content = re.sub(r'<!-- Senior Mobile Side Drawer -->.*?</div>\s*</div>\s*</div>', '', content, flags=re.DOTALL)
    
    # Insert after body
    body_match = re.search(r'(<body.*?>)', content)
    if body_match:
        pos = body_match.end()
        # Check if already injected
        if '<!-- Senior Mobile Side Drawer -->' not in content:
            content = content[:pos] + '\n' + MOBILE_MENU_HTML + content[pos:]

    # 4. Update Footer
    content = re.sub(r'<!-- Footer -->.*?<!-- Assistance -->', FOOTER_HTML + '\n\n' + '    <!-- Assistance -->', content, flags=re.DOTALL)

    # 5. Update Assistance
    content = re.sub(r'<!-- Assistance -->.*?<script>', ASSISTANCE_HTML + '\n\n\n' + '    <script>', content, flags=re.DOTALL)

    # 6. Update Scripts (Safe replacement)
    content = re.sub(r'<script>\\s*//.*?MOBILE MENU LOGIC.*?</script>', SCRIPT_HTML, content, flags=re.DOTALL | re.IGNORECASE)
    content = re.sub(r'<script>\\s*// Mobile Menu Toggle Logic.*?</script>', SCRIPT_HTML, content, flags=re.DOTALL)

    with open(filepath, 'w', encoding='utf-8') as f:
        f.write(content)

if __name__ == "__main__":
    html_files = glob.glob('*.html')
    for f in html_files:
        patch_file(f)
    print("Senior refactor + Bug fix complete.")
