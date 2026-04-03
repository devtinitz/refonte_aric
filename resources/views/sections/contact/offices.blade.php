<!-- Detailed Bureaus & Form Section -->
<section id="contact-section-offices" data-cms-section="offices" class="py-24 bg-white relative overflow-hidden group/section">
    <!-- Section Controls -->
    @if(auth()->check())
    <div class="absolute top-4 left-1/2 -translate-x-1/2 z-[1000] opacity-0 group-hover/section:opacity-100 transition-all flex items-center bg-tech-navy/90 backdrop-blur-md rounded-2xl p-1 border border-white/10 shadow-2xl">
        <button onclick="window.cmsEditor.moveSection('offices', 'up')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Monter">
            <i data-lucide="chevron-up" class="w-4 h-4"></i>
        </button>
        <div class="px-3 text-[9px] font-black uppercase tracking-widest text-tech-cyan border-x border-white/10">Bureaux & Formulaire</div>
        <button onclick="window.cmsEditor.moveSection('offices', 'down')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Descendre">
            <i data-lucide="chevron-down" class="w-4 h-4"></i>
        </button>
    </div>
    @endif

    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-20 items-start">
            <div data-aos="fade-right">
                <div class="text-tech-cyan font-bold text-xs uppercase tracking-[0.3em] mb-6">Nos Bureaux Régionaux</div>
                <x-cms-editable key="contact_bureaus_title"><h2 class="text-3xl md:text-4xl lg:text-5xl font-black text-tech-navy leading-tight mb-12">
                    Présence de <span class="text-tech-cyan">Proximité</span> en Afrique de l'Ouest.
                </h2></x-cms-editable>
                
                <div class="space-y-8">
                    <!-- Bureau 1: CI -->
                    <div class="p-8 rounded-[32px] border border-slate-100 bg-slate-50/50 hover:bg-white hover:shadow-xl transition-all group duration-500">
                        <div class="flex items-center space-x-6 mb-6">
                            <div class="w-14 h-14 bg-tech-navy rounded-2xl flex items-center justify-center shrink-0">
                                <x-cms-editable key="contact_office_ci_icon" type="icon">
                                    <i data-lucide="map-pin" class="w-7 h-7 text-tech-cyan"></i>
                                </x-cms-editable>
                            </div>
                            <div>
                                <x-cms-editable key="office_ci_title"><h4 class="text-xl font-black text-tech-navy">ARIC Côte d'Ivoire (Siège)</h4></x-cms-editable>
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Filiale du Groupe Conergies</p>
                            </div>
                        </div>
                        <div class="space-y-4 text-slate-600 font-medium ml-4 md:ml-20">
                            <x-cms-editable key="office_ci_addr"><p class="flex items-start"><i data-lucide="map" class="w-4 h-4 mr-3 mt-1 text-tech-cyan shrink-0"></i> Zone 4C, Rue des Majorettes, Abidjan</p></x-cms-editable>
                            <x-cms-editable key="office_ci_phone"><p class="flex items-center"><i data-lucide="phone" class="w-4 h-4 mr-3 text-tech-cyan shrink-0"></i> +225 27 21 21 00 00</p></x-cms-editable>
                            <x-cms-editable key="office_ci_mail"><p class="flex items-center"><i data-lucide="mail" class="w-4 h-4 mr-3 text-tech-cyan shrink-0"></i> contact@conergies.ci</p></x-cms-editable>
                        </div>
                        <div class="mt-8 ml-4 md:ml-20 flex space-x-4">
                            <a href="https://maps.google.com" target="_blank" class="px-6 py-3 bg-white border border-slate-200 rounded-xl text-xs font-bold text-tech-navy hover:bg-tech-navy hover:text-white transition-all flex items-center">
                                <i data-lucide="navigation" class="w-4 h-4 mr-2"></i> Itinéraire
                            </a>
                        </div>
                    </div>

                    <!-- Bureau 2: Mali -->
                    <div class="p-8 rounded-[32px] border border-slate-100 bg-slate-50/50 hover:bg-white hover:shadow-xl transition-all group duration-500">
                        <div class="flex items-center space-x-6 mb-6">
                            <div class="w-14 h-14 bg-tech-navy rounded-2xl flex items-center justify-center shrink-0">
                                <x-cms-editable key="contact_office_mali_icon" type="icon">
                                    <i data-lucide="map-pin" class="w-7 h-7 text-tech-cyan"></i>
                                </x-cms-editable>
                            </div>
                            <div>
                                <x-cms-editable key="office_mali_title"><h4 class="text-xl font-black text-tech-navy">ARIC Mali</h4></x-cms-editable>
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Bureau de Bamako</p>
                            </div>
                        </div>
                        <div class="space-y-4 text-slate-600 font-medium ml-4 md:ml-20">
                            <x-cms-editable key="office_mali_addr"><p class="flex items-start"><i data-lucide="map" class="w-4 h-4 mr-3 mt-1 text-tech-cyan shrink-0"></i> Zone Industrielle de Sotuba, Bamako</p></x-cms-editable>
                            <x-cms-editable key="office_mali_phone"><p class="flex items-center"><i data-lucide="phone" class="w-4 h-4 mr-3 text-tech-cyan shrink-0"></i> +223 20 21 15 15</p></x-cms-editable>
                        </div>
                        <div class="mt-8 ml-4 md:ml-20 flex space-x-4">
                            <a href="https://maps.google.com" target="_blank" class="px-6 py-3 bg-white border border-slate-200 rounded-xl text-xs font-bold text-tech-navy hover:bg-tech-navy hover:text-white transition-all flex items-center">
                                <i data-lucide="navigation" class="w-4 h-4 mr-2"></i> Itinéraire
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Section -->
            <div id="formulaire" class="relative" data-aos="fade-left">
                <div class="senior-glass p-8 md:p-16 rounded-[60px] border border-white/60 relative z-10 shadow-2xl">
                    <div class="mb-12">
                        <x-cms-editable key="form_title"><h3 class="text-3xl font-black text-tech-navy mb-4">Parlons de votre <span class="text-tech-cyan">projet</span>.</h3></x-cms-editable>
                        <x-cms-editable key="form_desc"><p class="text-slate-500 font-medium italic">Complétez ce formulaire et nos ingénieurs d'études reviendront vers vous avec une analyse préliminaire.</p></x-cms-editable>
                    </div>
                    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                        @csrf
                        <input type="hidden" name="form_type" value="Demande de contact">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest ml-4">Nom & Prénoms</label>
                                <input type="text" name="name" required class="w-full px-6 py-4 rounded-2xl bg-white border border-slate-200 focus:ring-4 focus:ring-tech-cyan/10 focus:border-tech-cyan outline-none transition-all font-bold text-sm">
                            </div>
                            <div class="space-y-2">
                                <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest ml-4">Email Pro</label>
                                <input type="email" name="email" required class="w-full px-6 py-4 rounded-2xl bg-white border border-slate-200 focus:ring-4 focus:ring-tech-cyan/10 focus:border-tech-cyan outline-none transition-all font-bold text-sm">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest ml-4">Spécialité</label>
                                <select name="specialty" class="w-full px-6 py-4 rounded-2xl bg-white border border-slate-200 focus:ring-4 focus:ring-tech-cyan/10 focus:border-tech-cyan outline-none transition-all font-bold text-sm text-slate-600">
                                    <option value="audit">Audit & Efficacité Énergétique</option>
                                    <option value="cvc">Génie Climatique / CVC</option>
                                    <option value="froid">Froid Industriel</option>
                                    <option value="maintenance">Maintenance Multitechnique</option>
                                </select>
                            </div>
                            <div class="space-y-2">
                                <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest ml-4">Téléphone</label>
                                <input type="tel" name="phone" class="w-full px-6 py-4 rounded-2xl bg-white border border-slate-200 focus:ring-4 focus:ring-tech-cyan/10 focus:border-tech-cyan outline-none transition-all font-bold text-sm">
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest ml-4">Votre Message</label>
                            <textarea name="message" rows="4" placeholder="Décrivez votre besoin..." class="w-full px-6 py-4 rounded-2xl bg-white border border-slate-200 focus:ring-4 focus:ring-tech-cyan/10 focus:border-tech-cyan outline-none transition-all font-bold text-sm"></textarea>
                        </div>
                         <button type="submit" class="w-full py-6 bg-tech-navy text-white rounded-[24px] font-black text-xs uppercase tracking-widest hover:bg-tech-cyan shadow-xl transition-all hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center relative group">
                            <x-cms-editable key="contact_form_submit_btn" buttonClass="-top-12 left-0 text-white">Envoyer ma demande <i data-lucide="arrow-right" class="w-5 h-5 ml-2"></i></x-cms-editable>
                         </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
