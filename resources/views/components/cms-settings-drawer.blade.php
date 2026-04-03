<div id="cms-settings-drawer" 
     class="fixed top-0 right-0 h-full w-[400px] bg-white/95 backdrop-blur-xl shadow-[-20px_0_50px_rgba(0,0,0,0.1)] z-[500] transform translate-x-full transition-transform duration-500 ease-in-out border-l border-slate-200 flex flex-col">
    
    <!-- Header -->
    <div class="px-8 py-6 border-b border-slate-100 flex items-center justify-between bg-white/50">
        <div class="flex items-center space-x-3">
            <div class="p-2 bg-tech-navy rounded-xl shadow-lg">
                <i data-lucide="settings" class="w-5 h-5 text-tech-cyan animate-spin-slow"></i>
            </div>
            <div>
                <h2 class="text-lg font-black text-tech-navy uppercase tracking-tighter">Paramètres</h2>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Éditeur Visuel Ar-ic</p>
            </div>
        </div>
        <button onclick="window.cmsSettings.toggle()" class="p-2 hover:bg-slate-100 rounded-xl transition-colors">
            <i data-lucide="x" class="w-6 h-6 text-slate-400"></i>
        </button>
    </div>

    <!-- Content -->
    <div class="flex-grow overflow-y-auto p-8 space-y-10 custom-scrollbar">
        
        <!-- Apparence -->
        <section class="space-y-6">
            <div class="flex items-center space-x-2 text-tech-navy">
                <i data-lucide="palette" class="w-4 h-4"></i>
                <h3 class="text-xs font-black uppercase tracking-widest">Apparence & Couleurs</h3>
            </div>
            
            <div class="grid grid-cols-1 gap-6">
                <!-- Primary Color -->
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <label class="text-[11px] font-bold text-slate-500 uppercase tracking-tight">Couleur Primaire (Cyan)</label>
                        <input type="text" id="input-hex-primary" value="#00a4bd" oninput="window.cmsSettings.updateVar('--tech-cyan', this.value)" class="text-[10px] font-mono font-bold text-tech-cyan bg-tech-cyan/10 px-2 py-0.5 rounded border-none w-20 text-center outline-none focus:ring-1 focus:ring-tech-cyan/30">
                    </div>
                    <input type="color" id="input-primary" value="#00a4bd" oninput="window.cmsSettings.updateVar('--tech-cyan', this.value)" class="w-full h-10 rounded-xl cursor-pointer bg-transparent border-none">
                </div>
                
                <!-- Secondary/Navy Color -->
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <label class="text-[11px] font-bold text-slate-500 uppercase tracking-tight">Couleur Secondaire (Navy)</label>
                        <input type="text" id="input-hex-navy" value="#0a192f" oninput="window.cmsSettings.updateVar('--tech-navy', this.value)" class="text-[10px] font-mono font-bold text-tech-navy bg-tech-navy/10 px-2 py-0.5 rounded border-none w-20 text-center outline-none focus:ring-1 focus:ring-tech-navy/30">
                    </div>
                    <input type="color" id="input-navy" value="#0a192f" oninput="window.cmsSettings.updateVar('--tech-navy', this.value)" class="w-full h-10 rounded-xl cursor-pointer bg-transparent border-none">
                </div>
            </div>

            <!-- Dark Mode Toggle (Mockup) -->
            <div class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl border border-slate-100 mt-4">
                <div class="flex items-center space-x-3">
                    <div class="p-2 bg-white rounded-lg shadow-sm"><i data-lucide="moon" class="w-4 h-4 text-tech-navy"></i></div>
                    <span class="text-xs font-bold text-slate-700">Mode Sombre Global</span>
                </div>
                <div class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" id="cms-dark-mode-switch" value="" class="sr-only peer" onchange="window.cmsSettings.toggleDarkMode()">
                    <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-tech-cyan"></div>
                </div>
            </div>
        </section>

        <!-- Typographie -->
        <section class="space-y-6">
            <div class="flex items-center space-x-2 text-tech-navy border-t border-slate-100 pt-10">
                <i data-lucide="type" class="w-4 h-4"></i>
                <h3 class="text-xs font-black uppercase tracking-widest">Typographie</h3>
            </div>
            
            <div class="space-y-6">
                <div class="space-y-3">
                    <label class="text-[11px] font-bold text-slate-500 uppercase tracking-tight">Famille de police</label>
                    <select id="select-font" onchange="window.cmsSettings.updateVar('--font-main', this.value)" class="w-full bg-slate-50 border border-slate-100 rounded-xl px-4 py-3 text-xs font-bold text-slate-700 focus:outline-none focus:ring-2 focus:ring-tech-cyan/20">
                        <option value="'Plus Jakarta Sans', sans-serif">Plus Jakarta Sans (Default)</option>
                        <option value="'Inter', sans-serif">Inter</option>
                        <option value="'Roboto', sans-serif">Roboto</option>
                        <option value="'Poppins', sans-serif">Poppins</option>
                        <option value="'Outfit', sans-serif">Outfit</option>
                        <option value="serif">Classic Serif</option>
                    </select>
                </div>

                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <label class="text-[11px] font-bold text-slate-500 uppercase tracking-tight">Taille de police de base</label>
                        <span id="label-fontsize" class="text-[10px] font-bold text-slate-400 bg-slate-100 px-2 py-0.5 rounded">16px</span>
                    </div>
                    <input type="range" min="12" max="20" value="16" oninput="window.cmsSettings.updateVar('--base-font-size', this.value + 'px')" class="w-full h-1.5 bg-slate-200 rounded-lg appearance-none cursor-pointer accent-tech-cyan">
                </div>
            </div>
        </section>

        <!-- Interface -->
        <section class="space-y-6">
            <div class="flex items-center space-x-2 text-tech-navy border-t border-slate-100 pt-10">
                <i data-lucide="layout" class="w-4 h-4"></i>
                <h3 class="text-xs font-black uppercase tracking-widest">Interface & Espacement</h3>
            </div>
            <div class="grid grid-cols-3 gap-2">
                <button data-spacing-btn="compact" onclick="window.cmsSettings.updateSpacing('compact')" class="p-4 rounded-xl border border-slate-200 bg-white hover:border-tech-cyan transition-all group">
                    <div class="h-1 w-full bg-slate-200 rounded-full mb-1"></div>
                    <div class="h-1 w-2/3 bg-slate-200 rounded-full"></div>
                    <span class="block mt-2 text-[9px] font-bold uppercase text-slate-400 group-hover:text-tech-cyan">Compact</span>
                </button>
                <button data-spacing-btn="normal" onclick="window.cmsSettings.updateSpacing('normal')" class="p-4 rounded-xl border border-slate-200 bg-white hover:border-tech-cyan transition-all group">
                    <div class="h-1 w-full bg-slate-200 rounded-full mb-2"></div>
                    <div class="h-1 w-1/2 bg-slate-200 rounded-full"></div>
                    <span class="block mt-2 text-[9px] font-bold uppercase text-slate-400 group-hover:text-tech-cyan">Normal</span>
                </button>
                <button data-spacing-btn="large" onclick="window.cmsSettings.updateSpacing('large')" class="p-4 rounded-xl border border-slate-200 bg-white hover:border-tech-cyan transition-all group">
                    <div class="h-1 w-full bg-slate-200 rounded-full mb-3"></div>
                    <div class="h-1 w-3/4 bg-slate-200 rounded-full"></div>
                    <span class="block mt-2 text-[9px] font-bold uppercase text-slate-400 group-hover:text-tech-cyan">Large</span>
                </button>
            </div>
        </section>

    </div>

    <!-- Footer -->
    <div class="p-8 border-t border-slate-100 bg-slate-50 flex space-x-4">
        <button onclick="window.cmsSettings.reset()" class="flex-grow py-4 px-6 bg-white border border-slate-200 text-slate-500 font-bold rounded-2xl hover:bg-slate-100 transition-all text-xs uppercase tracking-widest">
            Réinitialiser
        </button>
        <button onclick="window.cmsSettings.toggle()" class="flex-grow py-4 px-6 bg-tech-navy text-white font-black rounded-2xl hover:scale-105 transition-all shadow-xl shadow-tech-navy/20 text-xs uppercase tracking-widest">
            Appliquer
        </button>
    </div>

</div>

<!-- Settings Gear Fixed Button -->
<button onclick="window.cmsSettings.toggle()" 
        class="fixed bottom-32 left-10 z-[600] w-14 h-14 bg-tech-navy text-tech-cyan rounded-2xl shadow-2xl hover:scale-110 active:scale-95 transition-all flex items-center justify-center group border border-white/10 overflow-hidden">
    <div class="absolute inset-0 bg-tech-cyan/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
    <i data-lucide="settings" class="w-6 h-6 animate-spin-slow group-hover:rotate-180 transition-transform duration-1000"></i>
</button>

<style>
    .animate-spin-slow {
        animation: spin 8s linear infinite;
    }
    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    .custom-scrollbar::-webkit-scrollbar {
        width: 4px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #e2e8f0;
        border-radius: 10px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #cbd5e1;
    }
</style>
