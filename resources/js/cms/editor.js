/**
 * ARIC CMS Editor - Centralized Event Handling
 */

class CmsEditor {
    constructor() {
        this.isDirty = false;
        this.pendingCount = 0;
        this.init();
    }

    init() {
        console.log('ARIC CMS Editor Initialized - Centralized Mode');
        this.setupEventListeners();
    }

    setupEventListeners() {
        // Toolbar actions
        document.getElementById('cms-publish')?.addEventListener('click', () => this.publish());
        document.getElementById('cms-undo')?.addEventListener('click', () => this.undo());
        document.getElementById('cms-toggle-preview')?.addEventListener('click', () => this.setMode('preview'));
        document.getElementById('cms-toggle-live')?.addEventListener('click', () => this.setMode('live'));
        document.getElementById('cms-toggle-history')?.addEventListener('click', () => this.openHistoryModal());
        
        // Modal general actions
        document.getElementById('cms-history-close')?.addEventListener('click', () => this.closeHistoryModal());
        document.getElementById('cms-history-cancel')?.addEventListener('click', () => this.closeHistoryModal());
        document.getElementById('cms-history-backdrop')?.addEventListener('click', () => this.closeHistoryModal());

        // CENTRALIZED CLICK HANDLER for edit buttons
        // This solves the event bubbling/link-navigation issue
        document.addEventListener('click', (e) => {
            const editBtn = e.target.closest('[data-cms-trigger]');
            if (editBtn) {
                e.preventDefault();
                e.stopPropagation();
                
                const key = editBtn.getAttribute('data-cms-trigger');
                const type = editBtn.getAttribute('data-cms-trigger-type') || 'text';
                
                this.edit(key, type);
                return;
            }
        }, true); // Use capture phase to intercept even better
    }

    async edit(key, type) {
        console.log(`CMS Edit triggered: ${key} (${type})`);
        
        const element = document.querySelector(`[data-cms-key="${key}"]`);
        if (!element) {
            console.error(`Target element not found for key: ${key}`);
            return;
        }
        
        const innerContent = element.querySelector('.cms-inner-content');
        let currentValue = '';

        if (type === 'image' || type === 'video' || type === 'media') {
            const mediaTag = innerContent ? innerContent.querySelector('img, video, source') : element.querySelector('img, video, source');
            currentValue = mediaTag ? mediaTag.getAttribute('src') : '';
        } else {
            currentValue = innerContent ? innerContent.innerHTML.trim() : element.innerHTML.trim();
        }
        
        this.openModal(key, type, currentValue);
    }

