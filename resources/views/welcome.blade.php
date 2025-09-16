<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>ABEC - ONG Humanitaire</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="64x64" href="{{ asset('image/ab.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('image/ab-180.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('image/ab-32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/ab-16.png') }}">
    <link rel="manifest" href="{{ asset('manifest.json') }}">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Police Arial Black -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Arial+Black&display=swap');

        body {
            background-color: #ffffff;
            font-family: 'Arial Black', sans-serif;
        }

        .font-all-bold, body, h1, h2, h3, p, a, li { font-weight: bold; }

        /* Partner Logo Styles */
        .partner-logo {
            width: 80px;
            height: 80px;
            object-fit: contain;
            transition: transform 0.6s ease;
        }
        .swiper-slide-active .partner-logo {
            transform: scale(1.2);
        }

        /* Responsive Hero Section */
        .heroSwiper .swiper-slide {
            background-size: cover;
            background-position: center;
        }

        /* Responsive text sizes */
        .hero-text {
            font-size: clamp(2rem, 6vw, 3.5rem);
        }
        .hero-subtext {
            font-size: clamp(1rem, 3vw, 1.25rem);
        }

        /* Responsive images in Nos Actions */
        .action-image {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 0.5rem;
        }

        /* Animation automatique pour les cartes de la section Nos Actions */
        .action-card {
            animation: float 3s ease-in-out infinite;
            transition: transform 0.3s ease, height 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }
        .action-card.expanded {
            transform: scale(1.05);
            height: auto;
            z-index: 10;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        .action-card .expanded-content {
            display: none;
        }
        .action-card.expanded .expanded-content {
            display: block;
            margin-top: 1rem;
        }
        @keyframes float {
            0% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
            100% { transform: translateY(0); }
        }

        /* Responsive video */
        .responsive-video {
            width: 100%;
            max-width: 100%;
            height: auto;
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
            z-index: 9999;
            transition: opacity 0.5s ease-out;
        }

        #loading.hidden {
            opacity: 0;
            pointer-events: none;
        }

        .animate-spin {
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @media (max-width: 640px) {
            .hero-text {
                font-size: clamp(1.5rem, 5vw, 2.5rem);
            }
            .hero-subtext {
                font-size: clamp(0.875rem, 2.5vw, 1rem);
            }
            .partner-logo {
                width: 60px;
                height: 60px;
            }
            .action-image {
                height: 120px;
            }
        }
    </style>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              primary: '#4169E1', /* Bleu royal */
              secondary: '#87CEFA',
              yellow: '#FFD700'
            }
          }
        }
      }
    </script>
