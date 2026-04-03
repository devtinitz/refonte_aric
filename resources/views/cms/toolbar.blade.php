<div id="cms-admin-bar" class="fixed top-0 left-0 w-full z-[1000] bg-tech-navy border-b border-white/10 px-6 py-2 flex justify-between items-center text-white shadow-2xl">
    <div class="flex items-center space-x-6">
        <div class="flex items-center space-x-2">
            <div class="w-3 h-3 rounded-full bg-tech-cyan animate-pulse"></div>
            <span class="text-xs font-bold uppercase tracking-widest">ARIC CMS <span class="text-white/40 ml-2">v1.0.0</span></span>
        </div>
        <div class="h-6 w-px bg-white/10"></div>
        <div class="flex items-center space-x-4 text-[10px] font-bold uppercase tracking-[0.2em]">
            <span id="cms-status-indicator" class="text-white/60">Modifications en attente : <span id="cms-pending-count" class="text-tech-cyan">0</span></span>
            <button id="cms-manage-sections" onclick="window.cmsEditor.toggleSectionsEdit()" class="ml-4 px-3 py-1.5 rounded-lg bg-white/5 border border-white/10 text-white/50 hover:text-white hover:bg-white/10 transition-all flex items-center gap-2">
                <i data-lucide="layers" class="w-3.5 h-3.5"></i>
                <span class="text-[9px]">Gérer les Sections</span>
            </button>
        </div>
    </div>

    <div class="flex items-center space-x-4">
        <div class="flex bg-white/5 rounded-xl p-1">
            <button id="cms-toggle-preview" class="px-4 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest bg-tech-cyan text-tech-navy transition-all shadow-lg">
                Brouillon
            </button>
            <button id="cms-toggle-live" class="px-4 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest text-white/60 hover:text-white transition-all">
                Live
            </button>
        </div>

        <button id="cms-undo" class="w-9 h-9 flex items-center justify-center rounded-xl bg-white/5 hover:bg-white/10 text-white/70 hover:text-white transition-all border border-white/5">
            <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
        </button>

        <button id="cms-publish" class="px-6 py-2 bg-gradient-to-r from-tech-cyan to-tech-cobalt text-white text-[10px] font-black uppercase tracking-[0.2em] rounded-xl hover:scale-105 active:scale-95 transition-all shadow-xl shadow-tech-cyan/20">
            Publier les modifications
        </button>
        
        <button id="cms-toggle-history" class="w-9 h-9 flex items-center justify-center rounded-xl bg-white/5 hover:bg-white/10 text-white/70 hover:text-white transition-all border border-white/5">
            <i data-lucide="history" class="w-4 h-4"></i>
        </button>
    </div>
</div>

@include('cms.modal')
@include('cms.history-modal')

<style>
    body { padding-top: 52px; } /* Space for admin bar */
    #cms-admin-bar {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
    .cms-section-editing {
        outline: 2px dashed #00a4bd !important;
        outline-offset: -2px !important;
        position: relative;
    }
    .cms-section-editing::before {
        content: 'SECTION DÉPLAÇABLE';
        position: absolute;
        top: 0;
        left: 0;
        background: #00a4bd;
        color: #0b1a2e;
        font-size: 8px;
        font-weight: 900;
        padding: 4px 8px;
        z-index: 1001;
        letter-spacing: 0.1em;
    }
</style>
