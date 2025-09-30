<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organisation du Bien-Être Communautaire</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="64x64" href="{{ asset('image/ab.png') }}">
    <!-- Tailwind CDN & Police Inter -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <!-- Swiper.js -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              primary: '#1E90FF',
              secondary: '#87CEFA',
              yellow: '#FFD700'
            }
          }
        }
      }
    </script>
    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
      [x-cloak] { display: none; }
      body { font-family: 'Inter', sans-serif; background-color: #ffffff; }
      .partner-logo { width: 80px; height: 80px; object-fit: contain; transition: transform 0.3s; }
      .swiper-slide img { width: 100%; height: auto; max-height: 400px; object-fit: cover; }
      .swiper-slide-active .partner-logo { transform: scale(1.3); }
      .dropdown-menu { background-color: white; z-index: 50; }
      .font-all-bold, body, h1, h2, h3, p, a, li { font-weight: bold; }
      .wave-divider {
        position: absolute;
        top: -1px;
        left: 0;
        width: 100%;
        overflow: hidden;
        line-height: 0;
      }
      .wave-divider svg {
        position: relative;
        display: block;
        width: calc(100% + 1.3px);
        height: 40px;
      }
      .wave-divider .shape-fill {
        fill: url(#gradient-wave);
      }
      .footer-link {
        transition: color 0.3s ease, transform 0.3s ease;
      }
      .footer-link:hover {
        transform: translateX(5px);
      }
      .social-icon {
        transition: transform 0.3s ease, opacity 0.3s ease;
      }
      .social-icon:hover {
        transform: scale(1.2);
        opacity: 0.8;
      }
      /* Animation pour la phrase défilante */
      .marquee-container {
        width: 100%;
        overflow: hidden;
        white-space: nowrap;
        background-color: #1E90FF;
        padding: 0.5rem 0;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        z-index: 10;
      }
      .marquee-text {
        display: inline-block;
        font-size: 1rem;
        font-weight: bold;
        color: #FFD700;
        animation: marquee 15s linear infinite;
        text-align: center;
      }
      @keyframes marquee {
        0% { transform: translateX(100%); }
        100% { transform: translateX(-100%); }
      }
    </style>
</head>
<body id="top" x-data="{ mobileMenuOpen: false }" class="bg-white font-all-bold flex flex-col min-h-screen">
    <!-- Top Bar avec réseaux sociaux -->
    <nav class="bg-primary text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-10">
            <div class="flex items-center gap-4">
                <a href="https://www.facebook.com/profile.php?id=61568266295634" target="_blank" class="hover:opacity-80 transition-opacity duration-300">
                    <img src="{{ asset('image/feacebook.jpg') }}" alt="Facebook" class="w-6 h-6 rounded-full">
                </a>
                <a href="https://whatsapp.com/channel/0029VaYTsNkD8SE42sDpnk1w" target="_blank" class="hover:opacity-80 transition-opacity duration-300">
                    <img src="{{ asset('image/wastapp.jpg') }}" alt="WhatsApp" class="w-6 h-6 rounded-full">
                </a>
                <a href="https://www.instagram.com/abec.officiel/" target="_blank" class="hover:opacity-80 transition-opacity duration-300">
                    <img src="{{ asset('image/insta.jpg') }}" alt="Instagram" class="w-6 h-6 rounded-full">
                </a>
            </div>
                    <a href="https://mail.google.com/mail/?view=cm&to=contact@universalwelfare.org" 
   target="_blank" 
   class="hover:opacity-80 transition-opacity duration-300" 
   title="Envoyer un email via Gmail">
    <img src="{{ asset('image/m.jpg') }}" alt="Email" class="w-6 h-6 rounded-full">
</a>
        </div>
    </nav>
    <!-- Header principal -->
    <header class="bg-white shadow py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-16">
            <!-- Logo réduit -->
            <div class="flex-shrink-0 w-20 flex justify-center">
                <img src="{{ asset('image/ab.png') }}" alt="logo" class="w-full h-auto">
            </div>
            <!-- Menu Desktop avec plus d'espace entre les liens -->
            <nav class="hidden md:flex space-x-6">
                <a href="{{ url('/') }}" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Accueil</a>
                <a href="{{ url('branche') }}" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Evenements</a>
                <a href="{{ url('/dons') }}" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Dons</a>
            </nav>
            <!-- Menu Mobile -->
            <div class="md:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-500 focus:outline-none">
                    <svg x-show="!mobileMenuOpen" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="mobileMenuOpen" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" x-cloak class="md:hidden px-2 pt-2 pb-3 space-y-1">
            <a href="{{ url('/') }}" class="block px-3 py-2 rounded-md text-base font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Accueil</a>
            <a href="{{ url('branche') }}" class="block px-3 py-2 rounded-md text-base font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Evenements</a>
            <a href="{{ url('/dons') }}" class="block px-3 py-2 rounded-md text-base font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Dons</a>
        </div>
    </header>
    <!-- Contenu dynamique Blade -->
    <main class="flex-1">
        @yield('content')
    </main>
    <!-- Footer compact avec vague et phrase défilante centrée -->
    <footer id="contact" class="bg-primary text-white relative pt-10 overflow-hidden section-animate">
        <!-- Vague SVG compacte -->
        <div class="wave-divider">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <defs>
                    <linearGradient id="gradient-wave" x1="0%" y1="0%" x2="0%" y2="100%">
                        <stop offset="0%" style="stop-color:#ffffff;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#1E90FF;stop-opacity:0.8" />
                    </linearGradient>
                </defs>
                <path d="M0,0 C300,100 900,100 1200,0 V120 H0 Z" class="shape-fill"></path>
            </svg>
        </div>
        <!-- Phrase défilante centrée -->
        <div class="marquee-container">
            <span class="marquee-text">Grandir - Agir - Changer</span>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Grille compacte -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                <!-- Colonne Logo et Description -->
                <div class="md:col-span-2">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('image/ab.png') }}" alt="Logo ABEC" class="w-12 h-12 mr-3">
                        <div>
                            <h2 class="text-lg font-bold mb-1">ABEC</h2>
                            <p class="text-yellow text-xs font-medium">Association du Bien-Être Communautaire</p>
                        </div>
                    </div>
                     <p class="text-gray-200 text-sm mb-4 leading-relaxed">
                        Nous œuvrons depuis 2021 pour améliorer les conditions de vie des communautés vulnérables dans plusieurs Pays.
                    </p>
                    <div class="flex space-x-3">
                        <a href="https://www.facebook.com/profile.php?id=61568266295634" target="_blank" class="social-icon bg-white bg-opacity-20 p-1.5 rounded-full hover:bg-yellow transition-all duration-300">
                            <img src="{{ asset('image/feacebook.jpg') }}" alt="Facebook" class="w-5 h-5">
                        </a>
                        <a href="https://whatsapp.com/channel/0029VaYTsNkD8SE42sDpnk1w" target="_blank" class="social-icon bg-white bg-opacity-20 p-1.5 rounded-full hover:bg-yellow transition-all duration-300">
                            <img src="{{ asset('image/wastapp.jpg') }}" alt="WhatsApp" class="w-5 h-5">
                        </a>
                        <a href="https://www.instagram.com/abec.officiel/" target="_blank" class="social-icon bg-white bg-opacity-20 p-1.5 rounded-full hover:bg-yellow transition-all duration-300">
                            <img src="{{ asset('image/insta.jpg') }}" alt="Instagram" class="w-5 h-5">
                        </a>
                        <a href="https://mail.google.com/mail/?view=cm&to=contact@universalwelfare.org" class="social-icon bg-white bg-opacity-20 p-1.5 rounded-full hover:bg-yellow transition-all duration-300">
                            <img src="{{ asset('image/m.jpg') }}" alt="Email" class="w-5 h-5">
                        </a>
                    </div>
                </div>
                <!-- Colonne Liens Rapides -->
                <div>
                    <h3 class="text-base font-bold mb-4 text-white border-b border-yellow pb-1">Liens Rapides</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ url('/') }}" class="footer-link text-gray-200 hover:text-yellow flex items-center transition-all duration-300"><span class="mr-2">→</span> Accueil</a></li>
                        <li><a href="{{ url('/about') }}" class="footer-link text-gray-200 hover:text-yellow flex items-center transition-all duration-300"><span class="mr-2">→</span> À propos</a></li>
                        <li><a href="{{ url('/news') }}" class="footer-link text-gray-200 hover:text-yellow flex items-center transition-all duration-300"><span class="mr-2">→</span> News</a></li>
                        <li><a href="{{ url('/dons') }}" class="footer-link text-gray-200 hover:text-yellow flex items-center transition-all duration-300"><span class="mr-2">→</span> Faire un don</a></li>
                        <li><a href="{{ url('/projects') }}" class="footer-link text-gray-200 hover:text-yellow flex items-center transition-all duration-300"><span class="mr-2">→</span> Evenements</a></li>
                    </ul>
                </div>
                <!-- Colonne Contact -->
                <div>
                    <h3 class="text-base font-bold mb-4 text-white border-b border-yellow pb-1">Contact</h3>
                    <div class="space-y-3 text-sm text-gray-200">
                        <div class="flex items-start">
                            <svg class="w-4 h-4 mt-1 mr-2 text-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <p>Yaoundé, Cameroun<br></p>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2 text-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <p>+237 6 21 62 06 77</p>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2 text-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <a href="{{ url('/faq') }}" class="text-gray-200 hover:text-yellow transition-all duration-300">FAQ</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Call-to-action compact -->
            <div class="bg-white bg-opacity-10 rounded-lg p-4 mb-6 backdrop-blur-sm">
                <div class="flex flex-col md:flex-row md:items-center justify-between">
                    <div class="mb-3 md:mb-0">
                        <h3 class="text-base font-bold text-white mb-1">Rejoignez notre mission</h3>
                        <p class="text-gray-200 text-sm">Votre soutien peut changer des vies.</p>
                    </div>
                    <a href="{{ url('/dons') }}" class="inline-block bg-yellow text-primary font-bold py-2 px-4 rounded-md hover:bg-opacity-90 transform hover:scale-105 transition-all duration-300 shadow-md">
                        Faire un don
                    </a>
                </div>
            </div>
            <!-- Ligne de séparation et copyright -->
            <div class="border-t border-white border-opacity-20 pt-4">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-300 text-xs mb-3 md:mb-0">
                        &copy; {{ date('Y') }} Association du Bien-Être Communautaire. Tous droits réservés.
                    </p>
                    <div class="flex space-x-4 text-xs">
                        <a href="{{ route('mention') }}" class="text-gray-300 hover:text-yellow transition-colors duration-300">Mentions légales</a>
                        <a href="{{ route('politique') }}" class="text-gray-300 hover:text-yellow transition-colors duration-300">Politique de confidentialité</a>
                        <a href="{{ route('copitt') }}" class="text-gray-300 hover:text-yellow transition-colors duration-300">Conditions d'utilisation</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Éléments décoratifs réduits -->
        <div class="absolute top-0 right-0 w-24 h-24 bg-yellow rounded-full opacity-10 -translate-y-1/2 translate-x-1/2"></div>
        <div class="absolute bottom-0 left-0 w-16 h-16 bg-white rounded-full opacity-5 -translate-y-1/2 -translate-x-1/2"></div>
    </footer>
</body>
</html>