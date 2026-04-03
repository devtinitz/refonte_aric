<!-- Regional Presence -->
<section id="about-section-presence" data-cms-section="presence" class="py-16 md:py-24 relative bg-slate-50 overflow-hidden group/section">
    <!-- Section Controls -->
    @if(auth()->check())
    <div class="absolute top-4 left-1/2 -translate-x-1/2 z-[1000] opacity-0 group-hover/section:opacity-100 transition-all flex items-center bg-tech-navy/90 backdrop-blur-md rounded-2xl p-1 border border-white/10 shadow-2xl">
        <button onclick="window.cmsEditor.moveSection('presence', 'up')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Monter">
            <i data-lucide="chevron-up" class="w-4 h-4"></i>
        </button>
        <div class="px-3 text-[9px] font-black uppercase tracking-widest text-tech-cyan border-x border-white/10">Présence Régionale</div>
        <button onclick="window.cmsEditor.moveSection('presence', 'down')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Descendre">
            <i data-lucide="chevron-down" class="w-4 h-4"></i>
        </button>
    </div>
    @endif

    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                <div class="text-tech-cyan font-bold text-xs uppercase tracking-[0.3em] mb-4">Réseau Ouest-Africain</div>
                <x-cms-editable key="about_presence_title"><h2 class="text-3xl md:text-5xl font-extrabold text-tech-navy mb-8 leading-tight">Une présence forte au <span class="text-tech-cyan italic">Bénin</span> et au <span class="text-tech-cyan italic">Cameroun</span>.</h2></x-cms-editable>
                <x-cms-editable key="about_presence_desc">
                    <p class="text-slate-600 text-lg leading-relaxed mb-10 font-medium">
                        Au-delà de nos sièges historiques en Côte d'Ivoire et au Mali, nous déployons notre expertise multitechnique sur des marchés exigeants.
                    </p>
                </x-cms-editable>
                <div class="space-y-6">
                    <div class="glass border-white/50 p-6 rounded-2xl flex items-start space-x-4">
                        <div class="w-10 h-10 bg-tech-navy text-white rounded-lg flex items-center justify-center shrink-0">BJ</div>
                        <div>
                            <x-cms-editable key="about_branch_1_name"><h4 class="font-bold text-tech-navy">ArIC-BTP Bénin</h4></x-cms-editable>
                            <x-cms-editable key="about_branch_1_desc"><p class="text-xs font-semibold text-slate-500 mt-1 uppercase tracking-widest">Basé à Lokossa • Génie Militaire & Civil</p></x-cms-editable>
                        </div>
                    </div>
                    <div class="glass border-white/50 p-6 rounded-2xl flex items-start space-x-4">
                        <div class="w-10 h-10 bg-tech-navy text-white rounded-lg flex items-center justify-center shrink-0">CM</div>
                        <div>
                            <x-cms-editable key="about_branch_2_name"><h4 class="font-bold text-tech-navy">ARIC SA Cameroun</h4></x-cms-editable>
                            <x-cms-editable key="about_branch_2_desc"><p class="text-xs font-semibold text-slate-500 mt-1 uppercase tracking-widest">Basé à Douala • Froid, Clim & Solaire</p></x-cms-editable>
                        </div>
                    </div>
                </div>
            </div>
            <div class="relative" data-aos="zoom-in">
                <div class="absolute -inset-10 bg-tech-cyan/10 blur-[100px] rounded-full pointer-events-none"></div>
                <div class="glass p-4 rounded-[3rem] border border-white relative overflow-hidden shadow-2xl">
                    <x-cms-editable key="about_presence_map_img" type="media">
                        <img src="/presence_map.png" alt="ARIC Regional Presence Map" class="w-full h-auto rounded-2xl transform hover:scale-105 transition-transform duration-700">
                    </x-cms-editable>
                </div>
            </div>
        </div>
    </div>
</section>
