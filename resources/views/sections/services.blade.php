<!-- Services Section -->
<section id="cms-section-services" data-cms-section="services" class="py-24 bg-slate-50 relative group/section">
    <!-- Section Controls -->
    @if(auth()->check())
    <div class="absolute top-4 left-1/2 -translate-x-1/2 z-[1000] opacity-0 group-hover/section:opacity-100 transition-all flex items-center bg-tech-navy/90 backdrop-blur-md rounded-2xl p-1 border border-white/10 shadow-2xl">
        <button onclick="window.cmsEditor.moveSection('services', 'up')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Monter">
            <i data-lucide="chevron-up" class="w-4 h-4"></i>
        </button>
        <div class="px-3 text-[9px] font-black uppercase tracking-widest text-tech-cyan border-x border-white/10">Nos Services</div>
        <button onclick="window.cmsEditor.moveSection('services', 'down')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Descendre">
            <i data-lucide="chevron-down" class="w-4 h-4"></i>
        </button>
    </div>
    @endif

    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center max-w-2xl mx-auto mb-20" data-aos="fade-up">
            <x-cms-editable key="service_section_badge"><h2 class="text-sm font-black text-tech-cyan uppercase tracking-[0.2em] mb-4">Nos Services</h2></x-cms-editable>
            <x-cms-editable key="service_section_title"><h3 class="text-4xl font-extrabold mb-6 text-tech-navy">Expertise à 360° pour vos infrastructures</h3></x-cms-editable>
            <x-cms-editable key="service_section_desc"><p class="text-slate-600 font-medium">De la maintenance préventive à l'audit énergétique, nous accompagnons vos installations sur toute leur durée de vie.</p></x-cms-editable>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <div class="glass p-10 rounded-[40px] hover-lift group" data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 rounded-2xl bg-tech-cyan/10 flex items-center justify-center mb-8 group-hover:scale-110 transition-transform">
                    <x-cms-editable key="service_1_icon" type="icon">
                        <i data-lucide="shield-check" class="w-8 h-8 text-tech-cyan"></i>
                    </x-cms-editable>
                </div>
                <x-cms-editable key="service_1_title"><h4 class="text-2xl font-bold mb-4 text-tech-navy">Contrats de Maintenance</h4></x-cms-editable>
                <x-cms-editable key="service_1_description"><p class="text-slate-500 leading-relaxed mb-6">Plans préventifs et curatifs personnalisés pour maximiser la durée de vie de vos équipements et éviter les arrêts de production.</p></x-cms-editable>
                <a href="/services" class="inline-flex items-center text-tech-cyan font-bold hover:translate-x-2 transition-transform uppercase tracking-wider text-xs relative group">
                    <x-cms-editable key="service_1_btn" buttonClass="-top-6 left-0">En savoir plus <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i></x-cms-editable>
                </a>
            </div>

            <!-- Card 2 -->
            <div class="glass p-10 rounded-[40px] border-tech-cyan/20 hover-lift group shadow-lg shadow-blue-900/5" data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 rounded-2xl bg-tech-cyan/20 flex items-center justify-center mb-8 group-hover:scale-110 transition-transform">
                    <x-cms-editable key="service_2_icon" type="icon">
                        <i data-lucide="wrench" class="w-8 h-8 text-tech-cyan"></i>
                    </x-cms-editable>
                </div>
                <x-cms-editable key="service_2_title"><h4 class="text-2xl font-bold mb-4 text-tech-navy">Installations & Travaux</h4></x-cms-editable>
                <x-cms-editable key="service_2_description"><p class="text-slate-500 leading-relaxed mb-6">Expertise technique complète pour la mise en place de vos infrastructures neuves avec un suivi rigoureux.</p></x-cms-editable>
                <a href="/expertise" class="inline-flex items-center text-tech-cyan font-bold hover:translate-x-2 transition-transform uppercase tracking-wider text-xs relative group">
                    <x-cms-editable key="service_2_btn" buttonClass="-top-6 left-0">Nos solutions <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i></x-cms-editable>
                </a>
            </div>

            <!-- Card 3 -->
            <div class="glass p-10 rounded-[40px] hover-lift group" data-aos="fade-up" data-aos-delay="300">
                <div class="w-16 h-16 rounded-2xl bg-tech-cyan/10 flex items-center justify-center mb-8 group-hover:scale-110 transition-transform">
                    <x-cms-editable key="service_3_icon" type="icon">
                        <i data-lucide="bar-chart-3" class="w-8 h-8 text-tech-cyan"></i>
                    </x-cms-editable>
                </div>
                <x-cms-editable key="service_3_title"><h4 class="text-2xl font-bold mb-4 text-tech-navy">Audits et Conseil</h4></x-cms-editable>
                <x-cms-editable key="service_3_description"><p class="text-slate-500 leading-relaxed mb-6">Analyse approfondie de vos consommations et préconisations pour réduire drastiquement votre empreinte carbone.</p></x-cms-editable>
                <a href="/expertise" class="inline-flex items-center text-tech-cyan font-bold hover:translate-x-2 transition-transform uppercase tracking-wider text-xs relative group">
                    <x-cms-editable key="service_3_btn" buttonClass="-top-6 left-0">Optimiser <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i></x-cms-editable>
                </a>
            </div>
        </div>
    </div>
</section>
