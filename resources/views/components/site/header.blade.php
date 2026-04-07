<!-- Top Bar -->
<div class="hidden lg:block bg-[#0a192f] border-b border-white/5 py-2">
    <div class="max-w-7xl mx-auto px-6 flex justify-between items-center text-sm font-semibold text-slate-400">
        <div class="flex items-center space-x-6">
            <a href="tel:{{ cms_setting('site.phone', '+225 27 20 00 00 00') }}" class="flex items-center hover:text-[#00a4bd] transition-colors">
                <i data-lucide="phone" class="w-4 h-4 mr-2 text-[#00a4bd]"></i>
                {{ cms_setting('site.phone', '+225 27 20 00 00 00') }}
            </a>
            <a href="mailto:{{ cms_setting('site.email.contact', 'contact@aric.ci') }}" class="flex items-center hover:text-[#00a4bd] transition-colors">
                <i data-lucide="mail" class="w-4 h-4 mr-2 text-[#00a4bd]"></i>
                {{ cms_setting('site.email.contact', 'contact@aric.ci') }}
            </a>
        </div>
        <div class="flex items-center space-x-4">
            @if(cms_setting('site.social.facebook'))
            <a href="{{ cms_setting('site.social.facebook') }}" target="_blank" class="hover:text-[#00a4bd] transition-colors">
                <i data-lucide="facebook" class="w-4 h-4"></i>
            </a>
            @endif
            @if(cms_setting('site.social.linkedin'))
            <a href="{{ cms_setting('site.social.linkedin') }}" target="_blank" class="hover:text-[#00a4bd] transition-colors">
                <i data-lucide="linkedin" class="w-4 h-4"></i>
            </a>
            @endif
            @if(cms_setting('site.social.instagram'))
            <a href="{{ cms_setting('site.social.instagram') }}" target="_blank" class="hover:text-[#00a4bd] transition-colors">
                <i data-lucide="instagram" class="w-4 h-4"></i>
            </a>
            @endif
        </div>
    </div>
</div>

