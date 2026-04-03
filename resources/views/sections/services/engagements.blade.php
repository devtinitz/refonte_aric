<!-- Engagements Section -->
<section id="services-section-engagements" data-cms-section="engagements" class="py-20 md:py-32 bg-slate-50 relative overflow-hidden group/section">
    <!-- Section Controls -->
    @if(auth()->check())
    <div class="absolute top-4 left-1/2 -translate-x-1/2 z-[1000] opacity-0 group-hover/section:opacity-100 transition-all flex items-center bg-tech-navy/90 backdrop-blur-md rounded-2xl p-1 border border-white/10 shadow-2xl">
        <button onclick="window.cmsEditor.moveSection('engagements', 'up')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Monter">
            <i data-lucide="chevron-up" class="w-4 h-4"></i>
        </button>
        <div class="px-3 text-[9px] font-black uppercase tracking-widest text-tech-cyan border-x border-white/10">Nos Engagements</div>
        <button onclick="window.cmsEditor.moveSection('engagements', 'down')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Descendre">
            <i data-lucide="chevron-down" class="w-4 h-4"></i>
        </button>
    </div>
    @endif

    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-16 lg:gap-24 items-start">
            <div data-aos="fade-right">
                <div class="text-tech-cyan font-black text-xs uppercase tracking-[0.3em] mb-4">Nos Engagements</div>
                <x-cms-editable key="services_eng_title"><h2 class="text-4xl md:text-5xl font-black text-tech-navy mb-12">La performance dans la durée</h2></x-cms-editable>
                
                <div class="space-y-10">
                    <!-- Engagement 1 -->
                    <div class="flex items-start group">
                        <div class="w-10 h-10 rounded-full bg-[#e6f4f7] flex items-center justify-center shrink-0 mt-1 mr-6 group-hover:bg-tech-cyan transition-colors">
                            <x-cms-editable key="services_eng_1_icon" type="icon">
                                <i data-lucide="clock" class="w-5 h-5 text-tech-cyan group-hover:text-white transition-colors"></i>
                            </x-cms-editable>
                        </div>
                        <div>
                            <x-cms-editable key="services_eng_1_title"><h4 class="text-xl font-black text-tech-navy mb-2">Réactivité garantie</h4></x-cms-editable>
                            <x-cms-editable key="services_eng_1_desc"><p class="text-slate-500 font-medium leading-relaxed italic">Astreinte 24h/24 — intervention sous 48h pour toute panne critique.</p></x-cms-editable>
                        </div>
                    </div>
                    <!-- Engagement 2 -->
                    <div class="flex items-start group">
                        <div class="w-10 h-10 rounded-full bg-[#e6f4f7] flex items-center justify-center shrink-0 mt-1 mr-6 group-hover:bg-tech-cyan transition-colors">
                            <x-cms-editable key="services_eng_2_icon" type="icon">
                                <i data-lucide="check-square" class="w-5 h-5 text-tech-cyan group-hover:text-white transition-colors"></i>
                            </x-cms-editable>
                        </div>
                        <div>
                            <x-cms-editable key="services_eng_2_title"><h4 class="text-xl font-black text-tech-navy mb-2">Techniciens certifiés</h4></x-cms-editable>
                            <x-cms-editable key="services_eng_2_desc"><p class="text-slate-500 font-medium leading-relaxed italic">Nos intervenants sont certifiés F-Gaz et formés aux nouvelles technologies.</p></x-cms-editable>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Engagement Image Card -->
            <div class="relative" data-aos="fade-left">
                <div class="bg-white rounded-[40px] p-6 shadow-2xl shadow-tech-navy/5 border border-white relative z-10">
                    <div class="p-6">
                        <x-cms-editable key="services_eng_card_text"><p class="text-sm text-tech-navy font-bold leading-relaxed mb-6 italic">
                            Nous vous garantissons le plus grand confort ainsi qu'une sérénité technique, réglementaire et budgétaire grâce à notre expérience.
                        </p></x-cms-editable>
                        <div class="rounded-3xl overflow-hidden shadow-inner border border-slate-100">
                            <x-cms-editable key="services_engagement_img" type="media">
                                <img src="/engagement-card.png" alt="Processus complet ARIC" class="w-full h-auto">
                            </x-cms-editable>
                        </div>
                    </div>
                </div>
                <div class="absolute inset-0 bg-tech-cyan/5 -m-6 rounded-[60px] -z-10 translate-x-6 translate-y-6"></div>
            </div>
        </div>
    </div>
</section>
