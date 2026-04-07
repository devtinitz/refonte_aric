<!-- Jobs Section -->
<section id="jobs" data-cms-section="jobs" class="py-24 bg-slate-50 relative group/section">
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
            <div class="flex gap-2 p-1.5 bg-white rounded-2xl border border-slate-200 shadow-sm overflow-x-auto no-scrollbar max-w-full" data-aos="fade-left" id="job-filters">
                <button data-filter="all" class="filter-btn px-6 py-2.5 rounded-xl bg-tech-navy text-white text-xs font-bold uppercase tracking-widest whitespace-nowrap transition-all duration-300">Tous</button>
                @php 
                    $types = $jobs->pluck('contract_type')->unique();
                @endphp
                @foreach($types as $type)
                    <button data-filter="{{ strtolower($type) }}" class="filter-btn px-6 py-2.5 rounded-xl hover:bg-slate-50 text-slate-500 text-xs font-bold uppercase tracking-widest transition-all duration-300 whitespace-nowrap">{{ $type }}</button>
                @endforeach
            </div>
        </div>
        
        <div class="grid grid-cols-1 gap-6" id="job-container">
            @forelse($jobs as $job)
                <!-- Job Card -->
                <div class="job-card senior-glass p-8 md:p-10 rounded-[32px] border border-white flex flex-col md:flex-row justify-between items-center group transition-all hover:bg-white hover:shadow-2xl duration-500" 
                    data-contract="{{ strtolower($job->contract_type) }}" 
                    data-aos="fade-up">
                    <div class="flex flex-col md:flex-row items-center md:items-start gap-8 w-full">
                        <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center shadow-sm border border-slate-100 shrink-0">
                            <i data-lucide="{{ $job->icon ?: 'briefcase' }}" class="w-8 h-8 text-tech-navy group-hover:text-tech-cyan transition-colors"></i>
                        </div>
                        <div class="text-center md:text-left">
                            <div class="flex flex-wrap justify-center md:justify-start items-center gap-3 mb-3">
                                <span class="px-3 py-1 bg-tech-navy/5 text-tech-navy text-[10px] font-black uppercase tracking-widest rounded-full">{{ $job->category }}</span>
                                <span class="px-3 py-1 bg-tech-cyan/10 text-tech-cyan text-[10px] font-black uppercase tracking-widest rounded-full">{{ $job->contract_type }}</span>
                                @if($job->experience)
                                    <span class="text-slate-400 text-[10px] font-black uppercase tracking-widest">{{ $job->experience }}</span>
                                @endif
                                @if($job->tags && is_array($job->tags))
                                    @foreach($job->tags as $tag)
                                        <span class="px-3 py-1 bg-red-50 text-red-500 text-[9px] font-black uppercase tracking-widest rounded-full">{{ $tag }}</span>
                                    @endforeach
                                @endif
                            </div>
                            <h3 class="text-2xl font-black text-tech-navy mb-2 group-hover:text-tech-cyan transition-colors">{{ $job->title }}</h3>
                            <div class="flex items-center justify-center md:justify-start space-x-4 text-slate-500 text-sm font-semibold italic">
                                <span class="flex items-center"><i data-lucide="map-pin" class="w-4 h-4 mr-1.5 text-tech-cyan"></i> {{ $job->location }}</span>
                                @php
                                    $hasUrgent = false;
                                    if (is_array($job->tags)) {
                                        foreach($job->tags as $t) {
                                            if (str_contains(strtolower($t), 'urgent')) $hasUrgent = true;
                                        }
                                    }
                                @endphp
                                @if($hasUrgent)
                                    <span class="w-1.5 h-1.5 bg-slate-200 rounded-full"></span>
                                    <span class="flex items-center text-red-500"><i data-lucide="zap" class="w-4 h-4 mr-1.5 "></i> Urgent</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="mt-8 md:mt-0 flex items-center gap-4 shrink-0">
                        <a href="/contact?subject={{ urlencode('Postulation: ' . $job->title) }}" class="px-8 py-4 bg-tech-navy text-white font-black text-xs uppercase tracking-widest rounded-2xl hover:bg-tech-cyan transition-all shadow-xl hover:scale-105 active:scale-95 whitespace-nowrap">Postuler</a>
                    </div>
                </div>
            @empty
                <!-- Empty State -->
                <div class="p-20 text-center bg-white rounded-[40px] border border-slate-100 shadow-xl" data-aos="fade-up">
                    <div class="w-20 h-20 rounded-[32px] bg-slate-50 flex items-center justify-center text-slate-200 mx-auto mb-6">
                        <i data-lucide="search-x" class="w-10 h-10"></i>
                    </div>
                    <h3 class="text-2xl font-black text-tech-navy uppercase tracking-tight mb-2">Aucune offre pour le moment</h3>
                    <p class="text-slate-400 font-bold uppercase text-[10px] tracking-widest italic mb-8">Revenez nous voir bientôt ou déposez une candidature spontanée !</p>
                    <a href="#spontanee" class="text-tech-cyan font-black text-[10px] uppercase tracking-[0.2em] hover:underline">Candidature Spontanée</a>
                </div>
            @endforelse
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const filterBtns = document.querySelectorAll('.filter-btn');
            const jobCards = document.querySelectorAll('.job-card');

            filterBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    const filter = btn.dataset.filter;
                    
                    // Update UI
                    filterBtns.forEach(b => b.classList.remove('bg-tech-navy', 'text-white'));
                    filterBtns.forEach(b => b.classList.add('hover:bg-slate-50', 'text-slate-500'));
                    
                    btn.classList.add('bg-tech-navy', 'text-white');
                    btn.classList.remove('hover:bg-slate-50', 'text-slate-500');

                    // Filter Cards
                    jobCards.forEach(card => {
                        if (filter === 'all' || card.dataset.contract === filter) {
                            card.style.display = 'flex';
                            card.classList.add('animate-in', 'fade-in', 'slide-in-from-bottom-4');
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>
</section>
