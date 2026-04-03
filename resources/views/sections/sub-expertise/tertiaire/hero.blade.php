<!-- Secondary Hero Banner -->
<header id="expertise-tertiaire-section-hero" data-cms-section="hero" class="relative min-h-[60vh] md:min-h-[50vh] flex flex-col justify-center items-start overflow-hidden text-white group/section">
    <!-- Section Controls -->
    @if(auth()->check())
    <div class="absolute top-4 left-1/2 -translate-x-1/2 z-[1000] opacity-0 group-hover/section:opacity-100 transition-all flex items-center bg-tech-navy/90 backdrop-blur-md rounded-2xl p-1 border border-white/10 shadow-2xl">
        <button onclick="window.cmsEditor.moveSection('hero', 'up')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Monter">
            <i data-lucide="chevron-up" class="w-4 h-4"></i>
        </button>
        <div class="px-3 text-[9px] font-black uppercase tracking-widest text-tech-cyan border-x border-white/10">Bannière Hero</div>
        <button onclick="window.cmsEditor.moveSection('hero', 'down')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Descendre">
            <i data-lucide="chevron-down" class="w-4 h-4"></i>
        </button>
    </div>
    @endif

    <x-cms-editable key="exp_tertiaire_hero_video" type="media" buttonClass="top-24 left-10" positionClass="absolute" class="absolute inset-0 w-full h-full">
        <video autoplay muted loop playsinline class="absolute top-0 left-0 w-full h-full object-cover">
            <source src="/aric-hero.mp4" type="video/mp4">
        </video>
        <div class="absolute inset-0 video-overlay"></div>
    </x-cms-editable>
    
    <div class="max-w-7xl mx-auto px-6 relative z-10 w-full pt-10 flex flex-col justify-start items-start text-left">
        <div data-aos="fade-up" class="text-left">
            <div class="text-tech-cyan font-bold text-xs uppercase tracking-[0.3em] mb-4">
                <x-cms-editable key="exp_tert_hero_badge">Tertiaire & Services</x-cms-editable>
            </div>
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold leading-tight mb-6">
                <x-cms-editable key="expertise_tertiaire_hero_title">
                    Génie <span class="text-gradient-light">Climatique</span>.
                </x-cms-editable>
            </h1>
            <div class="flex items-center space-x-4 text-sm text-slate-300 font-medium uppercase tracking-widest">
                <a href="/" class="hover:text-tech-cyan transition-colors">Accueil</a>
                <i data-lucide="chevron-right" class="w-4 h-4 text-slate-500"></i>
                <a href="/expertise" class="hover:text-tech-cyan transition-colors">Expertise</a>
                <i data-lucide="chevron-right" class="w-4 h-4 text-slate-500"></i>
                <span class="text-white">Génie Climatique</span>
            </div>
        </div>
    </div>

    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-[0]">
        <svg class="relative block w-[calc(100%+1.3px)] h-[60px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="#f9fafb"></path>
        </svg>
    </div>
</header>
