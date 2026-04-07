<!-- Domains Hub Section -->
<section id="expertise-section-domains" data-cms-section="domains" class="py-16 md:py-24 relative overflow-hidden bg-white group/section">
    <!-- Section Controls -->
    @if(auth()->check())
    <div class="absolute top-4 left-1/2 -translate-x-1/2 z-[1000] opacity-0 group-hover/section:opacity-100 transition-all flex items-center bg-tech-navy/90 backdrop-blur-md rounded-2xl p-1 border border-white/10 shadow-2xl">
        <button onclick="window.cmsEditor.moveSection('domains', 'up')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Monter">
            <i data-lucide="chevron-up" class="w-4 h-4"></i>
        </button>
        <div class="px-3 text-[9px] font-black uppercase tracking-widest text-tech-cyan border-x border-white/10">Nos Domaines</div>
        <button onclick="window.cmsEditor.moveSection('domains', 'down')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Descendre">
            <i data-lucide="chevron-down" class="w-4 h-4"></i>
        </button>
    </div>
    @endif

    <div class="max-w-7xl mx-auto px-6">
        <div data-aos="fade-up" class="text-center max-w-3xl mx-auto mb-20 text-balance">
            <div class="text-tech-cyan font-black text-xs uppercase tracking-[0.3em] mb-4">Pôles d'excellence</div>
            <x-cms-editable key="expertise_main_title"><h2 class="text-4xl md:text-5xl font-black text-tech-navy mb-6">Nos domaines d'intervention</h2></x-cms-editable>
            <div class="w-20 h-1.5 bg-tech-cyan mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-12">
            @forelse($expertises as $index => $expertise)
                <!-- Dynamic Expertise Card -->
                <a href="{{ $expertise->link ?? '#' }}" class="flex flex-col group senior-glass rounded-[48px] overflow-hidden hover:bg-tech-navy transition-all duration-700 hover:shadow-[0_20px_80px_rgba(0,164,189,0.15)] hover:-translate-y-4 shadow-sm" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="relative aspect-[16/10] overflow-hidden">
                        @if($expertise->image)
                            <img src="{{ $expertise->image }}" alt="{{ $expertise->title }}" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                        @else
                            <div class="w-full h-full bg-slate-100 flex items-center justify-center text-slate-300">
                                <i data-lucide="image" class="w-12 h-12"></i>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-tech-navy/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
                        <div class="absolute top-6 left-6 w-14 h-14 bg-white/10 backdrop-blur-md rounded-2xl flex items-center justify-center border border-white/20 shadow-lg">
                            <i data-lucide="{{ $expertise->icon }}" class="w-7 h-7 text-tech-cyan"></i>
                        </div>
                    </div>
                    <div class="p-8 md:p-10 flex-grow flex flex-col">
                        <h3 class="text-2xl font-black mb-4 group-hover:text-white transition-colors leading-tight">{{ $expertise->title }}</h3>
                        <p class="text-slate-500 group-hover:text-slate-300 text-sm leading-relaxed mb-8 flex-grow italic font-medium">
                            {{ $expertise->description }}
                        </p>
                        @if($expertise->link)
                            <span class="inline-flex items-center text-tech-cyan font-bold text-xs tracking-[0.2em] uppercase group-hover:translate-x-2 transition-transform">
                                Expertise Complète <i data-lucide="arrow-right" class="w-4 h-4 ml-3"></i>
                            </span>
                        @endif
                    </div>
                </a>
            @empty
                <div class="col-span-full py-20 text-center bg-slate-50 rounded-[48px] border border-slate-100">
                    <p class="text-slate-400 font-bold uppercase text-[10px] tracking-widest italic">Nos domaines d'intervention seront bientôt détaillés ici.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
