<!-- Jobs Section -->
<section id="recrutement-section-jobs" data-cms-section="jobs" class="py-24 bg-slate-50 relative group/section">
    <!-- Section Controls -->
    @if(auth()->check())
    <div class="absolute top-4 left-1/2 -translate-x-1/2 z-[1000] opacity-0 group-hover/section:opacity-100 transition-all flex items-center bg-tech-navy/90 backdrop-blur-md rounded-2xl p-1 border border-white/10 shadow-2xl">
        <button onclick="window.cmsEditor.moveSection('jobs', 'up')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Monter">
            <i data-lucide="chevron-up" class="w-4 h-4"></i>
        </button>
        <div class="px-3 text-[9px] font-black uppercase tracking-widest text-tech-cyan border-x border-white/10">Postes à pourvoir</div>
        <button onclick="window.cmsEditor.moveSection('jobs', 'down')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Descendre">
            <i data-lucide="chevron-down" class="w-4 h-4"></i>
        </button>
    </div>
    @endif

    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-end gap-8 mb-16">
            <div data-aos="fade-right">
                <div class="text-tech-cyan font-bold text-xs uppercase tracking-[0.3em] mb-4">Opportunités</div>
                <x-cms-editable key="recruitment_jobs_title"><h2 class="text-4xl md:text-5xl font-black text-tech-navy">Postes à pourvoir.</h2></x-cms-editable>
            </div>
            <div class="flex gap-2 p-1.5 bg-white rounded-2xl border border-slate-200 shadow-sm overflow-x-auto no-scrollbar max-w-full" data-aos="fade-left">
                <button class="px-6 py-2.5 rounded-xl bg-tech-navy text-white text-xs font-bold uppercase tracking-widest whitespace-nowrap transition-all duration-300">Tous</button>
                <button class="px-6 py-2.5 rounded-xl hover:bg-slate-50 text-slate-500 text-xs font-bold uppercase tracking-widest transition-all duration-300 whitespace-nowrap">CDI</button>
                <button class="px-6 py-2.5 rounded-xl hover:bg-slate-50 text-slate-500 text-xs font-bold uppercase tracking-widest transition-all duration-300 whitespace-nowrap">Stage</button>
            </div>
        </div>
        
        <div class="grid grid-cols-1 gap-6">
            <!-- Job 1 -->
            <div class="senior-glass p-8 md:p-10 rounded-[32px] border border-white flex flex-col md:flex-row justify-between items-center group transition-all hover:bg-white hover:shadow-2xl duration-500" data-aos="fade-up">
                <div class="flex flex-col md:flex-row items-center md:items-start gap-8 w-full">
                    <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center shadow-sm border border-slate-100 shrink-0">
                        <x-cms-editable key="job_1_icon" type="icon">
                            <i data-lucide="briefcase" class="w-8 h-8 text-tech-navy group-hover:text-tech-cyan transition-colors"></i>
                        </x-cms-editable>
                    </div>
                    <div class="text-center md:text-left">
                        <div class="flex flex-wrap justify-center md:justify-start items-center gap-3 mb-3">
                            <span class="px-3 py-1 bg-tech-navy/5 text-tech-navy text-[10px] font-black uppercase tracking-widest rounded-full">Management</span>
                            <span class="px-3 py-1 bg-tech-cyan/10 text-tech-cyan text-[10px] font-black uppercase tracking-widest rounded-full">CDI</span>
                            <span class="text-slate-400 text-[10px] font-black uppercase tracking-widest">5-10 ans d'exp.</span>
                        </div>
                        <x-cms-editable key="job_1_title"><h3 class="text-2xl font-black text-tech-navy mb-2 group-hover:text-tech-cyan transition-colors">Chef d’Équipe / Chef de Chantier Froid Climatisation (H/F)</h3></x-cms-editable>
                        <div class="flex items-center justify-center md:justify-start space-x-4 text-slate-500 text-sm font-semibold italic">
                            <span class="flex items-center"><i data-lucide="map-pin" class="w-4 h-4 mr-1.5 text-tech-cyan"></i> Abidjan / Bamako</span>
                            <span class="w-1.5 h-1.5 bg-slate-200 rounded-full"></span>
                            <span class="flex items-center"><i data-lucide="calendar" class="w-4 h-4 mr-1.5 text-tech-cyan"></i> Urgent</span>
                        </div>
                    </div>
                </div>
                <div class="mt-8 md:mt-0 flex items-center gap-4 shrink-0 relative group">
                    <x-cms-editable key="job_1_btn_label" buttonClass="-top-12 right-0">
                        <a href="/contact" class="px-8 py-4 bg-tech-navy text-white font-black text-xs uppercase tracking-widest rounded-2xl hover:bg-tech-cyan transition-all shadow-xl hover:scale-105 active:scale-95 whitespace-nowrap">Postuler</a>
                    </x-cms-editable>
                </div>
            </div>

            <!-- Job 2 -->
            <div class="senior-glass p-8 md:p-10 rounded-[32px] border border-white flex flex-col md:flex-row justify-between items-center group transition-all hover:bg-white hover:shadow-2xl duration-500" data-aos="fade-up" data-aos-delay="100">
                <div class="flex flex-col md:flex-row items-center md:items-start gap-8 w-full">
                    <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center shadow-sm border border-slate-100 shrink-0">
                        <x-cms-editable key="job_2_icon" type="icon">
                            <i data-lucide="wrench" class="w-8 h-8 text-tech-navy group-hover:text-tech-cyan transition-colors"></i>
                        </x-cms-editable>
                    </div>
                    <div class="text-center md:text-left">
                        <div class="flex flex-wrap justify-center md:justify-start items-center gap-3 mb-3">
                            <span class="px-3 py-1 bg-tech-navy/5 text-tech-navy text-[10px] font-black uppercase tracking-widest rounded-full">Technique</span>
                            <span class="px-3 py-1 bg-tech-cyan/10 text-tech-cyan text-[10px] font-black uppercase tracking-widest rounded-full">CDI</span>
                        </div>
                        <x-cms-editable key="job_2_title"><h3 class="text-2xl font-black text-tech-navy mb-2 group-hover:text-tech-cyan transition-colors">Techniciens Frigoristes (H/F) — Experts F-Gaz</h3></x-cms-editable>
                        <div class="flex items-center justify-center md:justify-start space-x-4 text-slate-500 text-sm font-semibold italic">
                            <span class="flex items-center"><i data-lucide="map-pin" class="w-4 h-4 mr-1.5 text-tech-cyan"></i> Abidjan, Côte d'Ivoire</span>
                        </div>
                    </div>
                </div>
                <div class="mt-8 md:mt-0 flex items-center gap-4 shrink-0 relative group">
                    <x-cms-editable key="job_2_btn_label" buttonClass="-top-12 right-0">
                        <a href="/contact" class="px-8 py-4 bg-tech-navy text-white font-black text-xs uppercase tracking-widest rounded-2xl hover:bg-tech-cyan transition-all shadow-xl hover:scale-105 active:scale-95 whitespace-nowrap">Postuler</a>
                    </x-cms-editable>
                </div>
            </div>
        </div>
    </div>
</section>
