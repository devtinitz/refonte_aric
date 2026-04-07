<x-site.layout :title="isset($job) ? 'Modifier l\'offre' : 'Nouvelle offre'">
    <div class="min-h-screen pt-40 pb-20 bg-slate-50">
        <div class="max-w-4xl mx-auto px-6">
            <!-- Header -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-12">
                <div>
                    <h1 class="text-4xl font-black text-tech-navy uppercase tracking-tighter flex items-center gap-4">
                        <i data-lucide="{{ isset($job) ? 'edit-3' : 'plus' }}" class="w-10 h-10 text-tech-cyan"></i>
                        {{ isset($job) ? 'Modifier l\'offre' : 'Nouvelle offre' }}
                    </h1>
                    <p class="text-slate-400 font-bold uppercase text-[10px] tracking-[0.3em] mt-2">Détails de l'annonce de recrutement</p>
                </div>
                <a href="{{ route('cms.jobs.index') }}" class="px-6 py-3 bg-white border border-slate-200 rounded-2xl text-tech-navy text-xs font-black uppercase tracking-widest hover:shadow-lg transition-all flex items-center gap-2">
                    <i data-lucide="arrow-left" class="w-4 h-4"></i>
                    Retour à la liste
                </a>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-[40px] shadow-2xl shadow-slate-200/50 border border-slate-100 p-10 md:p-12 animate-in fade-in slide-in-from-bottom-8">
                <form action="{{ isset($job) ? route('cms.jobs.update', $job) : route('cms.jobs.store') }}" method="POST" class="space-y-10">
                    @csrf
                    @if(isset($job)) @method('PUT') @endif

                    <!-- Basic Info Section -->
                    <div class="space-y-8">
                        <div class="flex items-center gap-4 border-b border-slate-50 pb-6">
                            <div class="w-12 h-12 rounded-2xl bg-tech-cyan/10 flex items-center justify-center text-tech-cyan">
                                <i data-lucide="info" class="w-6 h-6"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-black text-tech-navy uppercase tracking-tight">Informations de base</h3>
                                <p class="text-[9px] text-slate-400 font-bold uppercase tracking-widest italic">Le contenu principal de l'offre</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-6">
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Titre du poste</label>
                                <input type="text" name="title" value="{{ $job->title ?? old('title') }}" required 
                                    class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-tech-navy font-bold focus:ring-2 focus:ring-tech-cyan transition-all"
                                    placeholder="ex: Technicien Frigoriste (H/F)">
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Catégorie</label>
                                    <select name="category" required class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-tech-navy font-bold focus:ring-2 focus:ring-tech-cyan transition-all italic">
                                        <option value="Technique" {{ (isset($job) && $job->category == 'Technique') ? 'selected' : '' }}>Technique</option>
                                        <option value="Management" {{ (isset($job) && $job->category == 'Management') ? 'selected' : '' }}>Management</option>
                                        <option value="Support" {{ (isset($job) && $job->category == 'Support') ? 'selected' : '' }}>Support</option>
                                        <option value="Expertise" {{ (isset($job) && $job->category == 'Expertise') ? 'selected' : '' }}>Expertise</option>
                                    </select>
                                </div>
                                <div class="space-y-2">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Type de Contrat</label>
                                    <select name="contract_type" required class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-tech-navy font-bold focus:ring-2 focus:ring-tech-cyan transition-all italic">
                                        <option value="CDI" {{ (isset($job) && $job->contract_type == 'CDI') ? 'selected' : '' }}>CDI</option>
                                        <option value="CDD" {{ (isset($job) && $job->contract_type == 'CDD') ? 'selected' : '' }}>CDD</option>
                                        <option value="Stage" {{ (isset($job) && $job->contract_type == 'Stage') ? 'selected' : '' }}>Stage</option>
                                        <option value="Mission" {{ (isset($job) && $job->contract_type == 'Mission') ? 'selected' : '' }}>Mission</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Lieu</label>
                                    <input type="text" name="location" value="{{ $job->location ?? old('location', 'Abidjan') }}" required 
                                        class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-tech-navy font-bold focus:ring-2 focus:ring-tech-cyan transition-all"
                                        placeholder="ex: Abidjan / Bamako">
                                </div>
                                <div class="space-y-2">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Expérience requise</label>
                                    <input type="text" name="experience" value="{{ $job->experience ?? old('experience') }}" 
                                        class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-tech-navy font-bold focus:ring-2 focus:ring-tech-cyan transition-all"
                                        placeholder="ex: 5-10 ans d'exp.">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Appearance Section -->
                    <div class="space-y-8">
                        <div class="flex items-center gap-4 border-b border-slate-50 pb-6">
                            <div class="w-12 h-12 rounded-2xl bg-tech-navy/5 flex items-center justify-center text-tech-navy">
                                <i data-lucide="layout" class="w-6 h-6"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-black text-tech-navy uppercase tracking-tight">Apparence & Paramètres</h3>
                                <p class="text-[9px] text-slate-400 font-bold uppercase tracking-widest italic">Visuels et options d'affichage</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Icône (Nom Lucide)</label>
                                <div class="flex gap-4">
                                    <div class="w-14 h-14 rounded-2xl bg-slate-100 flex items-center justify-center text-tech-navy border border-slate-200" id="icon-preview-box">
                                        <i data-lucide="{{ $job->icon ?? 'briefcase' }}" id="icon-preview"></i>
                                    </div>
                                    <input type="text" name="icon" id="icon-input" value="{{ $job->icon ?? old('icon', 'briefcase') }}" 
                                        class="flex-1 bg-slate-50 border-none rounded-2xl px-6 py-4 text-tech-navy font-bold focus:ring-2 focus:ring-tech-cyan transition-all"
                                        placeholder="ex: briefcase, wrench, zap...">
                                </div>
                                <p class="text-[9px] text-slate-300 font-bold uppercase ml-1 italic mt-2">Visitez lucide.dev pour voir les icônes disponibles</p>
                            </div>
                            
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Tags additionnels (ex: Urgent)</label>
                                <input type="text" name="tags" value="{{ $job->tags ?? old('tags') }}" 
                                    class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-tech-navy font-bold focus:ring-2 focus:ring-tech-cyan transition-all"
                                    placeholder="Séparés par des virgules">
                            </div>
                        </div>

                        <div class="flex items-center gap-6 p-6 rounded-3xl bg-slate-50 border border-slate-100">
                            <div class="flex-1">
                                <h4 class="text-sm font-black text-tech-navy uppercase tracking-tight mb-1">Statut de l'offre</h4>
                                <p class="text-[9px] text-slate-400 font-bold uppercase tracking-widest italic">Activer pour rendre l'offre visible sur le site</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" name="is_active" value="1" class="sr-only peer" {{ (!isset($job) || $job->is_active) ? 'checked' : '' }}>
                                <div class="w-14 h-8 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[4px] after:start-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-tech-cyan"></div>
                            </label>
                        </div>
                    </div>

                    <!-- Submit Area -->
                    <div class="flex justify-end gap-4 pt-6">
                        <a href="{{ route('cms.jobs.index') }}" class="px-10 py-5 text-slate-400 text-xs font-black uppercase tracking-[0.2em] hover:text-tech-navy transition-all">
                            Annuler
                        </a>
                        <button type="submit" class="px-10 py-5 bg-gradient-to-r from-tech-cyan to-tech-cobalt text-white text-xs font-black uppercase tracking-[0.2em] rounded-[24px] hover:scale-105 active:scale-95 transition-all shadow-xl shadow-tech-cyan/30">
                            {{ isset($job) ? 'Mettre à jour l\'offre' : 'Créer l\'offre' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Real-time icon preview update
        const iconInput = document.getElementById('icon-input');
        const iconPreviewBox = document.getElementById('icon-preview-box');
        
        iconInput?.addEventListener('input', (e) => {
            const iconName = e.target.value.trim();
            if (iconName) {
                // We recreate the icon element to trigger Lucide's refresh in a simplified way
                iconPreviewBox.innerHTML = `<i data-lucide="${iconName}"></i>`;
                lucide.createIcons();
            }
        });
    </script>
</x-site.layout>
