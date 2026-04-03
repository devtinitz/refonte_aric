<!-- Content -->
<section id="expertise-solaire-section-content" data-cms-section="content" class="py-16 md:py-24 relative group/section">
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
        <div data-aos="fade-up" class="max-w-3xl mb-20">
            <x-cms-editable key="exp_sol_main_title"><h2 class="text-4xl font-extrabold text-tech-navy mb-8 leading-tight">Solaire & <span class="text-tech-cyan italic">Autoconsommation.</span></h2></x-cms-editable>
</x-cms-editable>            <x-cms-editable key="exp_sol_main_desc"><p class="text-slate-600 text-lg leading-relaxed">
</x-cms-editable>                Solutions hybrides et stockage d’énergie pour une autonomie totale.
            </p></x-cms-editable>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <div class="glass p-10 rounded-[40px] border border-white shadow-sm" data-aos="fade-right">
                <div class="w-12 h-12 bg-tech-navy/5 rounded-xl flex items-center justify-center mb-8">
                    <x-cms-editable key="exp_sol_card_1_icon" type="icon">
</x-cms-editable>                        <i data-lucide="sun" class="w-6 h-6 text-tech-cyan"></i>
                    </x-cms-editable>
                </div>
                <x-cms-editable key="exp_sol_card_1_title"><h3 class="text-2xl font-black text-tech-navy mb-4">Autoconsommation</h3></x-cms-editable>
</x-cms-editable>                <x-cms-editable key="exp_sol_card_1_desc"><p class="text-slate-500 text-sm leading-relaxed mb-8 italic">Installation de panneaux PV de dernière génération.</p></x-cms-editable>
</x-cms-editable>            </div>
            <div class="glass p-10 rounded-[40px] border border-white shadow-sm" data-aos="fade-left">
                <div class="w-12 h-12 bg-tech-navy/5 rounded-xl flex items-center justify-center mb-8">
                    <x-cms-editable key="exp_sol_card_2_icon" type="icon">
</x-cms-editable>                        <i data-lucide="battery" class="w-6 h-6 text-tech-cyan"></i>
                    </x-cms-editable>
                </div>
                <x-cms-editable key="exp_sol_card_2_title"><h3 class="text-2xl font-black text-tech-navy mb-4">Stockage</h3></x-cms-editable>
</x-cms-editable>                <x-cms-editable key="exp_sol_card_2_desc"><p class="text-slate-500 text-sm leading-relaxed mb-8 italic">Batteries intelligents pour garantir la continuité.</p></x-cms-editable>
</x-cms-editable>            </div>
        </div>
    </div>
</section>