    openModal(key, type, value) {
        // Defensive check for all modal elements
        const elements = {
            modal: document.getElementById('cms-editor-modal'),
            textarea: document.getElementById('cms-modal-textarea'),
            visual: document.getElementById('cms-modal-visual'),
            mediaUrl: document.getElementById('cms-modal-media-url'),
            iconName: document.getElementById('cms-modal-icon-name'),
            textContainer: document.getElementById('cms-text-editor-container'),
            mediaContainer: document.getElementById('cms-media-editor-container'),
            iconContainer: document.getElementById('cms-icon-editor-container'),
            toolbar: document.getElementById('cms-wysiwyg-toolbar'),
            typeToggle: document.getElementById('cms-editor-type-toggle'),
            keyLabel: document.getElementById('cms-modal-key'),
            typeLabel: document.getElementById('cms-modal-type'),
            saveBtn: document.getElementById('cms-modal-save')
        };

        // If any critical element is missing, abort gracefully
        for (const [name, el] of Object.entries(elements)) {
            if (!el && name !== 'toolbar' && name !== 'typeToggle' && name !== 'iconName' && name !== 'iconContainer') {
                console.error(`CMS Modal ERROR: Critical element missing: ${name}`);
                return;
            }
        }

        elements.keyLabel.innerText = `ID : ${key}`;
        
        // Visibility logic
        elements.textContainer.classList.add('hidden');
        elements.mediaContainer.classList.add('hidden');
        if (elements.iconContainer) elements.iconContainer.classList.add('hidden');
        if (elements.toolbar) elements.toolbar.classList.add('hidden');
        if (elements.typeToggle) elements.typeToggle.classList.add('hidden');

        if (type === 'image' || type === 'video' || type === 'media') {
            elements.typeLabel.innerText = type === 'media' ? 'Édition Média (Image/Vidéo)' : (type === 'image' ? 'Édition Image' : 'Édition Vidéo');
            elements.mediaContainer.classList.remove('hidden');
            elements.mediaUrl.value = value || '';
            
            // For 'media' type, we detect if the current value is image or video
            let detectedType = type;
            if (type === 'media' && value) {
                const ext = value.split('.').pop().split(/#|\?/)[0].toLowerCase();
                detectedType = ['mp4', 'webm', 'ogg', 'mov', 'avi', 'wmv', 'mkv'].includes(ext) ? 'video' : 'image';
            }
            
            this.updateMediaPreview(value, detectedType);
            
            elements.mediaUrl.oninput = () => {
                let currentUrl = elements.mediaUrl.value;
                let currentType = type;
                if (type === 'media' && currentUrl) {
                    const ext = currentUrl.split('.').pop().split(/#|\?/)[0].toLowerCase();
                    currentType = ['mp4', 'webm', 'ogg', 'mov', 'avi', 'wmv', 'mkv'].includes(ext) ? 'video' : 'image';
                }
                this.updateMediaPreview(currentUrl, currentType);
            };

            const fileInput = document.getElementById('cms-modal-file-input');
            const uploadLabel = document.getElementById('cms-upload-label');
            if (fileInput) {
                fileInput.value = '';
                fileInput.onchange = (e) => {
                    const file = e.target.files[0];
                    if (file) {
                        if (uploadLabel) uploadLabel.innerText = file.name;
                        const localUrl = URL.createObjectURL(file);
                        this.updateMediaPreview(localUrl, type);
                    }
                };
            }
        } else if (type === 'icon') {
            elements.typeLabel.innerText = 'Édition Icône';
            if (elements.iconContainer) elements.iconContainer.classList.remove('hidden');
            if (elements.iconName) {
                elements.iconName.value = value || '';
                this.updateIconPreview(value);
                elements.iconName.oninput = () => this.updateIconPreview(elements.iconName.value);
            }
        } else {
            elements.typeLabel.innerText = type === 'text' ? 'Édition Visuelle' : 'Édition Expert';
            elements.textContainer.classList.remove('hidden');
            if (elements.toolbar) elements.toolbar.classList.remove('hidden');
            if (elements.typeToggle) elements.typeToggle.classList.remove('hidden');
            
            elements.textarea.value = value || '';
            elements.visual.innerHTML = value || '';
            
            // Critical: re-render icons inside the modal after setting content
            setTimeout(() => {
                if (window.lucide) {
                    window.lucide.createIcons({
                        root: elements.visual
                    });
                }
            }, 50);
        }
        
        elements.modal.classList.add('active');
        document.body.style.overflow = 'hidden';

        // Re-setup one-time listeners for this specific edit session
        const setMode = (mode) => {
            if (mode === 'visual') {
                elements.visual.innerHTML = elements.textarea.value;
                elements.visual.classList.remove('hidden');
                elements.textarea.classList.add('hidden');
                if (elements.toolbar) elements.toolbar.classList.remove('hidden');
                document.getElementById('cms-mode-visual')?.classList.add('bg-white', 'text-tech-navy', 'shadow-sm');
                document.getElementById('cms-mode-code')?.classList.remove('bg-white', 'text-tech-navy', 'shadow-sm');
            } else {
                elements.textarea.value = elements.visual.innerHTML;
                elements.visual.classList.add('hidden');
                elements.textarea.classList.remove('hidden');
                if (elements.toolbar) elements.toolbar.classList.add('hidden');
                document.getElementById('cms-mode-code')?.classList.add('bg-white', 'text-tech-navy', 'shadow-sm');
                document.getElementById('cms-mode-visual')?.classList.remove('bg-white', 'text-tech-navy', 'shadow-sm');
            }
        };

        const btnVisual = document.getElementById('cms-mode-visual');
        const btnCode = document.getElementById('cms-mode-code');
        if (btnVisual) btnVisual.onclick = () => setMode('visual');
        if (btnCode) btnCode.onclick = () => setMode('code');

        // Wysiwyg tools
        if (elements.toolbar) {
            elements.toolbar.querySelectorAll('[data-command]').forEach(btn => {
                btn.onclick = (e) => {
                    e.preventDefault();
                    const command = btn.dataset.command;
                    
                    if (command === 'createLink') {
                        const selection = window.getSelection();
                        if (selection.anchorNode) {
                            const parent = (selection.anchorNode.nodeType === 3 ? selection.anchorNode.parentElement : selection.anchorNode).closest('a');
                            const defaultUrl = parent ? parent.getAttribute('href') : 'https://';
                            const url = prompt('Entrez l\'URL du lien :', defaultUrl);
                            if (url) {
                                if (parent) {
                                    // Manually update the existing link to be 100% sure
                                    parent.setAttribute('href', url);
                                } else {
                                    // Create new link
                                    document.execCommand('createLink', false, url);
                                }
                                elements.textarea.value = elements.visual.innerHTML;
                            }
                        }
                    } else if (command === 'deleteItem') {
                        const selection = window.getSelection();
                        if (selection.anchorNode) {
                            const target = (selection.anchorNode.nodeType === 3 ? selection.anchorNode.parentElement : selection.anchorNode).closest('a') || 
                                           (selection.anchorNode.nodeType === 3 ? selection.anchorNode.parentElement : selection.anchorNode);
                            
                            if (target && target !== elements.visual) {
                                if (confirm('Voulez-vous vraiment supprimer cet élément ?')) {
                                    target.remove();
                                    elements.textarea.value = elements.visual.innerHTML;
                                }
                            }
                        }
                    } else if (command === 'addSocial') {
                        const icon = prompt('Entrez le nom de l\'icône Lucide (ex: facebook, linkedin, twitter, instagram)');
                        if (!icon) return;
                        const url = prompt('Entrez l\'URL du lien (ex: https://...)');
                        if (!url) return;
                        
                        const socialHtml = `
                            <a href="${url}" target="_blank" class="w-12 h-12 rounded-2xl bg-white border border-slate-200 flex items-center justify-center text-slate-500 hover:text-[#00a4bd] hover:border-[#00a4bd] transition-all shadow-sm mx-1 inline-flex">
                                <i data-lucide="${icon}" class="w-5 h-5"></i>
                            </a>
                        `;
                        document.execCommand('insertHTML', false, socialHtml);
                        if (window.lucide) window.lucide.createIcons();
                    } else {
                        document.execCommand(command, false, null);
                    }
                    elements.visual.focus();
                };
            });
        }

        // Save logic
        elements.saveBtn.onclick = async () => {
            let newValue = '';
            if (type === 'image' || type === 'video' || type === 'media') {
                const fileInput = document.getElementById('cms-modal-file-input');
                if (fileInput && fileInput.files.length > 0) {
                    this.showLoading();
                    const formData = new FormData();
                    formData.append('file', fileInput.files[0]);
                    try {
                        const resp = await fetch('/api/cms/upload', {
                            method: 'POST',
                            headers: { 
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content,
                                'Accept': 'application/json'
                            },
                            body: formData
                        });
                        const res = await resp.json();
                        
                        if (resp.ok && res.success) {
                            newValue = res.url;
                        } else {
                            let msg = res.message || 'Erreur lors du téléchargement.';
                            if (res.errors && res.errors.file) {
                                msg = res.errors.file[0];
                            }
                            throw new Error(msg);
                        }
                    } catch (err) {
                        this.notify('error', 'Échec du téléchargement: ' + err.message);
                        this.hideLoading();
                        return;
                    }
                } else {
                    newValue = elements.mediaUrl.value;
                }
            } else if (type === 'icon') {
                newValue = elements.iconName.value;
            } else {
                const isVisual = !elements.visual.classList.contains('hidden');
                newValue = isVisual ? elements.visual.innerHTML : elements.textarea.value;
            }
            
            await this.saveDraft(key, newValue);
            this.closeModal();
            // Reset upload UI
            const fileInput = document.getElementById('cms-modal-file-input');
            if (fileInput) fileInput.value = '';
            const uploadLabel = document.getElementById('cms-upload-label');
            if (uploadLabel) uploadLabel.innerText = 'Cliquer pour téléverser';
        };

        // Close actions bind once per open
        ['cms-modal-close', 'cms-modal-cancel', 'cms-modal-backdrop'].forEach(id => {
            const el = document.getElementById(id);
            if (el) el.onclick = () => this.closeModal();
        });

        if (window.lucide) window.lucide.createIcons();
    }

    updateMediaPreview(url, type) {
        const img = document.getElementById('cms-modal-media-preview-img');
        const vid = document.getElementById('cms-modal-media-preview-vid');
        const empty = document.getElementById('cms-modal-media-preview-empty');
        if (!img || !vid || !empty) return;
        
        img.classList.add('hidden');
        vid.classList.add('hidden');
        empty.classList.add('hidden');

        if (!url || url.trim() === '') {
            empty.classList.remove('hidden');
            return;
        }

        if (type === 'image') {
            img.src = url;
            img.classList.remove('hidden');
            img.onerror = () => { img.classList.add('hidden'); empty.classList.remove('hidden'); };
        } else {
            vid.src = url;
            vid.classList.remove('hidden');
            vid.onerror = () => { vid.classList.add('hidden'); empty.classList.remove('hidden'); };
        }
    }

    updateIconPreview(name) {
        const preview = document.getElementById('cms-modal-icon-preview');
        if (!preview) return;
        
        if (!name || name.trim() === '') {
            preview.innerHTML = '<i data-lucide="help-circle" class="w-10 h-10"></i>';
        } else {
            preview.innerHTML = `<i data-lucide="${name}" class="w-10 h-10"></i>`;
        }
        
        if (window.lucide) window.lucide.createIcons();
    }

    closeModal() {
        const modal = document.getElementById('cms-editor-modal');
        if (modal) modal.classList.remove('active');
        document.body.style.overflow = '';
    }

    async saveDraft(key, value) {
        this.showLoading();
        try {
            const response = await fetch('/api/cms/update-draft', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
                },
                body: JSON.stringify({ key, value })
            });
            const result = await response.json();
            if (result.success) {
                this.notify('success', 'Brouillon sauvegardé');
                this.updateUIScaling(key, value);
                this.incrementPending();
            } else throw new Error(result.message);
        } catch (error) {
            this.notify('error', 'Erreur : ' + error.message);
        } finally {
            this.hideLoading();
        }
    }

