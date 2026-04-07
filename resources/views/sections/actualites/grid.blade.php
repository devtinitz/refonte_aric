<!-- Actualités Section -->
<section id="actualites-section-grid" data-cms-section="grid" class="py-24 relative overflow-hidden bg-white group/section">
    <!-- Section Controls -->
    @if(auth()->check())
    <div class="absolute top-4 left-1/2 -translate-x-1/2 z-[1000] opacity-0 group-hover/section:opacity-100 transition-all flex items-center bg-tech-navy/90 backdrop-blur-md rounded-2xl p-1 border border-white/10 shadow-2xl">
        <button onclick="window.cmsEditor.moveSection('grid', 'up')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Monter">
            <i data-lucide="chevron-up" class="w-4 h-4"></i>
        </button>
        <div class="px-3 text-[9px] font-black uppercase tracking-widest text-tech-cyan border-x border-white/10">Grille d'actualités</div>
        <button onclick="window.cmsEditor.moveSection('grid', 'down')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Descendre">
            <i data-lucide="chevron-down" class="w-4 h-4"></i>
        </button>
    </div>
    @endif

    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16" data-aos="fade-up">
            <div class="text-[#00a4bd] font-bold text-xs uppercase tracking-[0.3em] mb-4">Pôle Information</div>
            <x-cms-editable key="news_main_title"><h2 class="text-3xl md:text-5xl font-black text-tech-navy mb-8">L'Actualité du Groupe.</h2></x-cms-editable>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($articles as $article)
                <!-- Dynamic Article Card -->
                <article class="group" data-aos="fade-up">
                    <a href="{{ route('news.detail', $article->slug) }}" class="block">
                        <div class="aspect-[16/10] rounded-[32px] overflow-hidden mb-8 shadow-sm group-hover:shadow-xl transition-all duration-500 relative">
                            @if($article->image)
                                <img src="{{ $article->image }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            @else
                                <div class="w-full h-full bg-slate-100 flex items-center justify-center text-slate-300">
                                    <i data-lucide="image" class="w-12 h-12"></i>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-[#0a192f]/60 to-transparent pointer-events-none"></div>
                            <div class="absolute bottom-6 left-6 text-white font-bold text-xs uppercase tracking-widest">
                                {{ $article->published_at ? $article->published_at->translatedFormat('F Y') : $article->created_at->translatedFormat('F Y') }}
                            </div>
                        </div>
                        <h3 class="text-2xl font-black text-tech-navy mb-6 group-hover:text-[#00a4bd] transition-colors leading-tight line-clamp-2">
                            {{ $article->title }}
                        </h3>
                        <p class="text-slate-500 text-sm mb-8 leading-relaxed italic font-medium line-clamp-3">
                            {{ $article->summary }}
                        </p>
                        <div class="inline-flex items-center text-tech-navy font-bold text-xs uppercase tracking-widest group/link">
                            Lire l'article <i data-lucide="chevron-right" class="w-4 h-4 ml-2 text-[#00a4bd] group-hover/link:translate-x-1 transition-transform"></i>
                        </div>
                    </a>
                </article>
            @empty
                <!-- Empty State -->
                <div class="col-span-full py-20 text-center bg-slate-50 rounded-[40px] border border-slate-100 shadow-sm" data-aos="fade-up">
                    <div class="w-20 h-20 rounded-[32px] bg-white flex items-center justify-center text-slate-200 mx-auto mb-6">
                        <i data-lucide="newspaper" class="w-10 h-10"></i>
                    </div>
                    <h3 class="text-2xl font-black text-tech-navy uppercase tracking-tight mb-2">Aucune actualité pour le moment</h3>
                    <p class="text-slate-400 font-bold uppercase text-[10px] tracking-widest italic">Restez connectés pour ne rien manquer de nos prochains projets.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
