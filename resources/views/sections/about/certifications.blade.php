<!-- Certifications -->
<section id="about-section-certifications" data-cms-section="certifications" class="py-16 md:py-24 relative bg-white border-b border-slate-100 group/section">
    <!-- Section Controls -->
    @if(auth()->check())
    <div class="absolute top-4 left-1/2 -translate-x-1/2 z-[1000] opacity-0 group-hover/section:opacity-100 transition-all flex items-center bg-tech-navy/90 backdrop-blur-md rounded-2xl p-1 border border-white/10 shadow-2xl">
        <button onclick="window.cmsEditor.moveSection('certifications', 'up')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Monter">
            <i data-lucide="chevron-up" class="w-4 h-4"></i>
        </button>
        <div class="px-3 text-[9px] font-black uppercase tracking-widest text-tech-cyan border-x border-white/10">Certifications</div>
        <button onclick="window.cmsEditor.moveSection('certifications', 'down')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Descendre">
            <i data-lucide="chevron-down" class="w-4 h-4"></i>
        </button>
    </div>
    @endif

    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16" data-aos="fade-up">
            <div class="text-tech-cyan font-bold text-xs uppercase tracking-[0.3em] mb-4">Standards Qualité</div>
            <h2 class="text-3xl md:text-5xl font-extrabold text-tech-navy">Certifications & Standards</h2>
        </div>
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 md:gap-12">
            <div class="text-center group" data-aos="zoom-in">
                <div class="w-20 h-20 glass border-tech-cyan/10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-tech-cyan transition-colors">
                    <x-cms-editable key="cert_1_icon" type="icon">
                        <i data-lucide="shield-check" class="w-10 h-10 text-tech-navy group-hover:text-white transition-colors"></i>
                    </x-cms-editable>
                </div>
                <x-cms-editable key="cert_1_name"><h5 class="font-extrabold text-tech-navy text-sm uppercase tracking-widest">ISO 14001</h5></x-cms-editable>
            </div>
            <div class="text-center group" data-aos="zoom-in" data-aos-delay="100">
                <div class="w-20 h-20 glass border-tech-cyan/10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-tech-cyan transition-colors">
                    <x-cms-editable key="cert_2_icon" type="icon">
                        <i data-lucide="building-2" class="w-10 h-10 text-tech-navy group-hover:text-white transition-colors"></i>
                    </x-cms-editable>
                </div>
                <x-cms-editable key="cert_2_name"><h5 class="font-extrabold text-tech-navy text-sm uppercase tracking-widest">HQE</h5></x-cms-editable>
            </div>
            <div class="text-center group" data-aos="zoom-in" data-aos-delay="200">
                <div class="w-20 h-20 glass border-tech-cyan/10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-tech-cyan transition-colors">
                    <x-cms-editable key="cert_3_icon" type="icon">
                        <i data-lucide="check-circle" class="w-10 h-10 text-tech-navy group-hover:text-white transition-colors"></i>
                    </x-cms-editable>
                </div>
                <x-cms-editable key="cert_3_name"><h5 class="font-extrabold text-tech-navy text-sm uppercase tracking-widest">Label RGE</h5></x-cms-editable>
            </div>
            <div class="text-center group" data-aos="zoom-in" data-aos-delay="300">
                <div class="w-20 h-20 glass border-tech-cyan/10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-tech-cyan transition-colors">
                    <x-cms-editable key="cert_4_icon" type="icon">
                        <i data-lucide="award" class="w-10 h-10 text-tech-navy group-hover:text-white transition-colors"></i>
                    </x-cms-editable>
                </div>
                <x-cms-editable key="cert_4_name"><h5 class="font-extrabold text-tech-navy text-sm uppercase tracking-widest">ODD ONU</h5></x-cms-editable>
            </div>
        </div>
    </div>
</section>
