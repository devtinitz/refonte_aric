<!-- Main Content -->
<section id="expertise-industrie-section-content" data-cms-section="content" class="py-24 relative bg-white group/section">
    <!-- Section Controls -->
    @if(auth()->check())
    <div class="absolute top-4 left-1/2 -translate-x-1/2 z-[1000] opacity-0 group-hover/section:opacity-100 transition-all flex items-center bg-tech-navy/90 backdrop-blur-md rounded-2xl p-1 border border-white/10 shadow-2xl">
        <button onclick="window.cmsEditor.moveSection('content', 'up')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Monter">
            <i data-lucide="chevron-up" class="w-4 h-4"></i>
        </button>
        <div class="px-3 text-[9px] font-black uppercase tracking-widest text-tech-cyan border-x border-white/10">Contenu Principal</div>
        <button onclick="window.cmsEditor.moveSection('content', 'down')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Descendre">
            <i data-lucide="chevron-down" class="w-4 h-4"></i>
        </button>
    </div>
    @endif

    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-20 items-center">
            <div data-aos="fade-right">
                <x-cms-editable key="exp_ind_main_title"><h2 class="text-4xl font-extrabold text-tech-navy mb-8 leading-tight">Réfrigération & <span class="text-tech-cyan">Conservation</span>.</h2></x-cms-editable>
</x-cms-editable>                <x-cms-editable key="exp_ind_main_desc"><p class="text-slate-600 text-lg leading-relaxed mb-8">
</x-cms-editable>                    ARIC Solutions conçoit, installe et maintient des centrales frigorifiques de pointe pour l'industrie agroalimentaire, les entrepôts logistiques et les plateformes de distribution.
                </p></x-cms-editable>
                <ul class="space-y-4">
                    <li class="flex items-center text-slate-700 font-semibold">
                        <div class="w-6 h-6 flex items-center justify-center mr-4">
                            <x-cms-editable key="exp_ind_list_1_icon" type="icon">
</x-cms-editable>                                <i data-lucide="check" class="w-5 h-5 text-tech-cyan"></i>
                            </x-cms-editable>
                        </div>
                        <x-cms-editable key="exp_ind_list_1"><span>Centrales NH3 & CO2</span></x-cms-editable>
</x-cms-editable>                    </li>
                    <li class="flex items-center text-slate-700 font-semibold">
                        <div class="w-6 h-6 flex items-center justify-center mr-4">
                            <x-cms-editable key="exp_ind_list_2_icon" type="icon">
</x-cms-editable>                                <i data-lucide="check" class="w-5 h-5 text-tech-cyan"></i>
                            </x-cms-editable>
                        </div>
                        <x-cms-editable key="exp_ind_list_2"><span>Refroidisseurs de liquides</span></x-cms-editable>
</x-cms-editable>                    </li>
                </ul>
            </div>
            <div class="relative rounded-[48px] overflow-hidden shadow-2xl" data-aos="zoom-in">
                <x-cms-editable key="expertise_industrie_main_img" type="media">
</x-cms-editable>                    <img src="/froid-expertise.png" alt="Industrial Cooling" class="w-full h-auto">
                </x-cms-editable>
            </div>
        </div>
    </div>
</section>
