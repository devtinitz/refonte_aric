<!-- Secondary Hero Banner -->
<header id="recrutement-section-hero" data-cms-section="hero" class="relative min-h-[70vh] flex flex-col justify-center items-start overflow-hidden text-white group/section">
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

    <x-cms-editable key="rec_hero_video" type="media" buttonClass="top-24 left-10" positionClass="absolute" class="absolute inset-0 w-full h-full">
        <video autoplay muted loop playsinline class="absolute top-0 left-0 w-full h-full object-cover">
            <source src="/aric-hero.mp4" type="video/mp4">
        </video>
    
    <!-- Animated Background Elements -->
    <div class="absolute top-1/4 -right-20 w-96 h-96 bg-tech-cyan/20 rounded-full blur-[120px] animate-pulse-soft"></div>
    <div class="absolute bottom-1/4 -left-20 w-96 h-96 bg-tech-navy/30 rounded-full blur-[120px] animate-pulse-soft"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10 w-full pt-20 pb-32 flex flex-col justify-start items-start text-left">
        <div data-aos="fade-up" class="text-left">
            <div class="inline-flex items-center space-x-2 px-4 py-2 bg-white/10 backdrop-blur-md rounded-full mb-8 border border-white/10">
                <span class="w-2 h-2 bg-tech-cyan rounded-full animate-ping"></span>
            </div>
            <h1 class="text-5xl md:text-7xl lg:text-8xl font-extrabold leading-[1.1] mb-8">
                <x-cms-editable key="recruitment_hero_title">
                    Bâtissons <br><span class="text-gradient-light">l'Avenir</span> de l'Énergie.
            </h1>
            <x-cms-editable key="recruitment_hero_desc"><p class="text-lg md:text-xl text-slate-300 max-w-2xl leading-relaxed mb-10 font-medium italic">
                Rejoignez une équipe de passionnés du génie thermique et climatique. Nous recrutons des talents engagés, curieux et innovants à travers l'Afrique de l'Ouest.
            <div class="flex flex-wrap gap-6">
                <a href="#jobs" class="relative group">
                </a>
                <a href="#spontanee" class="relative group">
                </a>
            </div>
        </div>
    </div>

    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-[0]">
        <svg class="relative block w-[calc(100%+1.3px)] h-[80px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="#ffffff"></path>
        </svg>
    </div>
</header>
