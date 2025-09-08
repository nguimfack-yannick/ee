
<!-- Tout ce qui était dans <body> ... </body>, mais **sans le header et footer** -->
@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-10">
    <h1 class="text-3xl font-bold mb-6 text-center text-blue-700">Actualités</h1>

    <!-- Article 1 -->
    <div class="bg-white shadow rounded-lg p-6 mb-6">
        <h2 class="text-2xl font-bold text-gray-800">ABEC lance une nouvelle campagne de dons pour soutenir les orphelinats</h2>
        <p class="text-gray-700 mt-4 leading-relaxed">
            L’ONG ABEC a officiellement lancé une nouvelle campagne de collecte de dons destinée aux orphelinats de Yaoundé et Douala.
            Cette initiative vise à fournir des vivres, du matériel scolaire et des soins de santé aux enfants défavorisés.
        </p>
        <p class="text-gray-700 mt-4 leading-relaxed">
            Grâce à votre générosité, nous avons déjà pu venir en aide à plus de 300 enfants lors de notre précédente action humanitaire.
            Nous invitons tous nos partenaires et donateurs à continuer de nous soutenir afin de bâtir ensemble un avenir meilleur pour ces enfants.
        </p>
        <span class="text-sm text-gray-500 mt-2 block">Publié le {{ now()->format('d/m/Y') }}</span>
    </div>

    <!-- Article 2 -->
    <div class="bg-white shadow rounded-lg p-6 mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Descente médicale au Centre Hospitalier Régional</h2>
        <p class="text-gray-700 mt-4 leading-relaxed">
            La branche <strong>Santos</strong> a organisé une descente médicale au Centre Hospitalier Régional de Yaoundé.
            L'équipe a fourni des consultations gratuites, distribué des médicaments essentiels et sensibilisé la population sur les bonnes pratiques sanitaires.
        </p>
        <p class="text-gray-700 mt-4 leading-relaxed">
            Cette action s’inscrit dans le cadre des initiatives de santé publique de l’ONG, visant à améliorer l'accès aux soins pour les communautés locales.
        </p>
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
@endsection


