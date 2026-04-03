<!-- Governance -->
<section id="about-section-governance" data-cms-section="governance" class="py-16 md:py-24 relative bg-white overflow-hidden group/section">
    <!-- Section Controls -->
    @if(auth()->check())
    <div class="absolute top-4 left-1/2 -translate-x-1/2 z-[1000] opacity-0 group-hover/section:opacity-100 transition-all flex items-center bg-tech-navy/90 backdrop-blur-md rounded-2xl p-1 border border-white/10 shadow-2xl">
        <button onclick="window.cmsEditor.moveSection('governance', 'up')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Monter">
            <i data-lucide="chevron-up" class="w-4 h-4"></i>
        </button>
        <div class="px-3 text-[9px] font-black uppercase tracking-widest text-tech-cyan border-x border-white/10">Gouvernance</div>
        <button onclick="window.cmsEditor.moveSection('governance', 'down')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Descendre">
            <i data-lucide="chevron-down" class="w-4 h-4"></i>
        </button>
    </div>
    @endif

    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16 md:mb-24" data-aos="fade-up">
            <div class="text-tech-cyan font-bold text-xs uppercase tracking-[0.3em] mb-4">Gouvernance</div>
            <x-cms-editable key="about_gov_title"><h2 class="text-3xl md:text-5xl font-extrabold text-tech-navy mb-4">Le Comité de Direction</h2></x-cms-editable>
            <div class="w-16 h-1 bg-tech-cyan mx-auto rounded-full"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 md:gap-8">
            <!-- Member 1 -->
            <div class="group" data-aos="fade-up">
                <div class="relative mb-8 aspect-square overflow-hidden rounded-[2.5rem] glass border-tech-cyan/20">
                    <x-cms-editable key="gov_1_img" type="media" buttonClass="top-24 left-10" positionClass="absolute" class="absolute inset-0">
                        <div class="w-full h-full bg-tech-navy/5 flex items-center justify-center group-hover:bg-tech-navy/20 transition-all duration-500">
                            <i data-lucide="user-round" class="w-32 h-32 text-tech-navy/10 group-hover:scale-110 transition-transform"></i>
                        </div>
                    </x-cms-editable>
                    <div class="absolute inset-0 bg-gradient-to-t from-tech-navy/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
                    <div class="absolute bottom-6 left-6 right-6 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500 text-white pointer-events-none">
                        <x-cms-editable key="gov_1_bio"><p class="text-sm font-medium italic opacity-90 leading-relaxed">"25+ ans d'expérience. Pilote la stratégie de croissance régionale du groupe."</p></x-cms-editable>
                    </div>
                </div>
                <x-cms-editable key="gov_1_name"><h3 class="text-xl font-bold text-tech-navy transition-colors group-hover:text-tech-cyan">Mamadou Diallo</h3></x-cms-editable>
                <x-cms-editable key="gov_1_role"><p class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-1">Directeur Général</p></x-cms-editable>
            </div>
            <!-- Member 2 -->
            <div class="group" data-aos="fade-up" data-aos-delay="100">
                <div class="relative mb-8 aspect-square overflow-hidden rounded-[2.5rem] glass border-tech-cyan/20">
                    <x-cms-editable key="gov_2_img" type="media" buttonClass="top-24 left-10" positionClass="absolute" class="absolute inset-0">
                        <div class="w-full h-full bg-tech-navy/5 flex items-center justify-center group-hover:bg-tech-navy/20 transition-all duration-500">
                            <i data-lucide="user-round" class="w-32 h-32 text-tech-navy/10 group-hover:scale-110 transition-transform"></i>
                        </div>
                    </x-cms-editable>
                    <div class="absolute inset-0 bg-gradient-to-t from-tech-navy/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
                    <div class="absolute bottom-6 left-6 right-6 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500 text-white pointer-events-none">
                        <x-cms-editable key="gov_2_bio"><p class="text-sm font-medium italic opacity-90 leading-relaxed">"Experte en génie climatique. Supervise l'innovation technique et la qualité."</p></x-cms-editable>
                    </div>
                </div>
                <x-cms-editable key="gov_2_name"><h3 class="text-xl font-bold text-tech-navy transition-colors group-hover:text-tech-cyan">Sarah Koné</h3></x-cms-editable>
                <x-cms-editable key="gov_2_role"><p class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-1">Directrice Technique</p></x-cms-editable>
            </div>
            <!-- Member 3 -->
            <div class="group" data-aos="fade-up" data-aos-delay="200">
                <div class="relative mb-8 aspect-square overflow-hidden rounded-[2.5rem] glass border-tech-cyan/20">
                    <x-cms-editable key="gov_3_img" type="media" buttonClass="top-24 left-10" positionClass="absolute" class="absolute inset-0">
                        <div class="w-full h-full bg-tech-navy/5 flex items-center justify-center group-hover:bg-tech-navy/20 transition-all duration-500">
                            <i data-lucide="user-round" class="w-32 h-32 text-tech-navy/10 group-hover:scale-110 transition-transform"></i>
                        </div>
                    </x-cms-editable>
                    <div class="absolute inset-0 bg-gradient-to-t from-tech-navy/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
                    <div class="absolute bottom-6 left-6 right-6 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500 text-white pointer-events-none">
                        <x-cms-editable key="gov_3_bio"><p class="text-sm font-medium italic opacity-90 leading-relaxed">"Ancien cadre EDF. Assure la synergie financement & stratégie énergétique."</p></x-cms-editable>
                    </div>
                </div>
                <x-cms-editable key="gov_3_name"><h3 class="text-xl font-bold text-tech-navy transition-colors group-hover:text-tech-cyan">Jean-Pierre Durand</h3></x-cms-editable>
                <x-cms-editable key="gov_3_role"><p class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-1">Dir. Financier</p></x-cms-editable>
            </div>
        </div>
    </div>
</section>
