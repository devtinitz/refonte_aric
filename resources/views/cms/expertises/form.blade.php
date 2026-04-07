<x-site.layout :title="isset($expertise) ? 'Modifier l\'expertise' : 'Nouvelle expertise'">
    <div class="min-h-screen pt-40 pb-20 bg-slate-50">
        <div class="max-w-4xl mx-auto px-6">
            <!-- Header -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-12">
                <div>
                    <h1 class="text-4xl font-black text-tech-navy uppercase tracking-tighter flex items-center gap-4">
                        <i data-lucide="{{ isset($expertise) ? 'edit-3' : 'plus-circle' }}" class="w-10 h-10 text-tech-cyan"></i>
                        {{ isset($expertise) ? 'Modifier l\'expertise' : 'Nouvelle expertise' }}
                    </h1>
                    <p class="text-slate-400 font-bold uppercase text-[10px] tracking-[0.3em] mt-2">Détail des compétences et métiers du groupe</p>
                </div>
                <a href="{{ route('cms.expertises.index') }}" class="px-6 py-3 bg-white border border-slate-200 rounded-2xl text-tech-navy text-xs font-black uppercase tracking-widest hover:shadow-lg transition-all flex items-center gap-2">
                    <i data-lucide="arrow-left" class="w-4 h-4"></i>
                    Retour à la liste
                </a>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-[40px] shadow-2xl shadow-slate-200/50 border border-slate-100 p-10 md:p-12 animate-in fade-in slide-in-from-bottom-8">
                <form action="{{ isset($expertise) ? route('cms.expertises.update', $expertise) : route('cms.expertises.store') }}" method="POST" enctype="multipart/form-data" class="space-y-12">
                    @csrf
                    @if(isset($expertise)) @method('PUT') @endif

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                        <!-- Left Column: Icon & Image Selection -->
                        <div class="space-y-8">
                            <!-- Icon Selector -->
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Icône du métier</label>
                                <div class="bg-slate-50 rounded-3xl p-8 flex flex-col items-center justify-center border border-slate-100 shadow-inner group transition-all">
                                    <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center text-tech-cyan shadow-xl ring-4 ring-slate-100 mb-4 group-focus-within:ring-tech-cyan/20 transition-all">
                                        <i data-lucide="{{ $expertise->icon ?? 'snowflake' }}" id="icon-preview" class="w-8 h-8"></i>
                                    </div>
                                    <input type="text" name="icon" id="icon-input" value="{{ $expertise->icon ?? 'snowflake' }}" required 
                                        class="w-full bg-white border-none rounded-xl px-4 py-2 text-center text-tech-navy font-black text-xs uppercase tracking-widest focus:ring-2 focus:ring-tech-cyan transition-all"
                                        placeholder="ex: snowflake">
                                </div>
                            </div>

                            <!-- Image Upload -->
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Image de couverture (Page Expertise)</label>
                                <div class="aspect-[16/10] bg-slate-50 rounded-3xl border-2 border-dashed border-slate-200 relative overflow-hidden group cursor-pointer hover:border-tech-cyan transition-all">
                                    @if(isset($expertise) && $expertise->image)
                                        <img src="{{ $expertise->image }}" id="image-preview" class="w-full h-full object-cover">
                                    @else
                                        <div id="image-placeholder" class="w-full h-full flex flex-col items-center justify-center text-slate-300">
                                            <i data-lucide="image-plus" class="w-8 h-8 mb-2"></i>
                                            <span class="text-[8px] font-black uppercase tracking-widest leading-tight px-4 text-center">Cliquez pour ajouter une image</span>
                                        </div>
                                        <img id="image-preview" class="w-full h-full object-cover hidden">
                                    @endif
                                    <input type="file" name="image_file" id="image-input" class="absolute inset-0 opacity-0 cursor-pointer" accept="image/*">
                                </div>
                            </div>
                        </div>

                        <!-- Right Column: Details -->
                        <div class="lg:col-span-2 space-y-8">
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Titre de l'expertise</label>
                                <input type="text" name="title" value="{{ $expertise->title ?? old('title') }}" required 
                                    class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-tech-navy font-bold text-xl focus:ring-2 focus:ring-tech-cyan transition-all"
                                    placeholder="ex: Froid Commercial & Industriel">
                            </div>

                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Lien de destination (URL)</label>
                                <input type="text" name="link" value="{{ $expertise->link ?? old('link') }}" 
                                    class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-tech-navy font-bold focus:ring-2 focus:ring-tech-cyan transition-all"
                                    placeholder="ex: /expertise-industrie">
                                <p class="text-[9px] text-slate-400 font-bold uppercase tracking-widest ml-1 mt-1 italic">Laissez vide si l'élément n'est pas cliquable.</p>
                            </div>

                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Description</label>
                                <textarea name="description" required rows="6" 
                                    class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-tech-navy font-medium focus:ring-2 focus:ring-tech-cyan transition-all italic leading-relaxed"
                                    placeholder="Décrivez ce pôle d'expertise en quelques phrases...">{{ $expertise->description ?? old('description') }}</textarea>
                            </div>

                            <div class="flex items-center gap-4 pt-6 border-t border-slate-50">
                                <div class="flex-1">
                                    <h4 class="text-[10px] font-black text-tech-navy uppercase tracking-tight">Statut d'affichage</h4>
                                    <p class="text-[9px] text-slate-400 font-bold uppercase tracking-widest mt-1">Activer ou désactiver cet élément sur le site</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="hidden" name="is_active" value="0">
                                    <input type="checkbox" name="is_active" value="1" class="sr-only peer" {{ (!isset($expertise) || $expertise->is_active) ? 'checked' : '' }}>
                                    <div class="w-11 h-6 bg-slate-300 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-tech-cyan"></div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Area -->
                    <div class="flex justify-end gap-6 pt-12 border-t border-slate-50">
                        <a href="{{ route('cms.expertises.index') }}" class="px-10 py-5 text-slate-400 text-xs font-black uppercase tracking-[0.2em] hover:text-tech-navy transition-all">
                            Annuler
                        </a>
                        <button type="submit" class="px-12 py-5 bg-gradient-to-r from-tech-cyan to-tech-cobalt text-white text-xs font-black uppercase tracking-[0.2em] rounded-[24px] hover:scale-105 active:scale-95 transition-all shadow-xl shadow-tech-cyan/30">
                            {{ isset($expertise) ? 'Mettre à jour l\'expertise' : 'Ajouter l\'expertise' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Icon preview logic
        const iconInput = document.getElementById('icon-input');
        const iconPreview = document.getElementById('icon-preview');

        iconInput?.addEventListener('input', function(e) {
            const iconName = e.target.value.trim().toLowerCase();
            if (iconName) {
                // We use Lucide replace logic or just update the attribute
                iconPreview.setAttribute('data-lucide', iconName);
                if (window.lucide) {
                    window.lucide.createIcons();
                }
            }
        });
    </script>
</x-site.layout>
