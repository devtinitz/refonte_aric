<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion CMS | ARIC Solutions</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'tech-navy': '#0a192f',
                        'tech-cyan': '#00a4bd',
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        .glass {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .glow {
            box-shadow: 0 0 50px rgba(0, 164, 189, 0.15);
        }
        @keyframes drift {
            0% { transform: translate(0, 0); }
            50% { transform: translate(30px, 30px); }
            100% { transform: translate(0, 0); }
        }
        .animate-drift {
            animation: drift 15s infinite ease-in-out;
        }
    </style>
</head>
<body class="bg-tech-navy font-sans text-white min-h-screen flex items-center justify-center overflow-hidden relative">
    
    <!-- Background Decor -->
    <div class="absolute top-[-10%] left-[-10%] w-[50%] h-[50%] bg-tech-cyan/10 blur-[120px] rounded-full animate-drift"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-blue-500/10 blur-[120px] rounded-full animate-drift" style="animation-delay: -5s"></div>

    <div class="w-full max-w-md px-6 relative z-10" data-aos="fade-up">
        <div class="text-center mb-10">
            <div class="inline-flex items-center justify-center w-20 h-20 rounded-3xl bg-white/5 border border-white/10 mb-6 glow">
                <i data-lucide="shield-check" class="w-10 h-10 text-tech-cyan"></i>
            </div>
            <h1 class="text-3xl font-extrabold tracking-tight mb-2">ARIC <span class="text-tech-cyan">CMS</span></h1>
            <p class="text-slate-400 text-sm font-medium uppercase tracking-widest">Interface d'Administration</p>
        </div>

        <div class="glass p-10 rounded-[40px] shadow-2xl relative overflow-hidden group">
            <!-- Shimmer effect -->
            <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

            <form action="{{ route('cms.login.submit') }}" method="POST" class="space-y-6">
                @csrf
                
                @if($errors->any())
                <div class="p-4 bg-red-500/10 border border-red-500/20 rounded-2xl text-red-400 text-[11px] font-bold leading-relaxed">
                    <div class="flex items-center gap-2 mb-1">
                        <i data-lucide="alert-circle" class="w-3 h-3"></i>
                        <span>Erreur d'authentification</span>
                    </div>
                    {{ $errors->first() }}
                </div>
                @endif

                <div class="space-y-2">
                    <label for="email" class="block text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Email Administrateur</label>
                    <div class="relative group/input">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-500 group-focus-within/input:text-tech-cyan transition-colors">
                            <i data-lucide="mail" class="w-4 h-4"></i>
                        </div>
                        <input type="email" name="email" id="email" required placeholder="admin@aric.ci" value="{{ old('email') }}"
                               class="w-full pl-11 pr-4 py-4 bg-white/5 border border-white/10 rounded-2xl text-slate-100 font-bold text-sm outline-none focus:border-tech-cyan/50 focus:ring-4 focus:ring-tech-cyan/10 transition-all placeholder:text-slate-600">
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="password" class="block text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Mot de passe</label>
                    <div class="relative group/input">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-500 group-focus-within/input:text-tech-cyan transition-colors">
                            <i data-lucide="lock" class="w-4 h-4"></i>
                        </div>
                        <input type="password" name="password" id="password" required placeholder="••••••••"
                               class="w-full pl-11 pr-4 py-4 bg-white/5 border border-white/10 rounded-2xl text-slate-100 font-bold text-sm outline-none focus:border-tech-cyan/50 focus:ring-4 focus:ring-tech-cyan/10 transition-all placeholder:text-slate-600">
                    </div>
                </div>

                <div class="flex items-center justify-between px-1">
                    <label class="flex items-center group cursor-pointer">
                        <input type="checkbox" name="remember" class="sr-only peer">
                        <div class="w-4 h-4 rounded border border-white/10 bg-white/5 peer-checked:bg-tech-cyan peer-checked:border-tech-cyan transition-all flex items-center justify-center">
                            <i data-lucide="check" class="w-3 h-3 text-tech-navy opacity-0 peer-checked:opacity-100 transition-opacity"></i>
                        </div>
                        <span class="ml-2 text-[10px] font-bold text-slate-500 group-hover:text-slate-300 transition-colors uppercase tracking-widest">Rester connecté</span>
                    </label>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full py-5 bg-tech-cyan hover:bg-cyan-500 text-tech-navy font-black text-xs uppercase tracking-[0.2em] rounded-2xl shadow-xl shadow-tech-cyan/20 transition-all active:scale-95 flex items-center justify-center space-x-3">
                        <span>Se connecter</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </button>
                </div>
            </form>

            <div class="mt-10 pt-8 border-t border-white/5 flex items-center justify-between">
                <a href="/" class="text-[10px] font-black text-slate-500 uppercase tracking-widest hover:text-tech-cyan transition-colors flex items-center gap-2">
                    <i data-lucide="chevron-left" class="w-3 h-3"></i>
                    Retour au site
                </a>
                <span class="text-[9px] font-bold text-slate-600 uppercase tracking-widest">v2.0 Beta</span>
            </div>
        </div>

        <p class="text-center mt-12 text-slate-700 text-[10px] font-medium uppercase tracking-[0.3em]">
            &copy; 2026 ARIC SOLUTIONS - PROPRIÉTÉ PRIVÉE
        </p>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
