<x-site.layout>
    <x-slot:title>ARIC | Page Introuvable (404)</x-slot>

    <section class="min-h-[80vh] flex items-center justify-center relative overflow-hidden bg-white">
        <!-- Background Decor -->
        <div class="absolute top-0 left-0 w-full h-full opacity-[0.03] pointer-events-none">
            <div class="grid-pattern w-full h-full"></div>
        </div>
        
        <div class="max-w-4xl mx-auto px-6 text-center relative z-10" data-aos="zoom-in">
            <div class="relative inline-block mb-12">
                <h1 class="text-[180px] md:text-[250px] font-black text-tech-navy/5 leading-none select-none">404</h1>
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="text-tech-cyan animate-float">
                        <i data-lucide="compass" class="w-32 h-32 md:w-48 md:h-48 stroke-[1px]"></i>
                    </div>
                </div>
            </div>

            <h2 class="text-3xl md:text-5xl font-extrabold text-tech-navy mb-6">Oups ! Vous semblez perdu.</h2>
            <p class="text-slate-500 text-lg md:text-xl max-w-2xl mx-auto mb-12 font-medium">
                La page que vous recherchez n'existe pas ou a été déplacée. 
                Nos techniciens sont sur le coup, mais en attendant, revenons à la source.
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="/" class="w-full sm:w-auto px-10 py-5 bg-tech-navy text-white rounded-2xl font-black text-xs uppercase tracking-[0.2em] shadow-2xl shadow-tech-navy/20 hover:scale-105 active:scale-95 transition-all flex items-center justify-center space-x-3">
                    <i data-lucide="home" class="w-4 h-4"></i>
                    <span>Retour à l'accueil</span>
                </a>
                <a href="/contact" class="w-full sm:w-auto px-10 py-5 glass border border-slate-200 text-tech-navy rounded-2xl font-black text-xs uppercase tracking-[0.2em] hover:bg-slate-50 active:scale-95 transition-all flex items-center justify-center space-x-3">
                    <i data-lucide="message-square" class="w-4 h-4"></i>
                    <span>Nous contacter</span>
                </a>
            </div>
        </div>

        <!-- Floating Icons Decor -->
        <div class="absolute top-1/4 left-10 text-tech-cyan/20 animate-float" style="animation-delay: 1s">
            <i data-lucide="settings" class="w-12 h-12"></i>
        </div>
        <div class="absolute bottom-1/4 right-10 text-tech-cyan/20 animate-float" style="animation-delay: 2s">
            <i data-lucide="zap" class="w-16 h-16"></i>
        </div>
        <div class="absolute top-1/3 right-1/4 text-tech-cyan/10 animate-float" style="animation-delay: 3s">
            <i data-lucide="wind" class="w-20 h-20"></i>
        </div>
    </section>
</x-site.layout>
