
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABEC - ONG Humanitaire</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="64x64" href="{{ asset('image/ab.png') }}">

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
            width: 100px;
            height: 100px;
            object-fit: contain;
            transition: transform 0.6s ease; /* Transition encore plus fluide */
        }
        .swiper-slide-active .partner-logo {
            transform: scale(1.3); /* Agrandissement du logo actif */
        }
    </style>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

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
</head>
<body id="top" x-data="{ mobileMenuOpen: false, dropdownOpen: false }" class="bg-white font-sans antialiased font-all-bold">

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
                <div class="flex-shrink-0 w-[120px] md:w-[180px] lg:w-[240px] h-auto flex justify-center">
                    <img src="{{ asset('image/ab.png') }}" alt="logo" class="w-7/12 sm:w-6/12 md:w-5/12 lg:w-4/12">
                </div>
                <nav class="hidden md:flex space-x-4">
                    <a href="#top" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Accueil</a>
                    <a href="#actions" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Nos Actions</a>
                    <a href="#about" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white">À propos</a>
                    <a href="{{route('news')}}" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white">News</a>
                    <a href="#contact" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Contact</a>
                    <a href="{{ url('/dons') }}" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Dons</a>
                    <a href="{{ route('branche') }}" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Evenements</a>
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
            <a href="#top" class="block px-3 py-2 rounded-md text-base font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Accueil</a>
            <a href="#about" class="block px-3 py-2 rounded-md text-base font-bold text-gray-800 hover:bg-blue-500 hover:text-white">À propos</a>
            <a href="#actions" class="block px-3 py-2 rounded-md text-base font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Nos Actions</a>
            <a href="{{route('news')}}" class="block px-3 py-2 rounded-md text-base font-bold text-gray-800 hover:bg-blue-500 hover:text-white">News</a>
            <a href="#contact" class="block px-3 py-2 rounded-md text-base font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Contact</a>
            <a href="{{ url('/dons') }}" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Dons</a>
            <a href="{{route('branche')}}" class="block px-3 py-2 rounded-md text-base font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Evenements</a>
        </div>
    </header>

    <!-- Hero Section avec Swiper Slider -->
    <section class="relative h-screen overflow-hidden">
        <div class="swiper heroSwiper h-full">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div
                        class="h-full bg-cover bg-center flex items-center justify-center"
                        style="background: url('{{ asset('image/elev.png') }}') center/cover no-repeat;"
                    >
                        <div class="text-center">
                            <h1 class="text-6xl font-extrabold text-white sm:text-7xl">
                                Organisation du Bien-Être Communautaire
                            </h1>
                            <p class="mt-4 text-xl text-gray-100 font-bold">
                                Une ONG dédiée à l’aide humanitaire : dons essentiels pour hôpitaux et orphelinats.
                            </p>
                            <div class="mt-8">
                                <a
                                    href="santos/dons.php"
                                    class="inline-block bg-yellow text-black px-8 py-3 font-bold rounded-md hover:bg-gray-100 transition transform hover:scale-105"
                                >
                                    Faites un don
                                </a>
                                <a
                                    href="#about"
                                    class="inline-block bg-yellow text-black px-8 py-3 font-bold rounded-md hover:bg-gray-100 transition transform hover:scale-105"
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
                        <div class="text-center">
                            <h1 class="text-6xl font-extrabold text-white sm:text-7xl">
                                Organisation du Bien-Être Communautaire
                            </h1>
                            <p class="mt-4 text-xl text-gray-100 font-bold">
                                Une ONG dédiée à l’aide humanitaire : dons essentiels pour hôpitaux et orphelinats.
                            </p>
                            <div class="mt-8">
                                <a
                                    href="santos/dons.php"
                                    class="inline-block bg-yellow text-black px-8 py-3 font-bold rounded-md hover:bg-gray-100 transition transform hover:scale-105"
                                >
                                    Faites un don
                                </a>
                                <a
                                    href="#about"
                                    class="inline-block bg-yellow text-black px-8 py-3 font-bold rounded-md hover:bg-gray-100 transition transform hover:scale-105"
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
                        <div class="text-center">
                            <h1 class="text-6xl font-extrabold text-white sm:text-7xl">
                                Organisation du Bien-Être Communautaire
                            </h1>
                            <p class="mt-4 text-xl text-gray-100 font-bold">
                                Une ONG dédiée à l’aide humanitaire : dons essentiels pour hôpitaux et orphelinats.
                            </p>
                            <div class="mt-8">
                                <a
                                    href="santos/dons.php"
                                    class="inline-block bg-yellow text-black px-8 py-3 font-bold rounded-md hover:bg-gray-100 transition transform hover:scale-105"
                                >
                                    Faites un don
                                </a>
                                <a
                                    href="#about"
                                    class="inline-block bg-yellow text-black px-8 py-3 font-bold rounded-md hover:bg-gray-100 transition transform hover:scale-105"
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
                        <div class="text-center">
                            <h1 class="text-6xl font-extrabold text-white sm:text-7xl">
                                Organisation du Bien-Être Communautaire
                            </h1>
                            <p class="mt-4 text-xl text-gray-100 font-bold">
                                Une ONG dédiée à l’aide humanitaire : dons essentiels pour hôpitaux et orphelinats.
                            </p>
                            <div class="mt-8">
                                <a
                                    href="santos/dons.php"
                                    class="inline-block bg-yellow text-black px-8 py-3 font-bold rounded-md hover:bg-gray-100 transition transform hover:scale-105"
                                >
                                    Faites un don
                                </a>
                                <a
                                    href="#about"
                                    class="inline-block bg-yellow text-black px-8 py-3 font-bold rounded-md hover:bg-gray-100 transition transform hover:scale-105"
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
                        <div class="text-center">
                            <h1 class="text-6xl font-extrabold text-white sm:text-7xl">
                                Organisation du Bien-Être Communautaire
                            </h1>
                            <p class="mt-4 text-xl text-gray-100 font-bold">
                                Une ONG dédiée à l’aide humanitaire : dons essentiels pour hôpitaux et orphelinats.
                            </p>
                            <div class="mt-8">
                                <a
                                    href="santos/dons.php"
                                    class="inline-block bg-yellow text-black px-8 py-3 font-bold rounded-md hover:bg-gray-100 transition transform hover:scale-105"
                                >
                                    Faites un don
                                </a>
                                <a
                                    href="#about"
                                    class="inline-block bg-yellow text-black px-8 py-3 font-bold rounded-md hover:bg-gray-100 transition transform hover:scale-105"
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
    <section id="actions" class="py-16 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-gray-900">Nos Actions</h2>
            <p class="mt-4 font-bold text-gray-700 leading-relaxed">
                Découvrez nos projets phares pour soutenir les hôpitaux et orphelinats. Nous mettons en œuvre divers programmes visant à améliorer l'accès aux soins et à offrir un environnement sûr et stimulant pour l'éducation des plus jeunes.
            </p>
            <!-- Première grille -->
            <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 my-8">
                <div class="bg-white p-4 rounded shadow-lg text-center">
                    <img src="{{ asset('image/fotos.jpg') }}" alt="Dons aux Hôpitaux" class="w-full h-40 object-cover rounded-lg shadow-md">
                    <h3 class="font-bold text-gray-800 mt-2">Dons aux Hôpitaux</h3>
                    <p class="text-gray-600 mt-2">
                        Fourniture de matériel médical essentiel, formations pour le personnel et soutien aux infrastructures sanitaires dans les zones démunies.
                    </p>
                </div>
                <div class="bg-white p-4 rounded shadow-lg text-center">
                    <img src="{{ asset('image/fotos2.jpg') }}" alt="Soutien aux Orphelinats" class="w-full h-40 object-cover rounded-lg shadow-md">
                    <h3 class="font-bold text-gray-800 mt-2">Soutien aux Orphelinats</h3>
                    <p class="text-gray-600 mt-2">
                        Dons alimentaires, éducatifs et matériels pour offrir un environnement chaleureux et bien équipé aux enfants en difficulté.
                    </p>
                </div>
                <div class="bg-white p-4 rounded shadow-lg text-center">
                    <img src="{{ asset('image/fotos.jpg') }}" alt="Programmes Communautaires" class="w-full h-40 object-cover rounded-lg shadow-md">
                    <h3 class="font-bold text-gray-800 mt-2">Programmes Communautaires</h3>
                    <p class="text-gray-600 mt-2">
                        Initiatives pour sensibiliser aux enjeux de santé et d’éducation, ateliers communautaires et partenariats locaux pour un soutien durable.
                    </p>
                </div>
                <div class="bg-white p-4 rounded shadow-lg text-center">
                    <img src="{{ asset('image/fotos4.jpg') }}" alt="Campagnes de Sensibilisation" class="w-full h-40 object-cover rounded-lg shadow-md">
                    <h3 class="font-bold text-gray-800 mt-2">Campagnes de Sensibilisation</h3>
                    <p class="text-gray-600 mt-2">
                        Organisation d’événements et de campagnes pour impliquer directement les citoyens et promouvoir une approche collective face aux défis sociaux.
                    </p>
                </div>
            </div>
            <!-- Deuxième grille -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 my-8">
                <div class="bg-white p-4 rounded shadow-lg text-center">
                    <img src="{{ asset('image/fotos.jpg') }}" alt="Dons aux Hôpitaux" class="w-full h-40 object-cover rounded-lg shadow-md">
                    <h3 class="font-bold text-gray-800 mt-2">Dons aux Hôpitaux</h3>
                    <p class="text-gray-600 mt-2">
                        Fourniture de matériel médical essentiel, formations pour le personnel et soutien aux infrastructures sanitaires dans les zones démunies.
                    </p>
                </div>
                <div class="bg-white p-4 rounded shadow-lg text-center">
                    <img src="{{ asset('image/fotos2.jpg') }}" alt="Soutien aux Orphelinats" class="w-full h-40 object-cover rounded-lg shadow-md">
                    <h3 class="font-bold text-gray-800 mt-2">Soutien aux Orphelinats</h3>
                    <p class="text-gray-600 mt-2">
                        Dons alimentaires, éducatifs et matériels pour offrir un environnement chaleureux et bien équipé aux enfants en difficulté.
                    </p>
                </div>
                <div class="bg-white p-4 rounded shadow-lg text-center">
                    <img src="{{ asset('image/fotos.jpg') }}" alt="Programmes Communautaires" class="w-full h-40 object-cover rounded-lg shadow-md">
                    <h3 class="font-bold text-gray-800 mt-2">Programmes Communautaires</h3>
                    <p class="text-gray-600 mt-2">
                        Initiatives pour sensibiliser aux enjeux de santé et d’éducation, ateliers communautaires et partenariats locaux pour un soutien durable.
                    </p>
                </div>
                <div class="bg-white p-4 rounded shadow-lg text-center">
                    <img src="{{ asset('image/fotos4.jpg') }}" alt="Campagnes de Sensibilisation" class="w-full h-40 object-cover rounded-lg shadow-md">
                    <h3 class="font-bold text-gray-800 mt-2">Campagnes de Sensibilisation</h3>
                    <p class="text-gray-600 mt-2">
                        Organisation d’événements et de campagnes pour impliquer directement les citoyens et promouvoir une approche collective face aux défis sociaux.
                    </p>
                </div>
            </div>
            <!-- Troisième grille -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 my-8">
                <div class="bg-white p-4 rounded shadow-lg text-center">
                    <img src="{{ asset('image/fotos.jpg') }}" alt="Dons aux Hôpitaux" class="w-full h-40 object-cover rounded-lg shadow-md">
                    <h3 class="font-bold text-gray-800 mt-2">Dons aux Hôpitaux</h3>
                    <p class="text-gray-600 mt-2">
                        Fourniture de matériel médical essentiel, formations pour le personnel et soutien aux infrastructures sanitaires dans les zones démunies.
                    </p>
                </div>
                <div class="bg-white p-4 rounded shadow-lg text-center">
                    <img src="{{ asset('image/fotos2.jpg') }}" alt="Soutien aux Orphelinats" class="w-full h-40 object-cover rounded-lg shadow-md">
                    <h3 class="font-bold text-gray-800 mt-2">Soutien aux Orphelinats</h3>
                    <p class="text-gray-600 mt-2">
                        Dons alimentaires, éducatifs et matériels pour offrir un environnement chaleureux et bien équipé aux enfants en difficulté.
                    </p>
                </div>
                <div class="bg-white p-4 rounded shadow-lg text-center">
                    <img src="{{ asset('image/fotos.jpg') }}" alt="Programmes Communautaires" class="w-full h-40 object-cover rounded-lg shadow-md">
                    <h3 class="font-bold text-gray-800 mt-2">Programmes Communautaires</h3>
                    <p class="text-gray-600 mt-2">
                        Initiatives pour sensibiliser aux enjeux de santé et d’éducation, ateliers communautaires et partenariats locaux pour un soutien durable.
                    </p>
                </div>
                <div class="bg-white p-4 rounded shadow-lg text-center">
                    <img src="{{ asset('image/fotos4.jpg') }}" alt="Campagnes de Sensibilisation" class="w-full h-40 object-cover rounded-lg shadow-md">
                    <h3 class="font-bold text-gray-800 mt-2">Campagnes de Sensibilisation</h3>
                    <p class="text-gray-600 mt-2">
                        Organisation d’événements et de campagnes pour impliquer directement les citoyens et promouvoir une approche collective face aux défis sociaux.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section À propos -->
    <section id="about" class="py-16 bg-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-gray-900">À propos d'ABEC</h2>
            <p class="mt-4 font-bold text-gray-600 leading-relaxed">
                L'Association pour le Bien-Être Communautaire (ABEC) est une ONG humanitaire engagée dans la lutte contre la pauvreté et l'injustice sociale. Nous croyons fermement que chaque individu mérite un accès aux soins de santé, à l'éducation et à des conditions de vie dignes. À travers nos différentes initiatives, nous soutenons les hôpitaux et les orphelinats en fournissant des dons essentiels, en organisant des campagnes de sensibilisation et en mobilisant des ressources pour aider les plus vulnérables. Ensemble, nous pouvons faire une différence significative dans la vie de ceux qui en ont besoin.
            </p>
            <div class="mt-8 flex justify-center">
                <video class="w-full max-w-3xl rounded-lg shadow-lg" autoplay loop muted playsinline>
                    <source src="{{ asset('image/orange.mp4') }}" type="video/mp4">
                    Votre navigateur ne prend pas en charge la lecture de vidéos.
                </video>
            </div>
        </div>
    </section>

    <!-- Section Nos Partenaires -->
    <section id="partners" class="py-16 bg-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-12">Nos Partenaires</h2>

            <!-- Swiper Container -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide flex justify-center items-center">
                        <img src="{{ asset('image/brasserie (3).png') }}" alt="Partenaire 1" class="partner-logo" />
                    </div>
                    <div class="swiper-slide flex justify-center items-center">
                        <img src="{{ asset('image/brasserie (4).png') }}" alt="Partenaire 2" class="partner-logo" />
                    </div>
                    <div class="swiper-slide flex justify-center items-center">
                        <img src="{{ asset('image/brasserie (5).png') }}" alt="Partenaire 3" class="partner-logo" />
                    </div>
                    <div class="swiper-slide flex justify-center items-center">
                        <img src="{{ asset('image/brasserie (7).png') }}" alt="Partenaire 4" class="partner-logo" />
                    </div>
                    <div class="swiper-slide flex justify-center items-center">
                        <img src="{{ asset('image/aas.png') }}" alt="Partenaire 5" class="partner-logo" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="bg-primary text-white" role="contentinfo">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex flex-col items-center text-center space-y-6">
                <!-- Liens centrés -->
                <nav class="flex flex-wrap justify-center gap-x-6 gap-y-2">
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

                <!-- Logo ABEC centré -->
                <div class="mt-6">
                    <img src="{{ asset('image/ab.png') }}" alt="Logo ABEC" class="h-16 mx-auto">
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
        centeredSlides: true, // Centre le logo actif
        slidesPerView: 3,
        spaceBetween: 10, // Espacement réduit entre les logos
        speed: 5000, // Transition plus lente (1 seconde)
        autoplay: {
          delay: 0, // Défilement continu sans pause
        },
        breakpoints: {
          320: { slidesPerView: 1 }, // 1 logo sur mobile
          640: { slidesPerView: 2 }, // 2 logos sur tablette
          1024: { slidesPerView: 3 } // 3 logos sur ordinateur
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
    </script>
</body>
</html>
