<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABEC - Nos Événements</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="64x64" href="{{ asset('image/ab.png') }}">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
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
              'custom': ['Arial Black', 'sans-serif'],
            }
          }
        }
      }
    </script>
    <style>
      [x-cloak] { display: none; }
      h1, h2, h3, .font-custom {
        font-family: 'custom', sans-serif;
      }
      /* Loading Spinner Styles */
      #loading {
        display: flex;
        align-items: center;
        justify-content: center;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
        z-index: 9999;
        transition: opacity 0.5s ease-out;
      }
      #loading.hidden {
        opacity: 0;
        pointer-events: none;
      }
      .spinner-container {
        position: relative;
        width: 80px; /* Size of the spinner */
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
        width: 48px; /* 60% of spinner-container size for balance */
        height: 48px;
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
          width: 36px; /* Adjusted logo size for mobile */
          height: 36px;
        }
      }
    </style>
</head>
<body id="top" x-data="{ mobileMenuOpen: false }" class="bg-white font-sans antialiased">

    <!-- Loading Spinner -->
    <div id="loading" class="fixed inset-0 bg-white bg-opacity-80 flex items-center justify-center z-50">
        <div class="spinner-container">
            <!-- Cercle bleu rotatif -->
            <div class="spinner-circle"></div>
            <!-- Logo statique au centre -->
            <img src="{{ asset('image/ab.png') }}" alt="Logo ABEC" class="spinner-logo">
        </div>
    </div>

    <!-- Top Nav -->
    <nav class="bg-primary text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-10">
                <div class="flex items-center space-x-4">
                    <a href="https://www.facebook.com/profile.php?id=61568266295634" target="_blank">
                        <img src="{{ asset('image/feacebook.jpg') }}" alt="Facebook" class="w-6 h-6 rounded-full">
                    </a>
                    <a href="https://whatsapp.com/channel/0029VaYTsNkD8SE42sDpnk1w" target="_blank">
                        <img src="{{ asset('image/wastapp.jpg') }}" alt="WhatsApp" class="w-6 h-6 rounded-full">
                    </a>
                    <a href="https://www.instagram.com/abec.officiel/" target="_blank">
                        <img src="{{ asset('image/insta.jpg') }}" alt="Instagram" class="w-6 h-6 rounded-full">
                    </a>
                </div>
                <a href="mailto:globaluniversalwelfare@gmail.com">
                    <img src="{{ asset('image/m.jpg') }}" alt="Email" class="w-6 h-6 rounded-full">
                </a>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="bg-white shadow py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex-shrink-0">
                    <img src="{{ asset('image/ab.png') }}" alt="logo" class="h-10 sm:h-12 md:h-14">
                </div>
                <!-- Nav desktop -->
                <nav class="hidden md:flex space-x-4">
                    <a href="{{route('welcome')}}" class="px-3 py-2 text-sm text-gray-800 hover:bg-gray-200 font-bold font-custom">Accueil</a>
                    <a href="{{ route('dons') }}" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Dons</a>
                    <a href="{{ route('news') }}" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white">News</a>
                </nav>

                <!-- Bouton Hamburger -->
                <div class="md:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-500 focus:outline-none p-2">
                        <svg x-show="!mobileMenuOpen" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <svg x-show="mobileMenuOpen" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Menu mobile -->
            <div x-show="mobileMenuOpen" x-cloak class="md:hidden px-2 pt-2 pb-3 space-y-1 mt-4 bg-white rounded-lg shadow-lg">
                <a href="{{route('welcome')}}" class="block px-3 py-2 text-base text-gray-800 hover:bg-gray-200 font-bold font-custom">Accueil</a>
                <a href="{{route('dons')}}" class="block px-3 py-2 text-base text-gray-800 hover:bg-gray-200 font-bold font-custom">Dons</a>
                <a href="{{route('news')}}" class="block px-3 py-2 text-base text-gray-800 hover:bg-gray-200 font-bold font-custom">News</a>
            </div>
        </div>
    </header>

    <!-- Hero -->
    <section class="relative bg-cover bg-center"
             style="background: url('{{ asset('image/fotos.jpg') }}') center/cover no-repeat;">
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-32 flex items-center justify-center text-center">
            <div class="text-white max-w-3xl">
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold font-custom leading-tight">
                    Nos Événements
                </h1>
                <p class="mt-4 text-lg sm:text-xl font-bold font-custom">
                    Découvrez nos actions passées et à venir.
                </p>
                <div class="mt-8">
                    <a href="#upcoming-events" class="inline-block bg-yellow text-black px-6 py-3 font-bold rounded-md hover:bg-white hover:text-primary transition hover:scale-105 font-custom shadow-lg">
                        Voir les événements
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Événements à Venir -->
    <section id="upcoming-events" class="py-12 md:py-16 bg-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 text-center font-custom mb-8 md:mb-12">Événements à Venir</h2>
            <div class="grid gap-6 sm:gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Événement 1 -->
                <div class="bg-white rounded-xl md:rounded-2xl shadow-lg overflow-hidden hover:scale-105 hover:shadow-2xl transition group">
                    <img src="{{ asset('image/fotos.jpg') }}" alt="Plantation d'arbres" class="w-full h-48 sm:h-56 object-cover">
                    <div class="p-4 sm:p-6">
                        <span class="block text-xs sm:text-sm text-gray-500 font-bold">10 Juin 2024 • Yaoundé</span>
                        <h3 class="text-lg sm:text-xl font-bold text-gray-800 mt-2 font-custom">Plantation d'arbres</h3>
                        <p class="mt-2 sm:mt-3 text-gray-600 text-sm sm:text-base font-custom">
                            Rejoignez-nous pour planter 1000 arbres dans les écoles et espaces publics de la ville.
                        </p>
                    </div>
                </div>
                <!-- Événement 2 -->
                <div class="bg-white rounded-xl md:rounded-2xl shadow-lg overflow-hidden hover:scale-105 hover:shadow-2xl transition group">
                    <img src="{{ asset('image/fotos.jpg') }}" alt="Collecte de dons médicaux" class="w-full h-48 sm:h-56 object-cover">
                    <div class="p-4 sm:p-6">
                        <span class="block text-xs sm:text-sm text-gray-500 font-bold">25 Juillet 2024 • Douala</span>
                        <h3 class="text-lg sm:text-xl font-bold text-gray-800 mt-2 font-custom">Collecte de dons médicaux</h3>
                        <p class="mt-2 sm:mt-3 text-gray-600 text-sm sm:text-base font-custom">
                            Nous organisons une grande collecte de médicaments et matériel pour les hôpitaux ruraux.
                        </p>
                    </div>
                </div>
                <!-- Événement 3 -->
                <div class="bg-white rounded-xl md:rounded-2xl shadow-lg overflow-hidden hover:scale-105 hover:shadow-2xl transition group">
                    <img src="{{ asset('image/fotos2.jpg') }}" alt="Atelier d'éducation financière" class="w-full h-48 sm:h-56 object-cover">
                    <div class="p-4 sm:p-6">
                        <span class="block text-xs sm:text-sm text-gray-500 font-bold">15 Août 2024 • Garoua</span>
                        <h3 class="text-lg sm:text-xl font-bold text-gray-800 mt-2 font-custom">Atelier d'éducation financière</h3>
                        <p class="mt-2 sm:mt-3 text-gray-600 text-sm sm:text-base font-custom">
                            Formation gratuite pour les jeunes entrepreneurs sur la gestion de leur budget et projets.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Événements Passés -->
    <section id="past-events" class="py-12 md:py-16 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 text-center font-custom mb-8 md:mb-12">Événements Passés</h2>
            <div class="grid gap-6 sm:gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Événement 1 -->
                <div class="bg-white rounded-xl md:rounded-2xl shadow-lg overflow-hidden hover:scale-105 hover:shadow-2xl transition group">
                    <img src="{{ asset('image/fotos4.jpg') }}" alt="Distribution de fournitures scolaires" class="w-full h-48 sm:h-56 object-cover">
                    <div class="p-4 sm:p-6">
                        <span class="block text-xs sm:text-sm text-gray-500 font-bold">15 Mars 2024 • Yaoundé</span>
                        <h3 class="text-lg sm:text-xl font-bold text-gray-800 mt-2 font-custom">Distribution de fournitures scolaires</h3>
                        <p class="mt-2 sm:mt-3 text-gray-600 text-sm sm:text-base font-custom">
                            Nous avons offert des cahiers, stylos et cartables à 200 enfants dans un orphelinat local.
                        </p>
                    </div>
                </div>
                <!-- Événement 2 -->
                <div class="bg-white rounded-xl md:rounded-2xl shadow-lg overflow-hidden hover:scale-105 hover:shadow-2xl transition group">
                    <img src="{{ asset('image/fotos.jpg') }}" alt="Campagne de vaccination" class="w-full h-48 sm:h-56 object-cover">
                    <div class="p-4 sm:p-6">
                        <span class="block text-xs sm:text-sm text-gray-500 font-bold">22 Janvier 2024 • Douala</span>
                        <h3 class="text-lg sm:text-xl font-bold text-gray-800 mt-2 font-custom">Campagne de vaccination</h3>
                        <p class="mt-2 sm:mt-3 text-gray-600 text-sm sm:text-base font-custom">
                            En partenariat avec le ministère de la santé, nous avons vacciné plus de 500 personnes.
                        </p>
                    </div>
                </div>
                <!-- Événement 3 -->
                <div class="bg-white rounded-xl md:rounded-2xl shadow-lg overflow-hidden hover:scale-105 hover:shadow-2xl transition group">
                    <img src="{{ asset('image/fotos.jpg') }}" alt="Nettoyage de quartier" class="w-full h-48 sm:h-56 object-cover">
                    <div class="p-4 sm:p-6">
                        <span class="block text-xs sm:text-sm text-gray-500 font-bold">5 Décembre 2023 • Bafoussam</span>
                        <h3 class="text-lg sm:text-xl font-bold text-gray-800 mt-2 font-custom">Nettoyage de quartier</h3>
                        <p class="mt-2 sm:mt-3 text-gray-600 text-sm sm:text-base font-custom">
                            100 bénévoles ont participé à la collecte de déchets dans les rues du centre-ville.
                        </p>
                    </div>
                </div>
            </div>
            <p class="mt-8 md:mt-12 text-center text-gray-600 font-bold font-custom max-w-3xl mx-auto px-4 text-sm sm:text-base">
                Chaque événement est une opportunité d’agir ensemble. Rejoignez-nous et faites partie du changement !
            </p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-primary text-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <nav class="flex flex-col sm:flex-row justify-center gap-4 sm:gap-6 mb-6">
                <a href="/" class="text-sm font-bold hover:text-gray-200 font-custom">Accueil</a>
                <a href="#about" class="text-sm font-bold hover:text-gray-200 font-custom">À propos</a>
                <a href="#actions" class="text-sm font-bold hover:text-gray-200 font-custom">Nos Actions</a>
                <a href="{{ route('news') }}" class="text-sm font-bold hover:text-gray-200 font-custom">News</a>
                <a href="#contact" class="text-sm font-bold hover:text-gray-200 font-custom">Contact</a>
            </nav>
            <hr class="my-4 border-gray-300 max-w-md mx-auto" />
            <p class="text-sm font-bold font-custom">Basée à Yaoundé, Cameroun</p>
            <a href="#top" class="mt-4 inline-block text-sm font-bold hover:text-gray-200 font-custom">▲ Retour en haut</a>
            <hr class="my-4 border-gray-300 max-w-md mx-auto" />
            <p class="text-sm font-bold font-custom">Organisation internationale. Tous droits réservés.</p>
            <p class="text-xs mt-2 font-custom">Suivez-nous :</p>
            <div class="flex justify-center space-x-4 mt-4">
                <a href="https://www.facebook.com/profile.php?id=61568266295634" target="_blank" class="hover:opacity-80">
                    <img src="{{ asset('image/feacebook.jpg') }}" alt="Facebook" class="w-6 h-6 rounded-full">
                </a>
                <a href="https://whatsapp.com/channel/0029VaYTsNkD8SE42sDpnk1w" target="_blank" class="hover:opacity-80">
                    <img src="{{ asset('image/wastapp.jpg') }}" alt="WhatsApp" class="w-6 h-6 rounded-full">
                </a>
                <a href="https://www.instagram.com/abec.officiel/" target="_blank" class="hover:opacity-80">
                    <img src="{{ asset('image/insta.jpg') }}" alt="Instagram" class="w-6 h-6 rounded-full">
                </a>
            </div>
        </div>
    </footer>

    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <!-- Spinner Script -->
    <script>
      window.addEventListener('load', () => {
          const loading = document.getElementById('loading');
          setTimeout(() => {
              loading.classList.add('hidden');
              setTimeout(() => {
                  loading.style.display = 'none';
              }, 500); // Correspond à la durée de la transition CSS
          }, 1000); // Délai avant de masquer le spinner (ajustez si nécessaire)
      });
    </script>
</body>
</html>