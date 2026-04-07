<x-site.layout title="Gestion des Utilisateurs">
<div class="pt-32 pb-20 min-h-screen bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex items-center justify-between mb-10">
            <div>
                <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight mb-2">Gestion des Utilisateurs</h1>
                <p class="text-slate-500 font-medium">Administrez les comptes ayant accès à l'édition du site.</p>
            </div>
            <button onclick="document.getElementById('add-user-modal').classList.remove('hidden')" 
                    class="bg-tech-navy text-white px-6 py-3 rounded-2xl font-bold flex items-center gap-2 hover:bg-slate-800 transition-all shadow-xl shadow-tech-navy/10 group">
                <i data-lucide="user-plus" class="w-5 h-5 group-hover:scale-110 transition-transform"></i>
                Nouvel Utilisateur
            </button>
        </div>

        @if(session('success'))
        <div class="mb-8 p-4 bg-emerald-50 border border-emerald-100 rounded-2xl flex items-center gap-3 text-emerald-700 font-bold animate-fade-in">
            <i data-lucide="check-circle" class="w-5 h-5"></i>
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="mb-8 p-4 bg-red-50 border border-red-100 rounded-2xl flex items-center gap-3 text-red-700 font-bold animate-fade-in">
            <i data-lucide="alert-circle" class="w-5 h-5"></i>
            {{ session('error') }}
        </div>
        @endif

        <!-- Users Table -->
        <div class="bg-white rounded-[32px] shadow-sm border border-slate-100 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50">
                        <th class="px-8 py-5 text-[10px] font-black uppercase tracking-widest text-slate-400">Utilisateur</th>
                        <th class="px-8 py-5 text-[10px] font-black uppercase tracking-widest text-slate-400">Email</th>
                        <th class="px-8 py-5 text-[10px] font-black uppercase tracking-widest text-slate-400">Rôle</th>
                        <th class="px-8 py-5 text-[10px] font-black uppercase tracking-widest text-slate-400">Créé le</th>
                        <th class="px-8 py-5 text-[10px] font-black uppercase tracking-widest text-slate-400 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @foreach($users as $user)
                    <tr class="hover:bg-slate-50/30 transition-colors group">
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-tech-navy/5 flex items-center justify-center text-tech-navy font-bold text-sm">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                                <span class="font-bold text-slate-700">{{ $user->name }}</span>
                                @if(auth()->id() == $user->id)
                                <span class="px-2 py-0.5 bg-blue-50 text-blue-600 text-[9px] font-black rounded-full uppercase tracking-tighter">Vous</span>
                                @endif
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <span class="text-slate-500 font-medium">{{ $user->email }}</span>
                        </td>
                        <td class="px-8 py-6">
                            @if($user->is_super_admin)
                            <span class="px-3 py-1 bg-tech-navy text-white text-[10px] font-bold rounded-full uppercase tracking-widest">Super Admin</span>
                            @else
                            <span class="px-3 py-1 bg-slate-100 text-slate-600 text-[10px] font-bold rounded-full uppercase tracking-widest">Administrateur</span>
                            @endif
                        </td>
                        <td class="px-8 py-6">
                            <span class="text-slate-400 text-sm italic">{{ $user->created_at->format('d/m/Y') }}</span>
                        </td>
                        <td class="px-8 py-6 text-right">
                            @if(auth()->id() != $user->id)
                            <form action="{{ route('cms.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Supprimer cet utilisateur ? Cette action est irréversible.')" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-slate-300 hover:text-red-500 transition-colors group/btn">
                                    <i data-lucide="trash-2" class="w-5 h-5 group-hover/btn:scale-110 transition-transform"></i>
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add User Modal -->
<div id="add-user-modal" class="hidden fixed inset-0 z-[5000] flex items-center justify-center p-4">
    <div class="absolute inset-0 bg-tech-navy/40 backdrop-blur-md" onclick="document.getElementById('add-user-modal').classList.add('hidden')"></div>
    <div class="relative bg-white w-full max-w-lg rounded-[40px] shadow-2xl overflow-hidden animate-zoom-in">
        <div class="bg-tech-navy p-8 text-white">
            <h2 class="text-2xl font-black tracking-tight mb-2">Nouvel Utilisateur</h2>
            <p class="text-white/60 text-sm">Un mot de passe sera généré et envoyé par email.</p>
        </div>
        <form action="{{ route('cms.users.store') }}" method="POST" class="p-8 space-y-6">
            @csrf
            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-1">Nom Complet</label>
                <input type="text" name="name" required placeholder="Ex: Jean Dupont" 
                       class="w-full px-5 py-4 bg-slate-50 border border-slate-100 rounded-2xl outline-none focus:border-tech-navy/20 focus:ring-4 focus:ring-tech-navy/5 transition-all font-bold text-slate-700">
            </div>
            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-1">Adresse Email</label>
                <input type="email" name="email" required placeholder="jean.dupont@aric.ci" 
                       class="w-full px-5 py-4 bg-slate-50 border border-slate-100 rounded-2xl outline-none focus:border-tech-navy/20 focus:ring-4 focus:ring-tech-navy/5 transition-all font-bold text-slate-700">
            </div>
            
            <div class="flex gap-4 pt-4">
                <button type="button" onclick="document.getElementById('add-user-modal').classList.add('hidden')"
                        class="flex-1 py-4 bg-slate-100 text-slate-600 font-bold rounded-2xl hover:bg-slate-200 transition-all uppercase tracking-widest text-[10px]">
                    Annuler
                </button>
                <button type="submit" 
                        class="flex-2 px-10 py-4 bg-tech-navy text-white font-bold rounded-2xl hover:bg-slate-800 transition-all uppercase tracking-widest text-[10px] shadow-xl shadow-tech-navy/20">
                    Créer le compte
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    @keyframes fade-in {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes zoom-in {
        from { opacity: 0; transform: scale(0.95); }
        to { opacity: 1; transform: scale(1); }
    }
    .animate-fade-in { animation: fade-in 0.4s ease-out forwards; }
    .animate-zoom-in { animation: zoom-in 0.3s cubic-bezier(0.34, 1.56, 0.64, 1) forwards; }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    });
</script>
</x-site.layout>
