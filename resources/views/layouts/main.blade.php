<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Organisation du Bien-Être Communautaire')</title>
    
    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="64x64" href="{{ asset('image/ab.png') }}">
    
    <!-- Fonts & Icons -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="https://unpkg.com/remixicon@3.5.0/fonts/remixicon.css">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        display: ['Arial Black', 'sans-serif'],
                    },
                    colors: {
                        primary: '#1E90FF',
                        primaryDark: '#0B5ED7',
                        secondary: '#87CEFA',
                        yellow: '#FFD700',
                        dark: '#0a0f1c',
                    }
                }
            }
        }
    </script>
    
    <!-- AlpineJS pour l'interactivité -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @stack('styles')

    <style>
        [x-cloak] { display: none !important; }
        
        /* Premium Header Styles */
        .glass-header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .header-scrolled {
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.1);
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }
        .nav-link {
            position: relative;
            color: #1f2937;
            font-weight: 700;
            transition: color 0.3s ease;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0%;
            height: 3px;
            background-color: #1E90FF;
            transition: width 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 2px;
        }
        .nav-link:hover {
            color: #1E90FF;
        }
        .nav-link:hover::after, .nav-link.active::after {
            width: 100%;
        }
        .btn-donate-header {
            background: linear-gradient(135deg, #FFD700 0%, #F5B700 100%);
            color: #000;
            font-weight: 800;
            box-shadow: 0 4px 15px rgba(255, 215, 0, 0.4);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .btn-donate-header:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 215, 0, 0.6);
        }

        /* Premium Footer Styles */
        .footer-dynamic {
            background: linear-gradient(170deg, #1E90FF 0%, #0a2540 100%);
            position: relative;
            overflow: hidden;
            color: white;
        }
        .footer-shape-top {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
            transform: translateY(-1px);
        }
        .footer-shape-top svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 50px;
        }
        .footer-shape-top .shape-fill {
            fill: #ffffff;
        }
        .footer-glow {
            position: absolute;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(255,215,0,0.15) 0%, transparent 70%);
            top: -300px;
            right: -200px;
            border-radius: 50%;
            pointer-events: none;
        }
        .footer-link-premium {
            display: inline-flex;
            align-items: center;
            color: rgba(255, 255, 255, 0.8);
            transition: all 0.3s ease;
        }
        .footer-link-premium i {
            margin-right: 0.5rem;
            color: #FFD700;
            transition: transform 0.3s ease;
        }
        .footer-link-premium:hover {
            color: #FFD700;
            transform: translateX(5px);
        }
        .footer-link-premium:hover i {
            transform: scale(1.2);
        }
        .social-circle {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .social-circle:hover {
            background: #FFD700;
            color: #000;
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(255, 215, 0, 0.3);
            border-color: #FFD700;
        }
        
        /* Loading Screen */
        .page-loader {
            position: fixed; inset: 0; z-index: 99999;
            background: #fff;
            display: flex; align-items: center; justify-content: center;
            transition: opacity 0.6s ease;
        }
        .page-loader.loaded { opacity: 0; pointer-events: none; }
        .spinner {
            width: 50px; height: 50px;
            border: 5px solid rgba(30, 144, 255, 0.2);
            border-top-color: #1E90FF;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        @keyframes spin { to { transform: rotate(360deg); } }
    </style>
</head>
<body class="flex flex-col min-h-screen text-gray-800 antialiased" x-data="{ scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 20)">

    <!-- Loader -->
    <div class="page-loader" id="page-loader">
        <div class="spinner"></div>
    </div>

    <!-- Header Dynamique et Attrayant -->
    <header :class="scrolled ? 'header-scrolled py-2' : 'py-4'" class="glass-header fixed w-full top-0 z-50" x-data="{ mobileMenuOpen: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                
                <!-- Logo -->
                <a href="{{ url('/') }}" class="flex items-center gap-3 group">
                    <div class="relative w-12 h-12 lg:w-16 lg:h-16 rounded-full overflow-hidden border-2 border-transparent group-hover:border-primary transition-all duration-300 shadow-sm">
                        <img src="{{ asset('image/ab.png') }}" alt="ABEC Logo" class="w-full h-full object-cover">
                    </div>
                    <div class="hidden sm:block flex flex-col">
                        <span class="text-xl font-display font-black text-gray-900 tracking-tight leading-none group-hover:text-primary transition-colors">ABEC</span>
                        <span class="text-[0.65rem] uppercase tracking-widest text-gray-500 font-bold mt-1">International</span>
                    </div>
                </a>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'text-primary active' : '' }}">Accueil</a>
                    <a href="{{ route('aPropos') }}" class="nav-link {{ request()->routeIs('aPropos') ? 'text-primary active' : '' }}">À propos</a>
                    <a href="{{ url('/branche') }}" class="nav-link {{ request()->is('branche') ? 'text-primary active' : '' }}">Événements</a>
                    <a href="{{ url('/dons') }}" class="nav-link {{ request()->is('dons') ? 'text-primary active' : '' }}">Faire un don</a>
                </nav>

                <!-- Actions -->
                <div class="hidden md:flex items-center gap-4">
                    <div class="flex gap-2">
                        <a href="https://www.facebook.com/profile.php?id=61568266295634" target="_blank" class="w-8 h-8 flex items-center justify-center rounded-full bg-blue-50 text-primary hover:bg-primary hover:text-white transition-colors"><i class="ri-facebook-fill"></i></a>
                        <a href="https://www.instagram.com/abec.officiel/" target="_blank" class="w-8 h-8 flex items-center justify-center rounded-full bg-pink-50 text-pink-600 hover:bg-pink-600 hover:text-white transition-colors"><i class="ri-instagram-line"></i></a>
                    </div>
                    <a href="{{ url('/dons') }}" class="btn-donate-header px-6 py-2.5 rounded-full flex items-center gap-2">
                        <i class="ri-heart-3-fill text-red-500"></i> Soutenir
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button class="md:hidden text-gray-800 hover:text-primary focus:outline-none p-2 rounded-lg bg-gray-50" @click="mobileMenuOpen = !mobileMenuOpen">
                    <i class="ri-menu-4-line text-2xl" x-show="!mobileMenuOpen"></i>
                    <i class="ri-close-line text-2xl" x-show="mobileMenuOpen" x-cloak></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu Overlay -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             x-cloak
             class="md:hidden absolute top-full left-0 w-full bg-white shadow-2xl border-t border-gray-100 py-4 px-4 flex flex-col gap-4 z-40">
            
            <a href="{{ url('/') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-blue-50 text-gray-800 font-bold transition-colors">
                <div class="w-10 h-10 rounded-full bg-blue-100 text-primary flex items-center justify-center"><i class="ri-home-smile-line"></i></div>
                Accueil
            </a>
            <a href="{{ route('aPropos') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-blue-50 text-gray-800 font-bold transition-colors">
                <div class="w-10 h-10 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center"><i class="ri-team-line"></i></div>
                À propos
            </a>
            <a href="{{ url('/branche') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-blue-50 text-gray-800 font-bold transition-colors">
                <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center"><i class="ri-calendar-event-line"></i></div>
                Événements
            </a>
            
            <hr class="border-gray-100 my-2">
            
            <a href="{{ url('/dons') }}" class="btn-donate-header w-full py-4 rounded-xl flex items-center justify-center gap-2 text-lg">
                <i class="ri-heart-3-fill text-red-500"></i> Faire un don
            </a>
            
            <div class="flex justify-center gap-4 mt-4">
                <a href="https://www.facebook.com/profile.php?id=61568266295634" target="_blank" class="w-12 h-12 flex items-center justify-center rounded-full bg-gray-50 text-gray-600 hover:bg-primary hover:text-white transition-colors text-xl"><i class="ri-facebook-fill"></i></a>
                <a href="https://whatsapp.com/channel/0029VaYTsNkD8SE42sDpnk1w" target="_blank" class="w-12 h-12 flex items-center justify-center rounded-full bg-gray-50 text-gray-600 hover:bg-green-500 hover:text-white transition-colors text-xl"><i class="ri-whatsapp-line"></i></a>
            </div>
        </div>
    </header>

    <!-- Espace pour compenser le header fixe -->
    <div class="h-20 lg:h-24"></div>

    <!-- MAIN CONTENT -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- FOOTER DYNAMIQUE ET PREMIUM -->
    <footer class="footer-dynamic pt-24 pb-8 mt-auto">
        <!-- Vague de transition haut -->
        <div class="footer-shape-top">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
            </svg>
        </div>
        
        <div class="footer-glow"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            
            <!-- Bento Grid Footer -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10 mb-16">
                
                <!-- Colonne Marque / Info (Prend 4 colonnes) -->
                <div class="lg:col-span-4 space-y-6">
                    <div class="flex items-center gap-4 bg-white/10 p-4 rounded-2xl backdrop-blur-sm border border-white/10 w-max">
                        <div class="w-14 h-14 bg-white rounded-xl flex items-center justify-center shadow-lg">
                            <img src="{{ asset('image/ab.png') }}" alt="Logo ABEC" class="w-10 h-10 object-contain">
                        </div>
                        <div>
                            <h2 class="text-2xl font-black text-white">ABEC</h2>
                            <p class="text-yellow text-xs font-bold uppercase tracking-wider">International</p>
                        </div>
                    </div>
                    <p class="text-white/80 leading-relaxed font-medium">
                        Œuvrer collectivement pour relever les défis de santé, d'éducation et d'environnement. Chaque action compte, chaque don sauve des vies.
                    </p>
                    <div class="flex items-center gap-3 pt-2">
                        <a href="https://www.facebook.com/profile.php?id=61568266295634" target="_blank" class="social-circle"><i class="ri-facebook-fill text-xl"></i></a>
                        <a href="https://www.instagram.com/abec.officiel/" target="_blank" class="social-circle"><i class="ri-instagram-line text-xl"></i></a>
                        <a href="https://whatsapp.com/channel/0029VaYTsNkD8SE42sDpnk1w" target="_blank" class="social-circle"><i class="ri-whatsapp-line text-xl"></i></a>
                        <a href="https://mail.google.com/mail/?view=cm&to=contact@universalwelfare.org" target="_blank" class="social-circle"><i class="ri-mail-send-line text-xl"></i></a>
                    </div>
                </div>

                <!-- Colonne Liens Rapides (Prend 3 colonnes) -->
                <div class="lg:col-span-3 lg:col-start-6">
                    <h3 class="text-lg font-black text-white mb-6 flex items-center gap-2">
                        <span class="w-8 h-1 bg-yellow rounded-full"></span> Navigation
                    </h3>
                    <ul class="space-y-4">
                        <li><a href="{{ url('/') }}" class="footer-link-premium"><i class="ri-arrow-right-s-line"></i> Accueil</a></li>
                        <li><a href="{{ route('aPropos') }}" class="footer-link-premium"><i class="ri-arrow-right-s-line"></i> Qui sommes-nous ?</a></li>
                        <li><a href="{{ url('/branche') }}" class="footer-link-premium"><i class="ri-arrow-right-s-line"></i> Nos Événements</a></li>
                        <li><a href="{{ url('/dons') }}" class="footer-link-premium text-yellow font-bold"><i class="ri-heart-pulse-fill"></i> Faire un don</a></li>
                        <li><a href="{{ url('/faq') }}" class="footer-link-premium"><i class="ri-arrow-right-s-line"></i> FAQ</a></li>
                    </ul>
                </div>

                <!-- Colonne Contact (Prend 4 colonnes) -->
                <div class="lg:col-span-4">
                    <h3 class="text-lg font-black text-white mb-6 flex items-center gap-2">
                        <span class="w-8 h-1 bg-yellow rounded-full"></span> Nous Contacter
                    </h3>
                    <div class="space-y-5 bg-black/20 p-6 rounded-2xl border border-white/5">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center shrink-0 text-yellow">
                                <i class="ri-map-pin-2-fill text-lg"></i>
                            </div>
                            <div>
                                <p class="text-sm text-white/60 uppercase font-bold tracking-wider mb-1">Siège Social</p>
                                <p class="text-white font-medium">Yaoundé, Cameroun</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center shrink-0 text-yellow">
                                <i class="ri-phone-fill text-lg"></i>
                            </div>
                            <div>
                                <p class="text-sm text-white/60 uppercase font-bold tracking-wider mb-1">Téléphone</p>
                                <p class="text-white font-medium">+237 6 21 62 06 77</p>
                                <p class="text-white font-medium">+237 6 91 42 53 34</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- CTA Final au centre du footer -->
            <div class="bg-gradient-to-r from-yellow to-[#f59e0b] rounded-3xl p-8 mb-12 shadow-2xl relative overflow-hidden group">
                <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-20"></div>
                <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-6 text-black">
                    <div>
                        <h4 class="text-2xl font-black mb-2">Prêt à faire la différence ?</h4>
                        <p class="font-medium text-black/80">Rejoignez une communauté engagée. Chaque contribution compte.</p>
                    </div>
                    <a href="{{ url('/dons') }}" class="bg-black text-white px-8 py-4 rounded-xl font-bold flex items-center gap-3 hover:bg-gray-900 hover:scale-105 transition-all shadow-xl">
                        Aider maintenant <i class="ri-arrow-right-line"></i>
                    </a>
                </div>
            </div>

            <!-- Bottom Line -->
            <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-sm font-medium text-white/60">
                <p>&copy; {{ date('Y') }} ABEC International. Tous droits réservés.</p>
                <div class="flex flex-wrap gap-4 md:gap-8 justify-center">
                    <a href="{{ route('mention') }}" class="hover:text-yellow transition-colors">Mentions Légales</a>
                    <a href="{{ route('politique') }}" class="hover:text-yellow transition-colors">Confidentialité</a>
                    <a href="{{ route('copitt') }}" class="hover:text-yellow transition-colors">Conditions Générales</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to top btn -->
    <button id="btt-btn" class="fixed bottom-6 right-6 w-12 h-12 bg-primary text-white rounded-full shadow-2xl flex items-center justify-center opacity-0 translate-y-10 transition-all duration-300 z-40 hover:bg-yellow hover:text-black hover:scale-110">
        <i class="ri-arrow-up-line text-2xl"></i>
    </button>

    @stack('scripts')
    
    <script>
        // Loader timeout
        window.addEventListener('load', () => {
            setTimeout(() => document.getElementById('page-loader').classList.add('loaded'), 300);
        });

        // Back to top button
        const bttBtn = document.getElementById('btt-btn');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 400) {
                bttBtn.classList.remove('opacity-0', 'translate-y-10');
            } else {
                bttBtn.classList.add('opacity-0', 'translate-y-10');
            }
        });
        bttBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>
</body>
</html>
