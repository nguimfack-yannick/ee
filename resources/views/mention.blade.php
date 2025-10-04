@extends('layouts.app')

@section('content')
    <!-- Loading Overlay -->
    <div x-data="{ isLoading: true }"
         x-init="$nextTick(() => { window.addEventListener('load', () => setTimeout(() => isLoading = false, 2000)) })"
         x-show="isLoading"
         x-cloak
         class="fixed inset-0 bg-white bg-opacity-80 flex items-center justify-center z-50">
        <div class="relative w-20 h-20">
            <!-- Cercle animé -->
            <div class="absolute inset-0 border-4 border-t-primary border-transparent rounded-full animate-spin"></div>
            <!-- Logo parfaitement centré -->
            <div class="absolute inset-0 flex items-center justify-center">
                <img src="{{ asset('image/ab.png') }}" alt="Logo ABEC" class="w-10 h-10 object-contain">
            </div>
        </div>
    </div>

    <main class="flex-1 py-8">
        <div class="legal-content" style="font-family: 'Arial Black', Arial, sans-serif; font-weight: bold;">
            <hr class="border-2 border-yellow mb-8">
            <h1 class="text-3xl font-bold text-primary mb-6 text-center">Mentions Légales</h1>
            <p class="text-gray-700 text-center"><strong>Date d'entrée en vigueur : 26 septembre 2025</strong></p>
            <p class="text-gray-700 text-center">
                L’<strong>Association du Bien-Être Communautaire (ABEC)</strong> est une organisation internationale à but non lucratif dédiée à la promotion du bien-être communautaire dans le monde.  
                Ces Mentions Légales expliquent l'identité légale, les obligations et les informations relatives à notre organisation.  
                En accédant ou en utilisant notre site web (<a href="universalwelfare.org" class="text-primary hover:underline">universalwelfare.org</a>), vous acceptez les dispositions décrites dans ces Mentions Légales.
            </p>
            <p class="text-gray-700 text-center">
    Si vous avez des questions sur ces Mentions Légales, veuillez nous contacter à l'adresse  
    <a href="https://mail.google.com/mail/?view=cm&to=universalwelfare.org" 
       target="_blank" 
       class="hover:opacity-80 transition-opacity duration-300" 
       title="Envoyer un email via Gmail">
        <img src="{{ asset('image/m.jpg') }}" alt="Email" class="w-6 h-6 rounded-full inline-block">
    </a>.
</p>


            <hr class="border-2 border-yellow my-8">
            <h2 class="text-2xl font-bold text-primary mt-8 mb-4 text-center">1. Informations sur l'Organisation</h2>
            <ul class="list-disc mx-auto text-gray-700 text-center" style="list-style-position: inside;">
                <li><strong>Dénomination sociale</strong> : Association du Bien-Être Communautaire (ABEC)</li>
                <li><strong>Forme juridique</strong> : Association déclarée et enregistrée au Cameroun.</li>
                <li><strong>Statut</strong> : Organisation Non Gouvernementale (ONG) internationale à but non lucratif.</li>
                <li><strong>Objet social</strong> : Promouvoir le bien-être communautaire à travers des programmes Jeunesse, L’Environnement, La Santé, La Paix,La Justice,Le Développement Durable,Le Bien-être des Communautés,La Culture,L’Histoire,Le Panafricanisme,Promotion de l’Égalité et de l’Équité en mettant un accent particulier sur les communautés vulnérables.</li>
                <li><strong>Siège social</strong> : Yaoundé, Cameroun.</li>
                <li><strong>Représentant légal</strong> : Ararat Kamani Rehoboth</li>
                <li><strong>Date de création</strong> : 2021.</li>
            </ul>

            <hr class="border-2 border-yellow my-8">
            <h2 class="text-2xl font-bold text-primary mt-8 mb-4 text-center">2. Cadre Légal Applicable</h2>
            <p class="text-gray-700 text-center">ABEC opère conformément aux lois camerounaises et internationales :</p>
            <ul class="list-disc mx-auto text-gray-700 text-center" style="list-style-position: inside;">
                <li><strong>Au Cameroun</strong> :
                    <ul class="list-disc mx-auto text-gray-700 text-center" style="list-style-position: inside;">
                        <li>Loi n° 90/053 du 19 décembre 1990 relative à la liberté d'association.</li>
                        <li>Loi n° 99/014 du 22 décembre 1999 régissant les Organisations Non Gouvernementales (ONG).</li>
                    </ul>
                </li>
                <li><strong>International</strong> : Respect des conventions internationales sur les droits humains, le développement durable (ODD des Nations Unies) et la protection des données personnelles (RGPD pour les utilisateurs européens, le cas échéant).</li>
                <li><strong>Hébergement du site</strong> : Le site 
                <a href="universalwelfare.org" class="text-primary hover:underline">universalwelfare.org</a> est hébergé par Hostinger, hostinger.com.</li>
            </ul>

            <hr class="border-2 border-yellow my-8">
            <h2 class="text-2xl font-bold text-primary mt-8 mb-4 text-center">3. Responsabilité</h2>
            <ul class="list-disc mx-auto text-gray-700 text-center" style="list-style-position: inside;">
                <li><strong>Contenu du site</strong> : ABEC s'engage à fournir des informations exactes et actualisées, mais ne peut garantir l’exhaustivité du contenu.</li>
                <li><strong>Liens hypertextes</strong> : ABEC décline toute responsabilité quant au contenu des sites tiers accessibles par lien.</li>
                <li><strong>Données personnelles</strong> : Voir notre <a href="{{ url('/politique') }}" class="text-primary hover:underline">Politique de Confidentialité</a>.</li>
                <li><strong>Propriété intellectuelle</strong> : Tous les contenus (textes, logos, images) sont protégés et leur reproduction nécessite une autorisation écrite préalable.</li>
            </ul>

            <hr class="border-2 border-yellow my-8">
            <h2 class="text-2xl font-bold text-primary mt-8 mb-4 text-center">4. Conditions d'Utilisation</h2>
            <ul class="list-disc mx-auto text-gray-700 text-center" style="list-style-position: inside;">
                <li><strong>Accès au site</strong> : Gratuit et ouvert à tous.</li>
                <li><strong>Utilisation</strong> : Les services sont fournis "tels quels". ABEC peut suspendre ou modifier l’accès sans préavis.</li>
                <li><strong>Responsabilité des utilisateurs</strong> : Respecter la législation en vigueur et ne pas porter atteinte aux droits des tiers.</li>
            </ul>

            <hr class="border-2 border-yellow my-8">
           <h2 class="text-2xl font-bold text-primary mt-8 mb-4 text-center">5. Protection des Données</h2>
