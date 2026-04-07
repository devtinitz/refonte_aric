<footer class="relative bg-gradient-to-b from-white to-slate-50 text-slate-600 py-16 md:py-24 overflow-hidden border-t border-slate-100">
    <div class="absolute top-0 left-0 w-full h-1 bg-[#00a4bd]"></div>
    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12 md:mb-20">
            <div>
                <x-cms-editable key="footer_logo" type="media">
                    <img src="/logo.png" alt="ARIC Solutions Logo" class="h-20 w-auto mb-8 drop-shadow-sm">
                </x-cms-editable>
                <x-cms-editable key="footer_description">
                    <p class="text-slate-500 text-sm leading-relaxed mb-8 font-medium">
                        Leader multitechnique en Afrique de l'Ouest. Filiale du Groupe Conergies. Innovation, Performance & Durabilité.
                    </p>
                </x-cms-editable>
                <div class="flex space-x-4">
                    @if(cms_setting('site.social.linkedin'))
                    <a href="{{ cms_setting('site.social.linkedin') }}" target="_blank" class="w-12 h-12 rounded-2xl bg-white border border-slate-200 flex items-center justify-center text-slate-500 hover:text-[#00a4bd] hover:border-[#00a4bd] hover:scale-110 transition-all shadow-sm group/social">
                        <i data-lucide="linkedin" class="w-6 h-6"></i>
                    </a>
                    @endif
                    @if(cms_setting('site.social.facebook'))
                    <a href="{{ cms_setting('site.social.facebook') }}" target="_blank" class="w-12 h-12 rounded-2xl bg-white border border-slate-200 flex items-center justify-center text-slate-500 hover:text-[#00a4bd] hover:border-[#00a4bd] hover:scale-110 transition-all shadow-sm group/social">
                        <i data-lucide="facebook" class="w-6 h-6"></i>
                    </a>
                    @endif
                    @if(cms_setting('site.social.instagram'))
                    <a href="{{ cms_setting('site.social.instagram') }}" target="_blank" class="w-12 h-12 rounded-2xl bg-white border border-slate-200 flex items-center justify-center text-slate-500 hover:text-[#00a4bd] hover:border-[#00a4bd] hover:scale-110 transition-all shadow-sm group/social">
                        <i data-lucide="instagram" class="w-6 h-6"></i>
                    </a>
                    @endif
                </div>
            </div>
            <div>
                <x-cms-editable key="footer_col_1_title"><h5 class="font-bold mb-8 text-slate-900 uppercase text-xs tracking-widest border-l-4 border-[#00a4bd] pl-4">Filiales & Accès</h5></x-cms-editable>
                <ul class="space-y-4 text-sm text-slate-600 font-semibold">
                    <li><x-cms-editable key="footer_link_1"><a href="/about" class="hover:text-[#00a4bd] transition-colors">ARIC – Côte d'Ivoire</a></x-cms-editable></li>
                    <li><x-cms-editable key="footer_link_2"><a href="/about" class="hover:text-[#00a4bd] transition-colors">ARIC – Mali</a></x-cms-editable></li>
                    <li><x-cms-editable key="footer_link_3"><a href="/expertise" class="hover:text-[#00a4bd] transition-colors">Espace Projets</a></x-cms-editable></li>
                    <li><x-cms-editable key="footer_link_4"><a href="/recrutement" class="hover:text-[#00a4bd] transition-colors">Recrutement</a></x-cms-editable></li>
                </ul>
            </div>
            <div>
                <x-cms-editable key="footer_col_2_title"><h5 class="font-bold mb-8 text-slate-900 uppercase text-xs tracking-widest border-l-4 border-[#00a4bd] pl-4">Expertise</h5></x-cms-editable>
                <ul class="space-y-4 text-sm text-slate-600 font-semibold">
                    <li><x-cms-editable key="footer_exp_link_1"><a href="/expertise" class="hover:text-[#00a4bd] transition-colors">Génie Climatique</a></x-cms-editable></li>
                    <li><x-cms-editable key="footer_exp_link_2"><a href="/expertise" class="hover:text-[#00a4bd] transition-colors">Froid Industriel</a></x-cms-editable></li>
                    <li><x-cms-editable key="footer_exp_link_3"><a href="/expertise" class="hover:text-[#00a4bd] transition-colors">GTB & Smart Monitoring</a></x-cms-editable></li>
                    <li><x-cms-editable key="footer_exp_link_4"><a href="/services" class="hover:text-[#00a4bd] transition-colors">Maintenance Multitechnique</a></x-cms-editable></li>
                </ul>
            </div>
            <div>
                <x-cms-editable key="footer_col_3_title"><h5 class="font-bold mb-8 text-slate-900 uppercase text-xs tracking-widest border-l-4 border-[#00a4bd] pl-4">Nous Contacter</h5></x-cms-editable>
                <ul class="space-y-6">
                    <li class="flex items-start space-x-3 text-sm font-semibold max-w-[200px]">
                        <i data-lucide="map-pin" class="w-5 h-5 text-tech-cyan shrink-0"></i>
                        <span>{{ cms_setting('site.address', 'Zone 4C, Rue des Majorettes, Abidjan, CI') }}</span>
                    </li>
                    <li class="flex items-center space-x-3 text-sm font-semibold">
                        <i data-lucide="phone" class="w-5 h-5 text-tech-cyan shrink-0"></i>
                        <a href="tel:{{ cms_setting('site.phone', '+225 27 21 21 00 00') }}" class="hover:text-tech-cyan transition-colors">
                            {{ cms_setting('site.phone', '+225 27 21 21 00 00') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="pt-10 border-t border-slate-100 flex flex-col md:flex-row justify-between items-center gap-6 text-xs text-slate-400 font-bold uppercase tracking-widest">
            <div>© 2026 ARIC Solutions. Tous droits réservés.</div>
            <div class="flex space-x-8">
                <a href="/contact" class="hover:text-[#00a4bd] transition-colors">Mentions Légales</a>
                <a href="/contact" class="hover:text-[#00a4bd] transition-colors">Confidentialité</a>
                @if(!auth()->check())
                    <a href="{{ route('cms.login') }}" class="text-slate-200 hover:text-tech-cyan transition-colors flex items-center gap-2 group">
                        <i data-lucide="lock" class="w-3 h-3 opacity-20 group-hover:opacity-100 transition-opacity"></i>
                        <span>Espace Administration</span>
                    </a>
                @endif
            </div>
        </div>
    </div>
</footer>

<!-- Assistance Button -->
<div class="fixed bottom-4 right-4 md:bottom-10 md:right-10 z-[100]" data-aos="fade-left" data-aos-delay="1000">
    <button id="assistance-btn" class="group flex items-center gap-2 md:gap-4 p-3 md:px-6 md:py-4 rounded-full text-white transition-all hover:scale-105 active:scale-95 shadow-2xl bg-[#ef0032] assistance-pulse relative">
        <div class="p-1 md:p-2 bg-white/10 rounded-full group-hover:rotate-12 transition-transform">
            <i data-lucide="headset" class="w-5 h-5 md:w-6 md:h-6"></i>
        </div>
        <span class="font-black tracking-widest text-xs md:text-sm uppercase hidden sm:inline">
            <x-cms-editable key="sos_btn_label" buttonClass="-top-10 left-0">Assistance 24/7</x-cms-editable>
        </span>
        <span class="font-black tracking-widest text-[10px] uppercase inline sm:hidden">SOS 24/7</span>
    </button>
</div>

<!-- Assistance Card -->
<div id="assistance-card" class="fixed inset-0 z-[110] flex items-center justify-center sm:items-end sm:justify-end pointer-events-none p-4 sm:p-10 opacity-0 invisible transition-all duration-300">
    <div id="assistance-overlay" class="absolute inset-0 bg-tech-navy/40 backdrop-blur-sm pointer-events-auto cursor-pointer"></div>
    <div class="relative w-full max-w-md bg-white rounded-[40px] shadow-2xl overflow-hidden pointer-events-auto transform translate-y-10 transition-transform duration-300 border border-slate-100">
        <div class="p-8 md:p-10">
            <div class="flex justify-between items-start mb-8">
                <div>
                    <x-cms-editable key="sos_badge"><div class="text-[10px] font-black text-tech-cyan uppercase tracking-[0.3em] mb-2">Support Technique</div></x-cms-editable>
                    <x-cms-editable key="sos_title"><h3 class="text-2xl font-black text-tech-navy">SOS Assistance</h3></x-cms-editable>
                </div>
                <button id="close-assistance" class="w-10 h-10 flex items-center justify-center rounded-full bg-slate-50 hover:bg-slate-100 transition-colors">
                    <i data-lucide="x" class="w-5 h-5 text-slate-400"></i>
                </button>
            </div>
            
            <div class="space-y-4">
                <div class="p-6 rounded-3xl bg-slate-50 border border-slate-100">
                    <div class="flex items-center space-x-4 mb-4">
                        <div class="w-10 h-10 bg-[#ef0032]/10 rounded-xl flex items-center justify-center">
                            <i data-lucide="phone-call" class="w-5 h-5 text-[#ef0032]"></i>
                        </div>
                        <x-cms-editable key="sos_hotline_label"><span class="font-black text-sm uppercase tracking-widest text-tech-navy">Hotlines Directes</span></x-cms-editable>
                    </div>
                    <div class="space-y-3 pl-2">
                        <a href="tel:+2252721212121" class="flex justify-between items-center group relative">
                            <x-cms-editable key="sos_hotline_civ_label" buttonClass="-top-6 left-0"><span class="text-xs font-bold text-slate-500 uppercase tracking-wider">CIV</span></x-cms-editable>
                            <x-cms-editable key="sos_hotline_civ_val" buttonClass="-top-6 right-0"><span class="text-sm font-black text-tech-navy group-hover:text-[#ef0032] transition-colors">+225 27 21 21 21 21</span></x-cms-editable>
                        </a>
                        <a href="tel:+22320211515" class="flex justify-between items-center group text-right relative">
                            <x-cms-editable key="sos_hotline_mali_label" buttonClass="-top-6 left-0"><span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Mali</span></x-cms-editable>
                            <x-cms-editable key="sos_hotline_mali_val" buttonClass="-top-6 right-0"><span class="text-sm font-black text-tech-navy group-hover:text-[#ef0032] transition-colors">+223 20 21 15 15</span></x-cms-editable>
                        </a>
                    </div>
                </div>

                <a href="https://wa.me/2250707070707" target="_blank" class="flex items-center space-x-4 p-5 rounded-3xl bg-green-500/5 border border-green-500/10 hover:bg-green-500/10 transition-colors group">
                    <div class="w-10 h-10 bg-green-500/10 rounded-xl flex items-center justify-center text-green-600"><i data-lucide="message-circle" class="w-5 h-5"></i></div>
                    <div class="flex-1">
                        <div class="text-[10px] font-black text-green-600 uppercase tracking-widest mb-1">WhatsApp Business</div>
                        <div class="text-sm font-black text-tech-navy">Expertise en direct</div>
                    </div>
                </a>
            </div>

            <div class="mt-8 relative group">
                <x-cms-editable key="sos_intervention_btn" buttonClass="-top-12 left-0">
                    <a href="/contact" class="block w-full py-5 bg-[#0a192f] text-white text-center font-black rounded-2xl hover:scale-[1.02] transition-transform shadow-xl">
                        Intervention d'Urgence
                    </a>
                </x-cms-editable>
            </div>
        </div>
    </div>
</div>

<script>
    const assistBtn = document.getElementById('assistance-btn');
    const assistCard = document.getElementById('assistance-card');
    const assistOverlay = document.getElementById('assistance-overlay');
    const closeAssist = document.getElementById('close-assistance');

    assistBtn?.addEventListener('click', () => {
        assistCard.classList.remove('invisible', 'opacity-0');
        assistCard.querySelector('.relative').classList.replace('translate-y-10', 'translate-y-0');
    });

    [assistOverlay, closeAssist].forEach(el => {
        el?.addEventListener('click', () => {
            assistCard.classList.add('invisible', 'opacity-0');
            assistCard.querySelector('.relative').classList.replace('translate-y-0', 'translate-y-10');
        });
    });
</script>
