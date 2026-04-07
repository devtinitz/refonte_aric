<x-site.layout title="Gestion des Offres d'Emploi">
    <div class="min-h-screen pt-40 pb-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-12">
                <div>
                    <h1 class="text-4xl font-black text-tech-navy uppercase tracking-tighter flex items-center gap-4">
                        <i data-lucide="briefcase" class="w-10 h-10 text-tech-cyan"></i>
                        Gestion des Offres
                    </h1>
                    <p class="text-slate-400 font-bold uppercase text-[10px] tracking-[0.3em] mt-2">Gérez vos recrutements en temps réel</p>
                </div>
                <div class="flex gap-4">
                    <a href="{{ route('cms.jobs.create') }}" class="px-8 py-4 bg-tech-navy text-white text-xs font-black uppercase tracking-widest rounded-2xl hover:bg-tech-cyan transition-all shadow-xl hover:scale-105 active:scale-95 flex items-center gap-2">
                        <i data-lucide="plus" class="w-4 h-4"></i>
                        Nouvelle Offre
                    </a>
                </div>
            </div>

            @if(session('success'))
                <div class="mb-8 p-4 bg-green-50 border border-green-100 rounded-2xl flex items-center gap-3 text-green-600 animate-in fade-in slide-in-from-top-4">
                    <i data-lucide="check-circle" class="w-5 h-5"></i>
                    <p class="text-xs font-bold uppercase tracking-widest">{{ session('success') }}</p>
                </div>
            @endif

            <!-- Jobs Table -->
            <div class="bg-white rounded-[40px] shadow-2xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-100">
                                <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">Poste</th>
                                <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">Catégorie</th>
                                <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">Type</th>
                                <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">Lieu</th>
                                <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">Statut</th>
                                <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @forelse($jobs as $job)
                                <tr class="hover:bg-slate-50/50 transition-colors group">
                                    <td class="px-8 py-6">
                                        <div class="flex items-center gap-4">
                                            <div class="w-10 h-10 rounded-xl bg-slate-100 flex items-center justify-center text-tech-navy group-hover:bg-tech-cyan/10 group-hover:text-tech-cyan transition-colors">
                                                <i data-lucide="{{ $job->icon ?: 'briefcase' }}" class="w-5 h-5"></i>
                                            </div>
                                            <span class="font-bold text-tech-navy">{{ $job->title }}</span>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6">
                                        <span class="px-3 py-1 bg-tech-navy/5 text-tech-navy text-[10px] font-black uppercase tracking-widest rounded-full">{{ $job->category }}</span>
                                    </td>
                                    <td class="px-8 py-6">
                                        <span class="px-3 py-1 bg-tech-cyan/10 text-tech-cyan text-[10px] font-black uppercase tracking-widest rounded-full">{{ $job->contract_type }}</span>
                                    </td>
                                    <td class="px-8 py-6">
                                        <span class="text-xs font-bold text-slate-500 italic">{{ $job->location }}</span>
                                    </td>
                                    <td class="px-8 py-6 text-center">
                                        @if($job->is_active)
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-green-50 text-green-600 text-[9px] font-black uppercase tracking-widest rounded-full">
                                                <span class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse"></span>
                                                Actif
                                            </span>
                                        @else
                                            <span class="px-3 py-1 bg-slate-100 text-slate-400 text-[9px] font-black uppercase tracking-widest rounded-full">Brouillon</span>
                                        @endif
                                    </td>
                                    <td class="px-8 py-6 text-right">
                                        <div class="flex justify-end gap-2">
                                            <a href="{{ route('cms.jobs.edit', $job) }}" class="p-2 hover:bg-tech-cyan/10 text-slate-400 hover:text-tech-cyan rounded-xl transition-all" title="Modifier">
                                                <i data-lucide="edit-3" class="w-5 h-5"></i>
                                            </a>
                                            <form action="{{ route('cms.jobs.destroy', $job) }}" method="POST" onsubmit="return confirm('Supprimer cette offre ?')" class="inline">
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
                                    <td colspan="6" class="px-8 py-20 text-center">
                                        <div class="flex flex-col items-center gap-4">
                                            <div class="w-20 h-20 rounded-[32px] bg-slate-50 flex items-center justify-center text-slate-200">
                                                <i data-lucide="search-x" class="w-10 h-10"></i>
                                            </div>
                                            <p class="font-bold text-slate-400 uppercase text-[10px] tracking-widest italic">Aucune offre d'emploi trouvée</p>
                                            <a href="{{ route('cms.jobs.create') }}" class="text-tech-cyan font-black text-[10px] uppercase tracking-[0.2em] hover:underline">Créer votre première annonce</a>
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