<p class="text-gray-700 text-center">
    ABEC traite vos données de manière transparente et sécurisée.  
    Pour exercer vos droits (accès, rectification, suppression), contactez-nous à  
    <a href="https://mail.google.com/mail/?view=cm&to=privacy@abec.org" 
       target="_blank" 
       class="hover:opacity-80 transition-opacity duration-300" 
       title="Envoyer un email via Gmail">
        <img src="{{ asset('image/m.jpg') }}" alt="Email" class="w-6 h-6 rounded-full inline-block">
    </a>.
</p>


            <hr class="border-2 border-yellow my-8">
            <h2 class="text-2xl font-bold text-primary mt-8 mb-4 text-center">6. Loi Applicable et Juridiction</h2>
            <p class="text-gray-700 text-center">
                Les présentes Mentions Légales sont régies par le droit camerounais.  
                Tout litige sera porté devant les juridictions compétentes de Yaoundé, Cameroun.
            </p>

            <hr class="border-2 border-yellow my-8">
            <h2 class="text-2xl font-bold text-primary mt-8 mb-4 text-center">7. Modifications</h2>
            <p class="text-gray-700 text-center">
                ABEC peut modifier ces Mentions Légales à tout moment.  
                Les changements seront publiés sur cette page avec la date d'entrée en vigueur.
            </p>

            <hr class="border-2 border-yellow my-8">
            <h2 class="text-2xl font-bold text-primary mt-8 mb-4 text-center">8. Contact</h2>
            <ul class="list-disc mx-auto text-gray-700 text-center" style="list-style-position: inside;">
    <li>
        <strong>Email</strong> : 
        <a href="https://mail.google.com/mail/?view=cm&to=contact@universalwelfare.org" 
           target="_blank" 
           class="hover:opacity-80 transition-opacity duration-300" 
           title="Envoyer un email via Gmail">
            <img src="{{ asset('image/m.jpg') }}" alt="Email" class="w-6 h-6 rounded-full inline-block">
        </a>
    </li>
    <li><strong>Adresse postale</strong> : ABEC, Yaoundé, Cameroun</li>
    <li><strong>Téléphone</strong> : +237 6 21 62 06 77</li>
</ul>

            <p class="text-gray-700 text-center mt-6">
                Merci de faire confiance à l’ABEC pour promouvoir le bien-être communautaire.
            </p>
            <hr class="border-2 border-yellow mt-8">
        </div>
    </main>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <style>
        .legal-content {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 0.5rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .legal-content h1, .legal-content h2 {
            color: #1E90FF;
            text-align: center;
        }
        .legal-content h2 {
            border-bottom: 2px solid #FFD700;
            padding-bottom: 10px;
            margin-top: 1.5rem;
        }
        .legal-content ul {
            list-style-type: disc;
            list-style-position: inside;
            margin-top: 0.5rem;
            margin-bottom: 1rem;
            text-align: center;
        }
        .legal-content a {
            color: #1E90FF;
            text-decoration: none;
        }
        .legal-content a:hover {
            text-decoration: underline;
        }
        .legal-content p {
            margin-bottom: 1rem;
            line-height: 1.6;
            text-align: center;
        }
    </style>
@endsection