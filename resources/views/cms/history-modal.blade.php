<div id="cms-history-modal" class="cms-modal fixed inset-0 z-[1100] flex items-center justify-center p-4 opacity-0 pointer-events-none transition-all duration-300">
    <div id="cms-history-backdrop" class="absolute inset-0 bg-tech-navy/80 backdrop-blur-sm"></div>
    <div class="relative bg-white w-full max-w-2xl rounded-3xl shadow-2xl overflow-hidden border border-slate-200 transform scale-95 transition-all duration-300">
        <!-- Header -->
        <div class="px-8 py-6 bg-slate-50 border-b border-slate-100 flex justify-between items-center">
            <div>
                <h3 class="text-xl font-black text-tech-navy uppercase tracking-tight flex items-center gap-3">
                    <i data-lucide="history" class="w-5 h-5 text-tech-cyan"></i>
                    Historique des Modifications
                </h3>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1">Dernières actions effectuées sur le CMS</p>
            </div>
            <button id="cms-history-close" class="w-10 h-10 flex items-center justify-center rounded-xl hover:bg-slate-200 text-slate-400 transition-all">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>

        <!-- Content -->
        <div class="p-8 max-h-[60vh] overflow-y-auto">
            <div id="cms-history-list" class="space-y-4">
                <!-- Loaded via JS -->
                <div class="flex items-center justify-center py-12 text-slate-300 italic">
                    Chargement de l'historique...
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="px-8 py-6 bg-slate-50 border-t border-slate-100 flex justify-between items-center">
            <p class="text-[10px] font-medium text-slate-400 max-w-[250px]">
                La restauration d'une version créera un nouveau brouillon basé sur celle-ci.
            </p>
            <button id="cms-history-cancel" class="px-6 py-2.5 text-[10px] font-black uppercase tracking-widest text-slate-400 hover:text-tech-navy transition-all">
                Fermer
            </button>
        </div>
    </div>
</div>

<style>
    #cms-history-modal.active {
        opacity: 1;
        pointer-events: auto;
    }
    #cms-history-modal.active > div:last-child {
        transform: scale(1);
    }
    .history-item {
        @apply transition-all hover:bg-slate-50 p-4 rounded-2xl border border-transparent hover:border-slate-100 flex justify-between items-center;
    }
</style>
