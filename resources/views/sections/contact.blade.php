<!-- Contact Section -->
<section id="cms-section-contact" data-cms-section="contact" class="py-24 relative group/section">
    <!-- Section Controls -->
    @if(auth()->check())
    <div class="absolute top-4 left-1/2 -translate-x-1/2 z-[1000] opacity-0 group-hover/section:opacity-100 transition-all flex items-center bg-tech-navy/90 backdrop-blur-md rounded-2xl p-1 border border-white/10 shadow-2xl">
        <button onclick="window.cmsEditor.moveSection('contact', 'up')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Monter">
            <i data-lucide="chevron-up" class="w-4 h-4"></i>
        </button>
        <div class="px-3 text-[9px] font-black uppercase tracking-widest text-tech-cyan border-x border-white/10">Contact</div>
        <button onclick="window.cmsEditor.moveSection('contact', 'down')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Descendre">
            <i data-lucide="chevron-down" class="w-4 h-4"></i>
        </button>
    </div>
    @endif

    <div class="max-w-7xl mx-auto px-6">
        <div class="glass rounded-[60px] p-12 lg:p-20 overflow-hidden relative shadow-2xl border border-white/40">
            <div class="absolute top-0 right-0 w-1/2 h-full bg-tech-cyan/5 -skew-x-12 translate-x-1/2"></div>
            
            <div class="grid lg:grid-cols-2 gap-20 relative z-10">
                <div data-aos="fade-right">
                    <x-cms-editable key="contact_section_title"><h2 class="text-4xl font-extrabold mb-8 text-tech-navy">Prêt à optimiser vos installations ?</h2></x-cms-editable>
                    <x-cms-editable key="contact_section_desc">
                        <p class="text-lg text-slate-600 mb-12 leading-relaxed font-medium">
                            Contactez nos experts pour un audit gratuit ou une demande de devis. Nos équipes vous répondent sous 24h.
                        </p>
                    </x-cms-editable>
                    <div class="space-y-6 text-slate-700">
                        <div class="flex items-start">
                            <div class="w-12 h-12 rounded-2xl bg-tech-cyan/10 flex items-center justify-center mr-6 shrink-0">
                                <i data-lucide="map-pin" class="text-tech-cyan"></i>
                            </div>
                            <div>
                                <div class="font-bold mb-1">Siège Social</div>
                                <div class="text-slate-500 font-medium">Zone 4C, Rue des Majorettes, Abidjan, Côte d'Ivoire</div>
                            </div>
                        </div>
                    </div>
                </div>

                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6" data-aos="fade-left">
                    @csrf
                    <input type="hidden" name="form_type" value="Demande de projet">
                    <div class="grid md:grid-cols-2 gap-6">
                        <input type="text" name="name" placeholder="Nom complet" required class="w-full bg-white/60 border border-black/5 rounded-2xl px-6 py-4 focus:border-tech-cyan focus:outline-none transition-colors font-bold text-sm">
                        <input type="email" name="email" placeholder="Email professionnel" required class="w-full bg-white/60 border border-black/5 rounded-2xl px-6 py-4 focus:border-tech-cyan focus:outline-none transition-colors font-bold text-sm">
                    </div>
                    <textarea name="message" rows="4" placeholder="Votre besoin technique..." class="w-full bg-white/60 border border-black/5 rounded-2xl px-6 py-4 focus:border-tech-cyan focus:outline-none transition-colors font-bold text-sm"></textarea>
                    <button type="submit" class="w-full py-5 bg-tech-cyan text-white font-black rounded-2xl hover:scale-[1.02] transition-transform shadow-xl uppercase tracking-widest text-xs relative">
                        <x-cms-editable key="contact_form_button" buttonClass="-top-6 right-0">Envoyer la demande</x-cms-editable>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
