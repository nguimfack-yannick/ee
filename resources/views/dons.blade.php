<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organisationdu Bien-Être Communautaire</title>
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
      [x-cloak] { display: none; }
      body { font-family: 'Arial Black', sans-serif; background-color: #ffffff; }
      .partner-logo { width: 100px; height: 100px; object-fit: contain; transition: transform 0.3s; }
      .swiper-slide-active .partner-logo { transform: scale(1.3); }
      .dropdown-menu { background-color: white; z-index: 50; }
      .font-all-bold, body, h1, h2, h3, p, a, li { font-weight: bold; font-family: 'Arial Black', sans-serif; }
      /* Loading Spinner Styles */
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
        transition: opacity 0.5s ease-out;
      }
      .loading-overlay[x-show="isLoading"] {
        opacity: 1;
      }
      .loading-overlay:not([x-show="isLoading"]) {
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
        .spinner-container {
          width: 60px;
          height: 60px;
        }
        .spinner-logo {
          width: 42px;
          height: 42px;
        }
      }
      /* Animations pour la grille de la section Action */
      .action-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        opacity: 0;
        transform: translateY(20px);
      }
      .action-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        background-color: #f0f8ff;
      }
      .animate-card {
        animation: fadeInUp 0.6s ease-out forwards;
      }
      @keyframes fadeInUp {
        from {
          opacity: 0;
          transform: translateY(20px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }
      /* Styles pour le footer compact */
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
<body id="top" x-data="{ mobileMenuOpen: false, isLoading: true }" class="bg-white font-all-bold flex flex-col min-h-screen" @load.window="setTimeout(() => isLoading = false, 2000)">

    <!-- Loading Overlay -->
    <div x-show="isLoading" x-cloak class="loading-overlay">
        <div class="spinner-container">
            <div class="spinner-circle"></div>
            <img src="{{ asset('image/ab.png') }}" alt="Logo ABEC" class="spinner-logo transition-transform duration-300 hover:scale-105">
        </div>
    </div>

    <!-- Top Bar avec réseaux sociaux -->
    <nav class="bg-primary text-white w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-10">
            <div class="flex space-x-4">
                <a href="https://www.facebook.com/profile.php?id=61568266295634" target="_blank"><img src="{{ asset('image/feacebook.jpg') }}" alt="Facebook" class="w-6 h-6 rounded-full"></a>
                <a href="https://whatsapp.com/channel/0029VaYTsNkD8SE42sDpnk1w" target="_blank"><img src="{{ asset('image/wastapp.jpg') }}" alt="WhatsApp" class="w-6 h-6 rounded-full"></a>
                <a href="https://www.instagram.com/abec.officiel/" target="_blank"><img src="{{ asset('image/insta.jpg') }}" alt="Instagram" class="w-6 h-6 rounded-full"></a>
            </div>
            <a href="mailto:globaluniversalwelfare@gmail.com"><img src="{{ asset('image/m.jpg') }}" alt="Email" class="w-6 h-6 rounded-full"></a>
        </div>
    </nav>

    <!-- Header principal -->
    <header class="bg-white shadow py-4 w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-16">
            <div class="flex-shrink-0">
                <a href="/"><img src="{{ asset('image/ab.png') }}" alt="logo" class="max-w-[100px] sm:max-w-[120px] h-16 md:max-w-[140px] lg:max-w-[160px]"></a>
            </div>
            <nav class="hidden md:flex space-x-4">
                <a href="/" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Accueil</a>
                <a href="/news" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white">News</a>
                <a href="/branche" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Evenements</a>
                <!-- <a href="#contact" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Contact</a> -->
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
          <a href="/branche" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Evenements</a>
        </div>
    </header>

    <!-- Contenu dynamique -->
    <main class="flex-1">
        <!-- Section Don -->
        <section class="relative h-screen bg-cover bg-center"
             style="background: url('{{ asset('image/dons.png') }}') center/auto 200% no-repeat;">
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center justify-center">
                <div class="text-center">
                    <h1 class="text-5xl font-extrabold text-white sm:text-6xl">Faites un Don</h1>
                    <p class="mt-4 text-xl text-gray-100">
                        Soutenez nos missions humanitaires pour changer des vies.
                    </p>
                    <div class="mt-8 flex flex-col sm:flex-row justify-center gap-4">
                        <a href="#donation-form"
                           class="inline-block bg-yellow text-black px-8 py-3 font-bold rounded-md hover:bg-yellow-400 transition transform hover:scale-105">
                            Donnez maintenant
                        </a>
                        <a href="#donation-info"
                           class="inline-block bg-yellow text-black px-8 py-3 font-bold rounded-md hover:bg-yellow-400 transition transform hover:scale-105">
                            En savoir plus
                        </a>
                    </div>
                </div>
            </div>
            <div class="absolute bottom-8 w-full flex justify-center">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </div>
        </section>

        <!-- Section Informations sur les Dons -->
        <section id="donation-info" class="py-16 bg-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- ✅ Titre modifié en bleu -->
                <h2 class="text-3xl font-bold text-primary text-center">Pourquoi Donner à ABEC ?</h2>
                <p class="mt-4 text-gray-600 leading-relaxed text-center max-w-3xl mx-auto">
                    Votre générosité permet de fournir des ressources vitales aux hôpitaux et orphelinats. Chaque don,
                    qu’il soit grand ou petit, contribue à améliorer la qualité de vie des personnes dans le besoin.
                </p>
                <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-6 max-w-4xl mx-auto">
                    <div class="bg-white p-4 rounded shadow text-center action-card" x-data="{ isVisible: false }" x-intersect="isVisible = true" :class="{ 'animate-card': isVisible }">
                        <h3 class="font-bold text-gray-800">Impact de Votre Don</h3>
                        <p class="text-gray-600 mt-2">
                            Un don de 10 € peut offrir un repas à un enfant, tandis qu’un don de 50 € peut fournir du
                            matériel médical essentiel.
                        </p>
                    </div>
                    <div class="bg-white p-4 rounded shadow text-center action-card" x-data="{ isVisible: false }" x-intersect="isVisible = true" :class="{ 'animate-card': isVisible }" style="animation-delay: 0.2s;">
                        <h3 class="font-bold text-gray-900">Sécurité et Transparence</h3>
                        <p class="text-gray-600 mt-2">
                            Vos dons sont gérés avec transparence et utilisés directement pour nos projets humanitaires.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Formulaire de Don -->
        <section id="donation-form" class="py-16 bg-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- ✅ Titre modifié en bleu -->
                <h2 class="text-3xl font-bold text-primary text-center">Faites Votre Don</h2>
                <form action="{{ route('dons.store') }}" method="POST" class="mt-8 max-w-lg mx-auto" @submit="isLoading = true">
                    @csrf
                    @if ($errors->has('general'))
                        <p class="text-red-500 text-center mb-4">{{ $errors->first('general') }}</p>
                    @endif
                    <div class="mb-4">
                        <label for="nature" class="block text-gray-700 text-sm font-bold mb-2">Nature des dons</label>
                        <select id="nature" name="nature" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="">Sélectionner la nature du don</option>
                            <option value="Financier">Financier</option>
                            <option value="Matériel">Matériel</option>
                            <option value="Bénévole">Bénévole</option>
                        </select>
                        @error('nature')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="pays">Sélectionnez un pays</label>
                        <select id="pays" name="country_currency" class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-2 px-3 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline">
                            <option value="CM|XAF">Cameroun (XAF)</option>
                            <option value="BJ|XOF">Bénin (XOF)</option>
                            <option value="CI|XOF">Côte d'Ivoire (XOF)</option>
                            <option value="RW|RWF">Rwanda (RWF)</option>
                            <option value="UG|UGX">Ouganda (UGX)</option>
                            <option value="KE|KES">Kenya (KES)</option>
                        </select>
                        @error('country_currency')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Numéro de téléphone</label>
                        <input type="tel" id="phone" name="phone" class="shadow border rounded w-full py-2 px-3 text-gray-700" placeholder="Ex: 696123456">
                        @error('phone')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="amount" class="block text-gray-700 text-sm font-bold mb-2">Montant (en €, si financier)</label>
                        <input type="number" id="amount" name="amount" min="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Entrez un montant">
                        @error('amount')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nom (ou Anonyme)</label>
                        <input type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Votre nom ou Anonyme">
                        @error('name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                        <input type="email" id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Votre email">
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="service" class="block text-gray-700 text-sm font-bold mb-2">Opérateur</label>
                        <select id="service" name="service" class="shadow border rounded w-full py-2 px-3 text-gray-700">
                            <option value="">Choisissez un opérateur</option>
                            <option value="ORANGE">Orange</option>
                            <option value="MTN">MTN</option>
                        </select>
                        @error('service')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="comment" class="block text-gray-700 text-sm font-bold mb-2">Commentaire (facultatif)</label>
                        <textarea id="comment" name="comment" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ex. : Don pour la campagne de santé"></textarea>
                        @error('comment')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" class="bg-yellow text-black px-6 py-3 font-bold rounded-md hover:bg-yellow-400 transition transform hover:scale-105">
                            Soumettre le Don
                        </button>
                    </div>
                </form>
                @if (session('success'))
                    <p class="mt-4 text-green-600 text-center max-w-2xl mx-auto">
                        {{ session('success') }}
                    </p>
                @endif
            </div>
        </section>
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
            <span class="marquee-text">Agir - Grandir - Changer</span>
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
                        Nous œuvrons depuis 2024 pour améliorer les conditions de vie des communautés vulnérables au Cameroun.
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
                        <a href="mailto:globaluniversalwelfare@gmail.com" class="social-icon bg-white bg-opacity-20 p-1.5 rounded-full hover:bg-yellow transition-all duration-300">
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
                           <li><a href="{{ url('/projects') }}" class="footer-link text-gray-200 hover:text-yellow flex items-center transition-all duration-300"><span class="mr-2">→</span>Evenements</a></li>
                        <!-- <li><a href="{{ url('/contact') }}" class="footer-link text-gray-200 hover:text-yellow flex items-center transition-all duration-300"><span class="mr-2">→</span> Contact</a></li> -->
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
                        <a href="{{ route('politique') }}"" class="text-gray-300 hover:text-yellow transition-colors duration-300">Politique de confidentialité</a>
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