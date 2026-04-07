<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'ARIC | Expert en Solutions Multitechniques' }}</title>
    <meta name="description" content="{{ $description ?? 'Expert en Solutions Multitechniques : Froid Commercial, Industriel & Solaire, Génie Climatique et Efficacité Énergétique.' }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- SEO & Social Media (OpenGraph / Twitter) -->
    <meta property="og:title" content="{{ $title ?? 'ARIC | Expert en Solutions Multitechniques' }}">
    <meta property="og:description" content="{{ $description ?? 'Expert en Solutions Multitechniques : Froid Commercial, Industriel & Solaire, Génie Climatique et Efficacité Énergétique.' }}">
    <meta property="og:image" content="{{ url('/logo.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? 'ARIC | Expert en Solutions Multitechniques' }}">
    <meta name="twitter:description" content="{{ $description ?? 'Expert en Solutions Multitechniques : Froid Commercial, Industriel & Solaire, Génie Climatique et Efficacité Énergétique.' }}">
    <meta name="twitter:image" content="{{ url('/logo.png') }}">

    <!-- PWA -->
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#0a192f">

    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "ARIC",
      "url": "{{ url('/') }}",
      "logo": "{{ url('/logo.png') }}",
      "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "+221 33 000 00 00",
        "contactType": "customer service"
      }
    }
    </script>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'tech-navy': 'var(--tech-navy, #0a192f)',
                        'tech-cobalt': 'var(--tech-cobalt, #1e3a8a)',
                        'tech-cyan': 'var(--tech-cyan, #00a4bd)',
                        'tech-light': 'var(--tech-light, #f8fafc)',
                    },
                    fontFamily: {
                        sans: ['var(--font-main, "Plus Jakarta Sans")', 'sans-serif'],
                    },
                    backgroundImage: {
                        'hero-glow': 'radial-gradient(circle at 50% 50%, rgba(var(--tech-cyan-rgb, 0, 164, 189), 0.1) 0%, transparent 70%)',
                    }
                }
            }
        }
    </script>

    <style>
        :root {
            --tech-navy: #0a192f;
            --tech-cobalt: #1e3a8a;
            --tech-cyan: #00a4bd;
            --tech-cyan-rgb: 0, 164, 189;
            --tech-light: #f8fafc;
            --font-main: "Plus Jakarta Sans";
            --base-font-size: 16px;
            --spacing-scale: 1;
        }

        /* Dark Mode Theme Overrides */
        html.dark body {
            background-color: #050b14 !important;
            background-image: none !important;
            color: #f8fafc !important;
        }
        html.dark .glass, 
        html.dark .senior-glass,
        html.dark .bg-white,
        html.dark .bg-slate-50 {
            background-color: rgba(15, 23, 42, 0.8) !important;
            backdrop-filter: blur(12px);
            border-color: rgba(255, 255, 255, 0.1) !important;
            color: #f8fafc !important;
        }
        html.dark h1, html.dark h2, html.dark h3, html.dark h4, html.dark p, html.dark span:not(.text-tech-cyan) {
            color: #f8fafc !important;
        }
        html.dark .text-slate-900, html.dark .text-slate-800, html.dark .text-slate-700, html.dark .text-slate-600, html.dark .text-slate-500 {
            color: #cbd5e1 !important;
        }
        html.dark border-slate-100, html.dark border-slate-200, html.dark border-gray-100 {
            border-color: rgba(255, 255, 255, 0.05) !important;
        }

        /* Spacing Scale Application */
        section[data-cms-section]:not(#cms-section-hero) {
            padding-top: calc(5rem * var(--spacing-scale)) !important;
            padding-bottom: calc(5rem * var(--spacing-scale)) !important;
        }
        
        /* Specific override for HERO and other sections that should be even more compact */
        .spacing-compact section[data-cms-section]:not(#cms-section-hero) {
            padding-top: calc(2rem * var(--spacing-scale)) !important;
            padding-bottom: calc(2rem * var(--spacing-scale)) !important;
        }

        /* Ensure CMS Controls are visible even on white background */
        [onclick*="moveSection"] {
            background-color: rgba(10, 25, 47, 0.95) !important;
            color: #00a4bd !important; /* tech-cyan */
            border: 1px solid rgba(255, 255, 255, 0.2) !important;
            box-shadow: 0 4px 12px rgba(0,0,0,0.3) !important;
        }
        [onclick*="moveSection"]:hover {
            background-color: #00a4bd !important;
            color: #0a192f !important;
        }

        body {
            background: #ffffff url('/bg-waves.svg') repeat-y center top;
            background-size: 100% auto;
            background-attachment: fixed;
            overflow-x: hidden;
            font-size: var(--base-font-size);
        }
        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.07);
        }
        .text-gradient {
            background: linear-gradient(135deg, #0891b2 0%, #1e3a8a 100%);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .text-gradient-light {
            background: linear-gradient(135deg, #fff 0%, #0891b2 100%);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .grid-pattern {
            background-image: linear-gradient(rgba(8, 145, 178, 0.03) 1px, transparent 1px),
                              linear-gradient(90deg, rgba(8, 145, 178, 0.03) 1px, transparent 1px);
            background-size: 60px 60px;
        }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        .video-overlay {
            background: linear-gradient(to bottom, rgba(10, 25, 47, 0.6) 0%, rgba(10, 25, 47, 0.4) 50%, rgba(10, 25, 47, 0.8) 100%);
        }
        .senior-glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .shimmer {
            position: relative;
            overflow: hidden;
        }
        .shimmer::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -60%;
            width: 20%;
            height: 200%;
            background: rgba(255, 255, 255, 0.2);
            transform: rotate(30deg);
            animation: shimmer 4s infinite;
        }
        @keyframes shimmer {
            0% { left: -60%; }
            20% { left: 120%; }
            100% { left: 120%; }
        }
        @keyframes pulse-soft {
            0% { transform: scale(1); box-shadow: 0 0 0 0 rgba(239, 0, 50, 0.4); }
            70% { transform: scale(1.05); box-shadow: 0 0 0 10px rgba(239, 0, 50, 0); }
            100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(239, 0, 50, 0); }
        }
        .assistance-pulse {
            animation: pulse-soft 2s infinite;
        }
        .hover-lift {
            transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.3s ease;
        }
        .hover-lift:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(8, 145, 178, 0.15);
            background: rgba(255, 255, 255, 0.95);
            border-color: rgba(8, 145, 178, 0.3);
        }
        html, body {
            overflow-x: hidden !important;
            width: 100%;
            position: relative;
            -webkit-overflow-scrolling: touch;
        }
        [data-aos] {
            pointer-events: none;
        }
        [data-aos].aos-animate {
            pointer-events: auto;
        }
        @keyframes fade-in-up {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up {
            animation: fade-in-up 0.5s ease-out forwards;
        }

        /* Live Preview Mode */
        body.cms-preview-mode [onclick*="moveSection"],
        body.cms-preview-mode .cms-edit-button,
        body.cms-preview-mode .cms-section-label,
        body.cms-preview-mode div[class*="absolute"][class*="z-[1000]"][class*="group-hover/section"] {
            display: none !important;
        }
    </style>
</head>
<body class="bg-gray-50 font-['Plus_Jakarta_Sans'] text-slate-900 overflow-x-hidden relative">
    <!-- Scroll Progress Bar -->
    <div id="scroll-progress" class="fixed top-0 left-0 h-1 bg-tech-cyan z-[9999] transition-all duration-150" style="width: 0%"></div>
    
    <!-- Back to Top Button -->
    <button id="back-to-top" class="fixed bottom-8 right-8 z-[150] w-14 h-14 bg-tech-navy/90 backdrop-blur-xl border border-tech-cyan/30 text-tech-cyan rounded-2xl shadow-2xl flex items-center justify-center opacity-0 translate-y-10 pointer-events-none transition-all duration-500 hover:bg-tech-cyan hover:text-tech-navy group">
        <i data-lucide="chevron-up" class="w-6 h-6 group-hover:scale-110 transition-transform"></i>
    </button>
    
    <x-site.header />
    
    @if(auth()->check())
        <x-cms-settings-drawer />
    @endif

    <main>
        {{ $slot }}
    </main>

    <x-site.footer />

    @if(session('success'))
        <div class="fixed bottom-10 left-10 z-[200] bg-tech-navy text-white px-8 py-4 rounded-2xl shadow-2xl border border-tech-cyan/30 animate-fade-in-up flex items-center space-x-3">
            <div class="w-2 h-2 bg-tech-cyan rounded-full animate-ping"></div>
            <span class="font-bold text-sm tracking-wide">{{ session('success') }}</span>
            <button onclick="this.parentElement.remove()" class="ml-4 text-white/50 hover:text-white transition-colors">
                <i data-lucide="x" class="w-4 h-4"></i>
            </button>
        </div>
    @endif

    @if(auth()->check())
        <div class="fixed top-24 right-4 z-[200] flex flex-col items-end space-y-2">
            <div class="bg-tech-cyan text-tech-navy px-4 py-2 rounded-full shadow-lg border border-white/20 flex items-center space-x-2 font-black text-[10px] uppercase tracking-widest animate-pulse">
                <i data-lucide="shield-check" class="w-3 h-3"></i>
                <span>Mode Édition Actif</span>
            </div>

            <button onclick="window.toggleCmsPreview(this)" 
                    class="bg-tech-navy text-white px-4 py-2 rounded-full shadow-lg border border-white/10 flex items-center space-x-2 font-bold text-[9px] uppercase tracking-widest hover:bg-tech-cobalt transition-all">
                <i id="cms-preview-icon" data-lucide="eye" class="w-3 h-3"></i>
                <span id="cms-preview-text">Voir le Rendu Final</span>
            </button>
            
            <div class="flex flex-col items-end space-y-1 group/actions">
                @if(auth()->user()->is_super_admin)
                <a href="{{ route('cms.users.index') }}" class="bg-white/95 hover:bg-white text-slate-600 hover:text-tech-navy px-4 py-2 rounded-full shadow-md border border-slate-100 flex items-center space-x-2 font-bold text-[9px] uppercase tracking-widest transition-all hover:translate-x-[-4px] active:scale-95">
                    <i data-lucide="users" class="w-3 h-3"></i>
                    <span>Gestion des Utilisateurs</span>
                </a>
                @endif

                <a href="{{ route('cms.history.index') }}" class="bg-white/95 hover:bg-white text-slate-600 hover:text-tech-navy px-4 py-2 rounded-full shadow-md border border-slate-100 flex items-center space-x-2 font-bold text-[9px] uppercase tracking-widest transition-all hover:translate-x-[-4px] active:scale-95">
                    <i data-lucide="history" class="w-3 h-3"></i>
                    <span>Historique</span>
                </a>

                <a href="{{ route('cms.jobs.index') }}" class="bg-white/95 hover:bg-white text-slate-600 hover:text-tech-navy px-4 py-2 rounded-full shadow-md border border-slate-100 flex items-center space-x-2 font-bold text-[9px] uppercase tracking-widest transition-all hover:translate-x-[-4px] active:scale-95">
                    <i data-lucide="briefcase" class="w-3 h-3"></i>
                    <span>Offres d'Emploi</span>
                </a>

                <a href="{{ route('cms.news.index') }}" class="bg-white/95 hover:bg-white text-slate-600 hover:text-tech-navy px-4 py-2 rounded-full shadow-md border border-slate-100 flex items-center space-x-2 font-bold text-[9px] uppercase tracking-widest transition-all hover:translate-x-[-4px] active:scale-95">
                    <i data-lucide="newspaper" class="w-3 h-3"></i>
                    <span>Actualités</span>
                </a>

                <a href="{{ route('cms.expertises.index') }}" class="bg-white/95 hover:bg-white text-slate-600 hover:text-tech-navy px-4 py-2 rounded-full shadow-md border border-slate-100 flex items-center space-x-2 font-bold text-[9px] uppercase tracking-widest transition-all hover:translate-x-[-4px] active:scale-95">
                    <i data-lucide="medal" class="w-3 h-3"></i>
                    <span>Notre Expertise</span>
                </a>

                <a href="{{ route('cms.settings.index') }}" class="bg-white/95 hover:bg-white text-slate-600 hover:text-tech-navy px-4 py-2 rounded-full shadow-md border border-slate-100 flex items-center space-x-2 font-bold text-[9px] uppercase tracking-widest transition-all hover:translate-x-[-4px] active:scale-95">
                    <i data-lucide="settings" class="w-3 h-3"></i>
                    <span>Paramètres</span>
                </a>
                
                <button onclick="document.getElementById('change-password-modal').classList.remove('hidden')" class="bg-white/95 hover:bg-white text-slate-600 hover:text-tech-navy px-4 py-2 rounded-full shadow-md border border-slate-100 flex items-center space-x-2 font-bold text-[9px] uppercase tracking-widest transition-all hover:translate-x-[-4px] active:scale-95">
                    <i data-lucide="user-cog" class="w-3 h-3"></i>
                    <span>Mon Profil</span>
                </button>

                <a href="{{ route('cms.logout') }}" class="bg-white/95 hover:bg-white text-slate-500 hover:text-red-600 px-4 py-2 rounded-full shadow-md border border-slate-100 flex items-center space-x-2 font-bold text-[10px] uppercase tracking-widest transition-all hover:translate-x-[-4px] active:scale-95 group">
                    <i data-lucide="log-out" class="w-3 h-3 group-hover:rotate-12 transition-transform"></i>
                    <span>Déconnexion</span>
                </a>
            </div>
        </div>

        <!-- Change Password Modal -->
        <div id="change-password-modal" class="hidden fixed inset-0 z-[5000] flex items-center justify-center p-4">
            <div class="absolute inset-0 bg-tech-navy/40 backdrop-blur-md" onclick="document.getElementById('change-password-modal').classList.add('hidden')"></div>
            <div class="relative bg-white w-full max-w-md rounded-[40px] shadow-2xl overflow-hidden animate-zoom-in">
                <div class="bg-tech-navy p-8 text-white relative">
                    <h2 class="text-2xl font-black tracking-tight mb-1">Sécurité du Compte</h2>
                    <p class="text-white/60 text-xs uppercase tracking-widest font-bold">Changer mon mot de passe</p>
                    <button onclick="document.getElementById('change-password-modal').classList.add('hidden')" class="absolute top-8 right-8 text-white/50 hover:text-white transition-colors">
                        <i data-lucide="x" class="w-6 h-6"></i>
                    </button>
                </div>
                <form action="{{ route('cms.profile.password.update') }}" method="POST" class="p-8 space-y-5">
                    @csrf
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-1">Mot de passe actuel</label>
                        <input type="password" name="current_password" required
                               class="w-full px-5 py-4 bg-slate-50 border border-slate-100 rounded-2xl outline-none focus:border-tech-navy/20 transition-all font-bold text-slate-700">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-1">Nouveau mot de passe</label>
                        <input type="password" name="password" required
                               class="w-full px-5 py-4 bg-slate-50 border border-slate-100 rounded-2xl outline-none focus:border-tech-navy/20 transition-all font-bold text-slate-700">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-1">Confirmer le mot de passe</label>
                        <input type="password" name="password_confirmation" required
                               class="w-full px-5 py-4 bg-slate-50 border border-slate-100 rounded-2xl outline-none focus:border-tech-navy/20 transition-all font-bold text-slate-700">
                    </div>
                    
                    <button type="submit" class="w-full py-5 bg-tech-navy text-white font-black text-xs uppercase tracking-[0.2em] rounded-2xl shadow-xl shadow-tech-navy/20 transition-all active:scale-95">
                        Mettre à jour
                    </button>
                </form>
            </div>
        </div>
    @endif

    <script>
        AOS.init({
            duration: 800,
            once: true,
        });
        lucide.createIcons();

        // CMS Settings Logic
        window.cmsSettings = {
            isOpen: false,
            defaults: {
                '--tech-navy': '#0a192f',
                '--tech-cobalt': '#1e3a8a',
                '--tech-cyan': '#00a4bd',
                '--tech-light': '#f8fafc',
                '--font-main': "'Plus Jakarta Sans', sans-serif",
                '--base-font-size': '16px',
                '--spacing-scale': '1',
                'darkMode': false,
                'spacingLevel': 'normal'
            },
            
            init() {
                const saved = localStorage.getItem('cms_settings');
                if (saved) {
                    const settings = JSON.parse(saved);
                    Object.entries(settings).forEach(([key, value]) => {
                        if (key === 'darkMode') {
                            if (value) document.documentElement.classList.add('dark');
                        } else if (key === 'spacingLevel') {
                            this.updateSpacing(value, false);
                        } else {
                            this.apply(key, value);
                        }
                    });
                }
            },

            toggle() {
                const drawer = document.getElementById('cms-settings-drawer');
                this.isOpen = !this.isOpen;
                if (this.isOpen) {
                    drawer.classList.remove('translate-x-full');
                    this.updateUIFromState();
                } else {
                    drawer.classList.add('translate-x-full');
                }
            },

            toggleDarkMode() {
                const isDark = document.documentElement.classList.toggle('dark');
                this.save();
            },

            updateSpacing(level, shouldSave = true) {
                const root = document.documentElement;
                let scale = 1;
                if (level === 'compact') scale = 0.6;
                if (level === 'large') scale = 1.4;
                
                root.style.setProperty('--spacing-scale', scale);
                root.setAttribute('data-spacing', level);
                
                // Update UI buttons active state
                document.querySelectorAll('[data-spacing-btn]').forEach(btn => {
                    if (btn.getAttribute('data-spacing-btn') === level) {
                        btn.classList.add('border-tech-cyan', 'bg-tech-cyan/5', 'border-2');
                        btn.classList.remove('border-slate-200', 'bg-white');
                    } else {
                        btn.classList.remove('border-tech-cyan', 'bg-tech-cyan/5', 'border-2');
                        btn.classList.add('border-slate-200', 'bg-white');
                    }
                });

                if (shouldSave) this.save();
            },

            updateVar(key, value) {
                this.apply(key, value);
                this.save();
            },

            apply(key, value) {
                document.documentElement.style.setProperty(key, value);
                
                // Update specific labels/inputs if they exist
                if (key === '--tech-cyan') {
                    const label = document.getElementById('input-hex-primary');
                    const input = document.getElementById('input-primary');
                    if (label) label.value = value;
                    if (input && value.length === 7) input.value = value;
                    if (value.length === 7) {
                        const rgb = this.hexToRgb(value);
                        if (rgb) document.documentElement.style.setProperty('--tech-cyan-rgb', `${rgb.r}, ${rgb.g}, ${rgb.b}`);
                    }
                }
                if (key === '--tech-navy') {
                    const label = document.getElementById('input-hex-navy');
                    const input = document.getElementById('input-navy');
                    if (label) label.value = value;
                    if (input && value.length === 7) input.value = value;
                }
                if (key === '--base-font-size') {
                    const label = document.getElementById('label-fontsize');
                    if (label) label.textContent = value;
                }
            },

            save() {
                const settings = {
                    darkMode: document.documentElement.classList.contains('dark'),
                    spacingLevel: document.documentElement.getAttribute('data-spacing') || 'normal'
                };
                Object.keys(this.defaults).forEach(key => {
                    if (key.startsWith('--')) {
                        const val = document.documentElement.style.getPropertyValue(key);
                        if (val) settings[key] = val;
                    }
                });
                localStorage.setItem('cms_settings', JSON.stringify(settings));
            },

            updateUIFromState() {
                // Update Dark Mode Switch
                const darkSwitch = document.getElementById('cms-dark-mode-switch');
                if (darkSwitch) darkSwitch.checked = document.documentElement.classList.contains('dark');
                
                // Update Spacing Buttons
                const currentSpacing = document.documentElement.getAttribute('data-spacing') || 'normal';
                this.updateSpacing(currentSpacing, false);
            },

            reset() {
                if (confirm('Voulez-vous vraiment réinitialiser tous les paramètres ?')) {
                    document.documentElement.classList.remove('dark');
                    document.documentElement.removeAttribute('data-spacing');
                    Object.entries(this.defaults).forEach(([key, value]) => {
                        if (key.startsWith('--')) this.apply(key, value);
                    });
                    localStorage.removeItem('cms_settings');
                    location.reload();
                }
            },

            hexToRgb(hex) {
                const result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
                return result ? {
                    r: parseInt(result[1], 16),
                    g: parseInt(result[2], 16),
                    b: parseInt(result[3], 16)
                } : null;
            }
        };

        window.cmsSettings.init();

        // Scroll Progress & Back to Top Logic
        window.addEventListener('scroll', () => {
            const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = (winScroll / height) * 100;
            document.getElementById('scroll-progress').style.width = scrolled + "%";

            const backToTop = document.getElementById('back-to-top');
            if (winScroll > 500) {
                backToTop.classList.remove('opacity-0', 'translate-y-10', 'pointer-events-none');
            } else {
                backToTop.classList.add('opacity-0', 'translate-y-10', 'pointer-events-none');
            }
        });

        document.getElementById('back-to-top').addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Toggle CMS Preview Mode
        window.toggleCmsPreview = function(btn) {
            const isPreview = document.body.classList.toggle('cms-preview-mode');
            const icon = document.getElementById('cms-preview-icon');
            const text = document.getElementById('cms-preview-text');
            
            if (text) text.textContent = isPreview ? 'Retour à l\'édition' : 'Voir le Rendu Final';
            
            // Handle Lucide icon replacement (target the container/placeholder)
            if (icon) {
                // Lucide might have replaced 'i' with 'svg', so we need to be careful
                btn.innerHTML = `<i id="cms-preview-icon" data-lucide="${isPreview ? 'eye-off' : 'eye'}" class="w-3 h-3"></i> 
                                 <span id="cms-preview-text">${isPreview ? 'Retour à l\'édition' : 'Voir le Rendu Final'}</span>`;
                lucide.createIcons();
            }
        };

        // Register Service Worker for PWA
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/service-worker.js')
                    .then(reg => console.log('SW Registered'))
                    .catch(err => console.log('SW Error: ', err));
            });
        }
    </script>
    @stack('scripts')
</body>
</html>
