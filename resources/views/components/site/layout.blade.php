<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'ARIC | Expert en Solutions Multitechniques' }}</title>
    <meta name="description" content="{{ $description ?? 'Expert en Solutions Multitechniques : Froid Commercial, Industriel & Solaire, Génie Climatique et Efficacité Énergétique.' }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
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
    </style>
</head>
<body class="bg-gray-50 font-['Plus_Jakarta_Sans'] text-slate-900 overflow-x-hidden relative">
    
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
            <a href="{{ route('cms.logout') }}" class="bg-white/90 hover:bg-white text-slate-500 hover:text-red-600 px-4 py-2 rounded-full shadow-md border border-slate-100 flex items-center space-x-2 font-bold text-[9px] uppercase tracking-widest transition-all hover:scale-105 active:scale-95 group">
                <i data-lucide="log-out" class="w-3 h-3"></i>
                <span>Déconnexion CMS</span>
            </a>
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
    </script>
    @stack('scripts')
</body>
</html>
