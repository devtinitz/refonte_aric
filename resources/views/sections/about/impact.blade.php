<!-- Environmental Impact -->
<section id="about-section-impact" data-cms-section="impact" class="py-16 md:py-24 relative bg-green-50 overflow-hidden text-tech-navy group/section">
    <!-- Section Controls -->
    @if(auth()->check())
    <div class="absolute top-4 left-1/2 -translate-x-1/2 z-[1000] opacity-0 group-hover/section:opacity-100 transition-all flex items-center bg-tech-navy/90 backdrop-blur-md rounded-2xl p-1 border border-white/10 shadow-2xl">
        <button onclick="window.cmsEditor.moveSection('impact', 'up')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Monter">
            <i data-lucide="chevron-up" class="w-4 h-4"></i>
        </button>
        <div class="px-3 text-[9px] font-black uppercase tracking-widest text-tech-cyan border-x border-white/10">Impact Environnemental</div>
        <button onclick="window.cmsEditor.moveSection('impact', 'down')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Descendre">
            <i data-lucide="chevron-down" class="w-4 h-4"></i>
        </button>
    </div>
    @endif

    <div class="absolute inset-0 grid-pattern opacity-20"></div>
    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="text-center mb-16 md:mb-24" data-aos="fade-up">
            <div class="text-green-600 font-bold text-xs uppercase tracking-[0.3em] mb-4">Développement Durable</div>
            <x-cms-editable key="about_impact_title"><h2 class="text-3xl md:text-5xl font-extrabold mb-4">Notre Impact Environnemental</h2></x-cms-editable>
            <div class="w-16 h-1 bg-green-500 mx-auto rounded-full"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12">
            <div class="text-center p-8 glass border-green-100 rounded-3xl shadow-xl shadow-green-900/5" data-aos="fade-up">
                <div class="w-16 h-16 bg-green-500 text-white rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg shadow-green-500/20">
                    <x-cms-editable key="impact_1_icon" type="icon">
                        <i data-lucide="cloud-rain" class="w-8 h-8"></i>
                    </x-cms-editable>
                </div>
                <x-cms-editable key="impact_1_value"><div class="text-4xl font-black mb-2 text-green-600">15,000+</div></x-cms-editable>
                <x-cms-editable key="impact_1_label"><p class="text-xs font-bold text-slate-500 uppercase tracking-widest">Tonnes de CO2 Économisées</p></x-cms-editable>
            </div>
            <div class="text-center p-8 glass border-green-100 rounded-3xl shadow-xl shadow-green-900/5" data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 bg-green-500 text-white rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg shadow-green-500/20">
                    <x-cms-editable key="impact_2_icon" type="icon">
                        <i data-lucide="zap" class="w-8 h-8"></i>
                    </x-cms-editable>
                </div>
                <x-cms-editable key="impact_2_value"><div class="text-4xl font-black mb-2 text-green-600">-25%</div></x-cms-editable>
                <x-cms-editable key="impact_2_label"><p class="text-xs font-bold text-slate-500 uppercase tracking-widest">Réduction Consommation</p></x-cms-editable>
            </div>
            <div class="text-center p-8 glass border-green-100 rounded-3xl shadow-xl shadow-green-900/5" data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 bg-green-500 text-white rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg shadow-green-500/20">
                    <x-cms-editable key="impact_3_icon" type="icon">
                        <i data-lucide="sun" class="w-8 h-8"></i>
                    </x-cms-editable>
                </div>
                <x-cms-editable key="impact_3_value"><div class="text-4xl font-black mb-2 text-green-600">10+ MW</div></x-cms-editable>
                <x-cms-editable key="impact_3_label"><p class="text-xs font-bold text-slate-500 uppercase tracking-widest">Solaire Installé</p></x-cms-editable>
            </div>
        </div>
    </div>
</section>
