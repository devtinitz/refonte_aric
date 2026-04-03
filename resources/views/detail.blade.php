<x-site.layout>
    <x-slot:title>Détails | ARIC Solutions</x-slot>

    <style>
        .prose-content {
            color: #475569;
            line-height: 1.8;
            font-size: 1.1rem;
        }
        .prose-content h2 { color: #0a192f; font-weight: 800; font-size: 1.8rem; margin-top: 2rem; margin-bottom: 1rem; }
        .prose-content p { margin-bottom: 1.5rem; }
        .prose-content ul { list-style: disc; margin-left: 1.5rem; margin-bottom: 1.5rem; }
        .prose-content li { margin-bottom: 0.5rem; }
    </style>

    <main id="main-content" class="min-h-screen">
        <!-- Load state -->
        <div class="flex flex-col items-center justify-center min-h-[60vh] space-y-4">
            <div class="w-12 h-12 border-4 border-tech-cyan border-t-transparent rounded-full animate-spin"></div>
            <p class="text-slate-400 font-bold uppercase tracking-widest text-xs">Chargement de la référence...</p>
        </div>
    </main>

    <!-- Template for JS injection -->
    <template id="detail-template">
        <header class="relative h-[65vh] flex items-end">
            <img id="detail-hero-image" src="" alt="" class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 video-overlay backdrop-blur-[1px]"></div>
            <div class="max-w-7xl mx-auto px-6 relative z-10 w-full pb-24">
                <div data-aos="fade-up">
                    <a href="/actualites" class="inline-flex items-center text-white/70 hover:text-tech-cyan text-xs font-bold uppercase tracking-widest mb-8 transition-colors">
                        <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i> Retour aux références
                    </a>
                    <div id="detail-meta" class="flex items-center space-x-4 mb-6">
                        <span id="detail-type" class="px-4 py-1.5 bg-tech-cyan text-white text-[10px] font-black uppercase tracking-widest rounded-full">Projet</span>
                        <span id="detail-year" class="text-white/80 font-bold text-sm">2026</span>
                    </div>
                    <h1 id="detail-title" class="text-4xl md:text-6xl font-extrabold text-white leading-tight max-w-5xl"></h1>
                </div>
            </div>
        </header>

        <section class="py-24 relative -mt-16">
            <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-16">
                <!-- Main Body -->
                <div class="lg:col-span-8">
                    <div class="glass p-10 md:p-16 rounded-[48px] border-white z-20 relative">
                        <div id="detail-content" class="prose-content"></div>
                        <div class="mt-16 pt-10 border-t border-slate-100 flex gap-4">
                            <button class="px-6 py-3 border border-slate-200 rounded-2xl flex items-center text-xs font-bold text-slate-600 hover:bg-slate-50 transition-all">
                                <i data-lucide="share-2" class="w-4 h-4 mr-2"></i> Partager
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <aside class="lg:col-span-4 space-y-8" data-aos="fade-left">
                    <div class="glass p-8 rounded-[40px] border-white">
                        <h4 class="text-lg font-black text-tech-navy mb-8 border-l-4 border-tech-cyan pl-4">Fiche Technique</h4>
                        <div class="space-y-6">
                            <div class="flex items-start space-x-4">
                                <div class="w-10 h-10 bg-tech-cyan/10 rounded-xl flex items-center justify-center text-tech-cyan"><i data-lucide="map-pin" class="w-5 h-5"></i></div>
                                <div>
                                    <div class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Localisation</div>
                                    <div id="sidebar-location" class="font-bold text-tech-navy italic"></div>
                                </div>
                            </div>
                            <div class="flex items-start space-x-4">
                                <div class="w-10 h-10 bg-tech-cyan/10 rounded-xl flex items-center justify-center text-tech-cyan"><i data-lucide="tag" class="w-5 h-5"></i></div>
                                <div>
                                    <div class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Expertises</div>
                                    <div id="sidebar-expertise" class="font-bold text-tech-navy italic"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-tech-navy p-10 rounded-[40px] text-white shadow-2xl relative overflow-hidden">
                        <h4 class="text-2xl font-black mb-4">Besoin d'un expert ?</h4>
                        <p class="text-white/60 text-sm mb-8">Nos équipes techniques sont à votre écoute.</p>
                        <a href="/contact" class="block w-full py-4 bg-tech-cyan text-white text-center font-black rounded-2xl hover:scale-[1.02] transition-transform">Audit & Devis</a>
                    </div>
                </aside>
            </div>
        </section>
    </template>

    @push('scripts')
    <script>
        const contentData = {
            "pathe-abidjan-2024": {
                type: "Référence Expertise",
                title: "Cinéma Pathé Cap Sud : Un défi de traitement d'air et acoustique",
                year: "2026",
                location: "Abidjan, Côte d'Ivoire",
                expertise: "CVC & Traitement d'air",
                image: "https://images.unsplash.com/photo-1489599849927-2ee91cede3ba?q=80&w=1200",
                fullContent: "<h2>Le Contexte</h2><p>Pour l'inauguration du nouveau complexe Pathé à Cap Sud, ARIC a été mandaté pour la conception et la réalisation de l'intégralité du système de génie climatique. L'enjeu principal : assurer un confort thermique optimal tout en respectant des contraintes acoustiques extrêmes.</p>"
            },
            "batterie-fer": {
                type: "Innovation Tech",
                title: "La Révolution Iron-Air : Quel avenir pour l'Afrique ?",
                year: "2026",
                location: "Afrique de l'Ouest",
                expertise: "Innovation Solaire",
                image: "https://images.unsplash.com/photo-1508514177221-188b1cf16e9d?q=80&w=1200",
                fullContent: "<h2>Le futur du stockage</h2><p>Une nouvelle batterie à base de fer promet de diviser par 10 le coût du stockage longue durée.</p>"
            },
            "modelisation-evaluation": {
                type: "Bureau d'Études",
                title: "Modélisation Numérique vs Réalité Terrain",
                year: "2026",
                location: "Sénégal / Mali",
                expertise: "Ingénierie Fluide",
                image: "https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=1200",
                fullContent: "<h2>Précision Chirurgicale</h2><p>Comment l'utilisation des jumeaux numériques permet à ARIC de prédire le comportement thermique d'un bâtiment.</p>"
            }
        };

        const fallbackData = {
            type: "Documentation ARIC",
            title: "Détails techniques en cours de déploiement",
            year: "2026",
            location: "Afrique de l'Ouest",
            expertise: "Multitechnique & Innovation",
            image: "/logo.png",
            fullContent: `<h2>Contenu en préparation</h2><p>Nos experts finalisent actuellement la documentation complète de ce projet.</p>`
        };

        // Use Blade variable for ID
        const id = "{{ $id }}";
        const data = contentData[id] || fallbackData;

        const main = document.getElementById('main-content');
        const template = document.getElementById('detail-template');
        const clone = template.content.cloneNode(true);

        clone.getElementById('detail-hero-image').src = data.image;
        clone.getElementById('detail-type').textContent = data.type;
        clone.getElementById('detail-year').textContent = data.year;
        clone.getElementById('detail-title').textContent = data.title;
        clone.getElementById('detail-content').innerHTML = data.fullContent;
        clone.getElementById('sidebar-location').textContent = data.location;
        clone.getElementById('sidebar-expertise').textContent = data.expertise;

        main.innerHTML = '';
        main.appendChild(clone);
        lucide.createIcons();
        AOS.init({ duration: 1000, once: true });
    </script>
    @endpush
</x-site.layout>
