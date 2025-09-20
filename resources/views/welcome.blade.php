<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Association du Bien-Être Communautaire</title>
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
            overflow-x: hidden;
            padding-top: 0;
        }

        .font-all-bold,
        body,
        h1,
        h2,
        h3,
        p,
        a,
        li {
            font-weight: bold;
        }

        /* Smooth Scroll Behavior */
        html {
            scroll-behavior: smooth;
        }

        /* Top Bar (non fixe, défile avec la page) */
        .top-bar {
            position: relative;
            width: 100%;
            z-index: 50;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 8px;
        }

        /* Main Header (non fixe, défile avec la page) */
        .main-header {
            width: 100%;
            z-index: 40;
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding-top: 0;
        }

        /* Logo Styles */
        .logo-container {
            max-width: 36px;
            max-height: 36px;
            height: auto;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .logo-container img {
            width: 100%;
            height: auto;
            object-fit: contain;
        }

        @media (min-width: 641px) {
            .logo-container {
                max-width: 48px;
                max-height: 48px;
            }
        }

        @media (min-width: 1024px) {
            .logo-container {
                max-width: 80px;
                max-height: 80px;
            }
        }

        /* Partner Logo Styles */
        .partner-logo {
            width: 100px;
            height: 100px;
            object-fit: contain;
            transition: transform 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55), opacity 0.4s ease;
            opacity: 0;
        }

        .swiper-slide-active .partner-logo {
            transform: scale(1);
            opacity: 1;
        }

        .SWIPER-SLIDE-ACTIVE .PARTNER-LOGO* Alignement des logos à droite dans la section partenaires *.SWIPER-SLIDE-ACTIVE .PARTNER-LOGO 
        .mySwiper .swiper-slide {
            display: flex;
            justify-content: center;
            align-items: center;
        }

            TRANSFORM: SCALE(2) * Hero Section */
        .heroSwiper .swiper-slide {
            background-size: cover;
            background-position: center;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }

        .heroSwiper .swiper-slide-active {
            opacity: 1;
        }

        /* Responsive text sizes with animation */
        .hero-text {
            font-size: clamp(1.5rem, 5vw, 3rem);
            transform: translateY(30px);
            opacity: 0;
            transition: transform 0.8s ease-out, opacity 0.8s ease-out;
        }

        .hero-subtext {
            font-size: clamp(0.875rem, 2.5vw, 1.125rem);
            transform: translateY(30px);
            opacity: 0;
            transition: transform 0.8s ease-out 0.2s, opacity 0.8s ease-out 0.2s;
        }

        .heroSwiper .swiper-slide-active .hero-text,
        .heroSwiper .swiper-slide-active .hero-subtext {
            transform: translateY(0);
            opacity: 1;
        }

        /* Hero buttons animation */
        .hero-button {
            transition: transform 0.3s ease, background-color 0.3s ease, opacity 0.3s ease;
            opacity: 0;
            transform: scale(0.95);
        }

        .heroSwiper .swiper-slide-active .hero-button {
            opacity: 1;
            transform: scale(1);
        }

        .hero-button:hover {
            transform: scale(1.1);
        }

        /* Responsive images in Nos Actions */
        .action-image {
            width: 100%;
            height: 120px;
            object-fit: cover;
            border-radius: 0.5rem;
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        .action-card:hover .action-image {
            transform: scale(1.05);
            opacity: 0.9;
        }

        /* Action Card Styles with Before/After */
        .action-card {
            background-color: #FFF8DC;
            position: relative;
            overflow: hidden;
            transition: transform 0.5s ease, box-shadow 0.5s ease, opacity 0.5s ease;
            opacity: 0;
            transform: translateY(50px);
        }

        .action-card.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .action-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 215, 0, 0.3), transparent);
            transition: left 0.6s ease;
        }

        .action-card:hover::before {
            left: 100%;
        }

        .action-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 3px;
            background-color: #FFD700;
            transition: width 0.3s ease;
        }

        .action-card:hover::after {
            width: 100%;
        }

        .action-card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
        }

        /* Stagger animation for cards */
        .action-card:nth-child(1).visible { transition-delay: 0.1s; }
        .action-card:nth-child(2).visible { transition-delay: 0.2s; }
        .action-card:nth-child(3).visible { transition-delay: 0.3s; }
        .action-card:nth-child(4).visible { transition-delay: 0.4s; }
        .action-card:nth-child(5).visible { transition-delay: 0.1s; }
        .action-card:nth-child(6).visible { transition-delay: 0.2s; }
        .action-card:nth-child(7).visible { transition-delay: 0.3s; }
        .action-card:nth-child(8).visible { transition-delay: 0.4s; }
        .action-card:nth-child(9).visible { transition-delay: 0.1s; }
        .action-card:nth-child(10).visible { transition-delay: 0.2s; }
        .action-card:nth-child(11).visible { transition-delay: 0.3s; }
        .action-card:nth-child(12).visible { transition-delay: 0.4s; }

        /* Responsive video */
        .responsive-video {
            width: 100%;
            max-width: 90%;
            height: auto;
            opacity: 0;
            transform: scale(0.95);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .responsive-video.visible {
            opacity: 1;
            transform: scale(1);
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
            background: rgba(255, 255, 255, 0.95);
            z-index: 9999;
            transition: opacity 0.7s ease-out;
        }

        .loading-hidden {
            opacity: 0;
            pointer-events: none;
        }

        .animate-spin {
            animation: spin 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Mobile Menu Animation */
        .mobile-menu {
            transform: translateX(100%);
            transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
            opacity: 0;
        }

        .mobile-menu.open {
            transform: translateX(0);
            opacity: 1;
        }

        .mobile-menu a {
            transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
        }

        .mobile-menu a:hover {
            transform: translateX(5px);
        }

        /* Section Entrance Animation on Scroll */
        .section-animate {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .section-animate.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Navigation Links Animation */
        nav a {
            transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
        }

        nav a:hover {
            transform: translateY(-2px);
        }

        /* Modal Styles */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: 1000;
            align-items: center;
            justify-content: center;
            display: none;
            transition: opacity 0.3s ease;
        }

        .modal.show {
            display: flex !important;
            opacity: 1;
        }

        .modal-content {
            background: #FFF8DC;
            border-radius: 0.5rem;
            padding: 1rem;
            max-width: 95%;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            opacity: 0;
            transform: scale(0.9);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .modal.show .modal-content {
            opacity: 1;
            transform: scale(1);
        }

        .modal-close {
            position: absolute;
            top: 8px;
            right: 8px;
            cursor: pointer;
            transition: transform 0.2s ease, opacity 0.2s ease;
        }

        .modal-close:hover {
            transform: scale(1.2);
            opacity: 0.8;
        }

        .modal-image {
            width: 100%;
            max-height: 30vh; /* Réduction de la taille de l'image dans la modale */
            object-fit: cover;
            border-radius: 0.5rem;
        }

        .modal-title {
            font-size: clamp(1.25rem, 3vw, 1.5rem);
            color: #1E90FF;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            background: rgba(255, 248, 220, 0.8);
            padding: 0.5rem;
            border-radius: 0.25rem;
            transform: translateY(20px);
            opacity: 0;
            transition: transform 0.4s ease, opacity 0.4s ease;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .modal.show .modal-title {
            transform: translateY(0);
            opacity: 1;
        }

        .modal-content p {
            font-size: clamp(0.75rem, 2vw, 0.875rem);
            transition: opacity 0.4s ease 0.2s;
            opacity: 0;
        }

        .modal.show .modal-content p {
            opacity: 1;
        }

        /* Footer animations */
        footer a,
        footer p {
            transition: color 0.3s ease, transform 0.3s ease, opacity 0.3s ease;
            opacity: 0;
            transform: translateY(10px);
        }

        footer.visible a,
        footer.visible p {
            opacity: 1;
            transform: translateY(0);
        }

        footer a:hover {
            transform: translateY(-2px);
        }

        /* Style pour les titres des sections avec ombre derrière */
        .section-title {
            text-transform: uppercase;
            color: #1E90FF;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 110%;
            height: 110%;
            background: rgba(0, 0, 0, 0.1);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            z-index: -1;
            border-radius: 0.25rem;
        }

        /* Style pour les cartes de la section Nos Actions */
        .action-card h3 {
            color: #1E90FF;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .action-card p {
            color: #333333;
        }

        .action-card button {
            color: #000000;
            background-color: #FFD700;
            border: 1px solid #FFD700;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
        }

        .action-card button:hover {
            background-color: #DAA520;
            color: #ffffff;
        }

        /* Responsive adjustments */
        @media (max-width: 640px) {
            body {
                padding-top: 0;
            }

            .top-bar {
                height: 40px;
                margin-bottom: 12px;
            }

            .main-header {
                padding-top: 0;
            }

            .hero-text {
                font-size: clamp(1.25rem, 4vw, 2rem);
            }

            .hero-subtext {
                font-size: clamp(0.75rem, 2vw, 0.875rem);
            }

            .partner-logo {
                width: 70px;
                height: 70px;
            }

            .action-image {
                height: 100px;
            }

            .modal-content {
                padding: 0.75rem;
                max-width: 98%;
            }

            .modal-image {
                max-height: 20vh; /* Taille réduite pour mobile */
            }

            .modal-title {
                font-size: clamp(1rem, 2.5vw, 1.25rem);
            }

            .modal-content p {
                font-size: clamp(0.7rem, 1.8vw, 0.8rem);
            }

            .modal-close {
                width: 20px;
                height: 20px;
            }

            .action-card {
                padding: 0.75rem;
            }
        }

        @media (min-width: 641px) and (max-width: 1023px) {
            .hero-text {
                font-size: clamp(1.5rem, 4.5vw, 2.5rem);
            }

            .hero-subtext {
                font-size: clamp(0.875rem, 2.5vw, 1rem);
            }

            .action-image {
                height: 130px;
            }

            .modal-content {
                max-width: 90%;
            }

            .modal-image {
                max-height: 25vh; /* Taille réduite pour tablette */
            }

            .partner-logo {
                width: 85px;
                height: 85px;
            }
        }

        @media (min-width: 1024px) {
            .action-image {
                height: 150px;
            }

            .modal-content {
                max-width: 80%;
            }
        }
    </style>
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

<body id="top" class="bg-white font-sans antialiased font-all-bold">
    <!-- Loading Spinner -->
    <div id="loading" class="fixed inset-0 bg-white bg-opacity-95 flex items-center justify-center z-50">
        <div class="relative w-20 h-20">
            <div class="absolute inset-0 border-4 border-t-primary border-transparent rounded-full animate-spin"></div>
            <img src="{{ asset('image/ab.png') }}" alt="Logo ABEC" class="w-12 h-12 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
        </div>
    </div>
    <!-- Modal -->
    <div class="modal" id="modal">
        <div class="modal-content">
            <img id="modalImage" class="modal-image" src="" alt="">
            <h3 class="modal-title" id="modalTitle"></h3>
            <p class="text-sm text-gray-600" id="modalContent"></p>
            <svg class="modal-close" onclick="closeModal()" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </div>
    </div>
    <!-- Top Bar -->
    <nav class="bg-primary text-white top-bar section-animate">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-10">
                <div class="flex items-center space-x-4">
                    <a href="https://www.facebook.com/profile.php?id=61568266295634" target="_blank" class="hover:opacity-80 transition-opacity duration-300" title="Facebook">
                        <img src="{{ asset('image/feacebook.jpg') }}" alt="Facebook" class="w-6 h-6 rounded-full">
                    </a>
                    <a href="https://whatsapp.com/channel/0029VaYTsNkD8SE42sDpnk1w" target="_blank" class="hover:opacity-80 transition-opacity duration-300" title="WhatsApp">
                        <img src="{{ asset('image/wastapp.jpg') }}" alt="WhatsApp" class="w-6 h-6 rounded-full">
                    </a>
                    <a href="https://www.instagram.com/abec.officiel/" target="_blank" class="hover:opacity-80 transition-opacity duration-300" title="Instagram">
                        <img src="{{ asset('image/insta.jpg') }}" alt="Instagram" class="w-6 h-6 rounded-full">
                    </a>
                </div>
                <a href="mailto:globaluniversalwelfare@gmail.com" class="hover:opacity-80 transition-opacity duration-300" title="Email">
                    <img src="{{ asset('image/m.jpg') }}" alt="Email" class="w-6 h-6 rounded-full">
                </a>
            </div>
        </div>
    </nav>
    <!-- Nav Bar Principale -->
    <header class="bg-white shadow py-3 main-header section-animate">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="logo-container flex-shrink-0 flex justify-center items-center">
                    <img src="{{ asset('image/ab.png') }}" alt="logo" class="transition-transform duration-300 hover:scale-105">
                </div>
                <nav class="hidden md:flex space-x-3">
                    <a href="#top" class="px-2 py-1 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white transition-all duration-300">Accueil</a>
                    <a href="#actions" class="px-2 py-1 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white transition-all duration-300">Nos Actions</a>
                    <a href="#about" class="px-2 py-1 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white transition-all duration-300">À propos</a>
                    <a href="{{route('news')}}" class="px-2 py-1 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white transition-all duration-300">News</a>
                    <a href="#contact" class="px-2 py-1 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white transition-all duration-300">Contact</a>
                    <a href="{{ url('/dons') }}" class="px-2 py-1 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white transition-all duration-300">Dons</a>
                    <a href="{{ route('branche') }}" class="px-2 py-1 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white transition-all duration-300">Evenements</a>
                </nav>
                <div class="md:hidden">
                    <button onclick="toggleMobileMenu()" class="text-gray-500 focus:outline-none transition-transform duration-300" id="mobileMenuButton">
                        <svg id="menuOpenIcon" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg id="menuCloseIcon" class="w-6 h-6 hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div id="mobileMenu" class="md:hidden px-2 pt-2 pb-3 space-y-1 mobile-menu hidden">
            <a href="#top" class="block px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white transition-all duration-300">Accueil</a>
            <a href="#about" class="block px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white transition-all duration-300">À propos</a>
            <a href="#actions" class="block px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white transition-all duration-300">Nos Actions</a>
            <a href="{{route('news')}}" class="block px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white transition-all duration-300">News</a>
            <a href="#contact" class="block px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white transition-all duration-300">Contact</a>
            <a href="{{ url('/dons') }}" class="block px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white transition-all duration-300">Dons</a>
            <a href="{{route('branche')}}" class="block px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white transition-all duration-300">Evenements</a>
        </div>
    </header>
    <!-- Hero Section avec Swiper Slider -->
    <section class="relative h-[60vh] sm:h-[80vh] lg:h-screen overflow-hidden section-animate">
        <div class="swiper heroSwiper h-full">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="h-full bg-cover bg-center flex items-center justify-center" style="background: url('{{ asset('image/elev.png') }}') center/cover no-repeat;">
                        <div class="text-center px-4">
                            <h1 class="hero-text font-extrabold text-white">Organisation du Bien-Être Communautaire</h1>
                            <p class="mt-3 hero-subtext text-gray-100 font-bold">Une Organisation internationale œuvrant dans le monde entier pour le Bien-être des communautés.</p>
                            <div class="mt-4 flex flex-col sm:flex-row justify-center gap-3">
                                <a href="santos/dons.php" class="hero-button inline-block bg-yellow text-black px-4 py-2 text-sm font-bold rounded-md hover:bg-gray-100 transition-all duration-300">Faites un don</a>
                                <a href="#about" class="hero-button inline-block bg-yellow text-black px-4 py-2 text-sm font-bold rounded-md hover:bg-gray-100 transition-all duration-300">En savoir plus</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="h-full bg-cover bg-center flex items-center justify-center" style="background: url('{{ asset('image/pl.png') }}') center/cover no-repeat;">
                        <div class="text-center px-4">
                            <h1 class="hero-text font-extrabold text-white">Organisation du Bien-Être Communautaire</h1>
                             <p class="mt-3 hero-subtext text-gray-100 font-bold">Une Organisation internationale œuvrant dans le monde entier pour le Bien-être des communautés.</p>
                            <div class="mt-4 flex flex-col sm:flex-row justify-center gap-3">
                                <a href="santos/dons.php" class="hero-button inline-block bg-yellow text-black px-4 py-2 text-sm font-bold rounded-md hover:bg-gray-100 transition-all duration-300">Faites un don</a>
                                <a href="#about" class="hero-button inline-block bg-yellow text-black px-4 py-2 text-sm font-bold rounded-md hover:bg-gray-100 transition-all duration-300">En savoir plus</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="h-full bg-cover bg-center flex items-center justify-center" style="background: url('{{ asset('image/enfants.png') }}') center/cover no-repeat;">
                        <div class="text-center px-4">
                            <h1 class="hero-text font-extrabold text-white">Organisation du Bien-Être Communautaire</h1>
                             <p class="mt-3 hero-subtext text-gray-100 font-bold">Une Organisation internationale œuvrant dans le monde entier pour le Bien-être des communautés.</p>
                            <div class="mt-4 flex flex-col sm:flex-row justify-center gap-3">
                                <a href="santos/dons.php" class="hero-button inline-block bg-yellow text-black px-4 py-2 text-sm font-bold rounded-md hover:bg-gray-100 transition-all duration-300">Faites un don</a>
                                <a href="#about" class="hero-button inline-block bg-yellow text-black px-4 py-2 text-sm font-bold rounded-md hover:bg-gray-100 transition-all duration-300">En savoir plus</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="h-full bg-cover bg-center flex items-center justify-center" style="background: url('{{ asset('image/p.png') }}') center/cover no-repeat;">
                        <div class="text-center px-4">
                            <h1 class="hero-text font-extrabold text-white">Organisation du Bien-Être Communautaire</h1>
                             <p class="mt-3 hero-subtext text-gray-100 font-bold">Une Organisation internationale œuvrant dans le monde entier pour le Bien-être des communautés.</p>
                            <div class="mt-4 flex flex-col sm:flex-row justify-center gap-3">
                                <a href="santos/dons.php" class="hero-button inline-block bg-yellow text-black px-4 py-2 text-sm font-bold rounded-md hover:bg-gray-100 transition-all duration-300">Faites un don</a>
                                <a href="#about" class="hero-button inline-block bg-yellow text-black px-4 py-2 text-sm font-bold rounded-md hover:bg-gray-100 transition-all duration-300">En savoir plus</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="h-full bg-cover bg-center flex items-center justify-center" style="background: url('{{ asset('image/e.png') }}') center/cover no-repeat;">
                        <div class="text-center px-4">
                            <h1 class="hero-text font-extrabold text-white">Organisation du Bien-Être Communautaire</h1>
                            <p class="mt-3 hero-subtext text-gray-100 font-bold">Une Organisation internationale œuvrant dans le monde entier pour le Bien-être des communautés.</p>
                            <div class="mt-4 flex flex-col sm:flex-row justify-center gap-3">
                                <a href="santos/dons.php" class="hero-button inline-block bg-yellow text-black px-4 py-2 text-sm font-bold rounded-md hover:bg-gray-100 transition-all duration-300">Faites un don</a>
                                <a href="#about" class="hero-button inline-block bg-yellow text-black px-4 py-2 text-sm font-bold rounded-md hover:bg-gray-100 transition-all duration-300">En savoir plus</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section Nos Actions -->
    <section id="actions" class="py-8 bg-gray-100 section-animate">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold section-title">Nos Actions</h2>
            <p class="mt-3 text-sm sm:text-base font-bold text-gray-700 leading-relaxed">
                Nous mettons en œuvre divers programmes visant à apporter le bien-être aux différentes communautés à travers le monde.
            </p>
            <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Élément 1 -->
                <div class="p-3 rounded shadow-lg text-center action-card cursor-pointer">
                    <img src="{{ asset('image/ge.png') }}" alt="Dons aux Hôpitaux" class="action-image">
                    <h3 class="text-base sm:text-lg font-bold mt-2">La Jeunesse</h3>
                    <p class="text-xs sm:text-sm text-gray-600 mt-2">L'Afrique possède une population extrêmement jeune... Agir en faveur des jeunes, c’est investir dans un avenir plus solide, plus innovant et plus équitable pour toute l’Afrique.</p>
                    <button onclick="openModal('L\'Afrique possède une population extrêmement jeune, dans de nombreuses zones, près de 40 % des habitants ont moins de 15 ans, et plus de 400 millions de personnes sont âgées de 15 à 35 ans. Pourtant, ce secteur de la population fait face à des défis sérieux des millions de jeunes ne sont ni à l’école ni en formation ni en emploi (NEET), ce qui freine leur développement le manque d’opportunités économiques et le déficit de soutien financier demeurent des barrières majeures. Agir en faveur des jeunes, c’est investir dans un avenir plus solide, plus innovant et plus équitable pour toute l’Afrique.', 'La Jeunesse', '{{ asset('image/ge.png') }}')" class="text-xs px-3 py-1 rounded-md mt-2 transition-all duration-200 hover:scale-105">Voir plus</button>
                </div>
                <!-- Élément 2 -->
                <div class="p-3 rounded shadow-lg text-center action-card cursor-pointer">
                    <img src="{{ asset('image/vegete.png') }}" alt="Soutien aux Orphelinats" class="action-image">
                    <h3 class="text-base sm:text-lg font-bold mt-2">L'Environnement</h3>
                    <p class="text-xs sm:text-sm text-gray-600 mt-2">La région du Bassin du Congo abrite l’une des dernières grandes étendues de forêt tropicale intacte au monde... C’est aussi préserver un patrimoine vital pour l’Afrique et pour l’humanité entière.</p>
                    <button onclick="openModal('La région du Bassin du Congo abrite l’une des dernières grandes étendues de forêt tropicale intacte au monde, une zone critique pour la biodiversité, le climat, et les moyens de subsistance de millions de personnes. La forêt du Bassin du Congo joue un rôle majeur comme puits de carbone : elle peut capturer environ 0,61 gigatonne de CO₂ par an, ce qui contribue significativement à atténuer le changement climatique. La déforestation dans la région du Bassin du Congo a augmenté d’environ 5 %, remettant en question les engagements pris dans la Déclaration des Leaders de Glasgow pour stopper et inverser la perte de forêts d’ici 2030. Les conséquences sont multiples : perte de biodiversité avec des espèces endémiques menacées, dégradation des sols, changements dans les régimes hydriques, menaces pour la sécurité alimentaire, et un impact sur la résilience des communautés locales face aux aléas climatiques. Agir pour l’environnement, c’est prendre soin de la nature qui a toujours pris soin de nous. C’est aussi préserver un patrimoine vital pour l’Afrique et pour l’humanité entière.', 'L\'Environnement', '{{ asset('image/vegete.png') }}')" class="text-xs px-3 py-1 rounded-md mt-2 transition-all duration-200 hover:scale-105">Voir plus</button>
                </div>
                <!-- Élément 3 -->
                <div class="p-3 rounded shadow-lg text-center action-card cursor-pointer">
                    <img src="{{ asset('image/droit.png') }}" alt="Programmes Communautaires" class="action-image">
                    <h3 class="text-base sm:text-lg font-bold mt-2">Les Droits de l'Homme</h3>
                    <p class="text-xs sm:text-sm text-gray-600 mt-2">En Afrique et ailleurs, de nombreuses personnes sont persécutées en raison de leur identité ethnique ou de leurs opinions... et construire des sociétés plus justes et démocratiques.</p>
                    <button onclick="openModal('En Afrique et ailleurs, de nombreuses personnes sont persécutées en raison de leur identité ethnique ou de leurs opinions. Des individus sont arrêtés, emprisonnés ou même tués simplement pour avoir exprimé des opinions divergentes ou pour leur appartenance à des groupes ethniques minoritaires. Par exemple, des militants, des journalistes et des défenseurs des droits humains ont été victimes de harcèlement judiciaire, d\'arrestations arbitraires et de menaces graves pour avoir dénoncé des injustices ou exprimé des critiques envers les autorités. Or, la dignité humaine est universelle et inaliénable. Agir pour la défense des droits de l’Homme, c’est se lever contre l’injustice, et construire des sociétés plus justes et démocratiques.', 'Les Droits de l\'Homme', '{{ asset('image/droit.png') }}')" class="text-xs px-3 py-1 rounded-md mt-2 transition-all duration-200 hover:scale-105">Voir plus</button>
                </div>
                <!-- Élément 4 -->
                <div class="p-3 rounded shadow-lg text-center action-card cursor-pointer">
                    <img src="{{ asset('image/santee.png') }}" alt="Campagnes de Sensibilisation" class="action-image">
                    <h3 class="text-base sm:text-lg font-bold mt-2">La Santé</h3>
                    <p class="text-xs sm:text-sm text-gray-600 mt-2">La santé mondiale est marquée par des inégalités profondes... C’est œuvrer pour un avenir où chacun puisse accéder à des soins de qualité.</p>
                    <button onclick="openModal('La santé mondiale est marquée par des inégalités profondes. En 2023, environ 260 000 femmes sont décédées des suites de complications liées à la grossesse et à l’accouchement, dont 92 % dans des pays à revenu faible ou intermédiaire. Parallèlement, la malnutrition infantile demeure un problème majeur. En 2025, 9,4 % des enfants âgés de 5 à 19 ans sont obèses, dépassant pour la première fois le taux d\'enfants en insuffisance pondérale, qui est de 9,2 %. Agir pour la santé mondiale, c’est investir dans la vie, l’éducation et le bien-être de chaque individu. C’est œuvrer pour un avenir où chacun, partout dans le monde, puisse accéder à des soins de qualité, indépendamment de sa situation géographique ou économique.', 'La Santé', '{{ asset('image/santee.png') }}')" class="text-xs px-3 py-1 rounded-md mt-2 transition-all duration-200 hover:scale-105">Voir plus</button>
                </div>
                <!-- Élément 5 -->
                <div class="p-3 rounded shadow-lg text-center action-card cursor-pointer">
                    <img src="{{ asset('image/paix.png') }}" alt="Éducation pour Enfants" class="action-image">
                    <h3 class="text-base sm:text-lg font-bold mt-2">La Paix</h3>
                    <p class="text-xs sm:text-sm text-gray-600 mt-2">Selon le Global Peace Index 2025, le niveau de paix mondiale est au plus bas... bâtir un avenir plus pacifique pour tous.</p>
                    <button onclick="openModal('Selon le Global Peace Index 2025, le niveau de paix mondiale est au plus bas depuis la création de cet indice, avec une détérioration continue depuis 2014. En 2024, le monde a enregistré 152 000 décès liés aux conflits, le plus élevé depuis la Seconde Guerre mondiale. Actuellement, 59 conflits interétatiques ou internes sont actifs, un nombre record depuis la fin de la Seconde Guerre mondiale. Agir pour la paix, c’est œuvrer pour un monde plus juste, plus solidaire et plus harmonieux. Cela implique de promouvoir le dialogue, la coopération internationale, le désarmement et le respect des droits fondamentaux de chaque individu. En soutenant des initiatives locales et mondiales en faveur de la paix, nous pouvons contribuer à inverser cette tendance inquiétante et bâtir un avenir plus pacifique pour tous.', 'La Paix', '{{ asset('image/paix.png') }}')" class="text-xs px-3 py-1 rounded-md mt-2 transition-all duration-200 hover:scale-105">Voir plus</button>
                </div>
                <!-- Élément 6 -->
                <div class="p-3 rounded shadow-lg text-center action-card cursor-pointer">
                    <img src="{{ asset('image/bel.png') }}" alt="Soins d’Urgence" class="action-image">
                    <h3 class="text-base sm:text-lg font-bold mt-2">La justice</h3>
                    <p class="text-xs sm:text-sm text-gray-600 mt-2"> La justice est essentielle pour garantir l'égalité, la dignité et les droits de chaque individu... Cela implique de renforcer les institutions judiciaires, de promouvoir l'éducation aux droits humains et de lutter contre toutes les formes de discrimination et d'injustice.</p>
                    <button onclick="openModal('La justice est un pilier fondamental pour des sociétés équitables et pacifiques. Cependant, dans de nombreuses régions du monde, les systèmes judiciaires sont confrontés à des défis majeurs : corruption, manque d’accès à la justice pour les populations marginalisées, et lenteur des procédures. Par exemple, en 2023, environ 4,4 milliards de personnes vivaient dans des pays où l’accès à la justice est limité, selon le World Justice Project. Agir pour la justice, c’est promouvoir l’égalité devant la loi, renforcer les institutions judiciaires et garantir que chaque individu, quel que soit son statut social, puisse faire valoir ses droits.', 'La Justice', '{{ asset('image/bel.png') }}')" class="text-xs px-3 py-1 rounded-md mt-2 transition-all duration-200 hover:scale-105">Voir plus</button>
                </div>
                <!-- Élément 7 -->
                <div class="p-3 rounded shadow-lg text-center action-card cursor-pointer">
                    <img src="{{ asset('image/deve.png') }}" alt="Renforcement des Capacités" class="action-image">
                    <h3 class="text-base sm:text-lg font-bold mt-2">Le Développement Durable</h3>
                    <p class="text-xs sm:text-sm text-gray-600 mt-2">Selon le Rapport sur le développement durable en Afrique 2024, moins de 6 % des 32 cibles ...., tout en bénéficiant d’un développement économique équitable et inclusif.</p>
                    <button onclick="openModal('Le développement durable est essentiel pour répondre aux besoins actuels sans compromettre les générations futures. Selon les Nations Unies, en 2023, environ 9,2 % de la population mondiale vivait en dessous du seuil de pauvreté international, tandis que le changement climatique continue de menacer les moyens de subsistance. Nos actions incluent des formations pour les professionnels de santé et les éducateurs, ainsi que des projets visant à promouvoir des pratiques agricoles durables et l’accès à l’énergie renouvelable.', 'Le Développement Durable', '{{ asset('image/deve.png') }}')" class="text-xs px-3 py-1 rounded-md mt-2 transition-all duration-200 hover:scale-105">Voir plus</button>
                </div>
                <!-- Élément 8 -->
                <div class="p-3 rounded shadow-lg text-center action-card cursor-pointer">
                    <img src="{{ asset('image/pont.png') }}" alt="Aide Alimentaire" class="action-image">
                    <h3 class="text-base sm:text-lg font-bold mt-2">Le Bien-être des Communautés</h3>
                    <p class="text-xs sm:text-sm text-gray-600 mt-2">Le bien-être des communautés est un objectif fondamental pour construire un monde juste, inclusif et durable... Agir pour le bien-être des communautés, c’est investir dans des sociétés inclusives, solidaires et résilientes.</p>
                    <button onclick="openModal('Le bien-être des communautés est au cœur de nos actions. L’insécurité alimentaire touche environ 2,4 milliards de personnes dans le monde, selon la FAO en 2023. Nos initiatives incluent la distribution de repas nutritifs pour les enfants et les familles dans les zones touchées, ainsi que des programmes de formation pour améliorer les compétences agricoles et assurer une autosuffisance alimentaire à long terme.', 'Le Bien-être des Communautés', '{{ asset('image/pont.png') }}')" class="text-xs px-3 py-1 rounded-md mt-2 transition-all duration-200 hover:scale-105">Voir plus</button>
                </div>
                <!-- Élément 9 -->
                <div class="p-3 rounded shadow-lg text-center action-card cursor-pointer">
                    <img src="{{ asset('image/f.png') }}" alt="Projets d’Infrastructure" class="action-image">
                    <h3 class="text-base sm:text-lg font-bold mt-2">La Culture</h3>
                    <p class="text-xs sm:text-sm text-gray-600 mt-2">L'Afrique est un continent riche d'une diversité culturelle exceptionnelle, avec plus de 3 000 groupes ethniques et plus de 2 000 langues parlées à travers ses 54 pays... C’est investir dans la mémoire collective pour construire un futur où la culture continue de nourrir l’épanouissement et la fierté des communautés africaines.</p>
                    <button onclick="openModal('L\'Afrique est un continent riche d\'une diversité culturelle exceptionnelle, avec plus de 3 000 groupes ethniques et plus de 2 000 langues parlées à travers ses 54 pays. La culture africaine englobe les traditions orales, la musique, la danse, les arts plastiques, les vêtements, les rituels, la gastronomie et les systèmes de croyances, qui reflètent l’histoire, les valeurs et l’identité de chaque communauté. la culture africaine fait face à des menaces : globalisation, perte des langues et savoirs ancestraux, urbanisation rapide et faible soutien institutionnel. La jeunesse, qui constitue plus de 60 % de la population africaine, doit être au centre de la transmission et de la valorisation de ce patrimoine. Agir pour la culture africaine, c’est préserver notre identité, promouvoir la diversité et encourager les nouvelles générations à s’approprier et transmettre les richesses culturelles. C’est investir dans la mémoire collective pour construire un futur où la culture continue de nourrir l’épanouissement et la fierté des communautés africaines.', 'La Culture', '{{ asset('image/f.png') }}')" class="text-xs px-3 py-1 rounded-md mt-2 transition-all duration-200 hover:scale-105 text-center">Voir plus</button>
                </div>
                <!-- Élément 10 -->
                <div class="p-3 rounded shadow-lg text-center action-card cursor-pointer">
                    <img src="{{ asset('image/h.png') }}" alt="Santé Maternelle" class="action-image">
                    <h3 class="text-base sm:text-lg font-bold mt-2">L'Histoire</h3>
                    <p class="text-xs sm:text-sm text-gray-600 mt-2"> L’Afrique possède une histoire millénaire, riche de civilisations anciennes comme l’Égypte, le royaume de Kongo, le Mali, le Ghana et de nombreux ... Agir pour l’histoire africaine, c’est préserver la mémoire du continent, valoriser ses héritages et apprendre des leçons du passé pour construire un avenir éclairé, juste et autonome.</p>
                    <button onclick="openModal('L’Afrique possède une histoire millénaire, riche de civilisations anciennes comme l’Égypte, le royaume de Kongo, le Mali, le Ghana et de nombreux autres royaumes et empires qui ont façonné le continent. Cette histoire, transmise à travers les traditions orales, les manuscrits, les monuments et les arts, est le socle de l’identité et de la mémoire collective africaine. La jeunesse africaine, qui représente plus de 60 % de la population du continent, joue un rôle clé dans la revalorisation et la transmission de ce patrimoine historique. Agir pour l’histoire africaine, c’est préserver la mémoire du continent, valoriser ses héritages et apprendre des leçons du passé pour construire un avenir éclairé, juste et autonome.', 'L\'Histoire', '{{ asset('image/h.png') }}')" class="text-xs px-3 py-1 rounded-md mt-2 transition-all duration-200 hover:scale-105">Voir plus</button>
                </div>
                <!-- Élément 11 -->
                <div class="p-3 rounded shadow-lg text-center action-card cursor-pointer">
                    <img src="{{ asset('image/pp.png') }}" alt="Activités Récréatives" class="action-image">
                    <h3 class="text-base sm:text-lg font-bold mt-2">Le Panafricanisme</h3>
                    <p class="text-xs sm:text-sm text-gray-600 mt-2"> Le panafricanisme est un mouvement politique, social et culturel visant à unir les peuples africains et la diaspora africaine autour de valeurs communes de solidarité, de développement, de justice et d’autonomie... Agir pour le panafricanisme, c’est œuvrer pour l’unité et la solidarité du continent africain et de sa diaspora.</p>
                    <button onclick="openModal('Le panafricanisme est un mouvement politique, social et culturel visant à unir les peuples africains et la diaspora africaine autour de valeurs communes de solidarité, de développement, de justice et d’autonomie. Il repose sur la conviction que l’Afrique doit se libérer des divisions héritées de la colonisation, renforcer sa coopération et promouvoir son identité culturelle et économique sur la scène mondiale. Agir pour le panafricanisme, c’est œuvrer pour l’unité et la solidarité du continent africain et de sa diaspora.', 'Le Panafricanisme', '{{ asset('image/pp.png') }}')" class="text-xs px-3 py-1 rounded-md mt-2 transition-all duration-200 hover:scale-105">Voir plus</button>
                </div>
                <!-- Élément 12 -->
                <div class="p-3 rounded shadow-lg text-center action-card cursor-pointer">
                    <img src="{{ asset('image/b.png') }}" alt="Sensibilisation à l’Hygiène" class="action-image">
                    <h3 class="text-base sm:text-lg font-bold mt-2">Promotion de l’Égalité et de l’Équité</h3>
                    <p class="text-xs sm:text-sm text-gray-600 mt-2"> Dans de nombreuses régions du monde, et particulièrement en Afrique, les inégalités persistent encore : inégalités de genre... Promouvoir l’égalité et l’équité, c’est reconnaître la dignité de chaque personne et lui permettre de contribuer pleinement au développement collectif.</p>
                    <button onclick="openModal('Dans de nombreuses régions du monde, et particulièrement en Afrique, les inégalités persistent encore : inégalités de genre, économiques, sociales et éducatives, limitant l’accès des plus vulnérables aux ressources et aux opportunités. Promouvoir l’égalité et l’équité, c’est reconnaître la dignité de chaque personne et lui permettre de contribuer pleinement au développement collectif.', 'Promotion de l’Égalité et de l’Équité', '{{ asset('image/b.png') }}')" class="text-xs px-3 py-1 rounded-md mt-2 transition-all duration-200 hover:scale-105">Voir plus</button>
                </div>
            </div>
        </div>
    </section>
    <!-- Section À propos -->
    <section id="about" class="py-8 bg-gray-200 section-animate">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold section-title">À propos d'ABEC</h2>
            <div class="mt-6 text-justify text-sm sm:text-base text-gray-700 leading-relaxed tracking-wide space-y-4 max-w-4xl mx-auto">
                <p>L’Association du Bien-Être Communautaire (ABEC) est une organisation internationale à but non lucratif, légalement reconnue et enregistrée auprès des institutions locales sous le numéro de déclaration 00001901/RDA/J06/SAAJP/BAPP.</p>
                <p>La Loi n°99/014 du 22 décembre 1999 régissant les Organisations Non Gouvernementales (ONG) ; la Loi n°90/053 du 19 décembre 1990 portant sur la liberté d'association au Cameroun.</p>
                <p>L’ABEC se distingue par une gouvernance inclusive et représentative. Son équipe dirigeante rassemble des membres issus de plusieurs nationalités différentes, illustrant son ouverture et sa portée internationale.</p>
                <p>Les femmes y occupent des postes stratégiques, renforçant l’équité et la représentativité. Fondée par un jeune visionnaire, l’organisation est dirigée majoritairement par des leaders jeunes, animés par la volonté d’impacter positivement leur génération à travers des actions concrètes.</p>
                <p>L’ABEC s’appuie sur un réseau d’experts en droit, gestion de projet, communication, finance, développement durable et gestion des ressources humaines, garantissant le sérieux et la qualité de ses interventions.</p>
                <p>L’ABEC collabore étroitement avec un ensemble de petites et moyennes organisations locales et internationales qui lui font confiance.</p>
                <p>L’organisation a déjà initié et co-organisé plusieurs activités locales en partenariat avec des entreprises et des structures qui, convaincues par son engagement et sa détermination, continuent de la soutenir durablement.</p>
                <p>En résumé, l’ABEC incarne la vision d’une jeunesse multinationale et diversifiée, déterminée à changer le cours des choses. Malgré les défis liés au manque de ressources financières, elle poursuit avec conviction la réalisation de projets innovants et audacieux, au service du bien-être communautaire et du développement durable.</p>
            </div>
            <div class="mt-8 flex justify-center">
                <video class="responsive-video rounded-lg shadow-lg w-full max-w-[90%]" autoplay loop muted playsinline>
                    <source src="{{ asset('image/orange.mp4') }}" type="video/mp4">
                    Votre navigateur ne prend pas en charge la lecture de vidéos.
                </video>
            </div>
        </div>
    </section>
    <!-- Section Nos Partenaires -->
    <section id="partners" class="py-8 bg-gray-200 section-animate">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold section-title mb-6">Nos Partenaires</h2>
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
                    <!-- Duplicated slides to fix Swiper loop warning -->
                    <div class="swiper-slide flex justify-center items-center">
                        <img src="{{ asset('image/ee.png') }}" alt="Partenaire 1" class="partner-logo" />
                    </div>
                   
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer id="contact" class="bg-blue-800 text-white section-animate" role="contentinfo">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex flex-col items-center text-center space-y-3">
                <nav class="flex flex-wrap justify-center gap-x-3 gap-y-2">
                    <a href="#top" class="text-sm font-bold hover:text-gray-200 transition-colors duration-300">Accueil</a>
                    <a href="#about" class="text-sm font-bold hover:text-gray-200 transition-colors duration-300">À propos</a>
                    <a href="#actions" class="text-sm font-bold hover:text-gray-200 transition-colors duration-300">Nos Actions</a>
                    <a href="{{route('news')}}" class="text-sm font-bold hover:text-gray-200 transition-colors duration-300">News</a>
                    <a href="#contact" class="text-sm font-bold hover:text-gray-200 transition-colors duration-300">Contact</a>
                </nav>
                <hr class="my-3 border-gray-300 w-full" />
                <p class="text-sm font-bold">Basée à Yaoundé, Cameroun</p>
                <a href="#top" class="inline-block text-sm font-bold hover:text-gray-200 transition-colors duration-300">Retour en haut</a>
                <hr class="my-3 border-gray-300 w-full" />
                <p class="text-sm font-bold">Organisation internationale. Tous droits réservés.</p>
                <p class="text-xs mt-2">Suivez-nous sur nos réseaux sociaux :</p>
                <div class="flex space-x-3 mt-2">
                    <a href="https://www.facebook.com/profile.php?id=61568266295634" target="_blank" class="hover:opacity-80 transition-opacity duration-300" title="Facebook">
                        <img src="{{ asset('image/feacebook.jpg') }}" alt="Facebook" class="w-6 h-6 rounded-full">
                    </a>
                    <a href="https://whatsapp.com/channel/0029VaYTsNkD8SE42sDpnk1w" target="_blank" class="hover:opacity-80 transition-opacity duration-300" title="WhatsApp">
                        <img src="{{ asset('image/wastapp.jpg') }}" alt="WhatsApp" class="w-6 h-6 rounded-full">
                    </a>
                    <a href="https://www.instagram.com/abec.officiel/" target="_blank" class="hover:opacity-80 transition-opacity duration-300" title="Instagram">
                        <img src="{{ asset('image/insta.jpg') }}" alt="Instagram" class="w-6 h-6 rounded-full">
                    </a>
                </div>
                <div class="mt-3">
                    <img src="{{ asset('image/ab.png') }}" alt="Logo ABEC" class="h-10 mx-auto transition-transform duration-300 hover:scale-105">
                </div>
            </div>
        </div>
    </footer>
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        // Fonctions pour gérer la modale
        function openModal(content, title, imageSrc) {
            const modal = document.getElementById('modal');
            const modalContent = document.getElementById('modalContent');
            const modalTitle = document.getElementById('modalTitle');
            const modalImage = document.getElementById('modalImage');
            modalContent.innerHTML = content;
            modalTitle.textContent = title;
            modalImage.src = imageSrc;
            modalImage.alt = title;
            modal.classList.add('show');
            console.log('Modal opened', { content, title, imageSrc, modalClass: modal.classList });
        }

        function closeModal() {
            const modal = document.getElementById('modal');
            modal.classList.remove('show');
            console.log('Modal closed', { modalClass: modal.classList });
        }

        document.getElementById('modal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobileMenu');
            const menuOpenIcon = document.getElementById('menuOpenIcon');
            const menuCloseIcon = document.getElementById('menuCloseIcon');
            const isOpen = mobileMenu.classList.contains('open');
            if (isOpen) {
                mobileMenu.classList.remove('open');
                mobileMenu.classList.add('hidden');
                menuOpenIcon.classList.remove('hidden');
                menuCloseIcon.classList.add('hidden');
            } else {
                mobileMenu.classList.add('open');
                mobileMenu.classList.remove('hidden');
                menuOpenIcon.classList.add('hidden');
                menuCloseIcon.classList.remove('hidden');
            }
            console.log('Mobile menu toggled', { isOpen: !isOpen });
        }

       const partnerSwiper = new Swiper(".mySwiper", {
    effect: "slide",
    loop: true,
    centeredSlides: false, // Par défaut, non centré pour mobile
    slidesPerView: 2,
    spaceBetween: 8,
    speed: 800,
    autoplay: { delay: 3000, pauseOnMouseEnter: true },
    breakpoints: {
        320: { 
            slidesPerView: 1, 
            spaceBetween: 4, 
            centeredSlides: true // Centré pour mobile
        },
        640: { 
            slidesPerView: 2, 
            spaceBetween: 6, 
            centeredSlides: true // Centré pour desktop (tablette)
        },
        1024: { 
            slidesPerView: 2, 
            spaceBetween: 8, 
            centeredSlides: true // Centré pour desktop (grands écrans)
        }
    }
});

        const heroSwiper = new Swiper(".heroSwiper", {
            effect: "fade",
            fadeEffect: { crossFade: true },
            loop: true,
            speed: 1000,
            autoplay: { delay: 4000, disableOnInteraction: false }
        });

        window.addEventListener('load', () => {
            console.log('Page fully loaded, hiding spinner');
            const loading = document.getElementById('loading');
            setTimeout(() => {
                loading.classList.add('loading-hidden');
                setTimeout(() => {
                    loading.style.display = 'none';
                    console.log('Spinner hidden');
                }, 700);
            }, 800);
        });

        document.addEventListener('DOMContentLoaded', () => {
            console.log('DOM fully loaded, initializing IntersectionObserver');
            const elements = document.querySelectorAll('.section-animate, .action-card, .responsive-video, .partner-logo, footer a, footer p');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        console.log('Element visible:', entry.target);
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1 });
            elements.forEach(element => observer.observe(element));
        });
    </script>
</body>

</html>