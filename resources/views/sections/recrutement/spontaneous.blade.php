<!-- Spontaneous Application Section -->
<section id="spontanee" data-cms-section="spontaneous" class="py-24 bg-white relative overflow-hidden group/section">
    <!-- Section Controls -->
    @if(auth()->check())
    <div class="absolute top-4 left-1/2 -translate-x-1/2 z-[1000] opacity-0 group-hover/section:opacity-100 transition-all flex items-center bg-tech-navy/90 backdrop-blur-md rounded-2xl p-1 border border-white/10 shadow-2xl">
        <button onclick="window.cmsEditor.moveSection('spontaneous', 'up')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Monter">
            <i data-lucide="chevron-up" class="w-4 h-4"></i>
        </button>
        <div class="px-3 text-[9px] font-black uppercase tracking-widest text-tech-cyan border-x border-white/10">Candidature Spontanée</div>
        <button onclick="window.cmsEditor.moveSection('spontaneous', 'down')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Descendre">
            <i data-lucide="chevron-down" class="w-4 h-4"></i>
        </button>
    </div>
    @endif

    <div class="max-w-7xl mx-auto px-6">
        <div class="senior-glass p-12 md:p-20 rounded-[64px] border-white/60 relative overflow-hidden group shadow-2xl transition-all duration-700" data-aos="zoom-in">
            <!-- Background Decorative Elements -->
            <div class="absolute -top-32 -right-32 w-80 h-80 bg-tech-cyan/5 rounded-full blur-3xl group-hover:scale-150 transition-transform duration-1000"></div>
            <div class="absolute -bottom-32 -left-32 w-80 h-80 bg-tech-navy/5 rounded-full blur-3xl group-hover:scale-150 transition-transform duration-1000"></div>

            <div class="relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div>
                    <div class="inline-flex items-center space-x-2 px-4 py-2 bg-tech-cyan/10 rounded-full mb-6">
                        <i data-lucide="send" class="w-3 h-3 text-tech-cyan"></i>
                        <span class="text-[10px] font-black text-tech-cyan uppercase tracking-widest">Candidature Spontanée</span>
                    </div>
                    <x-cms-editable key="recruitment_spontaneous_title">
                        <h2 class="text-4xl md:text-5xl font-black text-tech-navy leading-tight mb-8">
                            Envie de nous <span class="text-tech-cyan">épater ?</span>
                        </h2>
                    </x-cms-editable>
                    <x-cms-editable key="recruitment_spontaneous_desc">
                        <p class="text-slate-500 text-lg font-medium leading-relaxed mb-10 max-w-md italic">
                            Vous ne trouvez pas de poste correspondant à votre profil ? Envoyez-nous votre candidature spontanée. Nous sommes toujours à la recherche de passionnés.
                        </p>
                    </x-cms-editable>
                    
                    <!-- Trust Badges -->
                    <div class="space-y-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 rounded-full bg-slate-50 flex items-center justify-center border border-slate-100">
                                <x-cms-editable key="rec_trust_1_icon" type="icon">
                                    <i data-lucide="shield-check" class="w-4 h-4 text-tech-cyan"></i>
                                </x-cms-editable>
                            </div>
                            <x-cms-editable key="rec_trust_1"><span class="text-sm font-bold text-slate-600">Données Sécurisées (RGPD)</span></x-cms-editable>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 rounded-full bg-slate-50 flex items-center justify-center border border-slate-100">
                                <x-cms-editable key="rec_trust_2_icon" type="icon">
                                    <i data-lucide="zap" class="w-4 h-4 text-tech-cyan"></i>
                                </x-cms-editable>
                            </div>
                            <x-cms-editable key="rec_trust_2"><span class="text-sm font-bold text-slate-600">Réponse sous 10 jours ouvrés</span></x-cms-editable>
                        </div>
                    </div>
                </div>

                <div class="bg-white/50 backdrop-blur-md p-10 rounded-[40px] border border-white/60 shadow-xl">
                    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                        @csrf
                        <input type="hidden" name="form_type" value="Candidature spontanée">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <input type="text" name="name" placeholder="Nom Complet" required class="w-full px-6 py-4 rounded-2xl bg-white border border-slate-100 focus:ring-4 focus:ring-tech-cyan/10 focus:border-tech-cyan outline-none transition-all font-bold text-sm">
                            <input type="email" name="email" placeholder="Email" required class="w-full px-6 py-4 rounded-2xl bg-white border border-slate-100 focus:ring-4 focus:ring-tech-cyan/10 focus:border-tech-cyan outline-none transition-all font-bold text-sm">
                        </div>
                        <select name="specialty" class="w-full px-6 py-4 rounded-2xl bg-white border border-slate-100 focus:ring-4 focus:ring-tech-cyan/10 focus:border-tech-cyan outline-none transition-all font-bold text-sm text-slate-400">
                            <option value="" disabled selected>Votre Spécialité</option>
                            <option value="froid">Froid Industriel</option>
                            <option value="cvc">Génie Climatique / CVC</option>
                            <option value="gtb">GTB & Smart Monitoring</option>
                        </select>
                        <div class="border-2 border-dashed border-slate-200 rounded-3xl p-10 text-center hover:border-tech-cyan transition-colors cursor-pointer group/upload">
                            <i data-lucide="upload-cloud" class="w-10 h-10 text-slate-300 mx-auto mb-4 group-hover/upload:scale-110 group-hover/upload:text-tech-cyan transition-all"></i>
                            <p class="text-sm font-bold text-slate-500">Ajouter votre CV (PDF)</p>
                            <input type="file" name="cv" class="hidden">
                        </div>
                         <button type="submit" class="w-full py-5 bg-tech-navy text-white rounded-2xl font-black text-xs uppercase tracking-widest hover:bg-tech-cyan shadow-xl transition-all hover:scale-[1.02] relative group">
                            <x-cms-editable key="rec_form_submit_btn" buttonClass="-top-12 left-0 text-white">Envoyer ma candidature</x-cms-editable>
                         </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