<!-- Navigation -->
<nav class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-6 h-16 flex justify-between items-center">
        <!-- Logo -->
        <a href="/" class="flex items-center shrink-0 transition-transform hover:scale-105">
            <x-cms-editable key="site_logo" type="media">
                <img src="/logo.png" alt="ARIC Solutions Logo" class="h-8 lg:h-12 w-auto drop-shadow-sm">
            </x-cms-editable>
        </a>

        <!-- Desktop Menu -->
        <div class="hidden lg:flex items-center space-x-6 xl:space-x-8 ml-auto mr-8 text-xs font-bold uppercase tracking-widest transition-all">
            <a href="/about" class="text-slate-600 hover:text-[#00a4bd] transition-colors whitespace-nowrap">
                <x-cms-editable key="nav_about" buttonClass="-top-6 right-0">Qui sommes-nous</x-cms-editable>
            </a>
            
            <!-- Expertise Mega Menu -->
            <div class="relative group cursor-pointer flex items-center py-4">
                <span class="text-slate-600 group-hover:text-[#00a4bd] transition-colors whitespace-nowrap">
                    <x-cms-editable key="nav_expertise" buttonClass="-top-6 right-0">Notre Expertise</x-cms-editable>
                </span>
                <i data-lucide="chevron-down" class="w-3.5 h-3.5 ml-1 text-slate-500 group-hover:rotate-180 transition-transform"></i>
                
                <div class="absolute top-full left-1/2 -translate-x-1/2 pt-4 opacity-0 translate-y-2 pointer-events-none group-hover:opacity-100 group-hover:translate-y-0 group-hover:pointer-events-auto transition-all duration-300 z-50">
                    <div class="bg-white rounded-[32px] w-[900px] border border-slate-100 shadow-2xl p-8 normal-case tracking-normal">
                        <div class="grid grid-cols-3 gap-8">
                            <a href="/expertise-industrie" class="flex flex-col group/card transition-all duration-300">
                                <div class="aspect-[16/10] rounded-2xl overflow-hidden mb-6 border border-slate-50 shadow-sm transition-transform group-hover/card:scale-[1.02]">
                                    <img src="/froid-expertise.png" alt="Froid Commercial & Industriel" class="w-full h-full object-cover">
                                </div>
                                <h4 class="text-lg font-bold text-[#0a192f] group-hover/card:text-[#00a4bd] transition-colors mb-2 leading-snug">
                                    <x-cms-editable key="nav_exp_indi_title">Froid Commercial & Industriel</x-cms-editable>
                                </h4>
                                <x-cms-editable key="nav_exp_indi_desc"><p class="text-sm text-slate-500 leading-relaxed mb-4 line-clamp-2 italic font-medium">Conception et maintenance de systèmes frigorifiques pour la grande distribution et l'industrie.</p></x-cms-editable>
                                <span class="text-sm font-bold text-[#00a4bd] flex items-center group-hover/card:translate-x-2 transition-transform uppercase tracking-wider">
                                    Découvrir <i data-lucide="chevron-right" class="w-4 h-4 ml-1"></i>
                                </span>
                            </a>

                            <a href="/expertise-tertiaire" class="flex flex-col group/card transition-all duration-300">
                                <div class="aspect-[16/10] rounded-2xl overflow-hidden mb-6 border border-slate-50 shadow-sm transition-transform group-hover/card:scale-[1.02]">
                                    <img src="https://images.unsplash.com/photo-1621905251189-08b45d6a269e?q=80&w=800&auto=format&fit=crop" alt="Génie Climatique" class="w-full h-full object-cover">
                                </div>
                                <h4 class="text-lg font-bold text-[#0a192f] group-hover/card:text-[#00a4bd] transition-colors mb-2 leading-snug">
                                    <x-cms-editable key="nav_exp_cvc_title">Génie Climatique (CVC)</x-cms-editable>
                                </h4>
                                <x-cms-editable key="nav_exp_cvc_desc"><p class="text-sm text-slate-500 leading-relaxed mb-4 line-clamp-2 italic font-medium">Maîtrise de la température, de l'hygrométrie et de la qualité de l'air de vos bâtiments.</p></x-cms-editable>
                                <span class="text-sm font-bold text-[#00a4bd] flex items-center group-hover/card:translate-x-2 transition-transform uppercase tracking-wider">
                                    Découvrir <i data-lucide="chevron-right" class="w-4 h-4 ml-1"></i>
                                </span>
                            </a>

                            <a href="/expertise-efficacite" class="flex flex-col group/card transition-all duration-300">
                                <div class="aspect-[16/10] rounded-2xl overflow-hidden mb-6 border border-slate-50 shadow-sm transition-transform group-hover/card:scale-[1.02]">
                                    <img src="https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?q=80&w=800&auto=format&fit=crop" alt="Efficacité Énergétique" class="w-full h-full object-cover">
                                </div>
                                <h4 class="text-lg font-bold text-[#0a192f] group-hover/card:text-[#00a4bd] transition-colors mb-2 leading-snug">
                                    <x-cms-editable key="nav_exp_effi_title">Efficacité Énergétique</x-cms-editable>
                                </h4>
                                <x-cms-editable key="nav_exp_effi_desc"><p class="text-sm text-slate-500 leading-relaxed mb-4 line-clamp-2 italic font-medium">Audit, pilotage GTB et optimisation des consommations — accompagnement ISO 50001.</p></x-cms-editable>
                                <span class="text-sm font-bold text-[#00a4bd] flex items-center group-hover/card:translate-x-2 transition-transform uppercase tracking-wider">
                                    Découvrir <i data-lucide="chevron-right" class="w-4 h-4 ml-1"></i>
                                </span>
                            </a>
                            
                            <a href="/expertise-sante" class="flex flex-col group/card transition-all duration-300">
                                <div class="aspect-[16/10] rounded-2xl overflow-hidden mb-6 border border-slate-50 shadow-sm transition-transform group-hover/card:scale-[1.02]">
                                    <img src="https://images.unsplash.com/photo-1516549655169-df83a0774514?q=80&w=800&auto=format&fit=crop" alt="Milieu Santé" class="w-full h-full object-cover">
                                </div>
                                <h4 class="text-lg font-bold text-[#0a192f] group-hover/card:text-[#00a4bd] transition-colors mb-2 leading-snug">
                                    <x-cms-editable key="nav_exp_san_title">Milieu Santé</x-cms-editable>
                                </h4>
                                <x-cms-editable key="nav_exp_san_desc"><p class="text-sm text-slate-500 leading-relaxed mb-4 line-clamp-2 italic font-medium">Ingénierie de pointe pour blocs opératoires et salles blanches hospitalières.</p></x-cms-editable>
                                <span class="text-sm font-bold text-[#00a4bd] flex items-center group-hover/card:translate-x-2 transition-transform uppercase tracking-wider">
                                    Découvrir <i data-lucide="chevron-right" class="w-4 h-4 ml-1"></i>
                                </span>
                            </a>

                            <a href="/expertise-solaire" class="flex flex-col group/card transition-all duration-300">
                                <div class="aspect-[16/10] rounded-2xl overflow-hidden mb-6 border border-slate-50 shadow-sm transition-transform group-hover/card:scale-[1.02]">
                                    <img src="https://images.unsplash.com/photo-1508514177221-188b1cf16e9d?q=80&w=800&auto=format&fit=crop" alt="Énergie Solaire" class="w-full h-full object-cover">
                                </div>
                                <h4 class="text-lg font-bold text-[#0a192f] group-hover/card:text-[#00a4bd] transition-colors mb-2 leading-snug">
                                    <x-cms-editable key="nav_exp_sol_title">Énergie Solaire</x-cms-editable>
                                </h4>
                                <x-cms-editable key="nav_exp_sol_desc"><p class="text-sm text-slate-500 leading-relaxed mb-4 line-clamp-2 italic font-medium">Solutions photovoltaïques hybrides pour l'autoconsommation énergétique.</p></x-cms-editable>
                                <span class="text-sm font-bold text-[#00a4bd] flex items-center group-hover/card:translate-x-2 transition-transform uppercase tracking-wider">
                                    Découvrir <i data-lucide="chevron-right" class="w-4 h-4 ml-1"></i>
                                </span>
                            </a>
                        </div>
                        <div class="mt-8 pt-6 border-t border-slate-100 flex justify-center">
                            <a href="/expertise" class="px-10 py-3 bg-slate-50 rounded-full text-slate-600 font-bold hover:bg-[#0a192f] hover:text-white transition-all flex items-center italic text-sm relative">
                                <x-cms-editable key="nav_expertise_all" buttonClass="-top-6 right-0">Voir toutes nos expertises <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i></x-cms-editable>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
 
            <a href="/services" class="text-slate-600 hover:text-[#00a4bd] transition-colors whitespace-nowrap">
                <x-cms-editable key="nav_services" buttonClass="-top-6 right-0">Services</x-cms-editable>
            </a>
            <a href="/actualites" class="text-slate-600 hover:text-[#00a4bd] transition-colors whitespace-nowrap">
                <x-cms-editable key="nav_news" buttonClass="-top-6 right-0">Références & Actus</x-cms-editable>
            </a>
            <a href="/recrutement" class="text-slate-600 hover:text-[#00a4bd] transition-colors whitespace-nowrap">
                <x-cms-editable key="nav_careers" buttonClass="-top-6 right-0">Recrutement</x-cms-editable>
            </a>
            <a href="/contact" class="text-slate-600 hover:text-[#00a4bd] transition-colors whitespace-nowrap">
                <x-cms-editable key="nav_contact" buttonClass="-top-6 right-0">Contact</x-cms-editable>
            </a>

            @if(auth()->check())
            <button onclick="window.cmsSettings.toggle()" class="w-10 h-10 bg-tech-navy text-tech-cyan rounded-xl shadow-lg hover:scale-110 transition-transform flex items-center justify-center group ml-4">
                <i data-lucide="settings" class="w-5 h-5 animate-spin-slow"></i>
            </button>
            @endif
        </div>

        <!-- Mobile Toggle -->
        <button id="mobile-menu-btn" class="lg:hidden text-[#0a192f] w-12 h-12 flex items-center justify-center hover:bg-slate-100 rounded-2xl transition-all active:scale-95">
            <i data-lucide="menu" class="w-6 h-6"></i>
        </button>
    </div>
