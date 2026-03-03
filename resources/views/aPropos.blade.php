<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>À propos - ABEC</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="64x64" href="{{ asset('image/ab.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('image/ab-180.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('image/ab-32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/ab-16.png') }}">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <!-- Swiper CSS (si nécessaire pour d'éventuels carrousels) -->
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
        html {
            scroll-behavior: smooth;
        }

        /* Animation de la flèche vers le bas (réutilisée) */
        @keyframes bounceDown {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(6px); }
            60% { transform: translateY(3px); }
        }
        .bounce-down-arrow {
            display: inline-block;
            animation: bounceDown 2s infinite;
            color: #1E90FF;
            margin-left: 6px;
            vertical-align: middle;
        }

        /* Loading Spinner */
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

        /* Mobile Menu */
        .mobile-menu {
            transform: translateX(100%);
            transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
            opacity: 0;
        }
        .mobile-menu.open {
            transform: translateX(0);
            opacity: 1;
        }

        /* Section Entrance */
        .section-animate {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }
        .section-animate.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* HEADER PREMIUM STYLES */
        .main-header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }
        .main-header.scrolled {
            background: rgba(255, 255, 255, 0.8);
            padding: 0.5rem 0;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .nav-link {
            position: relative;
            font-size: 0.85rem;
            color: #1a1a1a;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: #1E90FF;
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }
        .nav-link:hover::after {
            width: 70%;
        }
        .nav-link.active {
            color: #1E90FF;
        }
        .nav-link.active::after {
            width: 70%;
        }
        .logo-img {
            height: 50px;
            transition: transform 0.4s ease;
        }
        .main-header.scrolled .logo-img {
            transform: scale(0.9);
        }

        /* Modal */
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
            max-height: 30vh;
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

        /* Styles réutilisés de la section Nos Actions (design premium) */
        .about-section {
            background: linear-gradient(160deg, #0f0f1a 0%, #0d1b2a 50%, #0f0f1a 100%);
            padding: 5rem 0;
            position: relative;
            overflow: hidden;
        }
        .about-section::before {
            content: '';
            position: absolute; inset: 0;
            background: radial-gradient(ellipse at 20% 50%, rgba(30,144,255,0.07) 0%, transparent 60%),
                        radial-gradient(ellipse at 80% 20%, rgba(255,215,0,0.05) 0%, transparent 50%);
            pointer-events: none;
        }
        .about-title {
            font-size: clamp(1.6rem, 4vw, 2.8rem);
            font-weight: 900;
            color: #ffffff;
            text-align: center;
            letter-spacing: -0.02em;
        }
        .about-title span { color: #FFD700; }
        .about-sub {
            text-align: center;
            color: rgba(255,255,255,0.55);
            font-size: 0.95rem;
            margin-top: 0.6rem;
        }

        /* Grille de cartes (identique à actions-grid) */
        .about-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.1rem;
            margin-top: 2.5rem;
        }
        @media (min-width: 640px)  { .about-grid { grid-template-columns: repeat(3, 1fr); } }
        @media (min-width: 1024px) { .about-grid { grid-template-columns: repeat(4, 1fr); gap: 1.4rem; } }

        /* Carte de base (act-card) */
        .about-card {
            position: relative;
            border-radius: 1rem;
            overflow: hidden;
            cursor: pointer;
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
            transition: transform 0.4s cubic-bezier(.4,0,.2,1), box-shadow 0.4s ease, border-color 0.3s;
            opacity: 0;
            transform: translateY(32px);
        }
        .about-card.in-view {
            opacity: 1;
            transform: translateY(0);
        }
        .about-card:hover {
            transform: translateY(-6px) scale(1.02);
            box-shadow: 0 20px 50px rgba(0,0,0,0.55), 0 0 0 1px rgba(255,215,0,0.25);
            border-color: rgba(255,215,0,0.3);
        }

        .about-img-wrap {
            position: relative;
            width: 100%;
            padding-top: 62%;
            overflow: hidden;
        }
        .about-img-wrap img {
            position: absolute; inset: 0;
            width: 100%; height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(.4,0,.2,1);
            filter: brightness(0.75);
        }
        .about-card:hover .about-img-wrap img {
            transform: scale(1.08);
            filter: brightness(0.55);
        }
        .about-badge {
            position: absolute; top: 0.6rem; left: 0.6rem;
            font-size: 0.6rem; font-weight: 800;
            letter-spacing: 0.1em; text-transform: uppercase;
            padding: 0.2rem 0.55rem; border-radius: 9999px;
            backdrop-filter: blur(6px);
        }
        .about-icon {
            position: absolute; bottom: 0.5rem; right: 0.7rem;
            font-size: 1.6rem;
            filter: drop-shadow(0 2px 6px rgba(0,0,0,0.6));
            transition: transform 0.3s ease;
        }
        .about-card:hover .about-icon { transform: scale(1.2) rotate(-5deg); }

        .about-body {
            padding: 0.9rem 1rem 1rem;
        }
        .about-body h3 {
            font-size: 0.9rem;
            font-weight: 800;
            color: #fff;
            line-height: 1.3;
            margin-bottom: 0.35rem;
        }
        .about-body p {
            font-size: 0.7rem;
            color: rgba(255,255,255,0.5);
            line-height: 1.5;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .about-btn {
            display: inline-flex; align-items: center; gap: 0.3rem;
            margin-top: 0.7rem;
            font-size: 0.7rem; font-weight: 700;
            color: #FFD700;
            background: rgba(255,215,0,0.1);
            border: 1px solid rgba(255,215,0,0.25);
            padding: 0.3rem 0.8rem; border-radius: 9999px;
            transition: all 0.25s ease;
        }
        .about-btn:hover { background: #FFD700; color: #000; }

        /* Carte pleine largeur pour texte */
        .about-text-card {
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 1rem;
            padding: 2rem;
            color: #fff;
            backdrop-filter: blur(10px);
        }
        .about-text-card p {
            color: rgba(255,255,255,0.7);
            font-size: 0.9rem;
            line-height: 1.8;
        }

        /* Valeurs : cartes sans image */
        .value-card {
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,215,0,0.15);
            border-radius: 1rem;
            padding: 2rem 1rem;
            text-align: center;
            transition: all 0.3s ease;
        }
        .value-card:hover {
            border-color: #FFD700;
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(255,215,0,0.1);
        }
        .value-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #FFD700;
        }
        .value-card h3 {
            color: #fff;
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
        }
        .value-card p {
            color: rgba(255,255,255,0.5);
            font-size: 0.8rem;
        }

        /* Chiffres clés */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(2,1fr);
            gap: 1rem;
        }
        @media (min-width:768px){
            .stats-grid {
                grid-template-columns: repeat(4,1fr);
            }
        }
        .stat-item {
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,215,0,0.1);
            border-radius: 1rem;
            padding: 1.5rem 0.5rem;
            text-align: center;
        }
        .stat-number {
            font-size: 2rem;
            font-weight: 900;
            color: #FFD700;
        }
        .stat-label {
            color: rgba(255,255,255,0.6);
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Video */
        .video-wrapper {
            border-radius: 1rem;
            overflow: hidden;
            border: 1px solid rgba(255,215,0,0.3);
        }
        .responsive-video {
            width: 100%;
            height: auto;
            display: block;
        }

        /* Stagger delays */
        .about-card:nth-child(1)  { transition-delay: 0.05s; }
        .about-card:nth-child(2)  { transition-delay: 0.10s; }
        .about-card:nth-child(3)  { transition-delay: 0.15s; }
        .about-card:nth-child(4)  { transition-delay: 0.20s; }
        .about-card:nth-child(5)  { transition-delay: 0.25s; }
        .about-card:nth-child(6)  { transition-delay: 0.30s; }
        .about-card:nth-child(7)  { transition-delay: 0.35s; }
        .about-card:nth-child(8)  { transition-delay: 0.40s; }
        .about-card { transition: opacity 0.6s ease, transform 0.6s ease, box-shadow 0.4s ease, border-color 0.3s; }

        /* Autres styles du footer etc. (repris) */
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
        .marquee-container {
            width: 100%;
            overflow: hidden;
            white-space: nowrap;
            background-color: #1E90FF;
            padding: 0.5rem 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .marquee-text {
            display: inline-block;
            font-size: 1rem;
            font-weight: bold;
            color: #FFD700;
            animation: marquee 15s linear infinite;
        }
        @keyframes marquee {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
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
<body class="bg-white font-sans antialiased font-all-bold">

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

    <!-- Header Premium -->
    <header class="main-header" id="mainHeader">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between py-4 transition-all duration-400" id="headerContent">
                <!-- Logo -->
                <a href="{{ url('/') }}" class="flex-shrink-0">
                    <img src="{{ asset('image/ab.png') }}" alt="logo" class="logo-img hover:scale-110 transition-transform duration-300">
                </a>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex items-center space-x-1">
                    <a href="{{ url('/') }}" class="nav-link">Accueil</a>
                    <a href="{{ url('/#actions') }}" class="nav-link">Actions</a>
                    <a href="{{ url('/aPropos') }}" class="nav-link active">À propos</a>
                    <a href="{{ route('news') }}" class="nav-link">Actualités</a>
                    <a href="{{ route('branche') }}" class="nav-link">Événements</a>
                    <a href="{{ url('/dons') }}" class="ml-4 px-6 py-2 bg-primary text-white rounded-full text-sm font-bold hover:bg-blue-600 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">Dons</a>
                </nav>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button onclick="toggleMobileMenu()" class="p-2 text-gray-800 focus:outline-none" id="mobileMenuButton">
                        <svg id="menuOpenIcon" class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg id="menuCloseIcon" class="w-8 h-8 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Overlay -->
        <div id="mobileMenu" class="md:hidden fixed inset-0 top-[80px] bg-white z-50 mobile-menu hidden overflow-y-auto">
            <div class="flex flex-col p-6 space-y-4">
                <a href="{{ url('/') }}" class="text-xl border-b border-gray-100 pb-2">Accueil</a>
                <a href="{{ url('/#actions') }}" class="text-xl border-b border-gray-100 pb-2">Actions</a>
                <a href="{{ url('/aPropos') }}" class="text-xl border-b border-gray-100 pb-2 text-primary">À propos</a>
                <a href="{{ route('news') }}" class="text-xl border-b border-gray-100 pb-2">Actualités</a>
                <a href="{{ route('branche') }}" class="text-xl border-b border-gray-100 pb-2">Événements</a>
                <a href="{{ url('/dons') }}" class="mt-4 px-6 py-4 bg-primary text-white text-center rounded-xl font-bold">Faire un don</a>
            </div>
        </div>
    </header>

    <!-- Spacer to push content below fixed header -->
    <div class="h-[80px]"></div>

    <!-- ===== PAGE À PROPOS PREMIUM ===== -->
    <main class="about-section">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Hero de la page -->
            <div class="text-center mb-8">
                <p class="about-sub">Découvrez qui nous sommes</p>
                <h1 class="about-title">À propos <span>d'ABEC</span></h1>
            </div>

            <!-- Carte texte introductif (pleine largeur) -->
            <div class="about-text-card mb-12">
                <p class="text-lg leading-relaxed">
                    L'Association du Bien-Être Communautaire (ABEC) est une organisation internationale à but non lucratif, légalement reconnue et enregistrée auprès des institutions locales sous le numéro de déclaration <strong>00001901/RDA/J06/SAAJP/BAPP</strong>. 
                    Fondée par des jeunes visionnaires, elle rassemble des membres de plusieurs nationalités et place l'équité femmes-hommes au cœur de sa gouvernance.
                </p>
            </div>

            <!-- Section Mission (carte avec image) -->
            <div class="mb-16">
                <h2 class="about-title text-left text-2xl mb-6">Notre <span>Mission</span></h2>
                <div class="grid md:grid-cols-2 gap-8 items-center">
                    <div class="about-card !opacity-100 !transform-none" style="transition: none;">
                        <div class="about-img-wrap">
                            <img src="{{ asset('image/elev.png') }}" alt="Mission ABEC">
                            <span class="about-badge" style="background:rgba(30,144,255,0.7);">Mission</span>
                            <span class="about-icon">🎯</span>
                        </div>
                    </div>
                    <div class="about-text-card">
                        <p class="text-base">
                            Agir concrètement pour le bien-être des communautés vulnérables à travers le monde, en mettant l'accent sur la jeunesse, l'éducation, la santé, l'environnement et la justice sociale. Nous concevons et réalisons des projets innovants, durables et participatifs.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Section Nos Valeurs (cartes avec icônes) -->
            <div class="mb-16">
                <h2 class="about-title text-left text-2xl mb-6">Nos <span>Valeurs</span></h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Valeur 1 -->
                    <div class="value-card">
                        <div class="value-icon">🤝</div>
                        <h3>Solidarité</h3>
                        <p>Agir ensemble, sans laisser personne de côté.</p>
                    </div>
                    <!-- Valeur 2 -->
                    <div class="value-card">
                        <div class="value-icon">⚖️</div>
                        <h3>Équité</h3>
                        <p>Garantir les mêmes chances à toutes et tous.</p>
                    </div>
                    <!-- Valeur 3 -->
                    <div class="value-card">
                        <div class="value-icon">🌱</div>
                        <h3>Durabilité</h3>
                        <p>Construire un avenir viable pour les générations futures.</p>
                    </div>
                    <!-- Valeur 4 -->
                    <div class="value-card">
                        <div class="value-icon">🔍</div>
                        <h3>Transparence</h3>
                        <p>Rendre compte de nos actions et de nos ressources.</p>
                    </div>
                </div>
            </div>

            <!-- Section Notre Histoire (cartes avec images) -->
            <div class="mb-16">
                <h2 class="about-title text-left text-2xl mb-6">Notre <span>Histoire</span></h2>
                <div class="about-grid">
                    <!-- Carte 1 : Création -->
                    <div class="about-card" onclick="openModal('L\'ABEC a été fondée en 2021 par un groupe de jeunes engagés, conscients des défis sociaux et environnementaux. Dès sa création, l\'association a été officiellement déclarée sous le numéro 00001901/RDA/J06/SAAJP/BAPP, conformément à la loi camerounaise.','Création de l\'ABEC','{{ asset('image/ab.png') }}')">
                        <div class="about-img-wrap">
                            <img src="{{ asset('image/ab.png') }}" alt="Création">
                            <span class="about-badge" style="background:rgba(255,215,0,0.7);color:#000;">2021</span>
                            <span class="about-icon">📅</span>
                        </div>
                        <div class="about-body">
                            <h3>Création</h3>
                            <p>Fondée en 2021 par des jeunes visionnaires, l'ABEC naît d'une volonté de changement.</p>
                            <button class="about-btn">Lire →</button>
                        </div>
                    </div>
                    <!-- Carte 2 : Reconnaissance -->
                    <div class="about-card" onclick="openModal('Grâce à son sérieux et son professionnalisme, l\'ABEC a rapidement été reconnue par les autorités et a noué des partenariats avec des organisations locales et internationales.','Reconnaissance officielle','{{ asset('image/la paix.png') }}')">
                        <div class="about-img-wrap">
                            <img src="{{ asset('image/la paix.png') }}" alt="Reconnaissance">
                            <span class="about-badge" style="background:rgba(34,197,94,0.75);">Agrément</span>
                            <span class="about-icon">📜</span>
                        </div>
                        <div class="about-body">
                            <h3>Reconnaissance</h3>
                            <p>Enregistrement officiel et début des partenariats avec des organisations.</p>
                            <button class="about-btn">Lire →</button>
                        </div>
                    </div>
                    <!-- Carte 3 : Premières actions -->
                    <div class="about-card" onclick="openModal('Dès ses premiers mois, l\'ABEC a organisé des campagnes de sensibilisation, des distributions alimentaires et des ateliers éducatifs dans plusieurs quartiers de Yaoundé.','Premières actions','{{ asset('image/pont.png') }}')">
                        <div class="about-img-wrap">
                            <img src="{{ asset('image/pont.png') }}" alt="Premières actions">
                            <span class="about-badge" style="background:rgba(245,158,11,0.75);color:#000;">2022</span>
                            <span class="about-icon">🚀</span>
                        </div>
                        <div class="about-body">
                            <h3>Premières actions</h3>
                            <p>Campagnes de sensibilisation et distributions alimentaires.</p>
                            <button class="about-btn">Lire →</button>
                        </div>
                    </div>
                    <!-- Carte 4 : Rayonnement -->
                    <div class="about-card" onclick="openModal('Aujourd\'hui, l\'ABEC étend ses activités à plusieurs pays d\'Afrique et collabore avec un réseau d\'experts en droit, gestion de projet, communication et développement durable.','Rayonnement international','{{ asset('image/ge.png') }}')">
                        <div class="about-img-wrap">
                            <img src="{{ asset('image/ge.png') }}" alt="Rayonnement">
                            <span class="about-badge" style="background:rgba(30,144,255,0.7);">International</span>
                            <span class="about-icon">🌍</span>
                        </div>
                        <div class="about-body">
                            <h3>Rayonnement</h3>
                            <p>Des actions dans plusieurs pays et un réseau d'experts solide.</p>
                            <button class="about-btn">Lire →</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section Notre Équipe (membres clés) -->
            <div class="mb-16">
                <h2 class="about-title text-left text-2xl mb-6">Notre <span>Équipe</span></h2>
                <div class="about-grid">
                    <!-- Membre 1 -->
                    <div class="about-card">
                        <div class="about-img-wrap">
                            <img src="{{ asset('image/avatar1.jpg') }}" alt="Président">
                            <span class="about-badge" style="background:rgba(255,215,0,0.7);color:#000;">Président</span>
                        </div>
                        <div class="about-body">
                            <h3>Jean Mbarga</h3>
                            <p>Expert en développement communautaire, il coordonne les actions terrain.</p>
                        </div>
                    </div>
                    <!-- Membre 2 -->
                    <div class="about-card">
                        <div class="about-img-wrap">
                            <img src="{{ asset('image/avatar2.jpg') }}" alt="Secrétaire Générale">
                            <span class="about-badge" style="background:rgba(30,144,255,0.7);">SG</span>
                        </div>
                        <div class="about-body">
                            <h3>Fatima Diallo</h3>
                            <p>Juriste, elle assure la conformité légale et le suivi des projets.</p>
                        </div>
                    </div>
                    <!-- Membre 3 -->
                    <div class="about-card">
                        <div class="about-img-wrap">
                            <img src="{{ asset('image/avatar3.jpg') }}" alt="Trésorier">
                            <span class="about-badge" style="background:rgba(34,197,94,0.75);">Trésorier</span>
                        </div>
                        <div class="about-body">
                            <h3>Paul Ndombet</h3>
                            <p>Gestionnaire financier, il veille à la transparence des fonds.</p>
                        </div>
                    </div>
                    <!-- Membre 4 -->
                    <div class="about-card">
                        <div class="about-img-wrap">
                            <img src="{{ asset('image/avatar4.jpg') }}" alt="Chargée de communication">
                            <span class="about-badge" style="background:rgba(245,158,11,0.75);color:#000;">Com</span>
                        </div>
                        <div class="about-body">
                            <h3>Alice Ngo</h3>
                            <p>Responsable de la communication et des partenariats médias.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section Impact en chiffres -->
            <div class="mb-16">
                <h2 class="about-title text-left text-2xl mb-6">Notre <span>Impact</span></h2>
                <div class="stats-grid">
                    <div class="stat-item">
                        <div class="stat-number">+5000</div>
                        <div class="stat-label">Bénéficiaires directs</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">12</div>
                        <div class="stat-label">Projets réalisés</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">8</div>
                        <div class="stat-label">Pays d'intervention</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">+30</div>
                        <div class="stat-label">Partenaires</div>
                    </div>
                </div>
            </div>

            <!-- Section Vidéo -->
            <div class="mb-12">
                <h2 class="about-title text-left text-2xl mb-6">Ils parlent <span>de nous</span></h2>
                <div class="video-wrapper">
                    <video class="responsive-video" autoplay loop muted playsinline>
                        <source src="{{ asset('image/Orange.mp4') }}" type="video/mp4">
                        Votre navigateur ne supporte pas la vidéo.
                    </video>
                </div>
            </div>

            <!-- Citation ou phrase de clôture -->
            <div class="text-center py-8">
                <p class="text-yellow text-xl italic">"Agir ensemble pour un monde plus juste et solidaire."</p>
            </div>

        </div>
    </main>

    <!-- Footer identique à la page d'accueil -->
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
            <span class="marquee-text">Agir - Grandir - Changer</span>
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
                        Nous œuvrons depuis 2021 pour améliorer les conditions de vie des communautés vulnérables dans plusieurs Pays
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
                        <li><a href="{{ url('/') }}" class="footer-link text-gray-200 hover:text-yellow flex items-center"><span class="mr-2">→</span> Accueil</a></li>
                        <li><a href="{{ url('/about') }}" class="footer-link text-gray-200 hover:text-yellow flex items-center"><span class="mr-2">→</span> À propos</a></li>
                        <li><a href="{{ url('/news') }}" class="footer-link text-gray-200 hover:text-yellow flex items-center"><span class="mr-2">→</span> News</a></li>
                        <li><a href="{{ url('/dons') }}" class="footer-link text-gray-200 hover:text-yellow flex items-center"><span class="mr-2">→</span> Faire un don</a></li>
                        <li><a href="{{ url('/branche') }}" class="footer-link text-gray-200 hover:text-yellow flex items-center"><span class="mr-2">→</span> Événements</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-base font-bold mb-4 text-white border-b border-yellow pb-1">Contact</h3>
                    <div class="space-y-3 text-sm text-gray-200">
                        <div class="flex items-start">
                            <svg class="w-4 h-4 mt-1 mr-2 text-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <p>Yaoundé, Cameroun</p>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2 text-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            <p>+237 6 21 62 06 77 / +237 6 91 42 53 34</p>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2 text-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <a href="{{ url('/faq') }}" class="text-gray-200 hover:text-yellow">FAQ</a>
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
                        <a href="{{ route('mention') }}" class="text-gray-300 hover:text-yellow">Mentions légales</a>
                        <a href="{{ route('politique') }}" class="text-gray-300 hover:text-yellow">Politique de confidentialité</a>
                        <a href="{{ route('copitt') }}" class="text-gray-300 hover:text-yellow">Conditions d'utilisation</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="absolute top-0 right-0 w-24 h-24 bg-yellow rounded-full opacity-10 -translate-y-1/2 translate-x-1/2"></div>
        <div class="absolute bottom-0 left-0 w-16 h-16 bg-white rounded-full opacity-5 -translate-y-1/2 -translate-x-1/2"></div>
    </footer>

    <!-- Scripts -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        // Fonctions modale
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
        }
        function closeModal() {
            const modal = document.getElementById('modal');
            modal.classList.remove('show');
        }
        document.getElementById('modal').addEventListener('click', function(e) {
            if (e.target === this) closeModal();
        });

        // Mobile menu
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
        }

        // Loader
        window.addEventListener('load', () => {
            const loading = document.getElementById('loading');
            setTimeout(() => {
                loading.classList.add('loading-hidden');
                setTimeout(() => loading.style.display = 'none', 700);
            }, 800);
        });

        // Intersection Observer pour animations
        document.addEventListener('DOMContentLoaded', () => {
            const header = document.getElementById('mainHeader');
            
            // Scroll Effects
            window.addEventListener('scroll', () => {
                if (window.scrollY > 50) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            });

            const elements = document.querySelectorAll('.section-animate, .about-card, footer a, footer p');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible', 'in-view');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1 });
            elements.forEach(el => observer.observe(el));
        });
    </script>
</body>
</html>