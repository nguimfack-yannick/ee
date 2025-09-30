<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Organisation du Bien-Être Communautaire - Événements</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="64x64" href="{{ asset('image/ab.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('image/ab-180.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('image/ab-64.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/ab-16.png') }}">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Arial+Black&display=swap');
        body {
            background-color: #ffffff;
            font-family: 'Arial Black', sans-serif;
            overflow-x: hidden;
            padding-top: 0;
        }
        .font-custom,
        h1,
        h2,
        h3,
        p,
        a,
        li {
            font-family: 'Arial Black', sans-serif;
            font-weight: bold;
            text-align: center;
        }
        html { scroll-behavior: smooth; }

        /* === LOADING SPINNER === */
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
        .loading-overlay[x-show="isLoading"] { opacity: 1; }
        .loading-overlay:not([x-show="isLoading"]) { opacity: 0; pointer-events: none; }
        .spinner-container {
            position: relative;
            width: 120px;
            height: 120px;
            display: flex;
            justify-content: center;
            align-items: center;
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
            top: 50% !important;
            left: 50% !important;
            transform: translate(-50%, -50%) !important;
            width: 60px !important;
            height: 60px !important;
            object-fit: contain !important;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        @media (max-width: 640px) {
            .spinner-container { width: 100px; height: 100px; }
            .spinner-logo { width: 48px !important; height: 48px !important; }
        }

        /* Modal Styles - ✅ IMAGES AGRANDIES */
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
            padding: 1.5rem;
            max-width: 95%;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            opacity: 0;
            transform: scale(0.9) translateY(20px);
            transition: opacity 0.4s ease, transform 0.4s ease;
        }
        .modal.show .modal-content {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
        .modal-close {
            position: absolute;
            top: 12px;
            right: 12px;
            cursor: pointer;
            width: 24px;
            height: 24px;
            transition: transform 0.2s ease, opacity 0.2s ease;
        }
        .modal-close:hover {
            transform: scale(1.2);
            opacity: 0.8;
        }

        /* 🔥 IMAGE AGRANDIE DANS LE MODAL 🔥 */
        .modal-image {
            width: 100%;
            min-height: 200px; /* Hauteur minimale pour mobile */
            max-height: 40vh; /* Mobile */
            object-fit: cover;
            border-radius: 0.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        @media (min-width: 640px) {
            .modal-image {
                max-height: 50vh;
            }
        }

        .modal-title {
            font-size: clamp(1.25rem, 3vw, 1.5rem);
            color: #1E90FF;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            background: rgba(255, 248, 220, 0.8);
            padding: 0.5rem;
            border-radius: 0.25rem;
            text-align: center;
            transform: translateY(20px);
            opacity: 0;
            transition: transform 0.4s ease, opacity 0.4s ease;
        }
        .modal.show .modal-title {
            transform: translateY(0);
            opacity: 1;
        }
        .modal-content p {
            font-size: clamp(0.75rem, 2vw, 0.875rem);
            color: #333333;
            line-height: 1.6;
            transition: opacity 0.4s ease 0.2s;
            opacity: 0;
        }
        .modal.show .modal-content p {
            opacity: 1;
        }

        /* Event Card */
        .event-card {
            background-color: #FFF8DC;
            position: relative;
            overflow: hidden;
            border-radius: 0.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: transform 0.5s ease, box-shadow 0.5s ease, opacity 0.5s ease;
            opacity: 0;
            transform: translateY(50px);
            cursor: pointer;
        }
        .event-card.visible {
            opacity: 1;
            transform: translateY(0);
        }
        .event-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 215, 0, 0.3), transparent);
            transition: left 0.6s ease;
            z-index: 1;
        }
        .event-card:hover::before {
            left: 100%;
        }
        .event-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 3px;
            background-color: #FFD700;
            transition: width 0.3s ease;
            z-index: 2;
        }
        .event-card:hover::after {
            width: 100%;
        }
        .event-card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
        }

        .event-image {
            width: 100%;
            min-height: 120px;
            object-fit: cover;
            border-radius: 0.5rem 0.5rem 0 0;
            transition: transform 0.3s ease, opacity 0.3s ease;
        }
        .event-card:hover .event-image {
            transform: scale(1.05);
            opacity: 0.9;
        }

        .event-body {
            padding: 1rem;
            text-align: center;
            position: relative;
            z-index: 5;
        }
        .event-meta {
            font-size: clamp(0.75rem, 2vw, 0.875rem);
            color: #6b7280;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.3rem;
        }
        .event-meta::before {
            content: "🗓️";
            font-size: 0.9em;
        }
        .event-title {
            font-size: clamp(1rem, 2.5vw, 1.25rem);
            color: #1E90FF;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            margin-bottom: 0.5rem;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            transition: color 0.3s ease;
        }
        .event-content {
            font-size: clamp(0.75rem, 2vw, 0.875rem);
            color: #333333;
            line-height: 1.6;
            margin-top: 0.5rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .event-button {
            color: #000000;
            background-color: #FFD700;
            border: 1px solid #FFD700;
            padding: 0.5rem 1rem;
            font-size: clamp(0.75rem, 2vw, 0.875rem);
            font-weight: bold;
            border-radius: 0.25rem;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            width: fit-content;
            margin: 0.5rem auto 0;
            transition: all 0.3s ease;
        }
        .event-button:hover {
            background-color: #DAA520;
            color: #ffffff;
            transform: scale(1.05);
        }

        /* Grid */
        .events-grid {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            gap: 1.5rem;
            padding: 1rem 0;
        }
        @media (min-width: 640px) {
            .events-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .event-image { min-height: 140px; }
        }
        @media (min-width: 1024px) {
            .events-grid {
                grid-template-columns: repeat(3, 1fr);
            }
            .event-image { min-height: 160px; }
        }

        /* Reste inchangé */
        .section-title {
            text-transform: uppercase;
            color: #1E90FF;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            position: relative;
            display: inline-block;
            font-size: clamp(1.5rem, 4vw, 2.5rem);
            animation: colorCycle 3s ease-in-out infinite;
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
        .hero-title {
            font-size: clamp(2rem, 5vw, 4rem);
            font-weight: 900;
            text-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            animation: colorCycle 3s ease-in-out infinite;
        }
        @keyframes colorCycle {
            0% { color: #1E90FF; }
            50% { color: #FFD700; }
            100% { color: #1E90FF; }
        }
        .event-card:nth-child(1).visible { transition-delay: 0.1s; }
        .event-card:nth-child(2).visible { transition-delay: 0.2s; }
        .event-card:nth-child(3).visible { transition-delay: 0.3s; }
        .section-animate {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }
        .section-animate.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Footer & autres styles inchangés */
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
        .footer-link { transition: color 0.3s ease, transform 0.3s ease; }
        .footer-link:hover { transform: translateX(5px); }
        .social-icon { transition: transform 0.3s ease, opacity 0.3s ease; }
        .social-icon:hover { transform: scale(1.2); opacity: 0.8; }
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
        .no-events-marquee {
            width: 100%;
            overflow: hidden;
            white-space: nowrap;
            background-color: #1E90FF;
            padding: 1rem 0;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            z-index: 10;
            margin: 1rem 0;
            border-radius: 0.5rem;
        }
        .no-events-marquee-text {
            display: inline-block;
            font-size: 1.25rem;
            font-weight: bold;
            color: #FFD700;
            animation: marquee 10s linear infinite;
            text-align: center;
        }

        @media (max-width: 640px) {
            .event-title { font-size: clamp(0.875rem, 2.5vw, 1rem); }
            .event-content, .event-meta { font-size: clamp(0.7rem, 1.8vw, 0.8rem); }
            .event-button { padding: 0.4rem 0.8rem; font-size: clamp(0.7rem, 1.8vw, 0.8rem); }
            .modal-content { padding: 1rem; max-width: 98%; }
            .modal-title { font-size: clamp(1rem, 2.5vw, 1.25rem); }
            .modal-content p { font-size: clamp(0.7rem, 1.8vw, 0.8rem); }
            .hero-title { font-size: clamp(1.5rem, 4vw, 2.5rem); }
            .no-events-marquee-text { font-size: 1rem; }
        }
        @media (min-width: 641px) and (max-width: 1023px) {
            .event-title { font-size: clamp(1rem, 2.5vw, 1.125rem); }
            .modal-content { max-width: 90%; }
            .hero-title { font-size: clamp(2rem, 4.5vw, 3rem); }
            .no-events-marquee-text { font-size: 1.125rem; }
        }
        @media (min-width: 1024px) {
            .hero-title { font-size: clamp(2.5rem, 5vw, 4rem); }
        }

        [x-cloak] { display: none; }
    </style>
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
                        custom: ['Arial Black', 'sans-serif']
                    }
                }
            }
        }
    </script>
</head>
<body id="top" x-data="{ mobileMenuOpen: false, isLoading: true }" class="bg-white font-sans antialiased" @load.window="setTimeout(() => isLoading = false, 2000)">
    <!-- LOADING SPINNER -->
    <div x-show="isLoading" x-cloak class="loading-overlay">
        <div class="spinner-container">
            <div class="spinner-circle"></div>
            <img src="{{ asset('image/ab.png') }}" alt="Logo ABEC" class="spinner-logo">
        </div>
    </div>

    <!-- Modal -->
    <div class="modal" id="modal">
        <div class="modal-content">
            <img id="modalImage" class="modal-image" src="" alt="">
            <h3 class="modal-title" id="modalTitle"></h3>
            <p class="text-gray-600" id="modalContent"></p>
            <svg class="modal-close" onclick="closeModal()" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </div>
    </div>

    <!-- Top Nav -->
    <nav class="bg-primary text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-10">
                <div class="flex items-center space-x-4">
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
                   class="hover:opacity-80 transition-opacity duration-300">
                    <img src="{{ asset('image/m.jpg') }}" alt="Email" class="w-6 h-6 rounded-full">
                </a>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="bg-white shadow py-4 section-animate">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex-shrink-0">
                    <img src="{{ asset('image/ab.png') }}" alt="logo" class="h-16 sm:h-16 md:h-20 transition-transform duration-300 hover:scale-105">
                </div>
                <nav class="hidden md:flex space-x-4">
                    <a href="{{ route('welcome') }}" class="px-3 py-2 text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white transition-all duration-300 font-custom">Accueil</a>
                    <a href="{{ route('news') }}" class="px-3 py-2 text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white transition-all duration-300 font-custom">News</a>
                    <a href="{{ route('dons') }}" class="px-3 py-2 text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white transition-all duration-300 font-custom">Dons</a>
                </nav>
                <div class="md:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-500 focus:outline-none p-2">
                        <svg x-show="!mobileMenuOpen" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg x-show="mobileMenuOpen" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
            <div x-show="mobileMenuOpen" x-cloak class="md:hidden px-2 pt-2 pb-3 space-y-1 mt-4 bg-white rounded-lg shadow-lg mobile-menu">
                <a href="{{ route('welcome') }}" class="block px-3 py-2 text-base font-bold text-gray-800 hover:bg-blue-500 hover:text-white transition-all duration-300 font-custom">Accueil</a>
                <a href="{{ route('news') }}" class="block px-3 py-2 text-base font-bold text-gray-800 hover:bg-blue-500 hover:text-white transition-all duration-300 font-custom">News</a>
                <a href="{{ route('dons') }}" class="block px-3 py-2 text-base font-bold text-gray-800 hover:bg-blue-500 hover:text-white transition-all duration-300 font-custom">Dons</a>
            </div>
        </div>
    </header>

    <!-- Hero -->
    <section class="relative bg-cover bg-center min-h-[60vh] sm:min-h-[80vh] lg:min-h-screen section-animate">
        <div class="absolute inset-0 rounded-br-3xl overflow-hidden">
            <img src="{{ asset('image/fotos.jpg') }}" alt="Hero Background" class="w-full h-full object-cover">
        </div>
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-32 pb-24 md:pt-48 md:pb-40 flex items-center justify-center text-center">
            <div class="text-white max-w-3xl mt-10 sm:mt-20">
                <h1 class="hero-title font-extrabold font-custom leading-tight">
                    Nos Événements
                </h1>
                <p class="mt-4 text-lg sm:text-xl font-bold font-custom">
                    Découvrez nos actions passées et à venir.
                </p>
            </div>
        </div>
    </section>

    <!-- Événements à Venir -->
    <section id="upcoming-events" class="py-12 md:py-16 bg-gray-200 section-animate">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="section-title mb-8 md:mb-12">Événements à Venir</h2>
            <div class="no-events-marquee">
                <span class="no-events-marquee-text">Les événements ne sont pas encore disponibles...</span>
            </div>
        </div>
    </section>

    <!-- Événements Passés -->
    <section id="past-events" class="py-12 md:py-16 bg-gray-100 section-animate">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="section-title mb-8 md:mb-12">Événements Passés</h2>
            <div class="events-grid">


            <div class="event-card"
                    data-modal-title="L'ABEC au contact de la population"
                    data-modal-content="Lors de ses descentes sur le terrain, l’équipe se rapproche au maximum des bénéficiaires afin d’assurer une prise en charge de qualité et de favoriser des échanges fluides entre l’organisation et les populations concernées. Nous veillons à la transparence, notamment en ce qui concerne une distribution juste et équitable des ressources."
                    data-modal-image="{{ asset('image/c.jpeg') }}">
                    <img src="{{ asset('image/c.jpeg') }}" alt="Nettoyage de quartier" class="event-image">
                    <div class="event-body">
                        <div class="event-meta"> 25 Mars 2025 • Bafoussam</div>
                        <h3 class="event-title">L'ABEC au contact de la population</h3>
                        <p class="event-content">
                           Lors de ses descentes sur le terrain, l’équipe se rapproche au maximum des bénéficiaires afin d’assurer une prise en charge de qualité et de favoriser des échanges fluides entre l’organisation et les populations concernées..... 
                        </p>
                        <button class="event-button">Voir plus</button>
                    </div>
                </div>

                <div class="event-card"
                    data-modal-title="L'équipe d'ABEC en action"
                    data-modal-content="La descente de l'organisation du bien-être communautaire à l’Hôpital Régional de Bafoussam a été un moment fort d’action sociale, concrétisé après plusieurs mois de préparation. Toute l’équipe s’est mobilisée, depuis la collecte de fonds jusqu’aux démarches administratives, en passant par l’organisation logistique. Le jour J, l’équipe a fait preuve d’efficacité, et les résultats ont été parmi les meilleurs."
                    data-modal-image="{{ asset('image/b.jpeg') }}">
                    <img src="{{ asset('image/b.jpeg') }}" alt="Campagne de vaccination" class="event-image">
                    <div class="event-body">
                        <div class="event-meta">22 Mars 2025 • Bafoussam</div>
                        <h3 class="event-title">L'équipe d'ABEC en action</h3>
                        <p class="event-content">
                          La descente de l'organisation du bien-être communautaire à l’Hôpital Régional de Bafoussam a été un moment fort d’action sociale, concrétisé après plusieurs mois de préparation.....
                        </p>
                        <button class="event-button">Voir plus</button>
                    </div>
                </div>
                <!-- Événement 1 -->
                <div class="event-card"
                    data-modal-title="Presentations des dons"
                    data-modal-content="Des dons ont été distribués à l’hôpital régional de Bafoussam afin de venir en aide directement aux patients. Cette initiative permet de soutenir leur bien-être, de faciliter l’accès aux soins et d’améliorer leur confort durant leur séjour à l’hôpital. Elle illustre l’importance de la solidarité envers les personnes malades et renforce l’accompagnement humanitaire au sein de la communauté."
                    data-modal-image="{{ asset('image/a.jpeg') }}">
                    <img src="{{ asset('image/a.jpeg') }}" alt="Distribution de fournitures scolaires" class="event-image">
                    <div class="event-body">
                        <div class="event-meta">20 Mars 2025 • Bafoussam</div>
                        <h3 class="event-title">Presentations des dons</h3>
                        <p class="event-content">
                            Des dons ont été distribués à l’hôpital régional de Bafoussam afin de venir en aide directement aux patients...
                        </p>
                        <button class="event-button">Voir plus</button>
                    </div>
                </div>
                <!-- Événement 2 -->
                <!-- <div class="event-card"
                    data-modal-title="L'équipe d'ABEC en action"
                    data-modal-content="La descente de l'organisation du bien-être communautaire à l’Hôpital Régional de Bafoussam a été un moment fort d’action sociale, concrétisé après plusieurs mois de préparation. Toute l’équipe s’est mobilisée, depuis la collecte de fonds jusqu’aux démarches administratives, en passant par l’organisation logistique. Le jour J, l’équipe a fait preuve d’efficacité, et les résultats ont été parmi les meilleurs."
                    data-modal-image="{{ asset('image/b.jpeg') }}">
                    <img src="{{ asset('image/b.jpeg') }}" alt="Campagne de vaccination" class="event-image">
                    <div class="event-body">
                        <div class="event-meta">20 Mars 2025 • Bafoussam</div>
                        <h3 class="event-title">L'équipe d'ABEC en action</h3>
                        <p class="event-content">
                          La descente de l'organisation du bien-être communautaire à l’Hôpital Régional de Bafoussam a été un moment fort d’action sociale, concrétisé après plusieurs mois de préparation.....
                        </p>
                        <button class="event-button">Voir plus</button>
                    </div>
                </div> -->
                <!-- Événement 3 -->
                <!-- <div class="event-card"
                    data-modal-title="L'ABEC au contact de la population"
                    data-modal-content="Lors de ses descentes sur le terrain, l’équipe se rapproche au maximum des bénéficiaires afin d’assurer une prise en charge de qualité et de favoriser des échanges fluides entre l’organisation et les populations concernées. Nous veillons à la transparence, notamment en ce qui concerne une distribution juste et équitable des ressources."
                    data-modal-image="{{ asset('image/c.jpeg') }}">
                    <img src="{{ asset('image/c.jpeg') }}" alt="Nettoyage de quartier" class="event-image">
                    <div class="event-body">
                        <div class="event-meta"> 25 Mars 2025 • Bafoussam</div>
                        <h3 class="event-title">L'ABEC au contact de la population</h3>
                        <p class="event-content">
                           Lors de ses descentes sur le terrain, l’équipe se rapproche au maximum des bénéficiaires afin d’assurer une prise en charge de qualité et de favoriser des échanges fluides entre l’organisation et les populations concernées..... 
                        </p>
                        <button class="event-button">Voir plus</button>
                    </div>
                </div> -->
            </div>
            <p class="mt-8 md:mt-12 text-center text-gray-600 font-bold font-custom max-w-3xl mx-auto px-4 text-sm sm:text-base">
                Chaque événement est une opportunité d’agir ensemble. Rejoignez-nous et faites partie du changement !
            </p>
        </div>
    </section>

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
            <span class="marquee-text"> Grandir- Agir  - Changer</span>
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
                        <a href="/cdn-cgi/l/email-protection#2d4a41424f4c415843445b485f5e4c415a48414b4c5f486d4a404c4441034e4240" class="social-icon bg-white bg-opacity-20 p-1.5 rounded-full hover:bg-yellow transition-all duration-300">
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

    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const elements = document.querySelectorAll('.section-animate, .event-card');

            function openModal(content, title, imageSrc) {
                const modal = document.getElementById('modal');
                const modalContent = document.getElementById('modalContent');
                const modalTitle = document.getElementById('modalTitle');
                const modalImage = document.getElementById('modalImage');
                modalContent.innerHTML = content || 'Contenu non disponible.';
                modalTitle.textContent = title || 'Événement';
                modalImage.src = imageSrc || '';
                modalImage.alt = title || 'Image';
                modal.classList.add('show');
            }

            function closeModal() {
                const modal = document.getElementById('modal');
                modal.classList.remove('show');
            }

            document.querySelectorAll('.event-button').forEach(button => {
                button.addEventListener('click', (e) => {
                    e.stopPropagation();
                    const card = button.closest('.event-card');
                    const title = card.dataset.modalTitle;
                    const content = card.dataset.modalContent;
                    const image = card.dataset.modalImage;
                    openModal(content, title, image);
                });
            });

            document.getElementById('modal').addEventListener('click', function(e) {
                if (e.target === this) {
                    closeModal();
                }
            });

            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    closeModal();
                }
            });

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
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