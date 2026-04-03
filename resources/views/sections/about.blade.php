<!-- About Section -->
<section id="cms-section-about" data-cms-section="about" class="py-24 relative bg-white overflow-hidden group/section">
    <!-- Section Controls -->
    @if(auth()->check())
    <div class="absolute top-4 left-1/2 -translate-x-1/2 z-[1000] opacity-0 group-hover/section:opacity-100 transition-all flex items-center bg-tech-navy/90 backdrop-blur-md rounded-2xl p-1 border border-white/10 shadow-2xl">
        <button onclick="window.cmsEditor.moveSection('about', 'up')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Monter">
            <i data-lucide="chevron-up" class="w-4 h-4"></i>
        </button>
        <div class="px-3 text-[9px] font-black uppercase tracking-widest text-tech-cyan border-x border-white/10">Qui sommes-nous</div>
        <button onclick="window.cmsEditor.moveSection('about', 'down')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Descendre">
            <i data-lucide="chevron-down" class="w-4 h-4"></i>
        </button>
    </div>
    @endif

    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-20 items-center">
            <div data-aos="fade-right">
                <h2 class="text-sm font-black text-tech-cyan uppercase tracking-[0.2em] mb-4">Qui sommes-nous</h2>
                <h3 class="text-4xl md:text-5xl font-extrabold mb-8 leading-tight">
                    <x-cms-editable key="about_title">
                        Votre allié pour la performance durable.
                    </x-cms-editable>
                </h3>
                <p class="text-lg text-slate-500 mb-8 leading-relaxed font-medium">
                    <x-cms-editable key="about_description">
                        Depuis sa création in 1996, ARIC est un acteur majeur du génie climatique et de la réfrigération industrielle en Afrique de l'Ouest. Filiale du Groupe Conergies.
                    </x-cms-editable>
                </p>
                <ul class="space-y-4 font-semibold text-slate-700">
                    <li class="flex items-center">
                        <i data-lucide="check-circle-2" class="w-6 h-6 text-tech-cyan mr-4"></i>
                        <x-cms-editable key="about_list_item_1">Maîtrise technologique avancée</x-cms-editable>
                    </li>
                    <li class="flex items-center">
                        <i data-lucide="check-circle-2" class="w-6 h-6 text-tech-cyan mr-4"></i>
                        <x-cms-editable key="about_list_item_2">Accompagnement ISO 50001</x-cms-editable>
                    </li>
                    <li class="flex items-center">
                        <i data-lucide="check-circle-2" class="w-6 h-6 text-tech-cyan mr-4"></i>
                        <x-cms-editable key="about_list_item_3">Réactivité et proximité régionale</x-cms-editable>
                    </li>
                </ul>
            </div>
            <div class="relative" data-aos="fade-left">
                <div class="aspect-square rounded-[60px] overflow-hidden glass p-4 rotate-3 shadow-2xl">
                    <x-cms-editable key="about_main_image" type="media">
                        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?auto=format&fit=crop&q=80&w=800" alt="Tech" class="w-full h-full object-cover rounded-[50px]">
                    </x-cms-editable>
                </div>
                <div class="absolute -bottom-6 -left-4 md:-bottom-10 md:-left-10 glass p-6 md:p-8 rounded-3xl -rotate-3 hover:rotate-0 transition-transform shadow-xl border border-white/30">
                    <div class="text-tech-cyan mb-2">
                        <x-cms-editable key="about_badge_icon" type="icon">
                            <i data-lucide="zap" class="w-10 h-10 fill-tech-cyan/20"></i>
                        </x-cms-editable>
                    </div>
                    <x-cms-editable key="about_badge_title"><div class="text-2xl font-black text-tech-navy">Efficacité Boostée</div></x-cms-editable>
                    <x-cms-editable key="about_badge_subtitle"><div class="text-sm text-slate-500">Réduction de la facture</div></x-cms-editable>
                </div>
            </div>
        </div>
    </div>
</section>
