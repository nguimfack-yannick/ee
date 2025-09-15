@extends('layouts.app')

@section('content')
<style>
    /* Custom CSS for expand/collapse and overlay */
    .article-card {
        transition: all 0.3s ease-in-out;
        position: relative;
        z-index: 10;
        cursor: pointer;
        padding: 3.5rem; /* Increased padding for larger images */
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.25); /* Stronger shadow behind cards */
    }
    .article-card.expanded {
        transform: scale(1.3); /* Larger scale for more emphasis */
        z-index: 20;
        box-shadow: 0 16px 32px rgba(0, 0, 0, 0.45); /* Stronger shadow for expanded state */
    }
    .article-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.5s ease-in-out;
    }
    .article-card.expanded .article-content {
        max-height: 500px; /* Unchanged, sufficient for content */
    }
    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7); /* Darker overlay for contrast */
        z-index: 15;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s ease-in-out;
    }
    .overlay.active {
        opacity: 1;
        visibility: visible;
    }
    .article-image {
        width: 100%;
        height: 700px; /* Increased height for maximum visibility */
        object-fit: cover; /* Ensures image covers area without distortion */
        border-radius: 8px;
        margin-bottom: 3.5rem; /* Increased margin for spacing */
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
        width: 80px; /* Reduced size for better proportionality */
        height: 80px;
    }
    .spinner-circle {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: 4px solid transparent;
        border-top-color: #2563EB; /* Tailwind's blue-600 */
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
    /* Ensure responsiveness for smaller screens */
    @media (max-width: 640px) {
        .article-image {
            height: 400px; /* Larger height for mobile */
        }
        .article-card {
            padding: 2rem; /* Adjusted padding for mobile */
            box-shadow: 0 5px 12px rgba(0, 0, 0, 0.2); /* Lighter shadow for mobile */
        }
        .article-card.expanded {
            transform: scale(1.15); /* Slightly reduced scale for mobile */
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.35); /* Adjusted shadow for mobile */
        }
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

<div class="max-w-5xl mx-auto py-10 relative">
    <!-- Loading Spinner -->
    <div id="loading" class="fixed inset-0 bg-white bg-opacity-80 flex items-center justify-center z-50">
        <div class="spinner-container">
            <!-- Cercle bleu rotatif -->
            <div class="spinner-circle"></div>
            <!-- Logo statique au centre -->
            <img src="{{ asset('image/ab.png') }}" alt="Logo ABEC" class="spinner-logo">
        </div>
    </div>

    <h1 class="text-3xl font-bold mb-6 text-center text-blue-700">Actualités</h1>

    <!-- Overlay for dark background -->
    <div id="overlay" class="overlay"></div>

    <!-- Article 1 -->
    <div class="article-card bg-white shadow rounded-lg p-6 mb-8">
        <img src="{{ asset('image/appl.jpg') }}" alt="Campagne de dons ABEC" class="article-image mb-4">
        <h2 class="text-2xl font-bold text-gray-800">ABEC lance une nouvelle campagne de dons pour soutenir les orphelinats</h2>
        <div class="article-content">
            <p class="text-gray-700 mt-4 leading-relaxed">
                L’ONG ABEC a officiellement lancé une nouvelle campagne de collecte de dons destinée aux orphelinats de Yaoundé et Douala.
                Cette initiative vise à fournir des vivres, du matériel scolaire et des soins de santé aux enfants défavorisés.
            </p>
            <p class="text-gray-700 mt-4 leading-relaxed">
                Grâce à votre générosité, nous avons déjà pu venir en aide à plus de 300 enfants lors de notre précédente action humanitaire.
                Nous invitons tous nos partenaires et donateurs à continuer de nous soutenir afin de bâtir ensemble un avenir meilleur pour ces enfants.
            </p>
        </div>
        <span class="text-sm text-gray-500 mt-2 block">Publié le {{ now()->format('d/m/Y') }}</span>
    </div>

    <!-- Article 2 -->
    <div class="article-card bg-white shadow rounded-lg p-6 mb-8">
        <img src="{{ asset('image/news.png') }}" alt="Campagne de dons ABEC" class="article-image mb-4">
        <h2 class="text-2xl font-bold text-gray-800">Descente médicale au Centre Hospitalier Régional</h2>
        <div class="article-content">
            <p class="text-gray-700 mt-4 leading-relaxed">
                La branche <strong>Santos</strong> a organisé une descente médicale au Centre Hospitalier Régional de Yaoundé.
                L'équipe a fourni des consultations gratuites, distribué des médicaments essentiels et sensibilisé la population sur les bonnes pratiques sanitaires.
            </p>
            <p class="text-gray-700 mt-4 leading-relaxed">
                Cette action s’inscrit dans le cadre des initiatives de santé publique de l’ONG, visant à améliorer l'accès aux soins pour les communautés locales.
            </p>
        </div>
        <span class="text-sm text-gray-500 mt-2 block">Publié le {{ now()->format('d/m/Y') }}</span>
    </div>

    <!-- Bouton voir plus -->
    <div class="text-center mt-10">
        <a href="#"
           class="inline-block bg-blue-600 text-white px-6 py-3 font-bold rounded-md hover:bg-blue-700 transition transform hover:scale-105">
            Voir plus d'actualités
        </a>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const articles = document.querySelectorAll('.article-card');
        const overlay = document.getElementById('overlay');
        const loading = document.getElementById('loading');

        // Gérer le spinner de chargement
        window.addEventListener('load', () => {
            setTimeout(() => {
                loading.classList.add('hidden');
                setTimeout(() => {
                    loading.style.display = 'none';
                }, 500); // Correspond à la durée de la transition CSS
            }, 1000); // Délai avant de masquer le spinner (ajustez si nécessaire)
        });

        // Gérer l'expansion des articles
        articles.forEach(article => {
            article.addEventListener('click', () => {
                const isExpanded = article.classList.contains('expanded');
                
                // Close all other articles
                articles.forEach(otherArticle => {
                    if (otherArticle !== article) {
                        otherArticle.classList.remove('expanded');
                    }
                });

                // Toggle current article
                article.classList.toggle('expanded', !isExpanded);

                // Toggle overlay
                overlay.classList.toggle('active', !isExpanded);
            });
        });

        // Close overlay and articles when clicking overlay
        overlay.addEventListener('click', () => {
            articles.forEach(article => article.classList.remove('expanded'));
            overlay.classList.remove('active');
        });
    });
</script>
@endsection