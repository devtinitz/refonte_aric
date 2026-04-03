<!-- History Section (Grid) -->
<section id="about-section-history" data-cms-section="history" class="py-16 md:py-24 relative bg-gray-50 border-y border-slate-200/50 group/section">
    <!-- Section Controls -->
    @if(auth()->check())
    <div class="absolute top-4 left-1/2 -translate-x-1/2 z-[1000] opacity-0 group-hover/section:opacity-100 transition-all flex items-center bg-tech-navy/90 backdrop-blur-md rounded-2xl p-1 border border-white/10 shadow-2xl">
        <button onclick="window.cmsEditor.moveSection('history', 'up')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Monter">
            <i data-lucide="chevron-up" class="w-4 h-4"></i>
        </button>
        <div class="px-3 text-[9px] font-black uppercase tracking-widest text-tech-cyan border-x border-white/10">Notre Histoire</div>
        <button onclick="window.cmsEditor.moveSection('history', 'down')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Descendre">
            <i data-lucide="chevron-down" class="w-4 h-4"></i>
        </button>
    </div>
    @endif

    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16 md:mb-24" data-aos="fade-up">
            <x-cms-editable key="about_history_title">
                <h2 class="text-3xl md:text-5xl font-extrabold text-tech-navy mb-4 md:mb-6 tracking-tight">Notre Histoire</h2>
            </x-cms-editable>
            <div class="w-16 h-1 bg-tech-cyan mx-auto rounded-full"></div>
        </div>

        <div class="absolute lg:block hidden w-px h-full bg-tech-cyan/10 left-1/2 -top-10 z-0"></div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-8 lg:gap-x-12 gap-y-8 md:gap-y-20 relative z-10">
            
            <div data-aos="fade-up" data-aos-delay="0">
                <div class="w-16 h-16 md:w-20 md:h-20 rounded-full bg-tech-navy text-white flex items-center justify-center font-black text-lg md:text-xl tracking-[0.1em] shadow-lg mb-6 md:mb-8 transition-transform hover:-translate-y-2 duration-300 ring-4 ring-tech-navy/5 flex-shrink-0">
                    <span style="font-family: monospace; font-size: 1.3rem;">1970</span>
                </div>
                <x-cms-editable key="hist_1970_title"><h3 class="text-xl font-bold text-tech-navy mb-4">Création de Matal Ivoire</h3></x-cms-editable>
                <x-cms-editable key="hist_1970_desc"><p class="text-slate-500 text-[15px] leading-relaxed">
                    Idrissa Sanankoua, ingénieur IFFI en collaboration avec Matal crée Matal Ivoire dont l'activité principale est le montage et la Maintenance d'Installations de Froid Industriel sur le Port d'Abidjan.
                </p></x-cms-editable>
            </div>

            <div data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 md:w-20 md:h-20 rounded-full bg-tech-navy text-white flex items-center justify-center font-black text-lg md:text-xl tracking-[0.1em] shadow-lg mb-6 md:mb-8 transition-transform hover:-translate-y-2 duration-300 ring-4 ring-tech-navy/5 flex-shrink-0">
                    <span style="font-family: monospace; font-size: 1.3rem;">1985</span>
                </div>
                <x-cms-editable key="hist_1985_title"><h3 class="text-xl font-bold text-tech-navy mb-4">Naissance de Rica</h3></x-cms-editable>
                <x-cms-editable key="hist_1985_desc"><p class="text-slate-500 text-[15px] leading-relaxed">
                    Matal Ivoire devient Rica et se diversifie dans le conditionnement d'air et la Réfrigération commerciale. Premiers supermarchés Hayat réalisés en 1993.
                </p></x-cms-editable>
            </div>

            <div data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 md:w-20 md:h-20 rounded-full bg-tech-navy text-white flex items-center justify-center font-black text-lg md:text-xl tracking-[0.1em] shadow-lg mb-6 md:mb-8 transition-transform hover:-translate-y-2 duration-300 ring-4 ring-tech-navy/5 flex-shrink-0">
                    <span style="font-family: monospace; font-size: 1.3rem;">1994</span>
                </div>
                <x-cms-editable key="hist_1994_title"><h3 class="text-xl font-bold text-tech-navy mb-4">Expansion au Mali</h3></x-cms-editable>
                <x-cms-editable key="hist_1994_desc"><p class="text-slate-500 text-[15px] leading-relaxed">
                    Rica réalise le siège de la BCEAO à Bamako. Rica-Services Mali est créé pour accompagner le développement régional.
                </p></x-cms-editable>
            </div>

            <div data-aos="fade-up" data-aos-delay="0">
                <div class="w-16 h-16 md:w-20 md:h-20 rounded-full bg-tech-navy text-white flex items-center justify-center font-black text-lg md:text-xl tracking-[0.1em] shadow-lg mb-6 md:mb-8 transition-transform hover:-translate-y-2 duration-300 ring-4 ring-tech-navy/5 flex-shrink-0">
                    <span style="font-family: monospace; font-size: 1.3rem;">1998</span>
                </div>
                <x-cms-editable key="hist_1998_title"><h3 class="text-xl font-bold text-tech-navy mb-4">Entrée de SIFCOM</h3></x-cms-editable>
                <x-cms-editable key="hist_1998_desc"><p class="text-slate-500 text-[15px] leading-relaxed">
                    Le groupe SIFCOM entre au capital. Réalisation du bâtiment annexe de la BCEAO à Dakar et rénovation du Novotel Abidjan.
                </p></x-cms-editable>
            </div>

            <div data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 md:w-20 md:h-20 rounded-full bg-tech-navy text-white flex items-center justify-center font-black text-lg md:text-xl tracking-[0.1em] shadow-lg mb-6 md:mb-8 transition-transform hover:-translate-y-2 duration-300 ring-4 ring-tech-navy/5 flex-shrink-0">
                    <span style="font-family: monospace; font-size: 1.3rem;">2003</span>
                </div>
                <x-cms-editable key="hist_2003_title"><h3 class="text-xl font-bold text-tech-navy mb-4">Gel des activités</h3></x-cms-editable>
                <x-cms-editable key="hist_2003_desc"><p class="text-slate-500 text-[15px] leading-relaxed">
                    Rica gèle ses activités en Côte d'Ivoire suite à la crise socio-politique, tout en maintenant sa présence régionale.
                </p></x-cms-editable>
            </div>

            <div data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 md:w-20 md:h-20 rounded-full bg-tech-navy text-white flex items-center justify-center font-black text-lg md:text-xl tracking-[0.1em] shadow-lg mb-6 md:mb-8 transition-transform hover:-translate-y-2 duration-300 ring-4 ring-tech-navy/5 flex-shrink-0">
                    <span style="font-family: monospace; font-size: 1.3rem;">2011</span>
                </div>
                <x-cms-editable key="hist_2011_title"><h3 class="text-xl font-bold text-tech-navy mb-4">Conergies-Group</h3></x-cms-editable>
                <x-cms-editable key="hist_2011_desc"><p class="text-slate-500 text-[15px] leading-relaxed">
                    Création du holding Conergies-Group qui reprend Rica-Services Mali et redémarre en Côte d'Ivoire via ARIC en 2012.
                </p></x-cms-editable>
            </div>

            <div data-aos="fade-up" data-aos-delay="0">
                <div class="w-16 h-16 md:w-20 md:h-20 rounded-full bg-tech-navy text-white flex items-center justify-center font-black text-lg md:text-xl tracking-[0.1em] shadow-lg mb-6 md:mb-8 transition-transform hover:-translate-y-2 duration-300 ring-4 ring-tech-navy/5 flex-shrink-0">
                    <span style="font-family: monospace; font-size: 1.3rem;">2012</span>
                </div>
                <x-cms-editable key="hist_2012_title"><h3 class="text-xl font-bold text-tech-navy mb-4">Entrée de I&P</h3></x-cms-editable>
                <x-cms-editable key="hist_2012_desc"><p class="text-slate-500 text-[15px] leading-relaxed">
                    I&P, fonds d'investissement français spécialisé sur les PME africaines, entre au capital du groupe pour soutenir sa croissance.
                </p></x-cms-editable>
            </div>

            <div data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 md:w-20 md:h-20 rounded-full bg-tech-navy text-white flex items-center justify-center font-black text-lg md:text-xl tracking-[0.1em] shadow-lg mb-6 md:mb-8 transition-transform hover:-translate-y-2 duration-300 ring-4 ring-tech-navy/5 flex-shrink-0">
                    <span style="font-family: monospace; font-size: 1.3rem;">2015</span>
                </div>
                <x-cms-editable key="hist_2015_title"><h3 class="text-xl font-bold text-tech-navy mb-4">Grands chantiers</h3></x-cms-editable>
                <x-cms-editable key="hist_2015_desc"><p class="text-slate-500 text-[15px] leading-relaxed">
                    Aéroport de Bamako, Cap Sud 2, Hyper Hayat et Carrefour Marcory : réalisation de projets majeurs en CVC et froid.
                </p></x-cms-editable>
            </div>

            <div data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 md:w-20 md:h-20 rounded-full bg-tech-navy text-white flex items-center justify-center font-black text-lg md:text-xl tracking-[0.1em] shadow-lg mb-6 md:mb-8 transition-transform hover:-translate-y-2 duration-300 ring-4 ring-tech-navy/5 flex-shrink-0">
                    <span style="font-family: monospace; font-size: 1.3rem;">2019</span>
                </div>
                <x-cms-editable key="hist_2019_title"><h3 class="text-xl font-bold text-tech-navy mb-4">Alliance EDF</h3></x-cms-editable>
                <x-cms-editable key="hist_2019_desc"><p class="text-slate-500 text-[15px] leading-relaxed">
                    Le groupe EDF entre au capital. Partenariat stratégique avec Dalkia Froid Solutions pour l'excellence énergétique.
                </p></x-cms-editable>
            </div>

        </div>
    </div>
</section>
