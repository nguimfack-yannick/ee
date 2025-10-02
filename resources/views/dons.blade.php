<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Organisation du Bien-Être Communautaire</title>
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
            },
            fontFamily: {
              'custom': ['Arial Black', 'sans-serif']
            }
          }
        }
      }
    </script>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <style>
      [x-cloak] { display: none !important; }
      body { font-family: 'Arial Black', sans-serif; background-color: #ffffff; }
      .partner-logo { width: 100px; height: 100px; object-fit: contain; transition: transform 0.3s; }
      .swiper-slide-active .partner-logo { transform: scale(1.3); }
      .dropdown-menu { background-color: white; z-index: 50; }
      .font-all-bold, body, h1, h2, h3, p, a, li { font-weight: bold; font-family: 'Arial Black', sans-serif; }

      /* Loading Overlay */
      .loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.8);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        opacity: 1;
        pointer-events: all;
        transition: opacity 0.5s ease-out;
      }
      .loading-overlay[x-cloak] {
        opacity: 0;
        pointer-events: none;
      }

      .spinner-container {
        position: relative;
        width: 80px;
        height: 80px;
      }
      .spinner-circle {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: 4px solid transparent;
        border-top-color: #1E90FF;
        border-radius: 50%;
        animation: spin 1s linear infinite;
      }
      .spinner-logo {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 56px;
        height: 56px;
        object-fit: contain;
      }
      @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
      }
      @media (max-width: 640px) {
        .spinner-container { width: 60px; height: 60px; }
        .spinner-logo { width: 42px; height: 42px; }
      }

      /* Footer */
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
      .wave-divider .shape-fill { fill: url(#gradient-wave); }
      .footer-link { transition: color 0.3s ease, transform 0.3s ease; }
      .footer-link:hover { transform: translateX(5px); }
      .social-icon { transition: transform 0.3s ease, opacity 0.3s ease; }
      .social-icon:hover { transform: scale(1.2); opacity: 0.8; }

      /* Marquee */
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

      /* Diaporama Swiper */
      .swiper {
        width: 100%;
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 0.5rem;
      }
      .swiper-slide {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0.5rem 0;
      }
      .swiper-slide img {
        width: 100%;
        height: auto;
        max-height: 70vh;
        object-fit: contain;
        object-position: center;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        transition: transform 0.3s ease;
      }
      .swiper-slide img:hover,
      .swiper-slide img:active {
        transform: scale(1.02);
      }

      @media (max-width: 640px) {
        .swiper-slide img {
          max-height: 60vh;
        }
      }
    </style>
</head>
<body id="top"
      x-data="{ mobileMenuOpen: false, isLoading: false }"
      class="bg-white font-all-bold flex flex-col min-h-screen">

    <!-- Loading Overlay -->
    <div x-show="isLoading" x-cloak class="loading-overlay">
        <div class="spinner-container">
            <div class="spinner-circle"></div>
            <img src="{{ asset('image/ab.png') }}" alt="Logo ABEC" class="spinner-logo">
        </div>
    </div>

    <!-- Top Bar -->
    <nav class="bg-primary text-white w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-10">
            <div class="flex space-x-4">
                <a href="https://www.facebook.com/profile.php?id=61568266295634" target="_blank"><img src="{{ asset('image/feacebook.jpg') }}" alt="Facebook" class="w-6 h-6 rounded-full"></a>
                <a href="https://whatsapp.com/channel/0029VaYTsNkD8SE42sDpnk1w" target="_blank"><img src="{{ asset('image/wastapp.jpg') }}" alt="WhatsApp" class="w-6 h-6 rounded-full"></a>
                <a href="https://www.instagram.com/abec.officiel/" target="_blank"><img src="{{ asset('image/insta.jpg') }}" alt="Instagram" class="w-6 h-6 rounded-full"></a>
            </div>
            <a href="https://mail.google.com/mail/?view=cm&to=contact@universalwelfare.org" target="_blank">
                <img src="{{ asset('image/m.jpg') }}" alt="Email" class="w-6 h-6 rounded-full">
            </a>
        </div>
    </nav>

    <!-- Header -->
    <header class="bg-white shadow py-4 w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-16">
            <div class="flex-shrink-0">
                <a href="/"><img src="{{ asset('image/ab.png') }}" alt="logo" class="max-w-[100px] sm:max-w-[120px] h-16 md:max-w-[140px] lg:max-w-[160px]"></a>
            </div>
            <nav class="hidden md:flex space-x-4">
                <a href="/" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Accueil</a>
                <a href="/news" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white">News</a>
                <a href="/branche" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Evenements</a>
            </nav>
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
        <div x-show="mobileMenuOpen" x-cloak class="md:hidden px-2 pt-2 pb-3 space-y-1">
            <a href="/" class="block px-3 py-2 rounded-md text-base font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Accueil</a>
            <a href="/news" class="block px-3 py-2 rounded-md text-base font-bold text-gray-800 hover:bg-blue-500 hover:text-white">News</a>
            <a href="/branche" class="block px-3 py-2 rounded-md text-base font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Evenements</a>
        </div>
    </header>

    <!-- Contenu dynamique -->
    <main class="flex-1">
        <!-- Section Don -->
      <!-- Section Don -->
<section class="relative h-screen bg-cover bg-center"
         style="background: url('{{ asset('image/dons.png') }}') center/auto 100% no-repeat;">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center justify-center">
        <div class="text-center">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-white">Faites un Don</h1>
            <p class="mt-4 text-lg sm:text-xl text-gray-100 max-w-2xl mx-auto">
                Soutenez nos missions humanitaires pour changer des vies.
            </p>
            <div class="mt-8 flex flex-col sm:flex-row justify-center gap-4">
                <a href="#donation-form" class="inline-block bg-yellow text-black px-6 py-3 font-bold rounded-md hover:bg-yellow-400 transition transform hover:scale-105 shadow-md">
                    Donnez maintenant
                </a>
                <a href="#donation-info" class="inline-block bg-yellow text-black px-6 py-3 font-bold rounded-md hover:bg-yellow-400 transition transform hover:scale-105 shadow-md">
                    En savoir plus
                </a>
            </div>

            <!-- Flèche bleue vers le bas -->
            <a href="#donation-info" class="mt-10 inline-block animate-bounce">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                </svg>
            </a>
        </div>
    </div>
</section>

        <!-- Section Informations sur les Dons -->
        <section id="donation-info" class="py-12 bg-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-primary text-center mb-6">Pourquoi Donner à ABEC ?</h2>
                <p class="mt-2 text-gray-600 leading-relaxed text-center max-w-3xl mx-auto mb-8">
                   Votre générosité, qu’elle soit grande ou petite, permet de financer des projets qui contribuent au bien-être des communautés dans le besoin.
                </p>

                <!-- Diaporama Swiper -->
                <div class="swiper mt-6">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="{{ asset('image/1.jpg') }}" alt="Slide 1"></div>
                        <div class="swiper-slide"><img src="{{ asset('image/2.jpg') }}" alt="Slide 2"></div>
                        <div class="swiper-slide"><img src="{{ asset('image/3.jpg') }}" alt="Slide 3"></div>
                        <div class="swiper-slide"><img src="{{ asset('image/4.jpg') }}" alt="Slide 4"></div>
                        <div class="swiper-slide"><img src="{{ asset('image/9.jpg') }}" alt="Slide 5"></div>
                        <div class="swiper-slide"><img src="{{ asset('image/99.jpg') }}" alt="Slide 6"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Formulaire de Don -->
       <!-- Section Formulaire de Don -->
<section id="donation-form" class="py-10 sm:py-16 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl sm:text-3xl font-bold text-primary text-center mb-6 sm:mb-8">Faites Votre Don</h2>

        <!-- Messages de succès/erreur -->
        @if (session('success'))
            <div class="mt-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-3 sm:p-4 rounded-md max-w-lg mx-auto text-center text-sm sm:text-base">
                <p>{{ session('success') }}</p>
            </div>
        @endif
        @if ($errors->has('general'))
            <div class="mt-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-3 sm:p-4 rounded-md max-w-lg mx-auto text-center text-sm sm:text-base">
                <p>{{ $errors->first('general') }}</p>
            </div>
        @endif
        @if ($errors->any() && !$errors->has('general'))
            <div class="mt-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-3 sm:p-4 rounded-md max-w-lg mx-auto text-sm sm:text-base">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulaire -->
        <form 
            action="{{ route('dons.store') }}" 
            method="POST" 
            class="mt-6 sm:mt-8 max-w-lg mx-auto"
            x-data="{
                phone: '',
                countryPrefixes: {
                    'CM|XAF': '+237',
                    'BJ|XOF': '+229',
                    'CI|XOF': '+225',
                    'RW|RWF': '+250',
                    'UG|UGX': '+256',
                    'KE|KES': '+254'
                },
                selectedCountry: 'CM|XAF',
                showAlternativePayment: false,
                updatePhone() {
                    const prefix = this.countryPrefixes[this.selectedCountry] || '';
                    if (!this.phone.startsWith(prefix)) {
                        this.phone = prefix;
                    }
                }
            }"
            x-init="updatePhone()"
            @submit="isLoading = true"
        >
            @csrf
            <input type="hidden" name="nature" value="Financier">

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="pays">Sélectionnez un pays *</label>
                <select
                    id="pays"
                    name="country_currency"
                    x-model="selectedCountry"
                    @change="updatePhone()"
                    class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-2 px-3 rounded leading-tight focus:outline-none focus:shadow-outline"
                    required
                >
                    <option value="CM|XAF">Cameroun (XAF)</option>
                    <option value="BJ|XOF">Bénin (XOF)</option>
                    <option value="CI|XOF">Côte d'Ivoire (XOF)</option>
                    <option value="RW|RWF">Rwanda (RWF)</option>
                    <option value="UG|UGX">Ouganda (UGX)</option>
                    <option value="KE|KES">Kenya (KES)</option>
                </select>
                @error('country_currency')
                    <span class="text-red-500 text-xs sm:text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Numéro de téléphone *</label>
                <input
                    type="tel"
                    id="phone"
                    name="phone"
                    x-model="phone"
                    class="shadow border rounded w-full py-2 px-3 text-gray-700 text-sm sm:text-base"
                    placeholder="Ex: +237696123456"
                    required
                >
                @error('phone')
                    <span class="text-red-500 text-xs sm:text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="amount" class="block text-gray-700 text-sm font-bold mb-2">Montant (en Fcfa) *</label>
                <input type="number" id="amount" name="amount" min="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 text-sm sm:text-base leading-tight focus:outline-none focus:shadow-outline" placeholder="Entrez un montant" required>
                @error('amount')
                    <span class="text-red-500 text-xs sm:text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nom</label>
                <input type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 text-sm sm:text-base leading-tight focus:outline-none focus:shadow-outline" placeholder="Votre nom (optionnel)">
                @error('name')
                    <span class="text-red-500 text-xs sm:text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="email" id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 text-sm sm:text-base leading-tight focus:outline-none focus:shadow-outline" placeholder="Votre email (optionnel)">
                @error('email')
                    <span class="text-red-500 text-xs sm:text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="service" class="block text-gray-700 text-sm font-bold mb-2">Opérateur *</label>
                <select id="service" name="service" class="shadow border rounded w-full py-2 px-3 text-gray-700 text-sm sm:text-base" required>
                    <option value="">Choisissez un opérateur</option>
                    <option value="ORANGE">Orange</option>
                    <option value="MTN">MTN</option>
                </select>
                @error('service')
                    <span class="text-red-500 text-xs sm:text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="text-center space-y-4">
                <button type="submit" class="bg-yellow text-black px-4 sm:px-6 py-2 sm:py-3 font-bold rounded-md hover:bg-yellow-400 transition transform hover:scale-105">
                    Soumettre le Don
                </button>

                <!-- Bouton "Payer autrement" -->
                <button 
                    type="button" 
                    @click="showAlternativePayment = !showAlternativePayment"
                    class="block w-full sm:w-auto mt-2 mx-auto bg-gray-700 text-white px-4 sm:px-6 py-2 sm:py-3 font-bold rounded-md hover:bg-gray-800 transition"
                >
                    Payer autrement
                </button>

                <!-- Image affichée au clic -->
                <div x-show="showAlternativePayment" class="mt-6">
                    <img src="{{ asset('image/ww.jpg') }}" alt="Méthode de paiement alternative" class="mx-auto max-w-full h-auto rounded-lg shadow-md">
                </div>
            </div>
        </form>
    </div>
</section>
    </main>

    <!-- Footer -->
    <footer id="contact" class="bg-primary text-white relative pt-10 overflow-hidden section-animate">
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
        <div class="marquee-container">
            <span class="marquee-text"> Agir - Grandir - Changer</span>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
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
                <div>
                    <h3 class="text-base font-bold mb-4 text-white border-b border-yellow pb-1">Liens Rapides</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ url('/') }}" class="footer-link text-gray-200 hover:text-yellow flex items-center transition-all duration-300"><span class="mr-2">→</span> Accueil</a></li>
                        <li><a href="{{ url('/about') }}" class="footer-link text-gray-200 hover:text-yellow flex items-center transition-all duration-300"><span class="mr-2">→</span> À propos</a></li>
                        <li><a href="{{ url('/news') }}" class="footer-link text-gray-200 hover:text-yellow flex items-center transition-all duration-300"><span class="mr-2">→</span> News</a></li>
                        <li><a href="{{ url('/dons') }}" class="footer-link text-gray-200 hover:text-yellow flex items-center transition-all duration-300"><span class="mr-2">→</span> Faire un don</a></li>
                        <li><a href="{{ url('/projects') }}" class="footer-link text-gray-200 hover:text-yellow flex items-center transition-all duration-300"><span class="mr-2">→</span>Evenements</a></li>
                    </ul>
                </div>
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
                            <p>+237 6 21 62 06 77 / +237 6 91 42 53 34</p>
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
        <div class="absolute top-0 right-0 w-24 h-24 bg-yellow rounded-full opacity-10 -translate-y-1/2 translate-x-1/2"></div>
        <div class="absolute bottom-0 left-0 w-16 h-16 bg-white rounded-full opacity-5 -translate-y-1/2 -translate-x-1/2"></div>
    </footer>

    <!-- Swiper Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const swiper = new Swiper('.swiper', {
                loop: true,
                autoplay: {
                    delay: 3500,
                    disableOnInteraction: false,
                },
                slidesPerView: 1,
                spaceBetween: 10,
            });
        });
    </script>
</body>
</html>