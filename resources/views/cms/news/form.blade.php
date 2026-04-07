<x-site.layout :title="isset($article) ? 'Modifier l\'article' : 'Nouvel article'">
    <div class="min-h-screen pt-40 pb-20 bg-slate-50">
        <div class="max-w-5xl mx-auto px-6">
            <!-- Header -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-12">
                <div>
                    <h1 class="text-4xl font-black text-tech-navy uppercase tracking-tighter flex items-center gap-4">
                        <i data-lucide="{{ isset($article) ? 'edit-3' : 'plus-circle' }}" class="w-10 h-10 text-tech-cyan"></i>
                        {{ isset($article) ? 'Modifier l\'article' : 'Nouvel article' }}
                    </h1>
                    <p class="text-slate-400 font-bold uppercase text-[10px] tracking-[0.3em] mt-2">Rédaction et publication de contenu</p>
                </div>
                <a href="{{ route('cms.news.index') }}" class="px-6 py-3 bg-white border border-slate-200 rounded-2xl text-tech-navy text-xs font-black uppercase tracking-widest hover:shadow-lg transition-all flex items-center gap-2">
                    <i data-lucide="arrow-left" class="w-4 h-4"></i>
                    Retour aux actualités
                </a>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-[40px] shadow-2xl shadow-slate-200/50 border border-slate-100 p-10 md:p-12 animate-in fade-in slide-in-from-bottom-8">
                <form action="{{ isset($article) ? route('cms.news.update', $article) : route('cms.news.store') }}" method="POST" enctype="multipart/form-data" class="space-y-12">
                    @csrf
                    @if(isset($article)) @method('PUT') @endif

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                        <!-- Left Column: Content -->
                        <div class="lg:col-span-2 space-y-8">
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Titre de l'article</label>
                                <input type="text" name="title" value="{{ $article->title ?? old('title') }}" required 
                                    class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-tech-navy font-bold text-xl focus:ring-2 focus:ring-tech-cyan transition-all"
                                    placeholder="ex: Ouverture du nouveau centre technique">
                            </div>

                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Résumé (Grid view)</label>
                                <textarea name="summary" required rows="3" 
                                    class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-tech-navy font-medium focus:ring-2 focus:ring-tech-cyan transition-all italic"
                                    placeholder="Une brève description pour la grille d'actualités...">{{ $article->summary ?? old('summary') }}</textarea>
                            </div>

                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Contenu complet (Detail page)</label>
                                <textarea name="content" required rows="15" 
                                    class="w-full bg-slate-50 border-none rounded-2xl px-6 py-6 text-tech-navy font-medium focus:ring-2 focus:ring-tech-cyan transition-all leading-relaxed"
                                    placeholder="Rédigez l'intégralité de votre article ici...">{{ $article->content ?? old('content') }}</textarea>
                            </div>
                        </div>

                        <!-- Right Column: Metadata & Image -->
                        <div class="space-y-8">
                            <!-- Image Upload -->
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Image de couverture</label>
                                <div class="aspect-[16/10] bg-slate-50 rounded-3xl border-2 border-dashed border-slate-200 relative overflow-hidden group cursor-pointer hover:border-tech-cyan transition-all">
                                    @if(isset($article) && $article->image)
                                        <img src="{{ $article->image }}" id="image-preview" class="w-full h-full object-cover">
                                    @else
                                        <div id="image-placeholder" class="w-full h-full flex flex-col items-center justify-center text-slate-300">
                                            <i data-lucide="image-plus" class="w-10 h-10 mb-2"></i>
                                            <span class="text-[9px] font-black uppercase tracking-widest leading-tight px-4 text-center">Cliquez pour ajouter une image</span>
                                        </div>
                                        <img id="image-preview" class="w-full h-full object-cover hidden">
                                    @endif
                                    <input type="file" name="image_file" id="image-input" class="absolute inset-0 opacity-0 cursor-pointer" accept="image/*">
                                </div>
                                <p class="text-[9px] text-slate-300 font-bold uppercase ml-1 italic mt-2 text-center">Format suggéré : 1600x1000px (Max 2Mo)</p>
                            </div>

                            <!-- Publication Info -->
                            <div class="bg-slate-50 rounded-3xl p-8 space-y-6">
                                <div class="space-y-2">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Catégorie</label>
                                    <input type="text" name="category" value="{{ $article->category ?? old('category', 'Actualités') }}" required 
                                        class="w-full bg-white border-none rounded-2xl px-6 py-4 text-tech-navy font-bold focus:ring-2 focus:ring-tech-cyan transition-all"
                                        placeholder="ex: Innovation, Projet, Groupe">
                                </div>

                                <div class="space-y-2">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Date d'affichage</label>
                                    <input type="date" name="published_at" value="{{ isset($article) && $article->published_at ? $article->published_at->format('Y-m-d') : old('published_at', date('Y-m-d')) }}" 
                                        class="w-full bg-white border-none rounded-2xl px-6 py-4 text-tech-navy font-bold focus:ring-2 focus:ring-tech-cyan transition-all">
                                </div>

                                <div class="flex items-center gap-4 pt-4 border-t border-slate-200">
                                    <div class="flex-1">
                                        <h4 class="text-[10px] font-black text-tech-navy uppercase tracking-tight">Statut Public</h4>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="hidden" name="is_published" value="0">
                                        <input type="checkbox" name="is_published" value="1" class="sr-only peer" {{ (!isset($article) || $article->is_published) ? 'checked' : '' }}>
                                        <div class="w-11 h-6 bg-slate-300 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-tech-cyan"></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Area -->
                    <div class="flex justify-end gap-6 pt-12 border-t border-slate-50">
                        <a href="{{ route('cms.news.index') }}" class="px-10 py-5 text-slate-400 text-xs font-black uppercase tracking-[0.2em] hover:text-tech-navy transition-all">
                            Annuler
                        </a>
                        <button type="submit" class="px-12 py-5 bg-gradient-to-r from-tech-cyan to-tech-cobalt text-white text-xs font-black uppercase tracking-[0.2em] rounded-[24px] hover:scale-105 active:scale-95 transition-all shadow-xl shadow-tech-cyan/30">
                            {{ isset($article) ? 'Mettre à jour l\'article' : 'Publier l\'article' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Image preview logic
        const imageInput = document.getElementById('image-input');
        const imagePreview = document.getElementById('image-preview');
        const imagePlaceholder = document.getElementById('image-placeholder');

        imageInput?.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    imagePreview.src = event.target.result;
                    imagePreview.classList.remove('hidden');
                    if (imagePlaceholder) imagePlaceholder.classList.add('hidden');
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</x-site.layout>
