@extends('layouts.app')

@section('content')
<style>
    /* ===== GLOBAL ===== */
    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    /* ===== LOADING SPINNER ===== */
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
        transition: opacity 0.5s ease-out;
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
        border: 3px solid transparent;
        border-top-color: #2563EB;
        border-radius: 50%;
        animation: spin 1s linear infinite;
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

    /* ===== GRID CONTAINER ===== */
    .articles-grid {
        display: grid;
        grid-template-columns: repeat(1, 1fr); /* Mobile */
        gap: 1.5rem;
    }

    @media (min-width: 640px) {
        .articles-grid {
            grid-template-columns: repeat(2, 1fr); /* Tablet */
        }
    }

    @media (min-width: 1024px) {
        .articles-grid {
            grid-template-columns: repeat(3, 1fr); /* Desktop */
        }
    }

    /* ===== ARTICLE CARD ===== */
    .article-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 3px 12px rgba(0,0,0,0.06);
        transition: all 0.35s cubic-bezier(0.25, 0.8, 0.25, 1);
        cursor: pointer;
        position: relative;
        z-index: 10;
    }

    /* ===== 🌟 EFFET OR AU SURVOL — NOUVEAU CODE AJOUTÉ ===== */
    .article-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 215, 0, 0.3), transparent); /* Or doux */
        transition: left 0.6s ease;
        z-index: 1;
        pointer-events: none;
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
        background-color: #FFD700; /* Jaune or */
        transition: width 0.3s ease;
        z-index: 2;
    }

    .article-card:hover::after {
        width: 100%;
    }

    /* ===== Hover principal ===== */
    .article-card:hover {
        transform: translateY(-4px) scale(1.02);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .article-card.expanded {
        transform: scale(1.05) translateY(-8px) !important;
        z-index: 20;
        box-shadow: 0 16px 40px rgba(0,0,0,0.2) !important;
    }

    .article-image {
        width: 100%;
        height: 160px; /* Réduit pour s'adapter à la grille */
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .article-card:hover .article-image,
    .article-card.expanded .article-image {
        transform: scale(1.05);
    }

    .article-body {
        padding: 1rem;
        position: relative;
        z-index: 5; /* Pour que le texte soit au-dessus des effets */
    }

    .article-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: #1f2937;
        line-height: 1.4;
        margin-bottom: 0.5rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        transition: color 0.3s ease;
    }

    .article-card:hover .article-title,
    .article-card.expanded .article-title {
        color: #FFD700; /* Change aussi la couleur du titre en or au survol */
    }

    .article-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.5s cubic-bezier(0.85, 0, 0.15, 1), opacity 0.3s ease;
        opacity: 0;
        font-size: 0.95rem;
        line-height: 1.6;
        color: #4b5563;
        margin-top: 0.75rem;
    }

    .article-card.expanded .article-content {
        max-height: 400px;
        opacity: 1;
        padding-top: 0.75rem;
        border-top: 1px solid #f3f4f6;
    }

    .article-meta {
        font-size: 0.8rem;
        color: #6b7280;
        margin-top: 0.75rem;
        display: flex;
        align-items: center;
        gap: 0.3rem;
    }

    .article-meta::before {
        content: "📰";
        font-size: 0.9em;
    }

    /* ===== OVERLAY ===== */
    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(4px);
        z-index: 15;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
    }
    .overlay.active {
        opacity: 1;
        visibility: visible;
    }

    /* ===== BUTTON ===== */
    .btn-more {
        display: inline-block;
        background: linear-gradient(135deg, #FFD700, #DAA520); /* Dégradé or ! */
        color: #000;
        padding: 0.75rem 2rem;
        font-weight: 600;
        border-radius: 9999px;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(255, 215, 0, 0.4);
        margin-top: 2rem;
        border: 2px solid #DAA520;
    }

    .btn-more:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(255, 215, 0, 0.6);
        background: linear-gradient(135deg, #DAA520, #B8860B);
        color: white;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 640px) {
        .article-image {
            height: 140px;
        }
        .article-title {
            font-size: 1.05rem;
        }
    }
</style>

<!-- LOADING SPINNER -->
<div id="loading" class="fixed inset-0 z-50">
    <div class="spinner-container">
        <div class="spinner-circle"></div>
        <img src="{{ asset('image/ab.png') }}" alt="Logo ABEC" class="spinner-logo">
    </div>
</div>

<div class="max-w-6xl mx-auto py-10 px-4 sm:px-6 lg:px-8 relative">
    <h1 class="text-3xl sm:text-4xl font-extrabold text-center text-gray-800 mb-2">
        Actualités
    </h1>
    <p class="text-center text-gray-600 mb-10">
        Découvrez nos dernières actions sur le terrain.
    </p>

    <!-- Overlay -->
    <div id="overlay" class="overlay"></div>

    <!-- Grille d'articles -->
    <div class="articles-grid">
        @for ($i = 1; $i <= 10; $i++)
            <div class="article-card">
                <img src="{{ asset($i % 2 == 0 ? 'image/appl.jpg' : 'image/news.png') }}" alt="Actualité ABEC" class="article-image">
                <div class="article-body">
                    <h2 class="article-title">
                        @if($i % 3 == 0)
                            Nouvelle école construite à Douala grâce à vos dons
                        @elseif($i % 3 == 1)
                            Campagne de vaccination dans les quartiers défavorisés
                        @else
                            Formation professionnelle pour 50 jeunes à Yaoundé
                        @endif
                    </h2>
                    <div class="article-content">
                        <p class="mb-3">
                            L’ONG ABEC continue son engagement sur le terrain avec des actions concrètes pour améliorer les conditions de vie des populations locales.
                        </p>
                        <p>
                            Grâce à votre soutien, nous avons pu réaliser cette initiative qui impacte directement la vie de centaines de bénéficiaires.
                        </p>
                    </div>
                    <div class="article-meta">
                        Publié le {{ now()->subDays($i * 5)->format('d/m/Y') }}
                    </div>
                </div>
            </div>
        @endfor
    </div>

    <!-- Bouton Voir Plus -->
    <div class="text-center mt-12">
        <a href="#" class="btn-more">
            Voir plus d'actualités
        </a>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const articles = document.querySelectorAll('.article-card');
    const overlay = document.getElementById('overlay');
    const loading = document.getElementById('loading');

    // Masquer le loader après chargement
    window.addEventListener('load', () => {
        setTimeout(() => {
            loading.classList.add('hidden');
            setTimeout(() => loading.style.display = 'none', 500);
        }, 800);
    });

    // Gestion de l'expansion des articles
    articles.forEach(article => {
        article.addEventListener('click', () => {
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
        }
    });
});
</script>
@endsection