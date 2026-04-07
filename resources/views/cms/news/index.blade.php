<x-site.layout title="Gestion des Actualités">
    <div class="min-h-screen pt-40 pb-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-12">
                <div>
                    <h1 class="text-4xl font-black text-tech-navy uppercase tracking-tighter flex items-center gap-4">
                        <i data-lucide="newspaper" class="w-10 h-10 text-tech-cyan"></i>
                        Gestion des Actualités
                    </h1>
                    <p class="text-slate-400 font-bold uppercase text-[10px] tracking-[0.3em] mt-2">Éditez et publiez vos articles du groupe</p>
                </div>
                <div class="flex gap-4">
                    <a href="{{ route('cms.news.create') }}" class="px-8 py-4 bg-tech-navy text-white text-xs font-black uppercase tracking-widest rounded-2xl hover:bg-tech-cyan transition-all shadow-xl hover:scale-105 active:scale-95 flex items-center gap-2">
                        <i data-lucide="plus" class="w-4 h-4"></i>
                        Nouvel Article
                    </a>
                </div>
            </div>

            @if(session('success'))
                <div class="mb-8 p-4 bg-green-50 border border-green-100 rounded-2xl flex items-center gap-3 text-green-600 animate-in fade-in slide-in-from-top-4">
                    <i data-lucide="check-circle" class="w-5 h-5"></i>
                    <p class="text-xs font-bold uppercase tracking-widest">{{ session('success') }}</p>
                </div>
            @endif

            <!-- News Table -->
            <div class="bg-white rounded-[40px] shadow-2xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-100">
                                <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">Article</th>
                                <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">Catégorie</th>
                                <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">Date de publication</th>
                                <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">Statut</th>
                                <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @forelse($articles as $article)
                                <tr class="hover:bg-slate-50/50 transition-colors group">
                                    <td class="px-8 py-6">
                                        <div class="flex items-center gap-6">
                                            <div class="w-20 aspect-[16/10] rounded-xl bg-slate-100 overflow-hidden shrink-0 border border-slate-100">
                                                @if($article->image)
                                                    <img src="{{ $article->image }}" class="w-full h-full object-cover">
                                                @else
                                                    <div class="w-full h-full flex items-center justify-center text-slate-300 italic text-[10px]">No Image</div>
                                                @endif
                                            </div>
                                            <div>
                                                <span class="font-bold text-tech-navy block leading-tight">{{ $article->title }}</span>
                                                <span class="text-[9px] text-slate-400 font-bold uppercase tracking-widest mt-1 block">/{{ $article->slug }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6">
                                        <span class="px-3 py-1 bg-tech-navy/5 text-tech-navy text-[10px] font-black uppercase tracking-widest rounded-full">{{ $article->category }}</span>
                                    </td>
                                    <td class="px-8 py-6">
                                        <span class="text-xs font-bold text-slate-500 italic">
                                            {{ $article->published_at ? $article->published_at->format('d M Y') : 'Non programmée' }}
                                        </span>
                                    </td>
                                    <td class="px-8 py-6 text-center">
                                        @if($article->is_published)
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-green-50 text-green-600 text-[9px] font-black uppercase tracking-widest rounded-full">
                                                <span class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse"></span>
                                                Publié
                                            </span>
                                        @else
                                            <span class="px-3 py-1 bg-slate-100 text-slate-400 text-[9px] font-black uppercase tracking-widest rounded-full">Brouillon</span>
                                        @endif
                                    </td>
                                    <td class="px-8 py-6 text-right">
                                        <div class="flex justify-end gap-2">
                                            <a href="{{ route('cms.news.edit', $article) }}" class="p-2 hover:bg-tech-cyan/10 text-slate-400 hover:text-tech-cyan rounded-xl transition-all" title="Modifier">
                                                <i data-lucide="edit-3" class="w-5 h-5"></i>
                                            </a>
                                            <form action="{{ route('cms.news.destroy', $article) }}" method="POST" onsubmit="return confirm('Supprimer cet article ?')" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-2 hover:bg-red-50 text-slate-400 hover:text-red-500 rounded-xl transition-all" title="Supprimer">
                                                    <i data-lucide="trash-2" class="w-5 h-5"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-8 py-20 text-center">
                                        <div class="flex flex-col items-center gap-4">
                                            <div class="w-20 h-20 rounded-[32px] bg-slate-50 flex items-center justify-center text-slate-200">
                                                <i data-lucide="newspaper" class="w-10 h-10"></i>
                                            </div>
                                            <p class="font-bold text-slate-400 uppercase text-[10px] tracking-widest italic">Aucun article publié</p>
                                            <a href="{{ route('cms.news.create') }}" class="text-tech-cyan font-black text-[10px] uppercase tracking-[0.2em] hover:underline">Rédiger votre premier article</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-site.layout>
