<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABEC - ONG</title>
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
        background: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
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
        width: 80px; /* Consistent size with other pages */
        height: 80px;
      }
      .spinner-circle {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: 4px solid transparent;
        border-top-color: #1E90FF; /* Matches primary color */
        border-radius: 50%;
        animation: spin 1s linear infinite;
      }
      .spinner-logo {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%); /* Precise centering */
        width: 56px; /* Increased from 48px for larger logo */
        height: 56px;
        object-fit: contain; /* Ensure logo scales correctly */
      }
      @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
      }
      /* Responsive adjustments for spinner */
      @media (max-width: 640px) {
        .spinner-container {
          width: 60px; /* Smaller size for mobile */
          height: 60px;
        }
        .spinner-logo {
          width: 42px; /* Increased from 36px for larger logo */
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
        background-color: #f0f8ff; /* Légère teinte bleue au survol */
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
    </style>
</head>
<body id="top" x-data="{ mobileMenuOpen: false, isLoading: true }" class="bg-white font-all-bold flex flex-col min-h-screen" @load.window="setTimeout(() => isLoading = false, 2000)">

    <!-- Loading Overlay -->
    <div x-show="isLoading" x-cloak class="loading-overlay">
        <div class="spinner-container">
            <!-- Cercle bleu rotatif -->
            <div class="spinner-circle"></div>
            <!-- Logo statique au centre -->
            <img src="{{ asset('image/ab.png') }}" alt="Logo ABEC" class="spinner-logo">
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
            <!-- Logo responsive -->
            <div class="flex-shrink-0">
              <a href="/"><img src="{{ asset('image/ab.png') }}" alt="logo" class="max-w-[100px] sm:max-w-[120px] h-16 md:max-w-[140px] lg:max-w-[160px]"></a>
            </div>

            <!-- Menu Desktop -->
            <nav class="hidden md:flex space-x-4">
                <a href="/" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Accueil</a>
                <a href="/news" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white">News</a>
                <a href="#contact" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Contact</a>
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

        <!-- Menu Mobile -->
        <div x-show="mobileMenuOpen" x-cloak class="md:hidden px-2 pt-2 pb-3 space-y-1">
            <a href="/" class="block px-3 py-2 rounded-md text-base font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Accueil</a>
            <a href="/news" class="block px-3 py-2 rounded-md text-base font-bold text-gray-800 hover:bg-blue-500 hover:text-white">News</a>
            <a href="/contact" class="block px-3 py-2 rounded-md text-base font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Contact</a>
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
                <h2 class="text-3xl font-bold text-gray-900 text-center">Pourquoi Donner à ABEC ?</h2>
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
                <h2 class="text-3xl font-bold text-gray-900 text-center">Faites Votre Don</h2>

                <form action="{{ route('dons.store') }}" method="POST" class="mt-8 max-w-lg mx-auto" @submit="isLoading = true">
                    <!-- CSRF Token -->
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

    <!-- Footer -->
    <section id="contact">
        <footer class="bg-primary text-white mt-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-center">
                <nav>
                    <ul class="flex flex-col space-y-2 sm:flex-row sm:space-x-6 sm:space-y-0 justify-center">
                        <li><a href="/" class="hover:text-gray-200">Accueil</a></li>
                        <li><a href="/about" class="hover:text-gray-200">À propos</a></li>
                        <li><a href="/projects" class="hover:text-gray-200">Nos Actions</a></li>
                        <li><a href="/contact" class="hover:text-gray-200">Contact</a></li>
                    </ul>
                </nav>
                <hr class="my-4 border-gray-300 max-w-md mx-auto" />
                <p class="text-sm font-bold mt-4">Basée à Yaoundé, Cameroun</p>
                <p class="text-sm font-bold mt-2">Organisation internationale. Tous droits réservés.</p>
                <div class="flex justify-center space-x-4 mt-4">
                    <a href="https://www.facebook.com/profile.php?id=61568266295634"><img src="{{ asset('image/feacebook.jpg') }}" alt="Facebook" class="w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8 rounded-full"></a>
                    <a href="https://whatsapp.com/channel/0029VaYTsNkD8SE42sDpnk1w"><img src="{{ asset('image/wastapp.jpg') }}" alt="WhatsApp" class="w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8 rounded-full"></a>
                    <a href="https://www.instagram.com/abec.officiel/"><img src="{{ asset('image/insta.jpg') }}" alt="Instagram" class="w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8 rounded-full"></a>
                </div>
            </div>
        </footer>
    </section>
</body>
</html> 