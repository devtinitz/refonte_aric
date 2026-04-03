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
            <!-- News 1 -->
            <article class="group" data-aos="fade-up">
                <div class="aspect-[16/10] rounded-[32px] overflow-hidden mb-8 shadow-sm group-hover:shadow-xl transition-all duration-500 relative">
                    <x-cms-editable key="news_card_1_img" type="media">
                        <img src="/froid-expertise.png" alt="Actualité 1" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    </x-cms-editable>
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0a192f]/60 to-transparent pointer-events-none"></div>
                    <div class="absolute bottom-6 left-6 text-white font-bold text-xs uppercase tracking-widest">Décembre 2024</div>
                </div>
                <x-cms-editable key="news_1_title"><h3 class="text-2xl font-black text-tech-navy mb-6 group-hover:text-[#00a4bd] transition-colors leading-tight">Cinema Pathé Abidjan 2024</h3></x-cms-editable>
                <x-cms-editable key="news_1_desc"><p class="text-slate-500 text-sm mb-8 leading-relaxed italic font-medium">Retour sur l'inauguration et les défis techniques de ce complexe cinématographique de référence.</p></x-cms-editable>
                <a href="/actualites/pathe-abidjan-2024" class="inline-flex items-center text-tech-navy font-bold text-xs uppercase tracking-widest group/link">
                    Lire l'article <i data-lucide="chevron-right" class="w-4 h-4 ml-2 text-[#00a4bd] group-hover/link:translate-x-1 transition-transform"></i>
                </a>
            </article>

            <!-- News 2 -->
            <article class="group" data-aos="fade-up" data-aos-delay="100">
                <div class="aspect-[16/10] rounded-[32px] overflow-hidden mb-8 shadow-sm group-hover:shadow-xl transition-all duration-500 relative bg-tech-navy flex items-center justify-center p-8 text-center bg-[url('/bg-waves.svg')] bg-[length:400px]">
                    <x-cms-editable key="news_2_img" type="media" class="flex flex-col items-center">
                        <i data-lucide="zap" class="w-12 h-12 text-[#00a4bd] mb-4"></i>
                    </x-cms-editable>
                </div>
                <x-cms-editable key="news_2_title"><h3 class="text-2xl font-black text-tech-navy mb-6 group-hover:text-[#00a4bd] transition-colors leading-tight">Innovation : Stockage d'énergie au Fer</h3></x-cms-editable>
                <x-cms-editable key="news_2_desc"><p class="text-slate-500 text-sm mb-8 leading-relaxed italic font-medium">Une nouvelle technologie de batterie au fer-air capable de stocker l'énergie de manière durable.</p></x-cms-editable>
                <a href="/actualites/batterie-fer" class="inline-flex items-center text-tech-navy font-bold text-xs uppercase tracking-widest group/link">
                    Lire l'article <i data-lucide="chevron-right" class="w-4 h-4 ml-2 text-[#00a4bd] group-hover/link:translate-x-1 transition-transform"></i>
                </a>
            </article>

            <!-- News 3 -->
            <article class="group" data-aos="fade-up" data-aos-delay="200">
                <div class="aspect-[16/10] rounded-[32px] overflow-hidden mb-8 shadow-sm group-hover:shadow-xl transition-all duration-500 relative bg-slate-100 flex items-center justify-center p-8">
                    <x-cms-editable key="news_3_img" type="media">
                        <i data-lucide="trending-up" class="w-12 h-12 text-slate-300"></i>
                    </x-cms-editable>
                </div>
                <x-cms-editable key="news_3_title"><h3 class="text-2xl font-black text-tech-navy mb-6 group-hover:text-[#00a4bd] transition-colors leading-tight">Modélisation & Évaluation Énergétique</h3></x-cms-editable>
                <x-cms-editable key="news_3_desc"><p class="text-slate-500 text-sm mb-8 leading-relaxed italic font-medium">Analyse des performances et modélisation des flux énergétiques pour les bâtiments connectés.</p></x-cms-editable>
                <a href="/actualites/modelisation-evaluation" class="inline-flex items-center text-tech-navy font-bold text-xs uppercase tracking-widest group/link">
                    Lire l'article <i data-lucide="chevron-right" class="w-4 h-4 ml-2 text-[#00a4bd] group-hover/link:translate-x-1 transition-transform"></i>
                </a>
            </article>
        </div>
    </div>
</section>