</head>
<body id="top" x-data="{ mobileMenuOpen: false, dropdownOpen: false, expandedCard: null }" class="bg-white font-sans antialiased font-all-bold">

    <!-- Loading Spinner -->
    <div id="loading" class="fixed inset-0 bg-white bg-opacity-80 flex items-center justify-center z-50">
        <div class="relative w-24 h-24">
            <!-- Cercle bleu rotatif -->
            <div class="absolute inset-0 border-4 border-t-primary border-transparent rounded-full animate-spin"></div>
            <!-- Logo statique au centre -->
            <img src="{{ asset('image/ab.png') }}" alt="Logo ABEC" class="w-16 h-16 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
        </div>
    </div>

    <!-- Top Bar -->
    <nav class="bg-primary text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-10">
                <div class="flex items-center space-x-4">
                    <a href="https://www.facebook.com/profile.php?id=61568266295634" target="_blank" class="hover:opacity-80" title="Facebook">
                        <img src="{{ asset('image/feacebook.jpg') }}" alt="Facebook" class="w-6 h-6 rounded-full">
                    </a>
                    <a href="https://whatsapp.com/channel/0029VaYTsNkD8SE42sDpnk1w" target="_blank" class="hover:opacity-80" title="WhatsApp">
                        <img src="{{ asset('image/wastapp.jpg') }}" alt="WhatsApp" class="w-6 h-6 rounded-full">
                    </a>
                    <a href="https://www.instagram.com/abec.officiel/" target="_blank" class="hover:opacity-80" title="Instagram">
                        <img src="{{ asset('image/insta.jpg') }}" alt="Instagram" class="w-6 h-6 rounded-full">
                    </a>
                </div>
                <a href="mailto:globaluniversalwelfare@gmail.com" class="hover:opacity-80" title="Email">
                    <img src="{{ asset('image/m.jpg') }}" alt="Email" class="w-6 h-6 rounded-full">
                </a>
            </div>
        </div>
    </nav>

    <!-- Nav Bar Principale -->
    <header class="bg-white shadow py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex-shrink-0 w-[100px] sm:w-[120px] md:w-[180px] lg:w-[240px] h-auto flex justify-center">
                    <img src="{{ asset('image/ab.png') }}" alt="logo" class="w-10/12 sm:w-8/12 md:w-6/12 lg:w-4/12">
                </div>
                <nav class="hidden md:flex space-x-4">
                    <a href="#top" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-primary hover:text-white">Accueil</a>
                    <a href="#actions" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-primary hover:text-white">Nos Actions</a>
                    <a href="#about" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-primary hover:text-white">À propos</a>
                    <a href="{{route('news')}}" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-primary hover:text-white">News</a>
                    <a href="#contact" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-primary hover:text-white">Contact</a>
                    <a href="{{ url('/dons') }}" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-primary hover:text-white">Dons</a>
                    <a href="{{ route('branche') }}" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-primary hover:text-white">Evenements</a>
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
        </div>
        <div x-show="mobileMenuOpen" x-cloak class="md:hidden px-2 pt-2 pb-3 space-y-1">
            <a href="#top" class="block px-3 py-2 rounded-md text-base font-bold text-gray-800 hover:bg-primary hover:text-white">Accueil</a>
            <a href="#about" class="block px-3 py-2 rounded-md text-base font-bold text-gray-800 hover:bg-primary hover:text-white">À propos</a>
            <a href="#actions" class="block px-3 py-2 rounded-md text-base font-bold text-gray-800 hover:bg-primary hover:text-white">Nos Actions</a>
            <a href="{{route('news')}}" class="block px-3 py-2 rounded-md text-base font-bold text-gray-800 hover:bg-primary hover:text-white">News</a>
            <a href="#contact" class="block px-3 py-2 rounded-md text-base font-bold text-gray-800 hover:bg-primary hover:text-white">Contact</a>
            <a href="{{ url('/dons') }}" class="block px-3 py-2 rounded-md text-base font-bold text-gray-800 hover:bg-primary hover:text-white">Dons</a>
            <a href="{{route('branche')}}" class="block px-3 py-2 rounded-md text-base font-bold text-gray-800 hover:bg-primary hover:text-white">Evenements</a>
        </div>
    </header>

    <!-- Hero Section avec Swiper Slider -->
    <section class="relative h-[70vh] sm:h-screen overflow-hidden">
        <div class="swiper heroSwiper h-full">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div
                        class="h-full bg-cover bg-center flex items-center justify-center"
                        style="background: url('{{ asset('image/elev.png') }}') center/cover no-repeat;"
                    >
                        <div class="text-center px-4">
                            <h1 class="hero-text font-extrabold text-white">
                                Organisation du Bien-Être Communautaire
                            </h1>
                            <p class="mt-4 hero-subtext text-gray-100 font-bold">
                               Une Organisation internationale œuvrant dans le monde entier pour le Bien-être des communautés.
                            </p>
                            <div class="mt-6 flex flex-col sm:flex-row justify-center gap-4">
                                <a
                                    href="santos/dons.php"
                                    class="inline-block bg-yellow text-black px-6 py-2 font-bold rounded-md hover:bg-gray-100 transition transform hover:scale-105"
                                >
                                    Faites un don
                                </a>
                                <a
                                    href="#about"
                                    class="inline-block bg-yellow text-black px-6 py-2 font-bold rounded-md hover:bg-gray-100 transition transform hover:scale-105"
                                >
                                    En savoir plus
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div
                        class="h-full bg-cover bg-center flex items-center justify-center"
                        style="background: url('{{ asset('image/pl.png') }}') center/cover no-repeat;"
                    >
                        <div class="text-center px-4">
                            <h1 class="hero-text font-extrabold text-white">
                                Organisation du Bien-Être Communautaire
                            </h1>
                            <p class="mt-4 hero-subtext text-gray-100 font-bold">
                                Une ONG dédiée à l’aide humanitaire : dons essentiels pour hôpitaux et orphelinats.
                            </p>
                            <div class="mt-6 flex flex-col sm:flex-row justify-center gap-4">
                                <a
                                    href="santos/dons.php"
                                    class="inline-block bg-yellow text-black px-6 py-2 font-bold rounded-md hover:bg-gray-100 transition transform hover:scale-105"
                                >
                                    Faites un don
                                </a>
                                <a
                                    href="#about"
                                    class="inline-block bg-yellow text-black px-6 py-2 font-bold rounded-md hover:bg-gray-100 transition transform hover:scale-105"
                                >
                                    En savoir plus
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div
                        class="h-full bg-cover bg-center flex items-center justify-center"
                        style="background: url('{{ asset('image/enfants.png') }}') center/cover no-repeat;"
                    >
                        <div class="text-center px-4">
                            <h1 class="hero-text font-extrabold text-white">
                                Organisation du Bien-Être Communautaire
                            </h1>
                            <p class="mt-4 hero-subtext text-gray-100 font-bold">
                                Une ONG dédiée à l’aide humanitaire : dons essentiels pour hôpitaux et orphelinats.
                            </p>
                            <div class="mt-6 flex flex-col sm:flex-row justify-center gap-4">
                                <a
                                    href="santos/dons.php"
                                    class="inline-block bg-yellow text-black px-6 py-2 font-bold rounded-md hover:bg-gray-100 transition transform hover:scale-105"
                                >
                                    Faites un don
                                </a>
                                <a
                                    href="#about"
                                    class="inline-block bg-yellow text-black px-6 py-2 font-bold rounded-md hover:bg-gray-100 transition transform hover:scale-105"
                                >
                                    En savoir plus
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div
                        class="h-full bg-cover bg-center flex items-center justify-center"
                        style="background: url('{{ asset('image/p.png') }}') center/cover no-repeat;"
                    >
                        <div class="text-center px-4">
                            <h1 class="hero-text font-extrabold text-white">
                                Organisation du Bien-Être Communautaire
                            </h1>
                            <p class="mt-4 hero-subtext text-gray-100 font-bold">
                                Une ONG dédiée à l’aide humanitaire : dons essentiels pour hôpitaux et orphelinats.
                            </p>
                            <div class="mt-6 flex flex-col sm:flex-row justify-center gap-4">
                                <a
                                    href="santos/dons.php"
                                    class="inline-block bg-yellow text-black px-6 py-2 font-bold rounded-md hover:bg-gray-100 transition transform hover:scale-105"
                                >
                                    Faites un don
                                </a>
                                <a
                                    href="#about"
                                    class="inline-block bg-yellow text-black px-6 py-2 font-bold rounded-md hover:bg-gray-100 transition transform hover:scale-105"
                                >
                                    En savoir plus
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div
                        class="h-full bg-cover bg-center flex items-center justify-center"
                        style="background: url('{{ asset('image/e.png') }}') center/cover no-repeat;"
                    >
                        <div class="text-center px-4">
                            <h1 class="hero-text font-extrabold text-white">
                                Organisation du Bien-Être Communautaire
                            </h1>
                            <p class="mt-4 hero-subtext text-gray-100 font-bold">
                                Une ONG dédiée à l’aide humanitaire : dons essentiels pour hôpitaux et orphelinats.
                            </p>
                            <div class="mt-6 flex flex-col sm:flex-row justify-center gap-4">
                                <a
                                    href="santos/dons.php"
                                    class="inline-block bg-yellow text-black px-6 py-2 font-bold rounded-md hover:bg-gray-100 transition transform hover:scale-105"
                                >
                                    Faites un don
                                </a>
                                <a
                                    href="#about"
                                    class="inline-block bg-yellow text-black px-6 py-2 font-bold rounded-md hover:bg-gray-100 transition transform hover:scale-105"
                                >
                                    En savoir plus
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Nos Actions -->
    <section id="actions" class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">Nos Actions</h2>
            <p class="mt-4 text-sm sm:text-base font-bold text-gray-700 leading-relaxed">
                Découvrez nos projets phares pour soutenir les hôpitaux et orphelinats. Nous mettons en œuvre divers programmes visant à améliorer l'accès aux soins et à offrir un environnement sûr et stimulant pour l'éducation des plus jeunes.
            </p>
            <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                <!-- Élément 1 -->
                <div class="bg-white p-4 rounded shadow-lg text-center action-card" x-data="{ expanded: false }" @click="expanded = !expanded; expandedCard = expanded ? 'card1' : null" :class="{ 'expanded': expanded }">
                    <img src="{{ asset('image/fotos.jpg') }}" alt="Dons aux Hôpitaux" class="action-image">
                    <h3 class="text-lg font-bold text-gray-800 mt-2">La Jeunesse</h3>
                    <p class="text-sm text-gray-600 mt-2">
                        Fourniture de matériel médical essentiel, formations pour le personnel et soutien aux infrastructures sanitaires dans les zones démunies.
                    </p>
                    <p class="text-xs text-gray-500 mt-2">Publié le : 15/09/2025</p>
                    <div class="expanded-content text-sm text-gray-600">
                        Nous collaborons avec des hôpitaux locaux pour fournir des équipements médicaux modernes, des formations spécialisées pour le personnel soignant, et des améliorations structurelles pour garantir des soins de qualité dans les régions les plus vulnérables.
                    </div>
                </div>
                <!-- Élément 2 -->
                <div class="bg-white p-4 rounded shadow-lg text-center action-card" x-data="{ expanded: false }" @click="expanded = !expanded; expandedCard = expanded ? 'card2' : null" :class="{ 'expanded': expanded }">
                    <img src="{{ asset('image/fotos2.jpg') }}" alt="Soutien aux Orphelinats" class="action-image">
                    <h3 class="text-lg font-bold text-gray-800 mt-2">L'environnement</h3>
                    <p class="text-sm text-gray-600 mt-2">
                        Dons alimentaires, éducatifs et matériels pour offrir un environnement chaleureux et bien équipé aux enfants en difficulté.
                    </p>
                    <p class="text-xs text-gray-500 mt-2">Publié le : 14/09/2025</p>
                    <div class="expanded-content text-sm text-gray-600">
                        Nos initiatives incluent la distribution de fournitures scolaires, de vêtements chauds et de repas équilibrés pour créer un cadre propice au développement des enfants orphelins.
                    </div>
                </div>
                <!-- Élément 3 -->
                <div class="bg-white p-4 rounded shadow-lg text-center action-card" x-data="{ expanded: false }" @click="expanded = !expanded; expandedCard = expanded ? 'card3' : null" :class="{ 'expanded': expanded }">
                    <img src="{{ asset('image/fotos.jpg') }}" alt="Programmes Communautaires" class="action-image">
                    <h3 class="text-lg font-bold text-gray-800 mt-2">Les droits De l'Homme</h3>
                    <p class="text-sm text-gray-600 mt-2">
                        Initiatives pour sensibiliser aux enjeux de santé et d’éducation, ateliers communautaires et partenariats locaux pour un soutien durable.
                    </p>
                    <p class="text-xs text-gray-500 mt-2">Publié le : 13/09/2025</p>
                    <div class="expanded-content text-sm text-gray-600">
                        Nos programmes communautaires incluent des ateliers éducatifs sur les droits humains, des campagnes de sensibilisation et des partenariats avec des organisations locales pour promouvoir l’égalité et la justice sociale.
                    </div>
                </div>
                <!-- Élément 4 -->
                <div class="bg-white p-4 rounded shadow-lg text-center action-card" x-data="{ expanded: false }" @click="expanded = !expanded; expandedCard = expanded ? 'card4' : null" :class="{ 'expanded': expanded }">
                    <img src="{{ asset('image/fotos4.jpg') }}" alt="Campagnes de Sensibilisation" class="action-image">
                    <h3 class="text-lg font-bold text-gray-800 mt-2"> La Santé</h3>
                    <p class="text-sm text-gray-600 mt-2">
                        Organisation d’événements et de campagnes pour impliquer directement les citoyens et promouvoir une approche collective face aux défis sociaux.
                    </p>
                    <p class="text-xs text-gray-500 mt-2">Publié le : 12/09/2025</p>
                    <div class="expanded-content text-sm text-gray-600">
                        Nos campagnes de sensibilisation mobilisent les communautés à travers des événements éducatifs et des initiatives participatives pour relever les défis sociaux et promouvoir la santé publique.
                    </div>
                </div>
                <!-- Élément 5 -->
                <div class="bg-white p-4 rounded shadow-lg text-center action-card" x-data="{ expanded: false }" @click="expanded = !expanded; expandedCard = expanded ? 'card5' : null" :class="{ 'expanded': expanded }">
                    <img src="{{ asset('image/fotos2.jpg') }}" alt="Éducation pour Enfants" class="action-image">
                    <h3 class="text-lg font-bold text-gray-800 mt-2">La Paix</h3>
                    <p class="text-sm text-gray-600 mt-2">
                        Fourniture de fournitures scolaires et création de programmes éducatifs pour soutenir l’apprentissage des enfants dans les orphelinats.
                    </p>
                    <p class="text-xs text-gray-500 mt-2">Publié le : 11/09/2025</p>
                    <div class="expanded-content text-sm text-gray-600">
                        Nous soutenons l’éducation en fournissant des livres, des fournitures scolaires et en organisant des programmes pédagogiques adaptés pour encourager l’apprentissage et le développement des enfants.
                    </div>
                </div>
                <!-- Élément 6 -->
                <div class="bg-white p-4 rounded shadow-lg text-center action-card" x-data="{ expanded: false }" @click="expanded = !expanded; expandedCard = expanded ? 'card6' : null" :class="{ 'expanded': expanded }">
                    <img src="{{ asset('image/fotos.jpg') }}" alt="Soins d’Urgence" class="action-image">
                    <h3 class="text-lg font-bold text-gray-800 mt-2">La Justice</h3>
                    <p class="text-sm text-gray-600 mt-2">
                        Mise en place de kits de premiers secours et interventions rapides pour répondre aux crises sanitaires dans les communautés vulnérables.
                    </p>
                    <p class="text-xs text-gray-500 mt-2">Publié le : 10/09/2025</p>
                    <div class="expanded-content text-sm text-gray-600">
                        Nos interventions d’urgence incluent la distribution de kits de premiers secours et la mise en place de cliniques mobiles pour répondre rapidement aux besoins médicaux des communautés en crise.
                    </div>
                </div>
                <!-- Élément 7 -->
                <div class="bg-white p-4 rounded shadow-lg text-center action-card" x-data="{ expanded: false }" @click="expanded = !expanded; expandedCard = expanded ? 'card7' : null" :class="{ 'expanded': expanded }">
                    <img src="{{ asset('image/fotos4.jpg') }}" alt="Renforcement des Capacités" class="action-image">
                    <h3 class="text-lg font-bold text-gray-800 mt-2">Le Développement Durable</h3>
                    <p class="text-sm text-gray-600 mt-2">
                        Formations pour les professionnels de santé et les éducateurs pour améliorer la qualité des services dans les hôpitaux et orphelinats.
                    </p>
                    <p class="text-xs text-gray-500 mt-2">Publié le : 09/09/2025</p>
                    <div class="expanded-content text-sm text-gray-600">
                        Nos programmes de formation renforcent les compétences des professionnels de santé et des éducateurs pour offrir des services de qualité et durables dans les institutions partenaires.
                    </div>
                </div>
                <!-- Élément 8 -->
                <div class="bg-white p-4 rounded shadow-lg text-center action-card" x-data="{ expanded: false }" @click="expanded = !expanded; expandedCard = expanded ? 'card8' : null" :class="{ 'expanded': expanded }">
                    <img src="{{ asset('image/fotos2.jpg') }}" alt="Aide Alimentaire" class="action-image">
                    <h3 class="text-lg font-bold text-gray-800 mt-2"> Le bien-être des Communautés</h3>
                    <p class="text-sm text-gray-600 mt-2">
                        Distribution de repas nutritifs pour les enfants et les familles dans les zones touchées par l’insécurité alimentaire.
                    </p>
                    <p class="text-xs text-gray-500 mt-2">Publié le : 08/09/2025</p>
                    <div class="expanded-content text-sm text-gray-600">
                        Nos initiatives d’aide alimentaire garantissent des repas nutritifs aux enfants et aux familles, réduisant ainsi l’impact de l’insécurité alimentaire dans les zones vulnérables.
                    </div>
                </div>
                <!-- Élément 9 -->
                <div class="bg-white p-4 rounded shadow-lg text-center action-card" x-data="{ expanded: false }" @click="expanded = !expanded; expandedCard = expanded ? 'card9' : null" :class="{ 'expanded': expanded }">
                    <img src="{{ asset('image/fotos.jpg') }}" alt="Projets d’Infrastructure" class="action-image">
                    <h3 class="text-lg font-bold text-gray-800 mt-2">La Culture</h3>
                    <p class="text-sm text-gray-600 mt-2">
                        Construction et rénovation de salles de classe et d’espaces médicaux pour améliorer les conditions d’apprentissage et de soin.
                    </p>
                    <p class="text-xs text-gray-500 mt-2">Publié le : 07/09/2025</p>
                    <div class="expanded-content text-sm text-gray-600">
                        Nous investissons dans la construction et la rénovation d’infrastructures éducatives et médicales pour offrir des environnements sûrs et modernes aux communautés.
                    </div>
                </div>
                <!-- Élément 10 -->
                <div class="bg-white p-4 rounded shadow-lg text-center action-card" x-data="{ expanded: false }" @click="expanded = !expanded; expandedCard = expanded ? 'card10' : null" :class="{ 'expanded': expanded }">
                    <img src="{{ asset('image/fotos4.jpg') }}" alt="Santé Maternelle" class="action-image">
                    <h3 class="text-lg font-bold text-gray-800 mt-2">L'Histoire</h3>
                    <p class="text-sm text-gray-600 mt-2">
                        Programmes pour soutenir les mères avec des consultations prénatales et des kits d’hygiène pour les nouveau-nés.
                    </p>
                    <p class="text-xs text-gray-500 mt-2">Publié le : 06/09/2025</p>
                    <div class="expanded-content text-sm text-gray-600">
                        Nos programmes de santé maternelle offrent des consultations prénatales, des kits d’hygiène et un soutien continu pour assurer la santé des mères et des nouveau-nés.
                    </div>
                </div>
                <!-- Élément 11 -->
                <div class="bg-white p-4 rounded shadow-lg text-center action-card" x-data="{ expanded: false }" @click="expanded = !expanded; expandedCard = expanded ? 'card11' : null" :class="{ 'expanded': expanded }">
                    <img src="{{ asset('image/fotos2.jpg') }}" alt="Activités Récréatives" class="action-image">
                    <h3 class="text-lg font-bold text-gray-800 mt-2">Le Panafricanisme</h3>
                    <p class="text-sm text-gray-600 mt-2">
                        Organisation d’activités sportives et culturelles pour favoriser le bien-être psychologique des enfants orphelins.
                    </p>
                    <p class="text-xs text-gray-500 mt-2">Publié le : 05/09/2025</p>
                    <div class="expanded-content text-sm text-gray-600">
                        Nos activités récréatives incluent des événements sportifs et culturels qui favorisent l’épanouissement psychologique et social des enfants orphelins.
                    </div>
                </div>
                <!-- Élément 12 -->
                <div class="bg-white p-4 rounded shadow-lg text-center action-card" x-data="{ expanded: false }" @click="expanded = !expanded; expandedCard = expanded ? 'card12' : null" :class="{ 'expanded': expanded }">
                    <img src="{{ asset('image/fotos.jpg') }}" alt="Sensibilisation à l’Hygiène" class="action-image">
                    <h3 class="text-lg font-bold text-gray-800 mt-2">Promotion de l’égalité et de l’équité</h3>
                    <p class="text-sm text-gray-600 mt-2">
                        Ateliers éducatifs pour promouvoir les pratiques d’hygiène dans les communautés et réduire les risques de maladies.
                    </p>
                    <p class="text-xs text-gray-500 mt-2">Publié le : 04/09/2025</p>
                    <div class="expanded-content text-sm text-gray-600">
                        Nos ateliers éducatifs sur l’hygiène enseignent des pratiques essentielles pour prévenir les maladies et promouvoir la santé communautaire à long terme.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section À propos -->
    <section id="about" class="py-12 bg-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">À propos d'ABEC</h2>
            <p class="mt-4 text-sm sm:text-base font-bold text-gray-600 leading-relaxed">
                L'Association pour le Bien-Être Communautaire (ABEC) est une ONG humanitaire engagée dans la lutte contre la pauvreté et l'injustice sociale. Nous croyons fermement que chaque individu mérite un accès aux soins de santé, à l'éducation et à des conditions de vie dignes. À travers nos différentes initiatives, nous soutenons les hôpitaux et les orphelinats en fournissant des dons essentiels, en organisant des campagnes de sensibilisation et en mobilisant des ressources pour aider les plus vulnérables. Ensemble, nous pouvons faire une différence significative dans la vie de ceux qui en ont besoin.
            </p>
            <div class="mt-8 flex justify-center">
                <video class="responsive-video rounded-lg shadow-lg" autoplay loop muted playsinline>
                    <source src="{{ asset('image/orange.mp4') }}" type="video/mp4">
                    Votre navigateur ne prend pas en charge la lecture de vidéos.
                </video>
            </div>
        </div>
    </section>

    <!-- Section Nos Partenaires -->
    <section id="partners" class="py-12 bg-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-8">Nos Partenaires</h2>
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide flex justify-center items-center">
                        <img src="{{ asset('image/la paix.png') }}" alt="Partenaire 1" class="partner-logo" />
                    </div>
                    <div class="swiper-slide flex justify-center items-center">
                        <img src="{{ asset('image/lion.png') }}" alt="Partenaire 2" class="partner-logo" />
                    </div>
                    <div class="swiper-slide flex justify-center items-center">
                        <img src="{{ asset('image/brasserie (5).png') }}" alt="Partenaire 3" class="partner-logo" />
                    </div>
                    <div class="swiper-slide flex justify-center items-center">
                        <img src="{{ asset('image/yo.png') }}" alt="Partenaire 5" class="partner-logo" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="bg-primary text-white" role="contentinfo">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex flex-col items-center text-center space-y-4">
                <nav class="flex flex-wrap justify-center gap-x-4 gap-y-2">
                    <a href="#top" class="text-sm font-bold hover:text-gray-200">Accueil</a>
                    <a href="#about" class="text-sm font-bold hover:text-gray-200">À propos</a>
                    <a href="#actions" class="text-sm font-bold hover:text-gray-200">Nos Actions</a>
                    <a href="{{route('news')}}" class="text-sm font-bold hover:text-gray-200">News</a>
                    <a href="#contact" class="text-sm font-bold hover:text-gray-200">Contact</a>
                </nav>
                <hr class="my-4 border-gray-300 w-full" />
                <p class="text-sm font-bold">Basée à Yaoundé, Cameroun</p>
                <a href="#top" class="inline-block text-sm font-bold hover:text-gray-200">Retour en haut</a>
                <hr class="my-4 border-gray-300 w-full" />
                <p class="text-sm font-bold">Organisation internationale. Tous droits réservés.</p>
                <p class="text-xs mt-2">Suivez-nous sur nos réseaux sociaux :</p>
                <div class="flex space-x-4 mt-2">
                    <a href="https://www.facebook.com/profile.php?id=61568266295634" target="_blank" class="hover:opacity-80" title="Facebook">
                        <img src="{{ asset('image/feacebook.jpg') }}" alt="Facebook" class="w-6 h-6 rounded-full">
                    </a>
                    <a href="https://whatsapp.com/channel/0029VaYTsNkD8SE42sDpnk1w" target="_blank" class="hover:opacity-80" title="WhatsApp">
                        <img src="{{ asset('image/wastapp.jpg') }}" alt="WhatsApp" class="w-6 h-6 rounded-full">
                    </a>
                    <a href="https://www.instagram.com/abec.officiel/" target="_blank" class="hover:opacity-80" title="Instagram">
                        <img src="{{ asset('image/insta.jpg') }}" alt="Instagram" class="w-6 h-6 rounded-full">
                    </a>
                </div>
                <div class="mt-4">
                    <img src="{{ asset('image/ab.png') }}" alt="Logo ABEC" class="h-12 mx-auto">
                </div>
            </div>
        </div>
    </footer>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
      // Initialize Swiper pour la section des partenaires
      const partnerSwiper = new Swiper(".mySwiper", {
        effect: "slide",
        loop: true,
        centeredSlides: true,
        slidesPerView: 3,
        spaceBetween: 10,
        speed: 5000,
        autoplay: {
          delay: 0,
        },
        breakpoints: {
          320: { slidesPerView: 1, spaceBetween: 5 },
          640: { slidesPerView: 2, spaceBetween: 8 },
          1024: { slidesPerView: 3, spaceBetween: 10 }
        }
      });

      // Initialize Swiper pour la section hero
      const heroSwiper = new Swiper(".heroSwiper", {
        effect: "fade",
        fadeEffect: {
          crossFade: true,
        },
        loop: true,
        autoplay: {
          delay: 5000,
        },
      });

      // Gérer le spinner de chargement
      window.addEventListener('load', () => {
          const loading = document.getElementById('loading');
          setTimeout(() => {
              loading.classList.add('hidden');
              setTimeout(() => {
                  loading.style.display = 'none';
              }, 500); // Correspond à la durée de la transition CSS
          }, 1000); // Délai avant de masquer le spinner
      });
    </script>
</body>
</html>