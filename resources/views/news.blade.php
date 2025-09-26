@extends('layouts.app')

@section('content')
<head>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Police Arial Black -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Arial+Black&display=swap');

        /* Global styles from first document */
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

        /* Loading Spinner Styles from first document */
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

        #loading.hidden {
            opacity: 0;
            pointer-events: none;
        }

        .spinner-container {
            position: relative;
            width: 60px;
            height: 60px;
        }

        .spinner-circle {
            position: absolute;
            width: 100%;
            height: 100%;
            border: 4px solid transparent;
            border-top-color: #1E90FF; /* primary color */
            border-radius: 50%;
            animation: spin 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
        }

        .spinner-logo {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 32px;
            height: 32px;
            object-fit: contain;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Modal Styles from first document */
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

        /* Grid Container from first document (Nos Actions) */
        .articles-grid {
            display: grid;
            grid-template-columns: repeat(1, 1fr); /* Mobile: 1 column */
            gap: 1rem;
        }

        @media (min-width: 640px) {
            .articles-grid {
                grid-template-columns: repeat(2, 1fr); /* Tablet: 2 columns */
            }
        }

        @media (min-width: 1024px) {
            .articles-grid {
                grid-template-columns: repeat(4, 1fr); /* Desktop: 4 columns */
            }
        }

        /* Article Card Styles from first document (action-card) */
        .article-card {
            background-color: #FFF8DC;
            position: relative;
            overflow: hidden;
            border-radius: 0.5rem;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.06);
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
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
        }

        .article-image {
            width: 100%;
            height: 120px;
            object-fit: cover;
            border-radius: 0.5rem;
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        .article-card:hover .article-image {
            transform: scale(1.05);
            opacity: 0.9;
        }

        .article-body {
            padding: 0.75rem;
            position: relative;
            z-index: 5;
        }

        .article-title {
            font-size: clamp(0.875rem, 2.5vw, 1rem);
            color: #1E90FF !important; /* Force la couleur bleue avec !important */
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            margin-bottom: 0.5rem;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            transition: none; /* Supprime toute transition de couleur */
        }

        /* SUPPRESSION COMPLÈTE DU CHANGEMENT DE COULEUR AU HOVER */
        .article-card:hover .article-title {
            color: #1E90FF !important; /* Garde toujours la couleur bleue */
        }

        .article-content {
            font-size: clamp(0.75rem, 2vw, 0.875rem);
            color: #333333;
            line-height: 1.6;
            margin-top: 0.5rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .article-meta {
            font-size: 0.75rem;
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

        /* Button styles - COULEUR OR */
        .article-button {
            color: #000000;
            background-color: #FFD700;
            border: 1px solid #FFD700;
            padding: 0.5rem 1rem;
            font-size: 0.75rem;
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

        /* Bouton "Voir plus d'actualités" - COULEUR OR */
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

        /* Section Title from first document */
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

        /* Stagger animation for cards from first document */
        .article-card:nth-child(1).visible { transition-delay: 0.1s; }
        .article-card:nth-child(2).visible { transition-delay: 0.2s; }
        .article-card:nth-child(3).visible { transition-delay: 0.3s; }
        .article-card:nth-child(4).visible { transition-delay: 0.4s; }

        /* Responsive adjustments from first document */
        @media (max-width: 640px) {
            .article-image {
                height: 100px;
            }
            .article-title {
                font-size: clamp(0.75rem, 2vw, 0.875rem);
            }
            .article-content {
                font-size: clamp(0.7rem, 1.8vw, 0.8rem);
            }
            .article-button {
                padding: 0.4rem 0.8rem;
                font-size: 0.7rem;
            }
            .btn-more {
                padding: 10px 20px;
                font-size: 0.9rem;
            }
        }

        @media (min-width: 641px) and (max-width: 1023px) {
            .article-image {
                height: 130px;
            }
            .article-title {
                font-size: clamp(0.875rem, 2.5vw, 1rem);
            }
        }

        @media (min-width: 1024px) {
            .article-image {
                height: 150px;
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

<!-- LOADING SPINNER -->
<div id="loading" class="fixed inset-0 z-50">
    <div class="spinner-container">
        <div class="spinner-circle"></div>
        <img src="{{ asset('image/ab.png') }}" alt="Logo ABEC" class="spinner-logo w-12 h-12">
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
// CONFIGURATION FACILE - MODIFIEZ ICI VOS TEXTES ET IMAGES
$newsConfig = [
    'sectionTitle' => 'Actualités',
    'sectionSubtitle' => 'Découvrez ce qui se passe chez nous actuellement.',
    'moreButtonText' => 'Voir plus d\'actualités',
    'moreButtonLink' => '#grille-section', // Lien vers la section grille
    'articles' => [
        [
            'title' => 'Nouvelle école construite à Douala grâce à vos dons',
            'content' => 'L\'ONG ABEC continue son engagement sur le terrain avec des actions concrètes pour améliorer les conditions de vie des populations locales. Grâce à votre soutien, nous avons pu réaliser cette initiative qui impacte directement la vie de centaines de bénéficiaires.',
            'fullContent' => 'L\'ONG ABEC continue son engagement sur le terrain avec des actions concrètes pour améliorer les conditions de vie des populations locales. Grâce à votre soutien, nous avons pu réaliser cette initiative qui impacte directement la vie de centaines de bénéficiaires. Cette action s\'inscrit dans notre mission de développement durable et d\'amélioration des conditions de vie des communautés les plus vulnérables. Nous remercions tous nos partenaires et donateurs qui rendent ces projets possibles.',
            'image' => 'image/news.png',
            'date' => '15/12/2024'
        ],
        [
            'title' => 'Campagne de vaccination dans les quartiers défavorisés',
            'content' => 'Une grande campagne de vaccination a été organisée dans plusieurs quartiers de la ville. Cette initiative vise à protéger les populations les plus vulnérables contre diverses maladies.',
            'fullContent' => 'Une grande campagne de vaccination a été organisée dans plusieurs quartiers de la ville. Cette initiative vise à protéger les populations les plus vulnérables contre diverses maladies. Plus de 500 personnes ont déjà bénéficié de cette campagne gratuite organisée en partenariat avec le ministère de la santé.',
            'image' => 'image/appl.jpg',
            'date' => '10/12/2024'
        ],
        [
            'title' => 'Formation professionnelle pour 50 jeunes à Yaoundé',
            'content' => 'Un programme de formation professionnelle a été lancé pour donner aux jeunes les compétences nécessaires pour intégrer le marché du travail.',
            'fullContent' => 'Un programme de formation professionnelle a été lancé pour donner aux jeunes les compétences nécessaires pour intégrer le marché du travail. Cette formation de 6 mois couvre plusieurs domaines : informatique, couture, mécanique et agriculture. Les participants recevront un certificat reconnu par l\'État.',
            'image' => 'image/news.png',
            'date' => '05/12/2024'
        ],
        [
            'title' => 'Distribution de kits scolaires aux enfants défavorisés',
            'content' => 'Plus de 200 kits scolaires ont été distribués aux enfants des familles les plus démunies pour faciliter leur retour à l\'école.',
            'fullContent' => 'Plus de 200 kits scolaires ont été distribués aux enfants des familles les plus démunies pour faciliter leur retour à l\'école. Chaque kit contient des cahiers, stylos, crayons, règles et un sac d\'école. Cette action s\'inscrit dans notre programme d\'aide à la scolarisation des enfants vulnérables.',
            'image' => 'image/appl.jpg',
            'date' => '01/12/2024'
        ]
    ]
];
?>

<div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8 relative section-animate">
    <div class="text-center">
        <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold section-title">{{ $newsConfig['sectionTitle'] }}</h2>
        <!-- ESPACEMENT AJOUTÉ ENTRE LE TITRE ET LE SOUS-TITRE -->
        <p class="text-center text-gray-600 mb-10 font-bold mt-6">
            {{ $newsConfig['sectionSubtitle'] }}
        </p>
    </div>

    <!-- Overlay -->
    <div id="overlay" class="overlay"></div>

    <!-- Grille d'articles -->
    <div class="articles-grid" id="grille-section">
        @foreach($newsConfig['articles'] as $index => $article)
            <div class="article-card cursor-pointer">
                <img src="{{ asset($article['image']) }}" alt="Actualité ABEC" class="article-image">
                <div class="article-body">
                    <h2 class="article-title">{{ $article['title'] }}</h2>
                    <p class="article-content">{{ $article['content'] }}</p>
                    <div class="article-meta">
                        Publié le {{ $article['date'] }}
                    </div>
                    <button onclick="openModal(
                        '{{ addslashes($article['fullContent']) }}',
                        '{{ addslashes($article['title']) }}',
                        '{{ asset($article['image']) }}'
                    )" class="article-button">Voir plus</button>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Bouton Voir Plus -->
    <div class="text-center mt-12">
        <a href="{{ $newsConfig['moreButtonLink'] }}" class="btn-more">
            {{ $newsConfig['moreButtonText'] }}
        </a>
    </div>
</div>

<script>
// Fonction globale pour ouvrir la modal
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
    
    console.log('Modal opened', { content, title, imageSrc });
}

// Fonction globale pour fermer la modal
function closeModal() {
    const modal = document.getElementById('modal');
    modal.classList.remove('show');
    console.log('Modal closed');
}

document.addEventListener('DOMContentLoaded', () => {
    const articles = document.querySelectorAll('.article-card');
    const overlay = document.getElementById('overlay');
    const loading = document.getElementById('loading');
    const elements = document.querySelectorAll('.section-animate, .article-card');

    // Masquer le loader après chargement
    window.addEventListener('load', () => {
        console.log('Page fully loaded, hiding spinner');
        setTimeout(() => {
            loading.classList.add('hidden');
            setTimeout(() => loading.style.display = 'none', 700);
        }, 800);
    });

    // Gestion des clics sur les articles (éviter les conflits avec les boutons)
    articles.forEach(article => {
        article.addEventListener('click', (e) => {
            // Éviter que le clic sur le bouton "Voir plus" déclenche l'expansion
            if (e.target.classList.contains('article-button') || e.target.closest('.article-button')) {
                e.stopPropagation();
                return;
            }
            
            const isExpanded = article.classList.contains('expanded');

            // Fermer les autres articles
            articles.forEach(a => {
                if (a !== article) a.classList.remove('expanded');
            });

            // Toggle l'article courant
            article.classList.toggle('expanded', !isExpanded);
            overlay.classList.toggle('active', !isExpanded);

            // Scroll doux vers l'article
            if (!isExpanded) {
                article.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }
        });
    });

    // Fermer en cliquant sur l'overlay
    overlay.addEventListener('click', () => {
        articles.forEach(a => a.classList.remove('expanded'));
        overlay.classList.remove('active');
    });

    // Fermer avec la touche Échap
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            articles.forEach(a => a.classList.remove('expanded'));
            overlay.classList.remove('active');
            closeModal();
        }
    });

    // Fermer la modal en cliquant à l'extérieur
    document.getElementById('modal').addEventListener('click', (e) => {
        if (e.target.id === 'modal') {
            closeModal();
        }
    });

    // IntersectionObserver pour animations
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
@endsection