</nav>

<!-- Mobile Menu (Senior Mobile Side Drawer) -->
<div id="mobile-menu" class="fixed inset-0 z-[999] invisible pointer-events-none transition-all duration-500 overflow-hidden lg:hidden">
    <div id="mobile-menu-overlay" class="absolute inset-0 bg-[#0a192f]/60 backdrop-blur-sm opacity-0 transition-opacity duration-500 cursor-pointer"></div>
    <div id="mobile-menu-drawer" class="absolute top-0 right-0 w-[85%] max-w-sm h-full bg-[#0a192f] shadow-2xl translate-x-full transition-transform duration-500 ease-in-out flex flex-col border-l border-white/5">
        <div class="flex justify-between items-center p-4 border-b border-white/5">
            <x-cms-editable key="site_logo_mobile" type="media">
                <img src="/logo.png" alt="Logo" class="h-8 w-auto brightness-0 invert">
            </x-cms-editable>
            <button id="close-menu-btn" class="w-10 h-10 flex items-center justify-center rounded-2xl bg-white/5 text-white hover:bg-white/10 transition-colors">
                <i data-lucide="x" class="w-6 h-6"></i>
            </button>
        </div>
        <nav class="flex-1 overflow-y-auto px-6 py-8 flex flex-col space-y-4">
            <x-cms-editable key="mob_nav_home"><a href="/" class="text-lg font-bold text-white hover:text-[#00a4bd]">Accueil</a></x-cms-editable>
            <x-cms-editable key="mob_nav_about"><a href="/about" class="text-lg font-bold text-white hover:text-[#00a4bd]">Qui sommes-nous</a></x-cms-editable>
            <x-cms-editable key="mob_nav_expertise"><a href="/expertise" class="text-lg font-bold text-white hover:text-[#00a4bd]">Expertises</a></x-cms-editable>
            <x-cms-editable key="mob_nav_services"><a href="/services" class="text-lg font-bold text-white hover:text-[#00a4bd]">Services</a></x-cms-editable>
            <x-cms-editable key="mob_nav_news"><a href="/actualites" class="text-lg font-bold text-white hover:text-[#00a4bd]">Références</a></x-cms-editable>
            <x-cms-editable key="mob_nav_careers"><a href="/recrutement" class="text-lg font-bold text-white hover:text-[#00a4bd]">Recrutement</a></x-cms-editable>
            <x-cms-editable key="mob_nav_contact"><a href="/contact" class="text-lg font-bold text-[#00a4bd]">Contact</a></x-cms-editable>
        </nav>
    </div>
</div>

<script>
    document.getElementById('mobile-menu-btn')?.addEventListener('click', () => {
        const menu = document.getElementById('mobile-menu');
        const drawer = document.getElementById('mobile-menu-drawer');
        const overlay = document.getElementById('mobile-menu-overlay');
        menu.classList.remove('invisible', 'pointer-events-none');
        overlay.classList.replace('opacity-0', 'opacity-100');
        drawer.classList.replace('translate-x-full', 'translate-x-0');
    });

    document.getElementById('close-menu-btn')?.addEventListener('click', () => {
        const menu = document.getElementById('mobile-menu');
        const drawer = document.getElementById('mobile-menu-drawer');
        const overlay = document.getElementById('mobile-menu-overlay');
        overlay.classList.replace('opacity-100', 'opacity-0');
        drawer.classList.replace('translate-x-0', 'translate-x-full');
        setTimeout(() => menu.classList.add('invisible', 'pointer-events-none'), 500);
    });

    document.getElementById('mobile-menu-overlay')?.addEventListener('click', () => {
        document.getElementById('close-menu-btn')?.click();
    });
</script>
