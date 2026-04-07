<x-site.layout title="Historique du CMS">
    <div class="min-h-screen pt-40 pb-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-12">
                <div>
                    <h1 class="text-4xl font-black text-tech-navy uppercase tracking-tighter flex items-center gap-4">
                        <i data-lucide="history" class="w-10 h-10 text-tech-cyan"></i>
                        Audit & Historique
                    </h1>
                    <p class="text-slate-400 font-bold uppercase text-[10px] tracking-[0.3em] mt-2">Suivi complet des modifications du contenu</p>
                </div>
                <a href="{{ route('home') }}" class="px-6 py-3 bg-white border border-slate-200 rounded-2xl text-tech-navy text-xs font-black uppercase tracking-widest hover:shadow-lg transition-all flex items-center gap-2">
                    <i data-lucide="arrow-left" class="w-4 h-4"></i>
                    Retour au site
                </a>
            </div>

            <!-- Dashboard Content -->
            <div class="bg-white rounded-[40px] shadow-2xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-100">
                                <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">Auteur</th>
                                <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">Élément</th>
                                <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">Valeur</th>
                                <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">Version / Statut</th>
                                <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @forelse($history as $item)
                            <tr class="group hover:bg-slate-50/50 transition-colors">
                                <!-- Auteur -->
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-xl bg-tech-navy/5 flex items-center justify-center text-tech-navy font-black text-xs">
                                            {{ strtoupper(substr($item->user->name ?? '?', 0, 2)) }}
                                        </div>
                                        <div>
                                            <p class="text-sm font-black text-tech-navy uppercase tracking-tight">{{ $item->user->name ?? 'Utilisateur Inconnu' }}</p>
                                            <p class="text-[10px] text-slate-400 font-bold uppercase mt-0.5">{{ $item->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                </td>
                                <!-- Élément -->
                                <td class="px-8 py-6">
                                    <span class="text-xs font-black text-tech-navy bg-slate-100 px-3 py-1.5 rounded-full uppercase tracking-tighter">
                                        {{ $item->content->key ?? 'N/A' }}
                                    </span>
                                </td>
                                <!-- Valeur (Aperçu) -->
                                <td class="px-8 py-6">
                                    <div class="max-w-[300px] truncate">
                                        @if($item->content && in_array($item->content->type, ['image', 'video', 'media']))
                                        <div class="w-12 h-12 rounded-lg bg-slate-100 flex items-center justify-center overflow-hidden border border-slate-200">
                                            <img src="{{ $item->value }}" class="w-full h-full object-cover">
                                        </div>
                                        @else
                                        <span class="text-xs text-slate-500 italic">{{ strip_tags($item->value) }}</span>
                                        @endif
                                    </div>
                                </td>
                                <!-- Statut -->
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-2">
                                        <div class="w-1.5 h-1.5 rounded-full {{ $item->status === 'published' ? 'bg-green-500' : 'bg-slate-300' }}"></div>
                                        <p class="text-[10px] font-black {{ $item->status === 'published' ? 'text-green-600' : 'text-slate-400' }} uppercase tracking-widest">
                                            v.{{ $item->version_number }} • {{ $item->status === 'published' ? 'Actuel' : 'Archivé' }}
                                        </p>
                                    </div>
                                </td>
                                <!-- Actions -->
                                <td class="px-8 py-6 text-right">
                                    <button 
                                        onclick="window.cmsEditor.rollback({{ $item->id }})"
                                        class="px-5 py-2.5 bg-tech-navy text-white text-[9px] font-black uppercase tracking-[0.2em] rounded-xl hover:bg-tech-cyan hover:scale-105 transition-all shadow-lg active:scale-95"
                                    >
                                        Restaurer
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-8 py-20 text-center">
                                    <div class="flex flex-col items-center gap-4">
                                        <div class="w-20 h-20 rounded-full bg-slate-50 flex items-center justify-center text-slate-200">
                                            <i data-lucide="inbox" class="w-10 h-10"></i>
                                        </div>
                                        <p class="text-slate-400 font-bold uppercase tracking-widest text-xs">Aucune modification enregistrée</p>
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
