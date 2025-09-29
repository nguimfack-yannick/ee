@extends('layouts.app')

@section('content')
<head>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Police Arial Black -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Arial+Black&display=swap');

        /* Global styles */
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

        /* Loading Spinner - couvre toute la page */
        #page-loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            opacity: 1;
            transition: opacity 0.6s ease-out, visibility 0.6s ease-out;
            visibility: visible;
        }

        #page-loading.hidden {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }

        .spinner-container {
            position: relative;
            width: 80px;
            height: 80px;
        }

        .spinner-circle {
            position: absolute;
            width: 100%;
            height: 100%;
            border: 4px solid transparent;
            border-top-color: #1E90FF;
            border-radius: 50%;
            animation: spin 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
        }

        .spinner-logo {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 48px;
            height: 48px;
            object-fit: contain;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
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
            max-height: 35vh; /* Augmenté pour refléter les images plus grandes */
            object-fit: cover;
            object-position: center; /* Centre l'image */
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

        /* Grid - 1 colonne mobile, 2 tablette, 3 desktop */
        .articles-grid {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            gap: 1rem; /* Réduit pour mobile */
            padding: 1.5rem 0; /* Augmenté pour un meilleur espacement vertical */
        }

        @media (min-width: 640px) {
            .articles-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 1.5rem; /* Espacement normal pour tablette/desktop */
            }
        }

        @media (min-width: 1024px) {
            .articles-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        /* Cards */
        .article-card {
            background-color: #FFF8DC;
            position: relative;
            overflow: hidden;
            border-radius: 0.5rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12); /* Ombre renforcée */
            transition: transform 0.5s ease, box-shadow 0.5s ease, opacity 0.5s ease;
            opacity: 0;
            transform: translateY(50px);
            cursor: pointer;
        }

        .article-card.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .article-card::before {
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

        .article-card:hover::before {
            left: 100%;
        }

        .article-card::after {
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

        .article-card:hover::after {
            width: 100%;
        }

        .article-card:hover {
            transform: scale(1.05);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
        }

        .article-image {
            width: 100%;
            height: 250px; /* Augmenté de 200px à 250px pour desktop */
            object-fit: cover;
            object-position: center; /* Centre l'image */
            border-radius: 0.5rem 0.5rem 0 0;
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        /* Désactiver l'effet de zoom sur mobile */
        @media (min-width: 640px) {
            .article-card:hover .article-image {
                transform: scale(1.05);
                opacity: 0.9;
            }
        }

        .article-body {
            padding: 1.25rem; /* Augmenté de 1rem à 1.25rem */
            position: relative;
            z-index: 5;
        }

        .article-title {
            font-size: clamp(1.1rem, 2.5vw, 1.3rem); /* Augmenté */
            color: #1E90FF !important;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            margin-bottom: 0.5rem;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .article-content {
            font-size: clamp(0.85rem, 2vw, 0.95rem); /* Augmenté */
            color: #333333;
            line-height: 1.6;
            margin-top: 0.5rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .article-meta {
            font-size: clamp(0.8rem, 2vw, 0.85rem); /* Augmenté */
            color: #6b7280;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .article-meta::before {
            content: "📰";
            font-size: 0.9em;
        }

        /* Buttons */
        .article-button {
            color: #000000;
            background-color: #FFD700;
            border: 1px solid #FFD700;
            padding: 0.5rem 1rem;
            font-size: clamp(0.85rem, 2vw, 0.95rem); /* Augmenté */
            font-weight: bold;
            border-radius: 0.25rem;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            width: fit-content;
            margin: 0.5rem auto 0;
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            z-index: 10;
        }

        .article-button:hover {
            background-color: #DAA520;
            color: #ffffff;
            transform: scale(1.05);
        }

        .btn-more {
            display: inline-block;
            background: linear-gradient(135deg, #FFD700, #FFA500);
            color: #000000;
            padding: 12px 30px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 215, 0, 0.3);
            position: relative;
            overflow: hidden;
        }

        .btn-more::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn-more:hover::before {
            left: 100%;
        }

        .btn-more:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 215, 0, 0.4);
            background: linear-gradient(135deg, #DAA520, #FFD700);
            color: #ffffff;
        }

        .btn-more:active {
            transform: translateY(0);
            box-shadow: 0 2px 10px rgba(255, 215, 0, 0.3);
        }

        /* Section Title */
        .section-title {
            text-transform: uppercase;
            color: #1E90FF;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            position: relative;
            display: inline-block;
            font-size: clamp(1.5rem, 4vw, 2.5rem);
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

        /* Responsive */
        @media (max-width: 480px) {
            .article-image {
                height: 140px; /* Augmenté de 120px à 140px pour très petits écrans */
            }
            .article-title { font-size: clamp(0.9rem, 2.5vw, 1.1rem); }
            .article-content { font-size: clamp(0.75rem, 1.8vw, 0.85rem); }
            .article-meta { font-size: clamp(0.7rem, 1.8vw, 0.75rem); }
            .article-button { padding: 0.4rem 0.8rem; font-size: clamp(0.75rem, 1.8vw, 0.85rem); }
            .btn-more { padding: 10px 20px; font-size: 0.9rem; }
            .modal-image { max-height: 25vh; }
            .modal-content { max-width: 98%; }
        }

        @media (max-width: 640px) and (min-width: 481px) {
            .article-image {
                height: 160px; /* Augmenté de 140px à 160px pour mobile */
            }
            .article-title { font-size: clamp(0.9rem, 2.5vw, 1.1rem); }
            .article-content { font-size: clamp(0.75rem, 1.8vw, 0.85rem); }
            .article-meta { font-size: clamp(0.7rem, 1.8vw, 0.75rem); }
            .article-button { padding: 0.4rem 0.8rem; font-size: clamp(0.75rem, 1.8vw, 0.85rem); }
            .btn-more { padding: 10px 20px; font-size: 0.9rem; }
            .modal-image { max-height: 25vh; }
            .modal-content { max-width: 98%; }
        }

        @media (min-width: 641px) and (max-width: 1023px) {
            .article-image {
                height: 200px; /* Augmenté de 160px à 200px pour tablette */
            }
            .article-title { font-size: clamp(1rem, 2.5vw, 1.2rem); }
            .article-content { font-size: clamp(0.8rem, 2vw, 0.9rem); }
            .article-meta { font-size: clamp(0.75rem, 2vw, 0.8rem); }
            .modal-image { max-height: 30vh; }
            .modal-content { max-width: 90%; }
        }

        @media (min-width: 1024px) {
            .article-image { height: 250px; } /* Déjà défini dans .article-image */
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

<!-- LOADING SPINNER GLOBAL -->
<div id="page-loading">
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
        <p class="text-sm text-gray-600" id="modalContent"></p>
        <svg class="modal-close" onclick="closeModal()" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
    </div>
</div>

<?php
$newsConfig = [
    'sectionTitle' => 'Actualités',
    'sectionSubtitle' => 'Voici ce qu’il faut retenir de l’actualité récente.',
    'moreButtonText' => 'Voir plus d\'actualités',
    'moreButtonLink' => '#grille-section',
    'articles' => [
        [
            'title' => '📰 L’Association du Bien-Être Communautaire (ABEC) lance un appel aux bénévoles volontaires',
            'content' => 'En août 2024, l’ABEC a lancé un appel à toute personne prête à s’impliquer activement dans la vie de l’organisation. Cette campagne de mobilisation vise à recruter des bénévoles motivés, disponibles et capables de travailler en équipe, que ce soit à distance ou en présentiel.',
            'fullContent' => 'En août 2024, l’ABEC a lancé un appel à toute personne prête à s’impliquer activement dans la vie de l’organisation. Cette campagne de mobilisation vise à recruter des bénévoles motivés, disponibles et capables de travailler en équipe, que ce soit à distance ou en présentiel. L’association recherche des profils multilingues (français, anglais), prêts à consacrer du temps et de l’énergie pour renforcer l’impact de ses activités dans le monde. Les missions peuvent inclure la communication, l’organisation d’événements, la production de contenu, ou encore la participation à des projets sociaux. 🎯 Les places sont limitées. 📩 Contact : contact@universalwelfare.org 📱 WhatsApp : +237 6 21620677',
            'image' => 'image/appl.jpg',
            'date' => '31/08/2025'
        ],
        [
            'title' => '📰 L’association "Du bien-être communautaire" en action à l’hôpital régional de Bafoussam',
            'content' => 'Le 20 mars 2025, l’association Du bien-être communautaire a effectué une descente à l’hôpital régional de Bafoussam, dans le cadre de ses activités sociales. Cette initiative visait à apporter du soutien moral, matériel et sanitaire aux patients hospitalisés, en particulier ceux en situation de précarité.',
            'fullContent' => 'Le 20 mars 2025, l’association Du bien-être communautaire a effectué une descente à l’hôpital régional de Bafoussam, dans le cadre de ses activités sociales. Cette initiative visait à apporter du soutien moral, matériel et sanitaire aux patients hospitalisés, en particulier ceux en situation de précarité. L’équipe de l’association a distribué des dons, échangé avec le personnel soignant et sensibilisé sur l’importance du bien-être mental dans le processus de guérison. Une action saluée tant par les bénéficiaires que par l’administration de l’hôpital, qui appelle à la multiplication de ce type de gestes solidaires dans les structures de santé.',
            'image' => 'image/news.png',
            'date' => '27/03/2025'
        ],
        [
            'title' => '📄 Reconnaissance officielle de l’ABEC',
            'content' => 'L’Association du Bien-Être Communautaire (ABEC) est officiellement reconnue par les autorités administratives camerounaises. Son récépissé de déclaration a été délivré sous le n°00001901/RDA/J06/SAAJP/BAPP en date du 20 novembre 2024, par le Préfet du Département du Mfoundi, région du Centre, Cameroun.',
            'fullContent' => 'L’Association du Bien-Être Communautaire (ABEC) est officiellement reconnue par les autorités administratives camerounaises. Son récépissé de déclaration a été délivré sous le n°00001901/RDA/J06/SAAJP/BAPP en date du 20 novembre 2024, par le Préfet du Département du Mfoundi, région du Centre, Cameroun. Cette reconnaissance légale renforce la crédibilité de l’organisation et témoigne de son engagement dans la mise en œuvre d’actions sociales et humanitaires durables. 📌 Pour toute collaboration ou demande d\'information : 📞 +237 6 21620677 📧 contact@universalwelfare.org',
            'image' => 'image/teste.jpg',
            'date' => '20/11/2024'
        ],
    ]
];
?>

<div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8 relative">
    <div class="text-center">
        <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold section-title">{{ $newsConfig['sectionTitle'] }}</h2>
        <p class="text-center text-gray-600 mb-8 font-bold mt-4">
            {{ $newsConfig['sectionSubtitle'] }}
        </p>
    </div>

    <!-- Grille d'articles -->
    <div class="articles-grid" id="grille-section">
        @foreach($newsConfig['articles'] as $index => $article)
            <div class="article-card cursor-pointer">
                <img src="{{ asset($article['image']) }}" alt="Actualité ABEC" class="article-image" loading="lazy">
                <div class="article-body">
                    <h2 class="article-title">{{ $article['title'] }}</h2>
                    <p class="article-content">{{ $article['content'] }}</p>
                    <div class="article-meta">
                        Publié le {{ $article['date'] }}
                    </div>
                    <button onclick="openModal(
                        `{{ str_replace(["\r", "\n"], ' ', addslashes($article['fullContent'])) }}`,
                        `{{ addslashes($article['title']) }}`,
                        `{{ asset($article['image']) }}`
                    )" class="article-button">Voir plus</button>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Bouton Voir Plus -->
    <div class="text-center mt-10">
        <a href="{{ $newsConfig['moreButtonLink'] }}" class="btn-more">
            {{ $newsConfig['moreButtonText'] }}
        </a>
    </div>
</div>

<script>
function openModal(content, title, imageSrc) {
    const modal = document.getElementById('modal');
    const modalContent = document.getElementById('modalContent');
    const modalTitle = document.getElementById('modalTitle');
    const modalImage = document.getElementById('modalImage');
    
    modalContent.innerHTML = content.replace(/\n/g, '<br>');
    modalTitle.textContent = title;
    modalImage.src = imageSrc;
    modalImage.alt = title;
    modal.classList.add('show');
}

function closeModal() {
    document.getElementById('modal').classList.remove('show');
}

document.addEventListener('DOMContentLoaded', () => {
    const loadingScreen = document.getElementById('page-loading');
    const cards = document.querySelectorAll('.article-card');

    // Masquer le loader après chargement complet + délai doux
    window.addEventListener('load', () => {
        setTimeout(() => {
            loadingScreen.classList.add('hidden');
        }, 600);
    });

    // Animation au scroll
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    cards.forEach(card => observer.observe(card));

    // Fermer modal avec Échap
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeModal();
    });

    // Fermer modal en cliquant à l'extérieur
    document.getElementById('modal').addEventListener('click', (e) => {
        if (e.target === e.currentTarget) closeModal();
    });
});
</script>
@endsection