<!-- Detailed Content -->
<section id="expertise-tertiaire-section-content" data-cms-section="content" class="py-16 md:py-24 relative group/section">
    <!-- Section Controls -->
    @if(auth()->check())
    <div class="absolute top-4 left-1/2 -translate-x-1/2 z-[1000] opacity-0 group-hover/section:opacity-100 transition-all flex items-center bg-tech-navy/90 backdrop-blur-md rounded-2xl p-1 border border-white/10 shadow-2xl">
        <button onclick="window.cmsEditor.moveSection('content', 'up')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Monter">
            <i data-lucide="chevron-up" class="w-4 h-4"></i>
        </button>
        <div class="px-3 text-[9px] font-black uppercase tracking-widest text-tech-cyan border-x border-white/10">Contenu Principal</div>
        <button onclick="window.cmsEditor.moveSection('content', 'down')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Descendre">
            <i data-lucide="chevron-down" class="w-4 h-4"></i>
        </button>
    </div>
    @endif

    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-20 items-center">
            <div data-aos="fade-right">
                <x-cms-editable key="exp_tert_main_title"><h2 class="text-4xl font-extrabold text-tech-navy mb-8 leading-tight">Génie Climatique & <span class="text-tech-cyan">Ventilation</span>.</h2></x-cms-editable>
</x-cms-editable>                <x-cms-editable key="exp_tert_main_desc"><p class="text-slate-600 text-lg leading-relaxed mb-8">
</x-cms-editable>                    Nous maîtrisons l'ensemble de la chaîne CVC (Chauffage, Ventilation, Climatisation) pour les complexes tertiaires, les centres bancaires, les hôtels et les data centers.
                </p></x-cms-editable>
                <div class="grid sm:grid-cols-2 gap-6">
                    <div class="p-6 glass rounded-3xl border border-tech-cyan/20">
                        <x-cms-editable key="exp_tert_card_1_title"><h4 class="font-bold text-tech-navy mb-2">Climatisation Centrale</h4></x-cms-editable>
</x-cms-editable>                        <x-cms-editable key="exp_tert_card_1_desc"><p class="text-xs text-slate-500">VRV/VRF, Groupes d’eau glacée pour grands volumes.</p></x-cms-editable>
</x-cms-editable>                    </div>
                    <div class="p-6 glass rounded-3xl border border-tech-cyan/20">
                        <x-cms-editable key="exp_tert_card_2_title"><h4 class="font-bold text-tech-navy mb-2">Traitement d'Air</h4></x-cms-editable>
</x-cms-editable>                        <x-cms-editable key="exp_tert_card_2_desc"><p class="text-xs text-slate-500">CTA, Filtration et qualité de l'air intérieur.</p></x-cms-editable>
</x-cms-editable>                    </div>
                </div>
            </div>
            <div class="relative rounded-[48px] overflow-hidden shadow-2xl" data-aos="zoom-in">
                <x-cms-editable key="exp_tertiaire_main_img" type="media">
</x-cms-editable>                    <img src="https://images.unsplash.com/photo-1621905251189-08b45d6a269e?q=80&w=800" alt="HVAC System" class="w-full h-auto">
                </x-cms-editable>
            </div>
        </div>
    </div>
</section>
