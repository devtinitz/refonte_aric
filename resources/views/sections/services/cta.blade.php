<!-- CTA Section -->
<section id="services-section-cta" data-cms-section="cta" class="py-20 md:py-32 bg-tech-navy relative overflow-hidden group/section">
    <!-- Section Controls -->
    @if(auth()->check())
    <div class="absolute top-4 left-1/2 -translate-x-1/2 z-[1000] opacity-0 group-hover/section:opacity-100 transition-all flex items-center bg-tech-navy/90 backdrop-blur-md rounded-2xl p-1 border border-white/10 shadow-2xl">
        <button onclick="window.cmsEditor.moveSection('cta', 'up')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Monter">
            <i data-lucide="chevron-up" class="w-4 h-4"></i>
        </button>
        <div class="px-3 text-[9px] font-black uppercase tracking-widest text-tech-cyan border-x border-white/10">Appel à l'action</div>
        <button onclick="window.cmsEditor.moveSection('cta', 'down')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Descendre">
            <i data-lucide="chevron-down" class="w-4 h-4"></i>
        </button>
    </div>
    @endif

    <div class="absolute inset-0 opacity-10">
        <x-cms-editable key="services_cta_bg" type="media">
            <img src="/froid-expertise.png" alt="Background" class="w-full h-full object-cover">
        </x-cms-editable>
    </div>
    <div class="max-w-7xl mx-auto px-6 relative z-10 text-center">
        <div data-aos="zoom-in" class="max-w-4xl mx-auto">
            <x-cms-editable key="services_cta_title"><h2 class="text-4xl md:text-5xl font-black text-white mb-8">Besoin d'un contrat de maintenance ?</h2></x-cms-editable>
            <x-cms-editable key="services_cta_desc"><p class="text-slate-300 text-lg mb-12 font-medium">
                Nos experts étudient votre parc d'équipements et vous proposent un contrat adapté à vos contraintes.
            </p></x-cms-editable>
            <a href="/contact" class="inline-flex items-center px-12 py-5 bg-tech-cyan text-white font-black rounded-2xl hover:scale-105 active:scale-95 transition-all shadow-[0_20px_50px_rgba(0,164,189,0.3)] group drop-shadow-xl relative">
                <x-cms-editable key="services_cta_btn_label" buttonClass="-top-10 left-0">Prendre contact <i data-lucide="arrow-right" class="w-5 h-5 ml-4 group-hover:translate-x-2 transition-transform"></i></x-cms-editable>
            </a>
        </div>
    </div>
</section>