    async publish() {
        if (!confirm('Voulez-vous publier toutes les modifications en attente ?')) return;
        this.showLoading();
        try {
            const response = await fetch('/api/cms/publish', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
                }
            });
            const result = await response.json();
            if (result.success) {
                this.notify('success', result.message);
                setTimeout(() => window.location.reload(), 1500);
            }
        } catch (error) { this.notify('error', 'Erreur de publication'); }
        finally { this.hideLoading(); }
    }

    updateUIScaling(key, value) {
        const element = document.querySelector(`[data-cms-key="${key}"]`);
        if (element) {
            const type = element.getAttribute('data-cms-type');
            const innerContent = element.querySelector('.cms-inner-content');
            if (innerContent) {
                if (type === 'image' || type === 'video' || type === 'media') {
                    const ext = value.split('.').pop().split(/#|\?/)[0].toLowerCase();
                    const isVideoUrl = ['mp4', 'webm', 'ogg', 'mov'].includes(ext);
                    const isImageUrl = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg'].includes(ext);
                    
                    let currentTag = innerContent.querySelector('img, video');
                    if (currentTag) {
                        const classes = currentTag.className;
                        
                        if (isVideoUrl && currentTag.tagName === 'IMG') {
                            const newVideo = document.createElement('video');
                            newVideo.className = classes;
                            newVideo.autoplay = true;
                            newVideo.muted = true;
                            newVideo.loop = true;
                            newVideo.playsInline = true;
                            newVideo.innerHTML = `<source src="${value}" type="video/${ext === 'mov' ? 'quicktime' : ext}">`;
                            currentTag.parentNode.replaceChild(newVideo, currentTag);
                        } else if (isImageUrl && currentTag.tagName === 'VIDEO') {
                            const newImg = document.createElement('img');
                            newImg.className = classes;
                            newImg.src = value;
                            currentTag.parentNode.replaceChild(newImg, currentTag);
                        } else {
                            if (currentTag.tagName === 'VIDEO') {
                                const source = currentTag.querySelector('source');
                                if (source) {
                                    source.setAttribute('src', value);
                                    source.setAttribute('type', 'video/' + (ext === 'mov' ? 'quicktime' : ext));
                                    currentTag.load();
                                    const playPromise = currentTag.play();
                                    if (playPromise !== undefined) {
                                        playPromise.catch(error => console.log('Auto-play prevented on live update', error));
                                    }
                                } else {
                                    currentTag.setAttribute('src', value);
                                    currentTag.load();
                                    const playPromise = currentTag.play();
                                    if (playPromise !== undefined) {
                                        playPromise.catch(error => console.log('Auto-play prevented on live update', error));
                                    }
                                }
                            } else {
                                currentTag.setAttribute('src', value);
                            }
                        }
                    } else {
                        // FALLBACK FOR MEDIA PLACEHOLDERS
                        if (isVideoUrl) {
                            innerContent.innerHTML = `<video autoplay muted loop playsinline class="w-full h-full object-cover"><source src="${value}" type="video/${ext === 'mov' ? 'quicktime' : ext}"></video>`;
                        } else if (isImageUrl) {
                            innerContent.innerHTML = `<img src="${value}" class="w-full h-full object-cover" alt="">`;
                        }
                    }
                } else if (type === 'icon') {
                    const iconTag = innerContent.querySelector('[data-lucide]');
                    if (iconTag) {
                        iconTag.setAttribute('data-lucide', value);
                        if (window.lucide) window.lucide.createIcons();
                    } else {
                        // FALLBACK FOR ICON PLACEHOLDERS
                        innerContent.innerHTML = `<i data-lucide="${value}"></i>`;
                        if (window.lucide) window.lucide.createIcons();
                    }
                } else innerContent.innerHTML = value;
            }
            element.classList.add('cms-updated');
            setTimeout(() => element.classList.remove('cms-updated'), 2000);
        }
    }

    incrementPending() {
        this.pendingCount++;
        const el = document.getElementById('cms-pending-count');
        if (el) el.innerText = this.pendingCount;
    }

    undo() {
        if (confirm('Rafraîchir la page ? Les changements non publiés seront conservés en brouillon.')) {
            window.location.reload();
        }
    }

    async setMode(mode) {
        this.showLoading();
        try {
            const response = await fetch('/api/cms/set-mode', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
                },
                body: JSON.stringify({ mode })
            });
            const result = await response.json();
            if (result.success) {
                window.location.reload();
            }
        } catch (err) { this.notify('error', 'Erreur de mode'); }
        finally { this.hideLoading(); }
    }

    async openHistoryModal() {
        const modal = document.getElementById('cms-history-modal');
        const list = document.getElementById('cms-history-list');
        if (!modal || !list) return;
        
        modal.classList.add('active');
        list.innerHTML = '<div class="py-12 text-center text-slate-300 italic uppercase tracking-widest text-[10px]">Chargement...</div>';

        try {
            const response = await fetch('/api/cms/history');
            const result = await response.json();
            if (result.success && result.data.length > 0) {
                list.innerHTML = result.data.map(item => `
                    <div class="history-item flex justify-between items-center p-4 border-b border-slate-50 hover:bg-slate-50 transition-colors">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-xl bg-tech-cyan/10 flex items-center justify-center text-tech-cyan font-bold text-xs">
                                JS
                            </div>
                            <div>
                                <p class="text-xs font-black text-tech-navy uppercase">${item.content?.key || 'clé inconnue'}</p>
                                <p class="text-[9px] text-slate-400 font-bold uppercase mt-0.5">v.${item.version_number} • ${new Date(item.created_at).toLocaleDateString()}</p>
                            </div>
                        </div>
                        <button onclick="window.cmsEditor.rollback(${item.id})" class="px-4 py-2 bg-tech-navy text-white text-[9px] font-black uppercase tracking-widest rounded-lg hover:bg-tech-cyan transition-all">
                            Restaurer
                        </button>
                    </div>
                `).join('');
            } else {
                list.innerHTML = '<div class="py-12 text-center text-slate-300 italic text-[10px] uppercase">Aucun historique</div>';
            }
        } catch (e) { list.innerHTML = '<div class="py-12 text-center text-red-400 italic">Erreur</div>'; }
    }

    closeHistoryModal() {
        const modal = document.getElementById('cms-history-modal');
        if (modal) modal.classList.remove('active');
    }

    async rollback(id) {
        if (!confirm('Restaurer cette version ?')) return;
        this.showLoading();
        try {
            const res = await fetch('/api/cms/rollback', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
                },
                body: JSON.stringify({ version_id: id })
            });
            const result = await res.json();
            if (result.success) window.location.reload();
        } catch (e) { this.notify('error', 'Erreur rollback'); }
        finally { this.hideLoading(); }
    }

    async moveSection(key, direction) {
        this.showLoading();
        try {
            // Get page name from URL or a data attribute
            const pathParts = window.location.pathname.split('/').filter(p => p !== '');
            const page = pathParts.length > 0 ? pathParts[pathParts.length - 1] : 'welcome';
            const response = await fetch('/api/cms/sections/reorder', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
                },
                body: JSON.stringify({ key, direction, page })
            });
            const result = await response.json();
            if (result.success) {
                this.notify('success', 'Ordre des sections mis à jour');
                // Optional: Re-order DOM elements without reload for even better UX
                window.location.reload(); 
            } else throw new Error(result.message);
        } catch (error) {
            this.notify('error', 'Erreur : ' + error.message);
        } finally {
            this.hideLoading();
        }
    }

    toggleSectionsEdit() {
        const sections = document.querySelectorAll('[data-cms-section]');
        const btn = document.getElementById('cms-manage-sections');
        const isActive = btn.classList.contains('bg-tech-cyan/20');

        if (isActive) {
            btn.classList.remove('bg-tech-cyan/20', 'text-tech-cyan', 'border-tech-cyan/30');
            sections.forEach(s => s.classList.remove('cms-section-editing'));
        } else {
            btn.classList.add('bg-tech-cyan/20', 'text-tech-cyan', 'border-tech-cyan/30');
            sections.forEach(s => s.classList.add('cms-section-editing'));
            if (window.lucide) window.lucide.createIcons();
        }
    }

    notify(type, message) {
        const toast = document.createElement('div');
        const color = type === 'success' ? '#00a4bd' : '#ef4444';
        toast.className = 'fixed bottom-10 right-10 z-[3000] bg-tech-navy text-white px-8 py-4 rounded-2xl shadow-2xl border border-white/10 flex items-center space-x-3 transform transition-all translate-y-20 opacity-0';
        toast.innerHTML = `<div class="w-2 h-2 rounded-full" style="background:${color}"></div><span class="font-bold text-xs uppercase tracking-widest">${message}</span>`;
        document.body.appendChild(toast);
        requestAnimationFrame(() => { toast.style.transform = 'translateY(0)'; toast.style.opacity = '1'; });
        setTimeout(() => {
            toast.style.transform = 'translateY(20px)'; toast.style.opacity = '0';
            setTimeout(() => toast.remove(), 500);
        }, 3000);
    }

    showLoading() {
        const btn = document.getElementById('cms-publish');
        if (btn) btn.innerText = 'Chargement...';
    }

    hideLoading() {
        const btn = document.getElementById('cms-publish');
        if (btn) btn.innerText = 'Publier';
    }
}

window.cmsEditor = new CmsEditor();
