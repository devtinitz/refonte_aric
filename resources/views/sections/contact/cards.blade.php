<!-- Quick Contact Cards -->
<section id="contact-section-cards" data-cms-section="cards" class="relative md:-mt-20 -mt-10 z-20 pb-20 group/section">
    <!-- Section Controls -->
    @if(auth()->check())
    <div class="absolute top-4 left-1/2 -translate-x-1/2 z-[1000] opacity-0 group-hover/section:opacity-100 transition-all flex items-center bg-tech-navy/90 backdrop-blur-md rounded-2xl p-1 border border-white/10 shadow-2xl">
        <button onclick="window.cmsEditor.moveSection('cards', 'up')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Monter">
            <i data-lucide="chevron-up" class="w-4 h-4"></i>
        </button>
        <div class="px-3 text-[9px] font-black uppercase tracking-widest text-tech-cyan border-x border-white/10">Cartes de contact</div>
        <button onclick="window.cmsEditor.moveSection('cards', 'down')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Descendre">
            <i data-lucide="chevron-down" class="w-4 h-4"></i>
        </button>
    </div>
    @endif

    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Phone Card -->
            <a href="tel:+2252721210000" class="senior-glass p-10 rounded-[40px] flex flex-col items-center text-center group transition-all duration-500 hover:-translate-y-2 border-white/60 shadow-xl" data-aos="fade-up">
                <div class="w-20 h-20 bg-tech-cyan/10 rounded-3xl flex items-center justify-center mb-8 group-hover:scale-110 transition-transform duration-500">
                    <x-cms-editable key="contact_card_phone_icon" type="icon">
                        <i data-lucide="phone-call" class="w-10 h-10 text-tech-cyan"></i>
                    </x-cms-editable>
                </div>
                <h3 class="text-xs font-black text-slate-400 uppercase tracking-[0.3em] mb-3">Téléphone</h3>
                <x-cms-editable key="contact_phone_val"><p class="text-xl font-black text-tech-navy">+225 27 21 21 00 00</p></x-cms-editable>
                <span class="mt-4 text-xs font-bold text-tech-cyan flex items-center uppercase tracking-widest opacity-0 group-hover:opacity-100 transition-all text-balance">Appeler maintenant <i data-lucide="chevron-right" class="w-4 h-4 ml-1"></i></span>
            </a>

            <!-- Email Card -->
            <a href="mailto:contact@conergies.ci" class="senior-glass p-10 rounded-[40px] flex flex-col items-center text-center group transition-all duration-500 hover:-translate-y-2 border-white/60 shadow-xl" data-aos="fade-up" data-aos-delay="100">
                <div class="w-20 h-20 bg-tech-cyan/10 rounded-3xl flex items-center justify-center mb-8 group-hover:scale-110 transition-transform duration-500">
                    <x-cms-editable key="contact_card_email_icon" type="icon" class="flex items-center justify-center">
                        <i data-lucide="mail" class="w-10 h-10 text-tech-cyan"></i>
                    </x-cms-editable>
                </div>
                <h3 class="text-xs font-black text-slate-400 uppercase tracking-[0.3em] mb-3">Email Support</h3>
                <x-cms-editable key="contact_email_val"><p class="text-xl font-black text-tech-navy">contact@conergies.ci</p></x-cms-editable>
                <span class="mt-4 text-xs font-bold text-tech-cyan flex items-center uppercase tracking-widest opacity-0 group-hover:opacity-100 transition-all text-balance">Écrire un message <i data-lucide="chevron-right" class="w-4 h-4 ml-1"></i></span>
            </a>

            <!-- WhatsApp Card -->
            <a href="https://wa.me/2250707070707" target="_blank" class="senior-glass p-10 rounded-[40px] flex flex-col items-center text-center group transition-all duration-500 hover:-translate-y-2 border-white/60 shadow-xl" data-aos="fade-up" data-aos-delay="200">
                <div class="w-20 h-20 bg-green-500/10 rounded-3xl flex items-center justify-center mb-8 group-hover:scale-110 transition-transform duration-500">
                    <x-cms-editable key="contact_card_whatsapp_icon" type="icon" class="flex items-center justify-center">
                        <i data-lucide="message-circle" class="w-10 h-10 text-green-500"></i>
                    </x-cms-editable>
                </div>
                <h3 class="text-xs font-black text-slate-400 uppercase tracking-[0.3em] mb-3">WhatsApp</h3>
                <p class="text-xl font-black text-tech-navy">Chat en direct</p>
                <span class="mt-4 text-xs font-bold text-green-500 flex items-center uppercase tracking-widest opacity-0 group-hover:opacity-100 transition-all text-balance">Démarrer le chat <i data-lucide="chevron-right" class="w-4 h-4 ml-1"></i></span>
            </a>
        </div>
    </div>
</section>
