<!-- Hero Section -->
<section id="cms-section-hero" data-cms-section="hero" class="relative group/section">
    <!-- Section Controls (Visible only in CMS mode) -->
    @if(auth()->check())
    <div class="absolute top-4 left-1/2 -translate-x-1/2 z-[1000] opacity-0 group-hover/section:opacity-100 transition-all flex items-center bg-tech-navy/90 backdrop-blur-md rounded-2xl p-1 border border-white/10 shadow-2xl">
        <button onclick="window.cmsEditor.moveSection('hero', 'up')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Monter">
            <i data-lucide="chevron-up" class="w-4 h-4"></i>
        </button>
        <div class="px-3 text-[9px] font-black uppercase tracking-widest text-tech-cyan border-x border-white/10">Hero Section</div>
        <button onclick="window.cmsEditor.moveSection('hero', 'down')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Descendre">
            <i data-lucide="chevron-down" class="w-4 h-4"></i>
        </button>
    </div>
    @endif

    <header class="relative min-h-[95vh] flex items-center overflow-hidden text-white">
        <x-cms-editable key="hero_video" type="media" buttonClass="top-24 left-10" positionClass="absolute" class="inset-0 w-full h-full">
            <video autoplay muted loop playsinline class="absolute top-0 left-0 w-full h-full object-cover">
                <source src="/aric-hero.mp4" type="video/mp4">
                <img src="/hero-fallback.png" alt="ARIC Tech Fallback" class="w-full h-full object-cover">
            </video>
            
            <div class="absolute inset-0 grid-pattern opacity-10"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[1000px] h-[1000px] bg-tech-cyan/5 blur-[150px] rounded-full opacity-20"></div>
            <div class="absolute inset-0 video-overlay"></div>
        </x-cms-editable>
        
        <div class="max-w-7xl mx-auto px-6 relative z-10 w-full mb-20">
            <div class="max-w-3xl" data-aos="fade-up" data-aos-duration="1000">
                <div class="inline-flex items-center px-4 py-2 rounded-full bg-white/95 backdrop-blur-md border-b border-slate-200 mb-6 text-sm font-bold text-tech-cyan">
                    <span class="relative flex h-2 w-2 mr-3">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-tech-cyan opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-tech-cyan"></span>
                    </span>
                    <x-cms-editable key="hero_badge">SERVICE MAINTENANCE & PERFORMANCE</x-cms-editable>
                </div>
                <h1 class="text-4xl sm:text-6xl lg:text-7xl font-extrabold leading-tight mb-6 text-white text-shadow-lg">
                    <x-cms-editable key="hero_title">
                        Garantissez la <span class="text-gradient-light">continuité</span> de votre énergie.
                    </x-cms-editable>
                </h1>
                <p class="text-xl text-slate-200 mb-10 leading-relaxed font-medium">
                    <x-cms-editable key="hero_description">
                        Expertise technique, réactivité immédiate et optimisation énergétique pour vos installations CVC et multitechniques.
                    </x-cms-editable>
                </p>
                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="/services" class="px-6 py-4 bg-tech-cyan text-tech-navy font-black rounded-2xl hover:scale-105 transition-transform text-center shadow-lg text-sm relative">
                        <x-cms-editable key="hero_cta_1" buttonClass="-top-6 right-0">Nos Solutions</x-cms-editable>
                    </a>
                    <a href="/contact" class="px-6 py-4 bg-white/95 backdrop-blur-md border-b border-slate-200 rounded-2xl font-bold hover:bg-tech-cyan/10 transition-all text-center text-tech-navy border border-white/10 text-sm relative">
                        <x-cms-editable key="hero_cta_2" buttonClass="-top-6 right-0">Contacter un expert</x-cms-editable>
                    </a>
                </div>
            </div>
        </div>

        <!-- Float Element (Senior Grade) -->
        <div class="absolute right-10 bottom-64 hidden lg:block animate-float" data-aos="fade-left" data-aos-delay="500">
            <x-cms-editable key="hero_stats_block" buttonClass="-top-10 -right-2 font-black">
                <div class="senior-glass shimmer p-5 rounded-[30px] shadow-2xl">
                    <div class="flex items-center space-x-4">
                        <div class="text-center px-4 border-r border-tech-navy/5">
                            <div class="text-2xl font-extrabold text-tech-cyan">+25 Ans</div>
                            <div class="text-[10px] font-bold text-tech-navy/70 uppercase tracking-widest">d'expérience</div>
                        </div>
                        <div class="text-center px-4 border-r border-tech-navy/5">
                            <div class="text-2xl font-extrabold text-tech-navy">4</div>
                            <div class="text-[10px] font-bold text-tech-navy/70 uppercase tracking-widest">Filiales</div>
                        </div>
                        <div class="text-center px-4 border-r border-tech-navy/5">
                            <div class="text-2xl font-extrabold text-tech-navy">+100</div>
                            <div class="text-[10px] font-bold text-tech-navy/70 uppercase tracking-widest">Experts</div>
                        </div>
                        <div class="text-center px-4">
                            <div class="text-2xl font-extrabold text-tech-navy">24h/7</div>
                            <div class="text-[10px] font-bold text-tech-navy/70 uppercase tracking-widest">SAV</div>
                        </div>
                    </div>
                </div>
            </x-cms-editable>
        </div>

        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-[0]">
            <svg class="relative block w-[calc(100%+1.3px)] h-[80px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="#ffffff"></path>
            </svg>
        </div>
    </header>
</section>
