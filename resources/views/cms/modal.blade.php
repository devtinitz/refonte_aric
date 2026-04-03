<!-- CMS Editor Modal -->
<div id="cms-editor-modal" class="fixed inset-0 z-[2000] invisible opacity-0 transition-all duration-300 flex items-center justify-center p-6">
    <!-- Backdrop with blur -->
    <div id="cms-modal-backdrop" class="absolute inset-0 bg-tech-navy/60 backdrop-blur-md cursor-pointer"></div>
    
    <!-- Modal Card -->
    <div id="cms-modal-card" class="relative w-full max-w-2xl bg-white rounded-3xl shadow-[0_20px_60px_-15px_rgba(0,0,0,0.3)] overflow-hidden transform translate-y-20 transition-transform duration-500 max-h-[90vh] flex flex-col">
        <div class="px-8 py-6 border-b border-slate-100 flex-shrink-0">
            <!-- Header -->
            <div class="flex justify-between items-start">
                <div>
                    <div class="flex items-center space-x-2 mb-2">
                        <span class="w-2 h-2 bg-tech-cyan rounded-full animate-pulse"></span>
                        <span id="cms-modal-type" class="text-[10px] font-black text-tech-cyan uppercase tracking-[0.2em]">Édition de Texte</span>
                    </div>
                    <h3 id="cms-modal-key" class="text-xl font-black text-tech-navy truncate max-w-md italic">Champ : non-défini</h3>
                </div>
                <button id="cms-modal-close" class="w-10 h-10 rounded-2xl bg-slate-50 flex items-center justify-center text-slate-400 hover:bg-red-50 hover:text-red-500 transition-all group">
                    <i data-lucide="x" class="w-5 h-5 group-hover:rotate-90 transition-transform"></i>
                </button>
            </div>
        </div>

        <!-- Scrollable content area -->
        <div class="p-8 overflow-y-auto flex-1 custom-scrollbar">
            <!-- Editor Header Toggle -->
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-6">
                <div id="cms-editor-type-toggle" class="flex bg-slate-50 p-1 rounded-xl border border-slate-100 self-start">
                    <button id="cms-mode-visual" class="px-5 py-2 rounded-lg text-xs font-black uppercase tracking-widest bg-white text-tech-navy shadow-sm transition-all">Visuel</button>
                    <button id="cms-mode-code" class="px-5 py-2 rounded-lg text-xs font-black uppercase tracking-widest text-slate-400 hover:text-slate-600 transition-all">Code</button>
                </div>
                
                <!-- Formatting Toolbar (Hidden in Code mode) -->
                <div id="cms-wysiwyg-toolbar" class="flex items-center space-x-2">
                    <button data-command="bold" class="w-8 h-8 flex items-center justify-center rounded-lg bg-slate-50 text-slate-500 hover:bg-tech-cyan hover:text-white transition-all shadow-sm" title="Gras">
                        <i data-lucide="bold" class="w-3.5 h-3.5"></i>
                    </button>
                    <button data-command="italic" class="w-8 h-8 flex items-center justify-center rounded-lg bg-slate-50 text-slate-500 hover:bg-tech-cyan hover:text-white transition-all shadow-sm" title="Italique">
                        <i data-lucide="italic" class="w-3.5 h-3.5"></i>
                    </button>
                    <button data-command="createLink" class="w-8 h-8 flex items-center justify-center rounded-lg bg-slate-50 text-slate-500 hover:bg-tech-cyan hover:text-white transition-all shadow-sm" title="Ajouter un lien">
                        <i data-lucide="link" class="w-3.5 h-3.5"></i>
                    </button>
                    <button data-command="addSocial" class="w-8 h-8 flex items-center justify-center rounded-lg bg-slate-50 text-slate-500 hover:bg-tech-cyan hover:text-white transition-all shadow-sm" title="Ajouter un Réseau Social">
                        <i data-lucide="share-2" class="w-3.5 h-3.5"></i>
                    </button>
                    <button data-command="deleteItem" class="w-8 h-8 flex items-center justify-center rounded-lg bg-slate-50 text-slate-500 hover:bg-red-500 hover:text-white transition-all shadow-sm" title="Supprimer l'élément sélectionné">
                        <i data-lucide="trash-2" class="w-3.5 h-3.5"></i>
                    </button>
                    <button id="cms-format-gradient" class="px-3 h-8 flex items-center justify-center rounded-lg bg-tech-cyan/10 text-tech-cyan hover:bg-tech-cyan hover:text-white transition-all font-black text-[9px] uppercase tracking-widest border border-tech-cyan/20" title="Appliquer le Dégradé ARIC">
                        Gradients
                    </button>
                </div>
            </div>

            <!-- Editor Body -->
            <div class="relative mb-8">
                <!-- Visual/Text Editor -->
                <div id="cms-text-editor-container">
                    <!-- Visual Editor -->
                    <div id="cms-modal-visual" 
                         contenteditable="true"
                         class="w-full px-8 py-6 rounded-3xl bg-slate-50 border border-slate-100 focus:ring-4 focus:ring-tech-cyan/10 focus:border-tech-cyan outline-none transition-all font-medium text-slate-700 leading-relaxed text-sm min-h-[300px] max-h-[500px] overflow-y-auto mb-4">
                    </div>

                    <!-- Code Editor (Initially Hidden) -->
                    <textarea id="cms-modal-textarea" 
                              rows="10" 
                              class="hidden w-full px-8 py-6 rounded-3xl bg-slate-900 border border-slate-800 focus:ring-4 focus:ring-tech-cyan/10 focus:border-tech-cyan outline-none transition-all font-mono text-cyan-400 leading-relaxed text-xs resize-none min-h-[300px]"
                              placeholder="Saisissez votre code HTML ici..."></textarea>
                </div>

                <!-- Media Editor (Upload and Preview) -->
                <div id="cms-media-editor-container" class="hidden space-y-6">
                    <div class="bg-slate-50 p-8 rounded-[32px] border border-slate-100">
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-4">Source du Média</label>
                        
                        <div class="space-y-4">
                            <!-- File Upload -->
                            <div class="relative group/upload">
                                <input type="file" id="cms-modal-file-input" class="hidden" accept="image/*,video/*">
                                <div onclick="document.getElementById('cms-modal-file-input').click()" 
                                     class="w-full flex flex-col items-center justify-center px-6 py-8 border-2 border-dashed border-slate-200 rounded-2xl bg-white hover:border-tech-cyan/50 transition-all cursor-pointer group-hover/upload:shadow-sm">
                                    <div class="w-10 h-10 rounded-full bg-tech-cyan/10 text-tech-cyan flex items-center justify-center mb-3 group-hover/upload:scale-110 transition-transform">
                                        <i data-lucide="upload-cloud" class="w-5 h-5"></i>
                                    </div>
                                    <span class="text-xs font-bold text-slate-600 mb-1" id="cms-upload-label">Cliquer pour téléverser</span>
                                    <span class="text-[10px] text-slate-400">MP4, JPG, PNG (max 100 Mo)</span>
                                </div>
                            </div>

                            <div class="p-4 rounded-xl bg-tech-cyan/5 border border-tech-cyan/10">
                                <div class="flex gap-3">
                                    <i data-lucide="info" class="w-4 h-4 text-tech-cyan shrink-0"></i>
                                    <p class="text-[9px] text-slate-500 leading-relaxed font-medium">
                                        <strong class="text-tech-cyan uppercase tracking-wider block mb-1">Conseil Pro</strong>
                                        Pour les bannières, utilisez une vidéo MP4 optimisée en 1920x1080 sans son pour une performance maximale.
                                    </p>
                                </div>
                            </div>

                            <div class="relative flex items-center justify-center py-2">
                                <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-slate-200"></div></div>
                                <span class="relative bg-slate-50 px-3 text-[10px] font-black text-slate-300 uppercase tracking-widest">OU</span>
                            </div>

                            <!-- URL Input -->
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                                    <i data-lucide="link" class="w-3 h-3"></i>
                                </div>
                                <input type="text" id="cms-modal-media-url" 
                                       class="w-full pl-10 pr-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-tech-cyan/10 focus:border-tech-cyan outline-none transition-all text-xs font-bold text-tech-navy placeholder:text-slate-300"
                                       placeholder="Coller un lien externe ici...">
                            </div>
                        </div>

                        <!-- Preview Section -->
                        <div class="mt-6 pt-6 border-t border-slate-200">
                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-4">Prévisualisation</label>
                            <div class="aspect-video max-h-48 rounded-2xl bg-slate-50 border border-slate-200 overflow-hidden flex items-center justify-center relative shadow-inner w-full">
                                <img id="cms-modal-media-preview-img" src="" class="hidden w-full h-full object-contain">
                                <video id="cms-modal-media-preview-vid" src="" class="hidden w-full h-full object-contain" autoplay muted loop></video>
                                <div id="cms-modal-media-preview-empty" class="text-slate-300 text-center p-4">
                                    <i data-lucide="image" class="w-8 h-8 mx-auto mb-2 opacity-30"></i>
                                    <div class="text-[9px] font-black uppercase tracking-widest">Aperçu en direct</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Icon Editor -->
                <div id="cms-icon-editor-container" class="hidden space-y-6">
                    <div class="bg-slate-50 p-8 rounded-[32px] border border-slate-100">
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-4">Nom de l'icône Lucide</label>
                        
                        <div class="space-y-4">
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                                    <i data-lucide="search" class="w-3 h-3"></i>
                                </div>
                                <input type="text" id="cms-modal-icon-name" 
                                       class="w-full pl-10 pr-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-tech-cyan/10 focus:border-tech-cyan outline-none transition-all text-xs font-bold text-tech-navy placeholder:text-slate-300"
                                       placeholder="Ex: zap, check, home...">
                            </div>

                            <div class="p-4 rounded-xl bg-tech-cyan/5 border border-tech-cyan/10">
                                <div class="flex gap-3">
                                    <i data-lucide="info" class="w-4 h-4 text-tech-cyan shrink-0"></i>
                                    <p class="text-[9px] text-slate-500 leading-relaxed font-medium">
                                        <strong class="text-tech-cyan uppercase tracking-wider block mb-1">Bibliothèque Lucide</strong>
                                        Utilisez les noms d'icônes de la bibliothèque <a href="https://lucide.dev/icons" target="_blank" class="text-tech-navy underline font-black">Lucide.dev</a>.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Icon Preview Section -->
                        <div class="mt-8 pt-8 border-t border-slate-200">
                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-4">Prévisualisation</label>
                            <div class="w-24 h-24 mx-auto rounded-2xl bg-white border border-slate-200 overflow-hidden flex items-center justify-center relative shadow-inner group/icon-preview">
                                <div id="cms-modal-icon-preview" class="text-tech-cyan transition-transform duration-500 group-hover/icon-preview:scale-125">
                                    <i data-lucide="help-circle" class="w-10 h-10"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Actions (Sticky bottom) -->
        <div class="px-8 py-5 border-t border-slate-100 bg-slate-50 flex-shrink-0">
            <div class="flex gap-4">
                <button id="cms-modal-cancel" class="flex-1 py-5 rounded-2xl bg-slate-50 text-slate-500 font-black text-xs uppercase tracking-widest hover:bg-slate-100 transition-all active:scale-95">
                    Annuler
                </button>
                <button id="cms-modal-save" class="flex-[1.5] py-5 rounded-2xl bg-tech-navy text-white font-black text-xs uppercase tracking-widest hover:bg-tech-cyan shadow-xl shadow-tech-cyan/20 transition-all active:scale-95 group flex items-center justify-center space-x-2">
                    <span>Sauvegarder</span>
                    <i data-lucide="check" class="w-4 h-4 opacity-0 group-hover:opacity-100 transition-all -translate-x-2 group-hover:translate-x-0"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<style>
    #cms-editor-modal.active {
        visibility: visible;
        opacity: 1;
    }
    #cms-editor-modal.active #cms-modal-card {
        transform: translateY(0);
    }
    #cms-modal-textarea::-webkit-scrollbar {
        width: 6px;
    }
    #cms-modal-textarea::-webkit-scrollbar-thumb {
        background: #e2e8f0;
        border-radius: 10px;
    }
    #cms-modal-textarea::-webkit-scrollbar-track,
    .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }
    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #e2e8f0;
        border-radius: 10px;
    }
</style>
