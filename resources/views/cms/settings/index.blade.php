<x-site.layout title="Paramètres du Site">
    <div class="min-h-screen pt-40 pb-20 bg-slate-50">
        <div class="max-w-4xl mx-auto px-6">
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-12">
                <div>
                    <h1 class="text-4xl font-black text-tech-navy uppercase tracking-tighter flex items-center gap-4">
                        <i data-lucide="settings" class="w-10 h-10 text-tech-cyan"></i>
                        Paramètres Généraux
                    </h1>
                    <p class="text-slate-400 font-bold uppercase text-[10px] tracking-[0.3em] mt-2">Configuration globale du site et des contacts</p>
                </div>
                <a href="{{ route('home') }}" class="px-6 py-3 bg-white border border-slate-200 rounded-2xl text-tech-navy text-xs font-black uppercase tracking-widest hover:shadow-lg transition-all flex items-center gap-2">
                    <i data-lucide="arrow-left" class="w-4 h-4"></i>
                    Retour au site
                </a>
            </div>

            @if(session('success'))
                <div class="mb-8 p-4 bg-green-50 border border-green-100 rounded-2xl flex items-center gap-3 text-green-600 animate-in fade-in slide-in-from-top-4">
                    <i data-lucide="check-circle" class="w-5 h-5"></i>
                    <p class="text-xs font-bold uppercase tracking-widest">{{ session('success') }}</p>
                </div>
            @endif

            <form action="{{ route('cms.settings.update') }}" method="POST" class="space-y-8">
                @csrf
                
                <!-- Contact Info Section -->
                <div class="bg-white rounded-[40px] shadow-xl shadow-slate-200/50 border border-slate-100 p-10">
                    <div class="flex items-center gap-4 mb-10 border-b border-slate-50 pb-6">
                        <div class="w-12 h-12 rounded-2xl bg-tech-cyan/10 flex items-center justify-center text-tech-cyan">
                            <i data-lucide="phone" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-black text-tech-navy uppercase tracking-tight">Coordonnées</h3>
                            <p class="text-[9px] text-slate-400 font-bold uppercase tracking-widest">Informations de contact affichées sur le site</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Téléphone Principal</label>
                            <input type="text" name="site.phone" value="{{ $settings['site.phone'] ?? '' }}" 
                                class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-tech-navy font-bold focus:ring-2 focus:ring-tech-cyan transition-all"
                                placeholder="+225 00 00 00 00 00">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Email de Contact</label>
                            <input type="email" name="site.email.contact" value="{{ $settings['site.email.contact'] ?? '' }}" 
                                class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-tech-navy font-bold focus:ring-2 focus:ring-tech-cyan transition-all"
                                placeholder="contact@aric.ci">
                        </div>
                        <div class="md:col-span-2 space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Adresse Physique</label>
                            <textarea name="site.address" rows="2" 
                                class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-tech-navy font-bold focus:ring-2 focus:ring-tech-cyan transition-all"
                                placeholder="Abidjan, Côte d'Ivoire...">{{ $settings['site.address'] ?? '' }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Recruitment Section -->
                <div class="bg-white rounded-[40px] shadow-xl shadow-slate-200/50 border border-slate-100 p-10 border-l-4 border-l-tech-cyan">
                    <div class="flex items-center gap-4 mb-10 border-b border-slate-50 pb-6">
                        <div class="w-12 h-12 rounded-2xl bg-tech-cyan/10 flex items-center justify-center text-tech-cyan">
                            <i data-lucide="briefcase" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-black text-tech-navy uppercase tracking-tight">Recrutement</h3>
                            <p class="text-[9px] text-slate-400 font-bold uppercase tracking-widest">Où envoyer les candidatures</p>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Email Destinataire des CV</label>
                        <input type="email" name="site.email.recruitment" value="{{ $settings['site.email.recruitment'] ?? '' }}" 
                            class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-tech-navy font-bold focus:ring-2 focus:ring-tech-cyan transition-all"
                            placeholder="rh@aric.ci">
                    </div>
                </div>

                <!-- Social Media Section -->
                <div class="bg-white rounded-[40px] shadow-xl shadow-slate-200/50 border border-slate-100 p-10">
                    <div class="flex items-center gap-4 mb-10 border-b border-slate-50 pb-6">
                        <div class="w-12 h-12 rounded-2xl bg-tech-navy/5 flex items-center justify-center text-tech-navy">
                            <i data-lucide="share-2" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-black text-tech-navy uppercase tracking-tight">Réseaux Sociaux</h3>
                            <p class="text-[9px] text-slate-400 font-bold uppercase tracking-widest">Liens vers vos profils sociaux</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1 flex items-center gap-2">
                                <i data-lucide="facebook" class="w-3 h-3"></i> Facebook
                            </label>
                            <input type="url" name="site.social.facebook" value="{{ $settings['site.social.facebook'] ?? '' }}" 
                                class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-tech-navy font-bold focus:ring-2 focus:ring-tech-cyan transition-all"
                                placeholder="https://facebook.com/...">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1 flex items-center gap-2">
                                <i data-lucide="linkedin" class="w-3 h-3"></i> LinkedIn
                            </label>
                            <input type="url" name="site.social.linkedin" value="{{ $settings['site.social.linkedin'] ?? '' }}" 
                                class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-tech-navy font-bold focus:ring-2 focus:ring-tech-cyan transition-all"
                                placeholder="https://linkedin.com/company/...">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1 flex items-center gap-2">
                                <i data-lucide="instagram" class="w-3 h-3"></i> Instagram
                            </label>
                            <input type="url" name="site.social.instagram" value="{{ $settings['site.social.instagram'] ?? '' }}" 
                                class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-tech-navy font-bold focus:ring-2 focus:ring-tech-cyan transition-all"
                                placeholder="https://instagram.com/...">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1 flex items-center gap-2">
                                <i data-lucide="twitter" class="w-3 h-3"></i> Twitter / X
                            </label>
                            <input type="url" name="site.social.twitter" value="{{ $settings['site.social.twitter'] ?? '' }}" 
                                class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-tech-navy font-bold focus:ring-2 focus:ring-tech-cyan transition-all"
                                placeholder="https://twitter.com/...">
                        </div>
                    </div>
                </div>

                <!-- Submit Area -->
                <div class="flex justify-end gap-4 items-center">
                    <p class="text-[9px] text-slate-400 font-bold uppercase tracking-widest max-w-[200px] text-right">
                        Les changements sont enregistrés en brouillon. Pensez à publier.
                    </p>
                    <button type="submit" class="px-10 py-5 bg-gradient-to-r from-tech-cyan to-tech-cobalt text-white text-xs font-black uppercase tracking-[0.2em] rounded-[24px] hover:scale-105 active:scale-95 transition-all shadow-xl shadow-tech-cyan/30">
                        Enregistrer les Paramètres
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-site.layout>
