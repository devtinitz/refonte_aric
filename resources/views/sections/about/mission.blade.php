<!-- Mission & Key Figures -->
<section id="about-section-mission" data-cms-section="mission" class="py-16 md:py-24 relative overflow-hidden bg-white text-tech-navy group/section">
    <!-- Section Controls -->
    @if(auth()->check())
    <div class="absolute top-4 left-1/2 -translate-x-1/2 z-[1000] opacity-0 group-hover/section:opacity-100 transition-all flex items-center bg-tech-navy/90 backdrop-blur-md rounded-2xl p-1 border border-white/10 shadow-2xl">
        <button onclick="window.cmsEditor.moveSection('mission', 'up')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Monter">
            <i data-lucide="chevron-up" class="w-4 h-4"></i>
        </button>
        <div class="px-3 text-[9px] font-black uppercase tracking-widest text-tech-cyan border-x border-white/10">Notre Mission</div>
        <button onclick="window.cmsEditor.moveSection('mission', 'down')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Descendre">
            <i data-lucide="chevron-down" class="w-4 h-4"></i>
        </button>
    </div>
    @endif

    <div class="absolute inset-0 grid-pattern opacity-10"></div>
    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="grid lg:grid-cols-2 gap-12 md:gap-20 items-center mb-16">
            <div data-aos="fade-up">
                <div class="text-tech-cyan font-bold text-xs uppercase tracking-[0.3em] mb-4">Notre Mission</div>
                <x-cms-editable key="about_mission_title"><h2 class="text-3xl md:text-5xl font-extrabold leading-tight mb-8">L'énergie au service de la <span class="text-tech-cyan">performance durable</span>.</h2></x-cms-editable>
                <x-cms-editable key="about_mission_quote"><p class="text-slate-600 text-lg leading-relaxed italic border-l-4 border-tech-cyan pl-6">
                    "Apporter des solutions innovantes de maîtrise de l'énergie et de confort thermique, tout en réduisant l'empreinte environnementale de nos partenaires industriels et tertiaires."
                </p></x-cms-editable>
            </div>
            <div class="grid grid-cols-2 gap-6 md:gap-8" data-aos="fade-left">
                <div class="glass border-slate-100 p-8 rounded-3xl text-center shadow-2xl shadow-blue-900/5">
                    <x-cms-editable key="about_stat_years"><div class="text-4xl md:text-5xl font-black text-tech-cyan mb-2">25+</div></x-cms-editable>
                    <div class="text-[10px] uppercase tracking-widest text-slate-500 font-bold">Années d'Expérience</div>
                </div>
                <div class="glass border-slate-100 p-8 rounded-3xl text-center shadow-2xl shadow-blue-900/5">
                    <x-cms-editable key="about_stat_projects"><div class="text-4xl md:text-5xl font-black text-tech-cyan mb-2">500+</div></x-cms-editable>
                    <div class="text-[10px] uppercase tracking-widest text-slate-500 font-bold">Projets Livrés</div>
                </div>
                <div class="glass border-slate-100 p-8 rounded-3xl text-center shadow-2xl shadow-blue-900/5">
                    <x-cms-editable key="about_stat_staff"><div class="text-4xl md:text-5xl font-black text-tech-cyan mb-2">250+</div></x-cms-editable>
                    <div class="text-[10px] uppercase tracking-widest text-slate-500 font-bold">Collaborateurs</div>
                </div>
                <div class="glass border-slate-100 p-8 rounded-3xl text-center shadow-2xl shadow-blue-900/5">
                    <x-cms-editable key="about_stat_countries"><div class="text-4xl md:text-5xl font-black text-tech-cyan mb-2">3</div></x-cms-editable>
                    <div class="text-[10px] uppercase tracking-widest text-slate-500 font-bold">Pays d'Implantation</div>
                </div>
            </div>
        </div>
    </div>
</section>
