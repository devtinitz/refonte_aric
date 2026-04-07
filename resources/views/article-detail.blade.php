<x-site.layout :title="$article->title . ' | ARIC Actualités'">
    <!-- Hero Article -->
    <section class="pt-40 pb-20 bg-slate-50 relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('/bg-waves.svg')] bg-[length:600px] opacity-5"></div>
        <div class="max-w-4xl mx-auto px-6 relative z-10">
            <div class="mb-8" data-aos="fade-up">
                <a href="/actualites" class="inline-flex items-center text-tech-cyan font-black text-[10px] uppercase tracking-[0.3em] group">
                    <i data-lucide="arrow-left" class="w-4 h-4 mr-2 group-hover:-translate-x-1 transition-transform"></i>
                    Retour aux actualités
                </a>
            </div>
            
            <div data-aos="fade-up" data-aos-delay="100">
                <div class="flex items-center gap-4 mb-6">
                    <span class="px-4 py-1.5 bg-tech-navy text-white text-[10px] font-black uppercase tracking-widest rounded-full">
                        {{ $article->category }}
                    </span>
                    <span class="text-slate-400 font-bold uppercase text-[10px] tracking-[0.2em] italic">
                        Publié le {{ $article->published_at ? $article->published_at->translatedFormat('d F Y') : $article->created_at->translatedFormat('d F Y') }}
                    </span>
                </div>
                <h1 class="text-4xl md:text-6xl font-black text-tech-navy leading-[1.1] mb-12 uppercase tracking-tighter">
                    {{ $article->title }}
                </h1>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <article class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-6">
            @if($article->image)
                <div class="mb-20 rounded-[48px] overflow-hidden shadow-2xl" data-aos="zoom-in">
                    <img src="{{ $article->image }}" alt="{{ $article->title }}" class="w-full h-auto">
                </div>
            @endif

            <div class="prose prose-slate prose-lg max-w-none prose-headings:text-tech-navy prose-headings:font-black prose-p:text-slate-600 prose-p:leading-relaxed prose-p:italic prose-p:font-medium" data-aos="fade-up">
                {!! nl2br(e($article->content)) !!}
            </div>

            <!-- Footer Article -->
            <div class="mt-20 pt-12 border-t border-slate-100 flex flex-col md:flex-row justify-between items-center gap-8" data-aos="fade-up">
                <div class="flex items-center gap-4 text-slate-400 text-[10px] font-black uppercase tracking-widest">
                    Partager :
                    <div class="flex gap-2">
                        <button class="w-8 h-8 rounded-full border border-slate-100 flex items-center justify-center hover:bg-tech-navy hover:text-white transition-all">
                            <i data-lucide="linkedin" class="w-4 h-4"></i>
                        </button>
                        <button class="w-8 h-8 rounded-full border border-slate-100 flex items-center justify-center hover:bg-tech-navy hover:text-white transition-all">
                            <i data-lucide="share-2" class="w-4 h-4"></i>
                        </button>
                    </div>
                </div>
                <a href="/actualites" class="px-8 py-4 bg-slate-50 border border-slate-100 rounded-2xl text-tech-navy text-[10px] font-black uppercase tracking-widest hover:bg-white hover:shadow-lg transition-all">
                    Toute l'actualité
                </a>
            </div>
        </div>
    </article>

    <!-- Navigation Entre Articles -->
    @php
        $next = \App\Models\Article::where('is_published', true)->where('id', '>', $article->id)->first();
        $prev = \App\Models\Article::where('is_published', true)->where('id', '<', $article->id)->orderBy('id', 'desc')->first();
    @endphp

    @if($next || $prev)
    <section class="py-20 bg-slate-50 border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @if($prev)
                <a href="{{ route('news.detail', $prev->slug) }}" class="group p-8 bg-white rounded-[32px] border border-slate-100 hover:shadow-2xl transition-all duration-500 flex flex-col">
                    <span class="text-[9px] font-black text-slate-300 uppercase tracking-widest mb-4">Article Précédent</span>
                    <h4 class="text-xl font-black text-tech-navy group-hover:text-tech-cyan transition-colors line-clamp-1">{{ $prev->title }}</h4>
                </a>
                @endif
                
                @if($next)
                <a href="{{ route('news.detail', $next->slug) }}" class="group p-8 bg-white rounded-[32px] border border-slate-100 hover:shadow-2xl transition-all duration-500 flex flex-col items-end text-right">
                    <span class="text-[9px] font-black text-slate-300 uppercase tracking-widest mb-4">Article Suivant</span>
                    <h4 class="text-xl font-black text-tech-navy group-hover:text-tech-cyan transition-colors line-clamp-1">{{ $next->title }}</h4>
                </a>
                @endif
            </div>
        </div>
    </section>
    @endif
</x-site.layout>
