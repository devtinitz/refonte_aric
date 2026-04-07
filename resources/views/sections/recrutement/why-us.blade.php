<!-- Why Us Section -->
<section id="pourquoi-nous" data-cms-section="why-us" class="py-24 bg-white relative overflow-hidden group/section">
    <!-- Section Controls -->
    @if(auth()->check())
    <div class="absolute top-4 left-1/2 -translate-x-1/2 z-[1000] opacity-0 group-hover/section:opacity-100 transition-all flex items-center bg-tech-navy/90 backdrop-blur-md rounded-2xl p-1 border border-white/10 shadow-2xl">
        <button onclick="window.cmsEditor.moveSection('why-us', 'up')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Monter">
            <i data-lucide="chevron-up" class="w-4 h-4"></i>
        </button>
        <div class="px-3 text-[9px] font-black uppercase tracking-widest text-tech-cyan border-x border-white/10">Pourquoi ARIC ?</div>
        <button onclick="window.cmsEditor.moveSection('why-us', 'down')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Descendre">
            <i data-lucide="chevron-down" class="w-4 h-4"></i>
        </button>
    </div>
    @endif

    <div class="max-w-7xl mx-auto px-6">
        <div class="max-w-3xl mb-20" data-aos="fade-right">
            <div class="text-tech-cyan font-bold text-xs uppercase tracking-[0.3em] mb-4">Culture d'Entreprise</div>
            <x-cms-editable key="recruitment_culture_title"><h2 class="text-4xl md:text-5xl font-black text-tech-navy mb-8">Pourquoi nous rejoindre ?</h2></x-cms-editable>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Pillar 1 -->
            <div class="senior-glass p-10 rounded-[40px] border border-slate-100 hover:shadow-2xl transition-all group hover:-translate-y-2 duration-500" data-aos="fade-up">
                <div class="w-16 h-16 bg-tech-cyan/10 rounded-2xl flex items-center justify-center mb-8 group-hover:scale-110 transition-transform">
                    <x-cms-editable key="recruitment_pillar_1_icon" type="icon">
                        <i data-lucide="zap" class="w-8 h-8 text-tech-cyan"></i>
                    </x-cms-editable>
                </div>
                <x-cms-editable key="recruitment_pillar_1_title"><h3 class="text-xl font-bold text-tech-navy mb-4">Projets Ambitieux</h3></x-cms-editable>
                <x-cms-editable key="recruitment_pillar_1_desc"><p class="text-slate-500 text-sm leading-relaxed italic font-medium">Travaillez sur des projets d'envergure pour les plus grands acteurs industriels d'Afrique.</p></x-cms-editable>
            </div>

            <!-- Pillar 2 -->
            <div class="senior-glass p-10 rounded-[40px] border border-slate-100 hover:shadow-2xl transition-all group hover:-translate-y-2 duration-500" data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 bg-tech-cyan/10 rounded-2xl flex items-center justify-center mb-8 group-hover:scale-110 transition-transform">
                    <x-cms-editable key="recruitment_pillar_2_icon" type="icon">
                        <i data-lucide="graduation-cap" class="w-8 h-8 text-tech-cyan"></i>
                    </x-cms-editable>
                </div>
                <x-cms-editable key="recruitment_pillar_2_title"><h3 class="text-xl font-bold text-tech-navy mb-4">Formation Continue</h3></x-cms-editable>
                <x-cms-editable key="recruitment_pillar_2_desc"><p class="text-slate-500 text-sm leading-relaxed italic font-medium">Accès aux certifications techniques et programmes d'évolution de carrière permanents.</p></x-cms-editable>
            </div>

            <!-- Pillar 3 -->
            <div class="senior-glass p-10 rounded-[40px] border border-slate-100 hover:shadow-2xl transition-all group hover:-translate-y-2 duration-500" data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 bg-tech-cyan/10 rounded-2xl flex items-center justify-center mb-8 group-hover:scale-110 transition-transform">
                    <x-cms-editable key="recruitment_pillar_3_icon" type="icon">
                        <i data-lucide="users" class="w-8 h-8 text-tech-cyan"></i>
                    </x-cms-editable>
                </div>
                <x-cms-editable key="recruitment_pillar_3_title"><h3 class="text-xl font-bold text-tech-navy mb-4">Équipe Soudée</h3></x-cms-editable>
                <x-cms-editable key="recruitment_pillar_3_desc"><p class="text-slate-500 text-sm leading-relaxed italic font-medium">Une culture d'entreprise bienveillante avec des équipes pluridisciplinaires et passionnées.</p></x-cms-editable>
            </div>

            <!-- Pillar 4 -->
            <div class="senior-glass p-10 rounded-[40px] border border-slate-100 hover:shadow-2xl transition-all group hover:-translate-y-2 duration-500" data-aos="fade-up" data-aos-delay="300">
                <div class="w-16 h-16 bg-tech-cyan/10 rounded-2xl flex items-center justify-center mb-8 group-hover:scale-110 transition-transform">
                    <x-cms-editable key="recruitment_pillar_4_icon" type="icon">
                        <i data-lucide="globe" class="w-8 h-8 text-tech-cyan"></i>
                    </x-cms-editable>
                </div>
                <x-cms-editable key="recruitment_pillar_4_title"><h3 class="text-xl font-bold text-tech-navy mb-4">Impact Panafricain</h3></x-cms-editable>
                <x-cms-editable key="recruitment_pillar_4_desc"><p class="text-slate-500 text-sm leading-relaxed italic font-medium">Contribuez à la transition énergétique d'un continent entier depuis nos filiales régionales.</p></x-cms-editable>
            </div>
        </div>
    </div>
</section>
