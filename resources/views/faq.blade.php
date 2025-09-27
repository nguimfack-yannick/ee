<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Organisation du Bien-Être Communautaire</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Arial+Black&display=swap" rel="stylesheet">
    <style>
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

        .faq-question {
            cursor: pointer;
            transition: background-color 0.3s ease;
            padding: 1rem;
            border-radius: 0.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .faq-question:hover {
            background-color: #f0f9ff;
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease, padding 0.4s ease;
            padding: 0 1rem;
            color: #4b5563;
        }

        .faq-answer.open {
            max-height: 500px;
            padding: 1rem;
        }

        .faq-item {
            background: white;
            border-radius: 0.75rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            margin-bottom: 1rem;
            transition: box-shadow 0.3s ease;
        }

        .faq-item:hover {
            box-shadow: 0 6px 12px -2px rgba(0, 0, 0, 0.15);
        }

        .rotate-icon {
            transform: rotate(0deg);
            transition: transform 0.3s ease;
        }

        .rotate-icon.open {
            transform: rotate(180deg);
        }

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

        /* Loading Spinner Styles (harmonisé avec le premier document) */
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
            width: 60px;
            height: 60px;
            object-fit: contain;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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
                width: 48px;
                height: 48px;
            }
        }

        [x-cloak] {
            display: none;
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

<body x-data="{ mobileMenuOpen: false, isLoading: true }" class="bg-white font-sans antialiased font-all-bold" @load.window="setTimeout(() => isLoading = false, 2000)">
    <!-- Loading Spinner -->
    <div x-show="isLoading" x-cloak class="loading-overlay">
        <div class="spinner-container">
            <div class="spinner-circle"></div>
            <img src="{{ asset('image/ab.png') }}" alt="Logo ABEC" class="spinner-logo transition-transform duration-300 hover:scale-105">
        </div>
    </div>

    <!-- Top Bar -->
    <nav class="bg-primary text-white top-bar">
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
                <a href="mailto:globaluniversalwelfare@gmail.com" target="_blank" class="hover:opacity-80 transition-opacity duration-300" title="Envoyer un email">
                    <img src="{{ asset('image/m.jpg') }}" alt="Email" class="w-6 h-6 rounded-full">
                </a>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="bg-white shadow py-3 main-header">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="logo-container flex-shrink-0 flex justify-center items-center">
                    <img src="{{ asset('image/ab.png') }}" alt="logo" class="transition-transform duration-300 hover:scale-105 h-12 w-auto">
                </div>
                <nav class="hidden md:flex space-x-3">
                    <a href="{{ route('welcome') }}" class="px-2 py-1 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white transition-all duration-300">Accueil</a>
                    <a href="#actions" class="px-2 py-1 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white transition-all duration-300">Nos Actions</a>
                    <a href="#about" class="px-2 py-1 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white transition-all duration-300">À propos</a>
                    <a href="{{ route('news') }}" class="px-2 py-1 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white transition-all duration-300">News</a>
                    <a href="#contact" class="px-2 py-1 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white transition-all duration-300">Contact</a>
                    <a href="{{ route('dons') }}" class="px-2 py-1 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white transition-all duration-300">Dons</a>
                    <a href="{{ route('branche') }}" class="px-2 py-1 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white transition-all duration-300">Événements</a>
                </nav>
                <div class="md:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-500 focus:outline-none transition-transform duration-300">
                        <svg x-show="!mobileMenuOpen" x-cloak class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg x-show="mobileMenuOpen" x-cloak class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
            <div x-show="mobileMenuOpen" x-cloak class="md:hidden px-2 pt-2 pb-3 space-y-1 mobile-menu">
                <a href="{{ route('welcome') }}" class="block px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white transition-all duration-300">Accueil</a>
                <a href="#about" class="block px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white transition-all duration-300">À propos</a>
                <a href="#actions" class="block px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white transition-all duration-300">Nos Actions</a>
                <a href="{{ route('news') }}" class="block px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white transition-all duration-300">News</a>
                <a href="#contact" class="block px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white transition-all duration-300">Contact</a>
                <a href="{{ route('dons') }}" class="block px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white transition-all duration-300">Dons</a>
                <a href="{{ route('branche') }}" class="block px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white transition-all duration-300">Événements</a>
            </div>
        </div>
    </header>

    <!-- Section FAQ -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold section-title">FAQ – Questions Fréquemment Posées</h2>
            <p class="mt-4 text-sm sm:text-base font-bold text-gray-700 leading-relaxed">
                Trouvez des réponses claires et précises aux questions les plus courantes sur l'ABEC.
            </p>

            <div class="mt-8 space-y-4 text-left">
                <!-- FAQ Item 1 -->
                <div class="faq-item">
                    <h3 class="faq-question text-base font-bold text-primary">
                        Qu'est-ce que l'ABEC ?
                        <svg class="w-5 h-5 rotate-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </h3>
                    <div class="faq-answer">
                        L'Association du Bien-Être Communautaire (ABEC) est une organisation internationale à but non lucratif, légalement reconnue au Cameroun sous le numéro de déclaration 00001901/RDA/J06/SAAJP/BAPP. Nous œuvrons pour le bien-être des communautés à travers des programmes concrets dans les domaines de la jeunesse, de l'environnement, des droits humains, de la santé, de la paix et du développement durable.
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="faq-item">
                    <h3 class="faq-question text-base font-bold text-primary">
                        Comment puis-je faire un don ?
                        <svg class="w-5 h-5 rotate-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </h3>
                    <div class="faq-answer">
                        Vous pouvez faire un don en toute sécurité via notre page Dons. Nous acceptons les virements bancaires, mobile money et autres méthodes locales. Chaque contribution, quelle que soit sa taille, soutient directement nos actions sur le terrain.
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="faq-item">
                    <h3 class="faq-question text-base font-bold text-primary">
                        Quelles sont vos principales actions ?
                        <svg class="w-5 h-5 rotate-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </h3>
                    <div class="faq-answer">
                        Nos actions incluent : sensibilisation environnementale, campagnes de santé, promotion des droits de la femme et de l'enfant, éducation civique, projets culturels, initiatives panafricaines, et accompagnement des jeunes entrepreneurs. Nous croyons au changement par l'action locale.
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="faq-item">
                    <h3 class="faq-question text-base font-bold text-primary">
                        Comment puis-je contacter l'ABEC ?
                        <svg class="w-5 h-5 rotate-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </h3>
                    <div class="faq-answer">
                        Vous pouvez nous joindre :
                        <ul class="list-disc pl-5 mt-2 space-y-1">
                            <li><strong>Email :</strong> <a href="mailto:globaluniversalwelfare@gmail.com">globaluniversalwelfare@gmail.com</a></li>
                            <li><strong>Téléphone :</strong> +237 6 21 62 06 77</li>
                            <li><strong>Réseaux sociaux :</strong> Facebook, WhatsApp, Instagram (liens dans le header)</li>
                        </ul>
                    </div>
                </div>

                <!-- FAQ Item 5 -->
                <div class="faq-item">
                    <h3 class="faq-question text-base font-bold text-primary">
                        L'ABEC est-elle une ONG reconnue ?
                        <svg class="w-5 h-5 rotate-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </h3>
                    <div class="faq-answer">
                        Oui. L'ABEC est officiellement enregistrée au Cameroun conformément à la <strong>Loi n°99/014 du 22 décembre 1999</strong> régissant les ONG et à la <strong>Loi n°90/053 du 19 décembre 1990</strong> sur la liberté d'association. Nous sommes donc une organisation légale, transparente et engagée.
                    </div>
                </div>

                <!-- FAQ Item 6 -->
                <div class="faq-item">
                    <h3 class="faq-question text-base font-bold text-primary">
                        Puis-je devenir bénévole ?
                        <svg class="w-5 h-5 rotate-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </h3>
                    <div class="faq-answer">
                        Absolument ! Nous accueillons avec joie les bénévoles passionnés par notre mission. Envoyez-nous un message via nos contacts ou remplissez le formulaire sur notre page Contact. Ensemble, agissons pour un monde meilleur.
                    </div>
                </div>
            </div>
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
            <span class="marquee-text">Grandir - Agir - Changer</span>
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
                <div>
                    <h3 class="text-base font-bold mb-4 text-white border-b border-yellow pb-1">Liens Rapides</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('welcome') }}" class="footer-link text-gray-200 hover:text-yellow flex items-center transition-all duration-300"><span class="mr-2">→</span> Accueil</a></li>
                        <li><a href="#about" class="footer-link text-gray-200 hover:text-yellow flex items-center transition-all duration-300"><span class="mr-2">→</span> À propos</a></li>
                        <li><a href="{{ route('news') }}" class="footer-link text-gray-200 hover:text-yellow flex items-center transition-all duration-300"><span class="mr-2">→</span> News</a></li>
                        <li><a href="{{ route('dons') }}" class="footer-link text-gray-200 hover:text-yellow flex items-center transition-all duration-300"><span class="mr-2">→</span> Faire un don</a></li>
                        <li><a href="{{ route('branche') }}" class="footer-link text-gray-200 hover:text-yellow flex items-center transition-all duration-300"><span class="mr-2">→</span> Événements</a></li>
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
                            <a href="{{ route('faq') }}" class="text-gray-200 hover:text-yellow transition-all duration-300">FAQ</a>
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
                    <a href="{{ route('dons') }}" class="inline-block bg-yellow text-primary font-bold py-2 px-4 rounded-md hover:bg-opacity-90 transform hover:scale-105 transition-all duration-300 shadow-md">
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

    <script>
        // Toggle FAQ answers
        document.querySelectorAll('.faq-question').forEach(question => {
            question.addEventListener('click', () => {
                const answer = question.nextElementSibling;
                const icon = question.querySelector('.rotate-icon');
                answer.classList.toggle('open');
                icon.classList.toggle('open');
            });
        });
    </script>
</body>

</html>