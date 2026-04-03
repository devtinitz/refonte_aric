<!-- Core Services Sections -->
<section id="services-section-offers" data-cms-section="offers" class="py-16 md:py-24 relative overflow-hidden bg-white group/section">
    <!-- Section Controls -->
    @if(auth()->check())
    <div class="absolute top-4 left-1/2 -translate-x-1/2 z-[1000] opacity-0 group-hover/section:opacity-100 transition-all flex items-center bg-tech-navy/90 backdrop-blur-md rounded-2xl p-1 border border-white/10 shadow-2xl">
        <button onclick="window.cmsEditor.moveSection('offers', 'up')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Monter">
            <i data-lucide="chevron-up" class="w-4 h-4"></i>
        </button>
        <div class="px-3 text-[9px] font-black uppercase tracking-widest text-tech-cyan border-x border-white/10">Nos Offres</div>
        <button onclick="window.cmsEditor.moveSection('offers', 'down')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Descendre">
            <i data-lucide="chevron-down" class="w-4 h-4"></i>
        </button>
    </div>
    @endif

    <div class="max-w-7xl mx-auto px-6">
        <div data-aos="fade-up" class="text-center max-w-3xl mx-auto mb-20">
            <div class="text-tech-cyan font-black text-xs uppercase tracking-[0.3em] mb-4">Ce que nous proposons</div>
            <x-cms-editable key="services_main_title"><h2 class="text-4xl md:text-5xl font-black text-tech-navy mb-6">Nos offres de services</h2></x-cms-editable>
            <div class="w-20 h-1.5 bg-tech-cyan mx-auto rounded-full"></div>
        </div>

        <!-- Service 01: Installation & Études -->
        <div class="grid lg:grid-cols-2 gap-16 lg:gap-24 items-center mb-32">
            <div class="relative" data-aos="fade-right">
                <div class="absolute -top-6 -left-6 w-16 h-16 bg-tech-cyan rounded-full flex items-center justify-center text-white text-xl font-black shadow-xl z-20">01</div>
                <div class="relative rounded-[48px] overflow-hidden shadow-2xl border border-white/20">
                    <x-cms-editable key="service_1_img" type="media">
                        <img src="/service-install.png" alt="Installation & Études" class="w-full h-auto">
                    </x-cms-editable>
                </div>
            </div>
            <div data-aos="fade-left">
                <x-cms-editable key="service_1_full_title"><h3 class="text-3xl font-black text-tech-navy mb-6">Installation & Études</h3></x-cms-editable>
                <x-cms-editable key="service_1_full_desc"><p class="text-slate-600 text-lg leading-relaxed mb-8 font-medium">
                    Conception, dimensionnement et mise en service d'équipements de réfrigération, climatisation et traitement d'air. De l'étude technique à la livraison clé en main.
                </p></x-cms-editable>
                <ul class="space-y-5">
                    <li class="flex items-start group text-sm">
                        <div class="w-6 h-6 bg-tech-cyan/10 rounded-full flex items-center justify-center mt-1 mr-4 group-hover:bg-tech-cyan transition-colors shadow-sm">
                            <x-cms-editable key="service_1_list_1_icon" type="icon" class="flex items-center justify-center w-full h-full">
                                <i data-lucide="check" class="w-4 h-4 text-tech-cyan group-hover:text-white transition-colors"></i>
                            </x-cms-editable>
                        </div>
                        <x-cms-editable key="service_1_list_1"><span class="text-slate-600 font-bold italic">Études techniques et plans d'implantation</span></x-cms-editable>
                    </li>
                    <li class="flex items-start group text-sm">
                        <div class="w-6 h-6 bg-tech-cyan/10 rounded-full flex items-center justify-center mt-1 mr-4 group-hover:bg-tech-cyan transition-colors shadow-sm">
                            <x-cms-editable key="service_1_list_2_icon" type="icon" class="flex items-center justify-center w-full h-full">
                                <i data-lucide="check" class="w-4 h-4 text-tech-cyan group-hover:text-white transition-colors"></i>
                            </x-cms-editable>
                        </div>
                        <x-cms-editable key="service_1_list_2"><span class="text-slate-600 font-bold italic">Sélection et approvisionnement des équipements</span></x-cms-editable>
                    </li>
                    <li class="flex items-start group text-sm">
                        <div class="w-6 h-6 bg-tech-cyan/10 rounded-full flex items-center justify-center mt-1 mr-4 group-hover:bg-tech-cyan transition-colors shadow-sm">
                            <x-cms-editable key="service_1_list_3_icon" type="icon" class="flex items-center justify-center w-full h-full">
                                <i data-lucide="check" class="w-4 h-4 text-tech-cyan group-hover:text-white transition-colors"></i>
                            </x-cms-editable>
                        </div>
                        <x-cms-editable key="service_1_list_3"><span class="text-slate-600 font-bold italic">Montage et mise en service complète</span></x-cms-editable>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Service 02: Maintenance & SAV 24/7 -->
        <div class="grid lg:grid-cols-2 gap-16 lg:gap-24 items-center mb-32">
            <div class="lg:order-2 relative" data-aos="fade-left">
                <div class="absolute -top-6 -right-6 w-16 h-16 bg-tech-cyan rounded-full flex items-center justify-center text-white text-xl font-black shadow-xl z-20">02</div>
                <div class="relative rounded-[48px] overflow-hidden shadow-2xl border border-white/20">
                    <x-cms-editable key="service_2_img" type="media">
                        <img src="/service-maintenance.png" alt="Maintenance & SAV 24/7" class="w-full h-auto">
                    </x-cms-editable>
                </div>
            </div>
            <div class="lg:order-1" data-aos="fade-right">
                <x-cms-editable key="service_2_full_title"><h3 class="text-3xl font-black text-tech-navy mb-6">Maintenance & SAV 24/7</h3></x-cms-editable>
                <x-cms-editable key="service_2_full_desc"><p class="text-slate-600 text-lg leading-relaxed mb-8 font-medium">
                    Astreinte permanente, maintenance préventive planifiée et interventions curatives rapides. Nos techniciens assurent la continuité de service 7j/7.
                </p></x-cms-editable>
                <ul class="space-y-5">
                    <li class="flex items-start group">
                        <div class="w-6 h-6 bg-tech-cyan/10 rounded-full flex items-center justify-center mt-1 mr-4 group-hover:bg-tech-cyan transition-colors shadow-sm">
                            <x-cms-editable key="service_2_list_1_icon" type="icon" class="flex items-center justify-center w-full h-full">
                                <i data-lucide="check" class="w-4 h-4 text-tech-cyan group-hover:text-white transition-colors"></i>
                            </x-cms-editable>
                        </div>
                        <x-cms-editable key="service_2_list_1"><span class="text-slate-600 font-bold italic">Contrats de maintenance sur mesure</span></x-cms-editable>
                    </li>
                    <li class="flex items-start group">
                        <div class="w-6 h-6 bg-tech-cyan/10 rounded-full flex items-center justify-center mt-1 mr-4 group-hover:bg-tech-cyan transition-colors shadow-sm">
                            <x-cms-editable key="service_2_list_2_icon" type="icon" class="flex items-center justify-center w-full h-full">
                                <i data-lucide="check" class="w-4 h-4 text-tech-cyan group-hover:text-white transition-colors"></i>
                            </x-cms-editable>
                        </div>
                        <x-cms-editable key="service_2_list_2"><span class="text-slate-600 font-bold italic">Astreinte 24h/24, 7j/7 garantie</span></x-cms-editable>
                    </li>
                    <li class="flex items-start group">
                        <div class="w-6 h-6 bg-tech-cyan/10 rounded-full flex items-center justify-center mt-1 mr-4 group-hover:bg-tech-cyan transition-colors shadow-sm">
                            <x-cms-editable key="service_2_list_3_icon" type="icon" class="flex items-center justify-center w-full h-full">
                                <i data-lucide="check" class="w-4 h-4 text-tech-cyan group-hover:text-white transition-colors"></i>
                            </x-cms-editable>
                        </div>
                        <x-cms-editable key="service_2_list_3"><span class="text-slate-600 font-bold italic">Techniciens certifiés F-Gaz & Hab. Elec</span></x-cms-editable>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Service 03: Conseil & Financement ... etc ... I'll stop here to avoid too large file if possible, but I'll finish this section -->
        <div class="grid lg:grid-cols-2 gap-16 lg:gap-24 items-center mb-32">
            <div class="relative" data-aos="fade-right">
                <div class="absolute -top-6 -left-6 w-16 h-16 bg-tech-cyan rounded-full flex items-center justify-center text-white text-xl font-black shadow-xl z-20">03</div>
                <div class="relative rounded-[48px] overflow-hidden shadow-2xl border border-white/20">
                    <x-cms-editable key="service_3_img" type="media">
                        <img src="/service-finance.png" alt="Conseil & Financement" class="w-full h-auto">
                    </x-cms-editable>
                </div>
            </div>
            <div data-aos="fade-left">
                <x-cms-editable key="service_3_full_title"><h3 class="text-3xl font-black text-tech-navy mb-6">Conseil & Financement</h3></x-cms-editable>
                <x-cms-editable key="service_3_full_desc"><p class="text-slate-600 text-lg leading-relaxed mb-8 font-medium">
                    Audit énergétique, conseil réglementaire et accompagnement financier. Nous vous guidons vers les solutions les plus rentables et durables.
                </p></x-cms-editable>
                <ul class="space-y-5">
                    <li class="flex items-start group">
                        <div class="w-6 h-6 bg-tech-cyan/10 rounded-full flex items-center justify-center mt-1 mr-4 group-hover:bg-tech-cyan transition-colors shadow-sm">
                            <x-cms-editable key="service_3_list_1_icon" type="icon" class="flex items-center justify-center w-full h-full">
                                <i data-lucide="check" class="w-4 h-4 text-tech-cyan group-hover:text-white transition-colors"></i>
                            </x-cms-editable>
                        </div>
                        <x-cms-editable key="service_3_list_1"><span class="text-slate-600 font-bold italic">Audit énergétique complet des installations</span></x-cms-editable>
                    </li>
                    <li class="flex items-start group">
                        <div class="w-6 h-6 bg-tech-cyan/10 rounded-full flex items-center justify-center mt-1 mr-4 group-hover:bg-tech-cyan transition-colors shadow-sm">
                            <x-cms-editable key="service_3_list_2_icon" type="icon" class="flex items-center justify-center w-full h-full">
                                <i data-lucide="check" class="w-4 h-4 text-tech-cyan group-hover:text-white transition-colors"></i>
                            </x-cms-editable>
                        </div>
                        <x-cms-editable key="service_3_list_2"><span class="text-slate-600 font-bold italic">Montage de dossiers de subventions</span></x-cms-editable>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Service 04: Conduite d'Exploitation -->
        <div class="grid lg:grid-cols-2 gap-16 lg:gap-24 items-center mb-16">
            <div class="lg:order-2 relative" data-aos="fade-left">
                <div class="absolute -top-6 -right-6 w-16 h-16 bg-tech-cyan rounded-full flex items-center justify-center text-white text-xl font-black shadow-xl z-20">04</div>
                <div class="relative rounded-[48px] overflow-hidden shadow-2xl border border-white/20">
                    <x-cms-editable key="service_4_img" type="media">
                        <img src="/service-operation.png" alt="Conduite d'Exploitation" class="w-full h-auto">
                    </x-cms-editable>
                </div>
            </div>
            <div class="lg:order-1" data-aos="fade-right">
                <x-cms-editable key="service_4_full_title"><h3 class="text-3xl font-black text-tech-navy mb-6">Conduite d'Exploitation</h3></x-cms-editable>
                <x-cms-editable key="service_4_full_desc"><p class="text-slate-600 text-lg leading-relaxed mb-8 font-medium">
                    Supervision quotidienne et pilotage de vos installations : télésurveillance en temps réel, reporting de performance et optimisation continue.
                </p></x-cms-editable>
                <ul class="space-y-5">
                    <li class="flex items-start group">
                        <div class="w-6 h-6 bg-tech-cyan/10 rounded-full flex items-center justify-center mt-1 mr-4 group-hover:bg-tech-cyan transition-colors shadow-sm">
                            <x-cms-editable key="service_4_list_1_icon" type="icon" class="flex items-center justify-center w-full h-full">
                                <i data-lucide="check" class="w-4 h-4 text-tech-cyan group-hover:text-white transition-colors"></i>
                            </x-cms-editable>
                        </div>
                        <x-cms-editable key="service_4_list_1"><span class="text-slate-600 font-bold italic">Télésurveillance et alertes 24h/24</span></x-cms-editable>
                    </li>
                    <li class="flex items-start group">
                        <div class="w-6 h-6 bg-tech-cyan/10 rounded-full flex items-center justify-center mt-1 mr-4 group-hover:bg-tech-cyan transition-colors shadow-sm">
                            <x-cms-editable key="service_4_list_2_icon" type="icon" class="flex items-center justify-center w-full h-full">
                                <i data-lucide="check" class="w-4 h-4 text-tech-cyan group-hover:text-white transition-colors"></i>
                            </x-cms-editable>
                        </div>
                        <x-cms-editable key="service_4_list_2"><span class="text-slate-600 font-bold italic">Reporting mensuel de performance (GTB)</span></x-cms-editable>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
