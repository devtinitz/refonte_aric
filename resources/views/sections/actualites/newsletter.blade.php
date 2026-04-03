<!-- Premium Newsletter -->
<section id="actualites-section-newsletter" data-cms-section="newsletter" class="py-12 md:py-24 bg-slate-50 relative overflow-hidden group/section">
    <!-- Section Controls -->
    @if(auth()->check())
    <div class="absolute top-4 left-1/2 -translate-x-1/2 z-[1000] opacity-0 group-hover/section:opacity-100 transition-all flex items-center bg-tech-navy/90 backdrop-blur-md rounded-2xl p-1 border border-white/10 shadow-2xl">
        <button onclick="window.cmsEditor.moveSection('newsletter', 'up')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Monter">
            <i data-lucide="chevron-up" class="w-4 h-4"></i>
        </button>
        <div class="px-3 text-[9px] font-black uppercase tracking-widest text-tech-cyan border-x border-white/10">Newsletter</div>
        <button onclick="window.cmsEditor.moveSection('newsletter', 'down')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Descendre">
            <i data-lucide="chevron-down" class="w-4 h-4"></i>
        </button>
    </div>
    @endif

    <div class="max-w-7xl mx-auto px-6">
        <div class="senior-glass p-12 md:p-20 rounded-[64px] border-white/60 relative overflow-hidden group shadow-2xl transition-all duration-700" data-aos="zoom-in">
            <!-- Decorative Elements -->
            <div class="absolute -top-24 -right-24 w-64 h-64 bg-tech-cyan/5 rounded-full blur-3xl group-hover:scale-150 transition-transform duration-1000"></div>
            <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-tech-navy/5 rounded-full blur-3xl group-hover:scale-150 transition-transform duration-1000"></div>

            <div class="relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div>
                    <div class="inline-flex items-center space-x-2 px-4 py-2 bg-tech-cyan/10 rounded-full mb-6">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-tech-cyan opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-tech-cyan"></span>
                        </span>
                        <span class="text-[10px] font-black text-tech-cyan uppercase tracking-widest">Newsletter ARIC</span>
                    </div>
                    <x-cms-editable key="newsletter_title">
                        <h2 class="text-3xl md:text-5xl font-black text-tech-navy leading-tight mb-6">
                            Restez à la pointe de <br><span class="text-tech-cyan italic">l'innovation.</span>
                        </h2>
                    </x-cms-editable>
                    <x-cms-editable key="newsletter_desc">
                        <p class="text-slate-500 text-lg font-medium leading-relaxed max-w-md italic">
                            Recevez nos dernières études de cas et les actualités exclusives du Groupe directement par mail.
                        </p>
                    </x-cms-editable>
                </div>
                <div>
                    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-4 max-w-md ml-auto">
                        @csrf
                        <input type="hidden" name="form_type" value="Inscription Newsletter">
                        <div class="relative">
                            <input type="email" name="email" required placeholder="votre@email.com" class="w-full px-8 py-5 rounded-3xl bg-white border border-slate-100 focus:ring-4 focus:ring-tech-cyan/10 focus:border-tech-cyan outline-none transition-all font-bold text-slate-800 placeholder:text-slate-400 shadow-inner">
                            <div class="absolute right-3 top-3 group">
                                <x-cms-editable key="news_subscribe_btn_label" buttonClass="-top-12 right-0">
                                    <button type="submit" class="px-8 py-3 bg-tech-navy text-white rounded-2xl font-black text-xs uppercase tracking-widest hover:scale-[1.03] transition-all hover:bg-tech-cyan shadow-xl">S'abonner</button>
                                </x-cms-editable>
                            </div>
                        </div>
                        <x-cms-editable key="news_newsletter_trust">
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest text-center px-4">
                                <i data-lucide="shield-check" class="w-3 h-3 inline-block mr-1"></i> Données sécurisées • Désinscription en un clic
                            </p>
                        </x-cms-editable>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
