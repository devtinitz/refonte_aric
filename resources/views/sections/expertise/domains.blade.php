<!-- Domains Hub Section -->
<section id="expertise-section-domains" data-cms-section="domains" class="py-16 md:py-24 relative overflow-hidden bg-white group/section">
    <!-- Section Controls -->
    @if(auth()->check())
    <div class="absolute top-4 left-1/2 -translate-x-1/2 z-[1000] opacity-0 group-hover/section:opacity-100 transition-all flex items-center bg-tech-navy/90 backdrop-blur-md rounded-2xl p-1 border border-white/10 shadow-2xl">
        <button onclick="window.cmsEditor.moveSection('domains', 'up')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Monter">
            <i data-lucide="chevron-up" class="w-4 h-4"></i>
        </button>
        <div class="px-3 text-[9px] font-black uppercase tracking-widest text-tech-cyan border-x border-white/10">Nos Domaines</div>
        <button onclick="window.cmsEditor.moveSection('domains', 'down')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Descendre">
            <i data-lucide="chevron-down" class="w-4 h-4"></i>
        </button>
    </div>
    @endif

    <div class="max-w-7xl mx-auto px-6">
        <div data-aos="fade-up" class="text-center max-w-3xl mx-auto mb-20 text-balance">
            <div class="text-tech-cyan font-black text-xs uppercase tracking-[0.3em] mb-4">Pôles d'excellence</div>
            <x-cms-editable key="expertise_main_title"><h2 class="text-4xl md:text-5xl font-black text-tech-navy mb-6">Nos domaines d'intervention</h2></x-cms-editable>
            <div class="w-20 h-1.5 bg-tech-cyan mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-12">
            <!-- Card 1: Froid Industrie -->
            <a href="/expertise-industrie" class="flex flex-col group senior-glass rounded-[48px] overflow-hidden hover:bg-tech-navy transition-all duration-700 hover:shadow-[0_20px_80px_rgba(0,164,189,0.15)] hover:-translate-y-4 shadow-sm" data-aos="fade-up">
                <div class="relative aspect-[16/10] overflow-hidden">
                    <x-cms-editable key="expertise_card_1_img" type="media">
                        <img src="/froid-expertise.png" alt="Froid Commercial & Industriel" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                    </x-cms-editable>
                    <div class="absolute inset-0 bg-gradient-to-t from-tech-navy/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
                    <div class="absolute top-6 left-6 w-14 h-14 bg-white/10 backdrop-blur-md rounded-2xl flex items-center justify-center border border-white/20 shadow-lg">
                        <x-cms-editable key="expertise_card_1_icon" type="icon" class="flex items-center justify-center w-full h-full">
                            <i data-lucide="snowflake" class="w-7 h-7 text-tech-cyan"></i>
                        </x-cms-editable>
                    </div>
                </div>
                <div class="p-8 md:p-10 flex-grow flex flex-col">
                    <x-cms-editable key="exp_card_1_title"><h3 class="text-2xl font-black mb-4 group-hover:text-white transition-colors">Froid Commercial & Industriel</h3></x-cms-editable>
                    <x-cms-editable key="exp_card_1_desc">
                        <p class="text-slate-500 group-hover:text-slate-300 text-sm leading-relaxed mb-8 flex-grow italic font-medium">
                            Solutions de réfrigération pour l'agroalimentaire, la logistique et l'industrie. Performance durable & respect de la chaîne du froid.
                        </p>
                    </x-cms-editable>
                    <span class="inline-flex items-center text-tech-cyan font-bold text-xs tracking-[0.2em] uppercase group-hover:translate-x-2 transition-transform">
                        Expertise Complète <i data-lucide="arrow-right" class="w-4 h-4 ml-3"></i>
                    </span>
                </div>
            </a>

            <!-- Card 2: Génie Climatique -->
            <a href="/expertise-tertiaire" class="flex flex-col group senior-glass rounded-[48px] overflow-hidden hover:bg-tech-navy transition-all duration-700 hover:shadow-[0_20px_80px_rgba(0,164,189,0.15)] hover:-translate-y-4 shadow-sm" data-aos="fade-up" data-aos-delay="100">
                <div class="relative aspect-[16/10] overflow-hidden">
                    <x-cms-editable key="expertise_card_2_img" type="media">
                        <img src="/cvc-expertise.png" alt="Génie Climatique" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                    </x-cms-editable>
                    <div class="absolute inset-0 bg-gradient-to-t from-tech-navy/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
                    <div class="absolute top-6 left-6 w-14 h-14 bg-white/10 backdrop-blur-md rounded-2xl flex items-center justify-center border border-white/20 shadow-lg">
                        <x-cms-editable key="expertise_card_2_icon" type="icon" class="flex items-center justify-center w-full h-full">
                            <i data-lucide="wind" class="w-7 h-7 text-tech-cyan"></i>
                        </x-cms-editable>
                    </div>
                </div>
                <div class="p-8 md:p-10 flex-grow flex flex-col">
                    <x-cms-editable key="exp_card_2_title"><h3 class="text-2xl font-black mb-4 group-hover:text-white transition-colors">Génie Climatique (CVC)</h3></x-cms-editable>
                    <x-cms-editable key="exp_card_2_desc">
                        <p class="text-slate-500 group-hover:text-slate-300 text-sm leading-relaxed mb-8 flex-grow italic font-medium">
                            Maîtrise thermique et gestion de la qualité de l'air pour environnements tertiaires et industriels de haute exigence.
                        </p>
                    </x-cms-editable>
                    <span class="inline-flex items-center text-tech-cyan font-bold text-xs tracking-[0.2em] uppercase group-hover:translate-x-2 transition-transform">
                        Expertise Complète <i data-lucide="arrow-right" class="w-4 h-4 ml-3"></i>
                    </span>
                </div>
            </a>

            <!-- Card 3: Efficacité Énergétique -->
            <a href="/expertise-efficacite" class="flex flex-col group senior-glass rounded-[48px] overflow-hidden hover:bg-tech-navy transition-all duration-700 hover:shadow-[0_20px_80px_rgba(0,164,189,0.15)] hover:-translate-y-4 shadow-sm" data-aos="fade-up" data-aos-delay="200">
                <div class="relative aspect-[16/10] overflow-hidden">
                    <x-cms-editable key="expertise_card_3_img" type="media">
                        <img src="/energy-expertise.png" alt="Efficacité Énergétique" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                    </x-cms-editable>
                    <div class="absolute inset-0 bg-gradient-to-t from-tech-navy/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
                    <div class="absolute top-6 left-6 w-14 h-14 bg-white/10 backdrop-blur-md rounded-2xl flex items-center justify-center border border-white/20 shadow-lg">
                        <x-cms-editable key="expertise_card_3_icon" type="icon" class="flex items-center justify-center w-full h-full">
                            <i data-lucide="zap" class="w-7 h-7 text-tech-cyan"></i>
                        </x-cms-editable>
                    </div>
                </div>
                <div class="p-8 md:p-10 flex-grow flex flex-col">
                    <x-cms-editable key="exp_card_3_title"><h3 class="text-2xl font-black mb-4 group-hover:text-white transition-colors">Efficacité Énergétique</h3></x-cms-editable>
                    <x-cms-editable key="exp_card_3_desc">
                        <p class="text-slate-500 group-hover:text-slate-300 text-sm leading-relaxed mb-8 flex-grow italic font-medium">
                            Audits, pilotage GTB intelligent et optimisation des consommations. Solutions certifiées pour une transition énergétique.
                        </p>
                    </x-cms-editable>
                    <span class="inline-flex items-center text-tech-cyan font-bold text-xs tracking-[0.2em] uppercase group-hover:translate-x-2 transition-transform">
                        Expertise Complète <i data-lucide="arrow-right" class="w-4 h-4 ml-3"></i>
                    </span>
                </div>
            </a>

            <!-- Card 4: Milieu Santé -->
            <a href="/expertise-sante" class="flex flex-col group senior-glass rounded-[48px] overflow-hidden hover:bg-tech-navy transition-all duration-700 hover:shadow-[0_20px_80px_rgba(0,164,189,0.15)] hover:-translate-y-4 shadow-sm" data-aos="fade-up" data-aos-delay="300">
                <div class="relative aspect-[16/10] overflow-hidden">
                    <x-cms-editable key="expertise_card_4_img" type="media">
                        <img src="/health-expertise.png" alt="Milieu Santé" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                    </x-cms-editable>
                    <div class="absolute inset-0 bg-gradient-to-t from-tech-navy/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
                    <div class="absolute top-6 left-6 w-14 h-14 bg-white/10 backdrop-blur-md rounded-2xl flex items-center justify-center border border-white/20 shadow-lg">
                        <x-cms-editable key="expertise_card_4_icon" type="icon" class="flex items-center justify-center w-full h-full">
                            <i data-lucide="thermometer-snowflake" class="w-7 h-7 text-tech-cyan"></i>
                        </x-cms-editable>
                    </div>
                </div>
                <div class="p-8 md:p-10 flex-grow flex flex-col">
                    <x-cms-editable key="exp_card_4_title"><h3 class="text-2xl font-black mb-4 group-hover:text-white transition-colors">Milieu Santé</h3></x-cms-editable>
                    <x-cms-editable key="exp_card_4_desc">
                        <p class="text-slate-500 group-hover:text-slate-300 text-sm leading-relaxed mb-8 flex-grow italic font-medium">
                            Environnements critiques et salles blanches à paramètres contrôlés. Solutions sur-mesure pour les exigences hospitalières.
                        </p>
                    </x-cms-editable>
                    <span class="inline-flex items-center text-tech-cyan font-bold text-xs tracking-[0.2em] uppercase group-hover:translate-x-2 transition-transform">
                        Expertise Complète <i data-lucide="arrow-right" class="w-4 h-4 ml-3"></i>
                    </span>
                </div>
            </a>

            <!-- Card 5: Énergie Solaire -->
            <a href="/expertise-solaire" class="flex flex-col group senior-glass rounded-[48px] overflow-hidden hover:bg-tech-navy transition-all duration-700 hover:shadow-[0_20px_80px_rgba(0,164,189,0.15)] hover:-translate-y-4 shadow-sm" data-aos="fade-up" data-aos-delay="400">
                <div class="relative aspect-[16/10] overflow-hidden">
                    <x-cms-editable key="expertise_card_5_img" type="media">
                        <img src="/solar-expertise.png" alt="Énergie Solaire" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                    </x-cms-editable>
                    <div class="absolute inset-0 bg-gradient-to-t from-tech-navy/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
                    <div class="absolute top-6 left-6 w-14 h-14 bg-white/10 backdrop-blur-md rounded-2xl flex items-center justify-center border border-white/20 shadow-lg">
                        <x-cms-editable key="expertise_card_5_icon" type="icon" class="flex items-center justify-center w-full h-full">
                            <i data-lucide="sun" class="w-7 h-7 text-tech-cyan"></i>
                        </x-cms-editable>
                    </div>
                </div>
                <div class="p-8 md:p-10 flex-grow flex flex-col">
                    <x-cms-editable key="exp_card_5_title"><h3 class="text-2xl font-black mb-4 group-hover:text-white transition-colors">Énergie Solaire</h3></x-cms-editable>
                    <x-cms-editable key="exp_card_5_desc">
                        <p class="text-slate-500 group-hover:text-slate-300 text-sm leading-relaxed mb-8 flex-grow italic font-medium">
                            Autoconsommation, hybridation et maintenance préventive. Libérez le potentiel énergétique de vos installations.
                        </p>
                    </x-cms-editable>
                    <span class="inline-flex items-center text-tech-cyan font-bold text-xs tracking-[0.2em] uppercase group-hover:translate-x-2 transition-transform">
                        Expertise Complète <i data-lucide="arrow-right" class="w-4 h-4 ml-3"></i>
                    </span>
                </div>
            </a>

            <!-- Card 6: Smart Monitoring -->
            <a href="/services" class="flex flex-col group senior-glass rounded-[48px] overflow-hidden hover:bg-tech-navy transition-all duration-700 hover:shadow-[0_20px_80px_rgba(0,164,189,0.15)] hover:-translate-y-4 shadow-sm" data-aos="fade-up" data-aos-delay="500">
                <div class="relative aspect-[16/10] overflow-hidden">
                    <x-cms-editable key="expertise_card_6_img" type="media">
                        <img src="/monitoring-expertise.png" alt="Smart Monitoring" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                    </x-cms-editable>
                    <div class="absolute inset-0 bg-gradient-to-t from-tech-navy/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
                    <div class="absolute top-6 left-6 w-14 h-14 bg-white/10 backdrop-blur-md rounded-2xl flex items-center justify-center border border-white/20 shadow-lg">
                        <x-cms-editable key="expertise_card_6_icon" type="icon" class="flex items-center justify-center w-full h-full">
                            <i data-lucide="monitor" class="w-7 h-7 text-tech-cyan"></i>
                        </x-cms-editable>
                    </div>
                </div>
                <div class="p-8 md:p-10 flex-grow flex flex-col">
                    <x-cms-editable key="exp_card_6_title"><h3 class="text-2xl font-black mb-4 group-hover:text-white transition-colors">Smart Monitoring</h3></x-cms-editable>
                    <x-cms-editable key="exp_card_6_desc">
                        <p class="text-slate-500 group-hover:text-slate-300 text-sm leading-relaxed mb-8 flex-grow italic font-medium">
                            Écosystème digital pour le suivi temps réel de vos installations. Intelligence opérationnelle & maintenance prédictive.
                        </p>
                    </x-cms-editable>
                    <span class="inline-flex items-center text-tech-cyan font-bold text-xs tracking-[0.2em] uppercase group-hover:translate-x-2 transition-transform">
                        Expertise Complète <i data-lucide="arrow-right" class="w-4 h-4 ml-3"></i>
                    </span>
                </div>
            </a>
        </div>
    </div>
</section>
