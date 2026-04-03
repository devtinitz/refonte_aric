<!-- Expertise Section -->
<section id="cms-section-expertise" data-cms-section="expertise" class="py-24 relative group/section">
    <!-- Section Controls -->
    @if(auth()->check())
    <div class="absolute top-4 left-1/2 -translate-x-1/2 z-[1000] opacity-0 group-hover/section:opacity-100 transition-all flex items-center bg-tech-navy/90 backdrop-blur-md rounded-2xl p-1 border border-white/10 shadow-2xl">
        <button onclick="window.cmsEditor.moveSection('expertise', 'up')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Monter">
            <i data-lucide="chevron-up" class="w-4 h-4"></i>
        </button>
        <div class="px-3 text-[9px] font-black uppercase tracking-widest text-tech-cyan border-x border-white/10">Notre Expertise</div>
        <button onclick="window.cmsEditor.moveSection('expertise', 'down')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Descendre">
            <i data-lucide="chevron-down" class="w-4 h-4"></i>
        </button>
    </div>
    @endif

    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-8">
            <div class="max-w-xl" data-aos="fade-right">
                <h2 class="text-sm font-black text-tech-cyan uppercase tracking-[0.2em] mb-4">Notre Expertise</h2>
                <x-cms-editable key="expertise_grid_title"><h3 class="text-4xl md:text-5xl font-extrabold">Maîtrise des environnements critiques.</h3></x-cms-editable>
            </div>
            <a href="/expertise" class="px-8 py-4 glass rounded-2xl font-bold hover:bg-[#0a192f] hover:text-white transition-all shadow-sm relative" data-aos="fade-left">
                <x-cms-editable key="expertise_cta_label" buttonClass="-top-6 right-0">Voir toutes les expertises</x-cms-editable>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-px bg-black/5 rounded-[40px] overflow-hidden border border-black/5">
            <!-- Expertise Item 1 -->
            <div class="bg-white/40 p-12 hover:bg-white/60 transition-colors group">
                <div class="text-tech-cyan mb-8 opacity-70 group-hover:opacity-100 transition-opacity">
                    <x-cms-editable key="exp_item_1_icon" type="icon">
                        <i data-lucide="snowflake" class="w-12 h-12"></i>
                    </x-cms-editable>
                </div>
                <x-cms-editable key="exp_item_1_title"><h4 class="text-2xl font-bold mb-4 text-tech-navy">Froid Commercial & Industriel</h4></x-cms-editable>
                <x-cms-editable key="exp_item_1_desc"><p class="text-slate-600">Conception et maintenance de systèmes frigorifiques pour la grande distribution et l'industrie agroalimentaire.</p></x-cms-editable>
            </div>
            <!-- Expertise Item 2 -->
            <div class="bg-white/40 p-12 hover:bg-white/60 transition-colors group">
                <div class="text-tech-cyan mb-8 opacity-70 group-hover:opacity-100 transition-opacity">
                    <x-cms-editable key="exp_item_2_icon" type="icon">
                        <i data-lucide="wind" class="w-12 h-12"></i>
                    </x-cms-editable>
                </div>
                <x-cms-editable key="exp_item_2_title"><h4 class="text-2xl font-bold mb-4 text-tech-navy">Génie Climatique (CVC)</h4></x-cms-editable>
                <x-cms-editable key="exp_item_2_desc"><p class="text-slate-600">Maîtrise de la température et de la qualité de l'air — de l'hôtellerie de luxe aux salles blanches industrielles.</p></x-cms-editable>
            </div>
            <!-- Expertise Item 3 -->
            <div class="bg-white/40 p-12 hover:bg-white/60 transition-colors group">
                <div class="text-tech-cyan mb-8 opacity-70 group-hover:opacity-100 transition-opacity">
                    <x-cms-editable key="exp_item_3_icon" type="icon">
                        <i data-lucide="activity" class="w-12 h-12"></i>
                    </x-cms-editable>
                </div>
                <x-cms-editable key="exp_item_3_title"><h4 class="text-2xl font-bold mb-4 text-tech-navy">Efficacité Énergétique</h4></x-cms-editable>
                <x-cms-editable key="exp_item_3_desc"><p class="text-slate-600">Audit, pilotage GTB et optimisation temps réel des consommations — accompagnement certification ISO 50001.</p></x-cms-editable>
            </div>
        </div>
    </div>
</section>
