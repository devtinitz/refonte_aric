<!-- Testimonials Section -->
<section id="cms-section-testimonials" data-cms-section="testimonials" class="py-24 relative overflow-hidden bg-[#0a192f] text-white group/section">
    <!-- Section Controls -->
    @if(auth()->check())
    <div class="absolute top-4 left-1/2 -translate-x-1/2 z-[1000] opacity-0 group-hover/section:opacity-100 transition-all flex items-center bg-tech-navy/90 backdrop-blur-md rounded-2xl p-1 border border-white/10 shadow-2xl">
        <button onclick="window.cmsEditor.moveSection('testimonials', 'up')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Monter">
            <i data-lucide="chevron-up" class="w-4 h-4"></i>
        </button>
        <div class="px-3 text-[9px] font-black uppercase tracking-widest text-tech-cyan border-x border-white/10">Références</div>
        <button onclick="window.cmsEditor.moveSection('testimonials', 'down')" class="p-2 hover:bg-white/10 rounded-xl text-white transition-colors" title="Descendre">
            <i data-lucide="chevron-down" class="w-4 h-4"></i>
        </button>
    </div>
    @endif

    <div class="absolute inset-0 grid-pattern opacity-10"></div>
    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="text-center mb-20" data-aos="fade-up">
            <x-cms-editable key="ref_section_badge"><h2 class="text-sm font-black text-tech-cyan uppercase tracking-[0.2em] mb-4">Références</h2></x-cms-editable>
            <x-cms-editable key="ref_section_title"><h3 class="text-4xl font-extrabold">Ils nous font confiance</h3></x-cms-editable>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="glass p-8 rounded-3xl border border-white/5" data-aos="fade-up" data-aos-delay="100">
                <x-cms-editable key="testimonial_1_quote"><p class="text-gray-300 italic mb-8">"Grâce aux audits énergétiques de Conergies, nous avons réduit notre facture d'électricité de 20%."</p></x-cms-editable>
                <div class="flex items-center">
                    <div class="w-12 h-12 rounded-full bg-tech-cobalt mr-4 overflow-hidden">
                        <x-cms-editable key="testimonial_1_avatar" type="media">
                            <img src="https://i.pravatar.cc/150?u=1" alt="Avatar">
                        </x-cms-editable>
                    </div>
                    <div>
                        <x-cms-editable key="testimonial_1_name"><div class="font-bold text-white">Jean-Luc Keffi</div></x-cms-editable>
                        <x-cms-editable key="testimonial_1_role"><div class="text-xs text-tech-cyan font-bold uppercase tracking-widest">Dir. Exploitation</div></x-cms-editable>
                    </div>
                </div>
            </div>
            <div class="glass p-8 rounded-3xl border border-tech-cyan/30 bg-tech-cyan/5" data-aos="fade-up" data-aos-delay="200">
                <x-cms-editable key="testimonial_2_quote"><p class="text-gray-300 italic mb-8">"La réactivité de l'assistance 24/7 est cruciale pour notre chaîne de froid. Équipe au top."</p></x-cms-editable>
                <div class="flex items-center">
                    <div class="w-12 h-12 rounded-full bg-tech-cobalt mr-4 overflow-hidden">
                        <x-cms-editable key="testimonial_2_avatar" type="media">
                            <img src="https://i.pravatar.cc/150?u=2" alt="Avatar">
                        </x-cms-editable>
                    </div>
                    <div>
                        <x-cms-editable key="testimonial_2_name"><div class="font-bold text-white">Moussa Traoré</div></x-cms-editable>
                        <x-cms-editable key="testimonial_2_role"><div class="text-xs text-tech-cyan font-bold uppercase tracking-widest">Resp. Technique</div></x-cms-editable>
                    </div>
                </div>
            </div>
            <div class="glass p-8 rounded-3xl border border-white/5" data-aos="fade-up" data-aos-delay="300">
                <x-cms-editable key="testimonial_3_quote"><p class="text-gray-300 italic mb-8">"Leur expertise en CVC nous a permis d'optimiser le confort tout en diminuant nos émissions."</p></x-cms-editable>
                <div class="flex items-center">
                    <div class="w-12 h-12 rounded-full bg-tech-cobalt mr-4 overflow-hidden">
                        <x-cms-editable key="testimonial_3_avatar" type="media">
                            <img src="https://i.pravatar.cc/150?u=3" alt="Avatar">
                        </x-cms-editable>
                    </div>
                    <div>
                        <x-cms-editable key="testimonial_3_name"><div class="font-bold text-white">Isabelle Durand</div></x-cms-editable>
                        <x-cms-editable key="testimonial_3_role"><div class="text-xs text-tech-cyan font-bold uppercase tracking-widest">DG Groupe Hôtelier</div></x-cms-editable>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
