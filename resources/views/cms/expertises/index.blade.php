<x-site.layout title="Gestion des Expertises">
    <div class="min-h-screen pt-40 pb-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-12">
                <div>
                    <h1 class="text-4xl font-black text-tech-navy uppercase tracking-tighter flex items-center gap-4">
                        <i data-lucide="medal" class="w-10 h-10 text-tech-cyan"></i>
                        Gestion des Expertises
                    </h1>
                    <p class="text-slate-400 font-bold uppercase text-[10px] tracking-[0.3em] mt-2">Gérez vos domaines de compétences et métiers du groupe</p>
                </div>
                <div class="flex gap-4">
                    <a href="{{ route('cms.expertises.create') }}" class="px-8 py-4 bg-tech-navy text-white text-xs font-black uppercase tracking-widest rounded-2xl hover:bg-tech-cyan transition-all shadow-xl hover:scale-105 active:scale-95 flex items-center gap-2">
                        <i data-lucide="plus" class="w-4 h-4"></i>
                        Nouveau Métier
                    </a>
                </div>
            </div>

            @if(session('success'))
                <div class="mb-8 p-4 bg-green-50 border border-green-100 rounded-2xl flex items-center gap-3 text-green-600 animate-in fade-in slide-in-from-top-4">
                    <i data-lucide="check-circle" class="w-5 h-5"></i>
                    <p class="text-xs font-bold uppercase tracking-widest">{{ session('success') }}</p>
                </div>
            @endif

            <!-- Expertise Grid/List -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="expertise-list">
                @forelse($expertises as $expertise)
                    <div class="bg-white p-8 rounded-[32px] border border-slate-100 shadow-xl shadow-slate-200/50 group hover:border-tech-cyan transition-all relative" data-id="{{ $expertise->id }}">
                        <!-- Drag Handle -->
                        <div class="absolute top-6 right-6 cursor-move p-2 opacity-0 group-hover:opacity-100 transition-opacity text-slate-300 hover:text-tech-cyan">
                            <i data-lucide="grip-vertical" class="w-5 h-5"></i>
                        </div>

                        <!-- Status Badge -->
                        <div class="mb-8 flex items-center gap-4">
                            <div class="w-16 h-16 bg-slate-50 rounded-2xl flex items-center justify-center text-tech-cyan border border-slate-100 shadow-sm shrink-0">
                                <i data-lucide="{{ $expertise->icon }}" class="w-8 h-8"></i>
                            </div>
                            @if($expertise->image)
                                <div class="w-24 aspect-[16/10] rounded-xl overflow-hidden border border-slate-100 shadow-sm shrink-0">
                                    <img src="{{ $expertise->image }}" class="w-full h-full object-cover">
                                </div>
                            @endif
                            @if(!$expertise->is_active)
                                <span class="px-3 py-1 bg-slate-100 text-slate-400 text-[9px] font-black uppercase tracking-widest rounded-full">Inactif</span>
                            @endif
                        </div>

                        <h3 class="text-xl font-bold text-tech-navy mb-4 leading-tight">{{ $expertise->title }}</h3>
                        <p class="text-slate-500 text-xs leading-relaxed italic mb-8 line-clamp-3">{{ $expertise->description }}</p>

                        <div class="flex items-center justify-between pt-6 border-t border-slate-50">
                            <div class="flex gap-2">
                                <a href="{{ route('cms.expertises.edit', $expertise) }}" class="p-2 hover:bg-tech-cyan/10 text-slate-400 hover:text-tech-cyan rounded-xl transition-all" title="Modifier">
                                    <i data-lucide="edit-3" class="w-5 h-5"></i>
                                </a>
                                <form action="{{ route('cms.expertises.destroy', $expertise) }}" method="POST" onsubmit="return confirm('Supprimer cette expertise ?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 hover:bg-red-50 text-slate-400 hover:text-red-500 rounded-xl transition-all" title="Supprimer">
                                        <i data-lucide="trash-2" class="w-5 h-5"></i>
                                    </button>
                                </form>
                            </div>
                            <span class="text-[9px] font-black text-slate-200 uppercase tracking-widest">Ordre: {{ $expertise->order }}</span>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 text-center bg-white rounded-[40px] border border-slate-100 shadow-sm">
                        <div class="flex flex-col items-center gap-4">
                            <div class="w-20 h-20 rounded-[32px] bg-slate-50 flex items-center justify-center text-slate-200">
                                <i data-lucide="medal" class="w-10 h-10"></i>
                            </div>
                            <p class="font-bold text-slate-400 uppercase text-[10px] tracking-widest italic">Aucun métier configuré</p>
                            <a href="{{ route('cms.expertises.create') }}" class="text-tech-cyan font-black text-[10px] uppercase tracking-[0.2em] hover:underline">Ajouter votre premier domaine d'expertise</a>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Drag & Drop Logic -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const list = document.getElementById('expertise-list');
            if (list && list.children.length > 1) {
                new Sortable(list, {
                    animation: 150,
                    handle: '.cursor-move',
                    ghostClass: 'opacity-50',
                    onEnd: function() {
                        const order = Array.from(list.children).map(el => el.dataset.id);
                        fetch("{{ route('cms.expertises.reorder') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            },
                            body: JSON.stringify({ order })
                        });
                    }
                });
            }
        });
    </script>
</x-site.layout>
