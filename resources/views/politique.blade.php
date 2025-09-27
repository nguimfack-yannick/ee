@extends('layouts.app')

@section('content')
    <!-- Loading Spinner -->
    <div x-data="{ isLoading: true }" 
         x-init="$nextTick(() => { window.addEventListener('load', () => setTimeout(() => isLoading = false, 2000)) })"
         x-show="isLoading"
         x-cloak
         class="fixed inset-0 bg-white bg-opacity-80 flex items-center justify-center z-50">
        <div class="relative w-20 h-20">
            <div class="absolute inset-0 border-4 border-t-primary border-transparent rounded-full animate-spin"></div>
            <div class="absolute inset-0 flex items-center justify-center">
                <img src="{{ asset('image/ab.png') }}" alt="Logo ABEC" class="w-10 h-10 object-contain">
            </div>
        </div>
    </div>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="legal-content" style="font-family: 'Arial Black', Arial, sans-serif; font-weight: bold;">
            <hr class="border-2 border-yellow mb-8">
            <h1 class="text-3xl font-bold text-primary mb-6 text-center">Politique de Confidentialité</h1>
            <p class="text-gray-700 text-center"><strong>Date d'entrée en vigueur : 26 septembre 2025</strong></p>
            <p class="text-gray-700 text-center">Chez Universal Welfare, nous nous engageons à protéger votre vie privée et à traiter vos données personnelles de manière responsable. Cette Politique de Confidentialité explique comment nous collectons, utilisons, partageons et protégeons vos informations lorsque vous utilisez notre site web (<a href="https://universalwelfare.com" class="text-primary hover:underline">universalwelfare.com</a>), nos services et nos applications (ci-après désignés collectivement comme les « Services »). En accédant ou en utilisant nos Services, vous acceptez les pratiques décrites dans cette politique.</p>
           <p class="text-gray-700 text-center">
    Si vous avez des questions sur cette Politique de Confidentialité, veuillez nous contacter à l'adresse 
    <a href="https://mail.google.com/mail/?view=cm&to=contact@universalwelfare.org" 
       target="_blank" 
       class="hover:opacity-80 transition-opacity duration-300" 
       title="Envoyer un email via Gmail">
        <img src="{{ asset('image/m.jpg') }}" alt="Email" class="w-6 h-6 rounded-full inline-block">
    </a>.
</p>


            <hr class="border-2 border-yellow my-8">
            <h2 class="text-2xl font-bold text-primary mt-8 mb-4 text-center">1. Informations que nous collectons</h2>
            <p class="text-gray-700 text-center">Nous collectons des informations pour fournir et améliorer nos Services, qui visent à promouvoir le bien-être universel, l'assistance sociale et des ressources éducatives en matière de santé et de soutien communautaire.</p>

            <h3 class="text-xl font-bold text-gray-800 mt-6 mb-3 text-center">1.1 Informations que vous nous fournissez directement</h3>
            <ul class="list-disc mx-auto text-gray-700 text-center" style="list-style-position: inside;">
                <li><strong>Données d'inscription et de profil</strong> : Lorsque vous créez un compte ou vous inscrivez à nos newsletters, nous collectons votre nom, adresse e-mail, mot de passe et toute autre information que vous choisissez de partager (par exemple, âge, localisation approximative pour des ressources locales).</li>
                <li><strong>Communications</strong> : Nous collectons les informations que vous fournissez lorsque vous nous contactez via des formulaires, e-mails ou chats (par exemple, messages de support ou retours d'expérience).</li>
                <li><strong>Données de paiement</strong> : Si vous effectuez des dons ou abonnements payants, nous collectons des informations de facturation via des processeurs tiers sécurisés (sans stocker les détails de carte).</li>
            </ul>

            <h3 class="text-xl font-bold text-gray-800 mt-6 mb-3 text-center">1.2 Informations collectées automatiquement</h3>
            <ul class="list-disc mx-auto text-gray-700 text-center" style="list-style-position: inside;">
                <li><strong>Données d'utilisation</strong> : Nous collectons des informations sur votre interaction avec nos Services, comme les pages visitées, le temps passé, les clics et les recherches effectuées.</li>
                <li><strong>Données techniques</strong> : Adresse IP, type de navigateur, système d'exploitation, identifiant d'appareil et données de localisation approximative (basée sur IP).</li>
                <li><strong>Cookies et technologies similaires</strong> : Nous utilisons des cookies, balises web et technologies de suivi pour analyser l'utilisation, personnaliser le contenu et mesurer l'efficacité des publicités. Vous pouvez gérer vos préférences en cookies via les paramètres de votre navigateur.</li>
            </ul>

            <h3 class="text-xl font-bold text-gray-800 mt-6 mb-3 text-center">1.3 Informations provenant de tiers</h3>
            <p class="text-gray-700 text-center">Nous pouvons recevoir des données de partenaires (par exemple, réseaux sociaux si vous vous connectez via Facebook ou Google) ou de fournisseurs d'analyse comme Google Analytics.</p>

            <hr class="border-2 border-yellow my-8">
            <h2 class="text-2xl font-bold text-primary mt-8 mb-4 text-center">2. Comment nous utilisons vos informations</h2>
            <p class="text-gray-700 text-center">Nous utilisons vos données personnelles pour :</p>
            <ul class="list-disc mx-auto text-gray-700 text-center" style="list-style-position: inside;">
                <li>Fournir et personnaliser nos Services (par exemple, recommandations de ressources basées sur votre localisation).</li>
                <li>Améliorer et développer nos Services (analyse anonymisée des tendances d'utilisation).</li>
                <li>Communiquer avec vous (mises à jour, newsletters, réponses à vos demandes).</li>
                <li>Assurer la sécurité et prévenir les fraudes.</li>
                <li>Respecter nos obligations légales et réglementaires.</li>
            </ul>
            <p class="text-gray-700 text-center">Nous ne vendons pas vos données personnelles à des tiers à des fins commerciales.</p>

            <hr class="border-2 border-yellow my-8">
            <h2 class="text-2xl font-bold text-primary mt-8 mb-4 text-center">3. Partage de vos informations</h2>
            <p class="text-gray-700 text-center">Nous ne partageons vos données qu'avec :</p>
            <ul class="list-disc mx-auto text-gray-700 text-center" style="list-style-position: inside;">
                <li><strong>Fournisseurs de services</strong> : Partenaires techniques (hébergement, analyse, envoi d'e-mails) qui agissent en notre nom et sont tenus de protéger vos données.</li>
                <li><strong>Autorités légales</strong> : Si requis par la loi, une ordonnance judiciaire ou pour protéger nos droits.</li>
                <li><strong>En cas de fusion ou acquisition</strong> : Vos données pourraient être transférées dans le cadre d'une transaction d'entreprise.</li>
            </ul>
            <p class="text-gray-700 text-center">Tous les partages sont régis par des accords de confidentialité stricts.</p>

            <hr class="border-2 border-yellow my-8">
            <h2 class="text-2xl font-bold text-primary mt-8 mb-4 text-center">4. Conservation de vos informations</h2>
            <p class="text-gray-700 text-center">Nous conservons vos données aussi longtemps que nécessaire pour les finalités décrites, ou comme requis par la loi. Par exemple :</p>
            <ul class="list-disc mx-auto text-gray-700 text-center" style="list-style-position: inside;">
                <li>Comptes inactifs : Supprimés après 2 ans d'inactivité.</li>
                <li>Données de logs : Conservées 12 mois pour des raisons de sécurité.</li>
            </ul>
            <p class="text-gray-700 text-center">Vous pouvez demander la suppression de vos données à tout moment (voir section 7).</p>

            <hr class="border-2 border-yellow my-8">
            <h2 class="text-2xl font-bold text-primary mt-8 mb-4 text-center">5. Vos droits en matière de données personnelles</h2>
            <p class="text-gray-700 text-center">Conformément aux lois applicables au Cameroun et, le cas échéant, au RGPD (Règlement Général sur la Protection des Données), vous avez le droit de :</p>
            <ul class="list-disc mx-auto text-gray-700 text-center" style="list-style-position: inside;">
                <li>Accéder à vos données.</li>
                <li>Les rectifier ou les mettre à jour.</li>
                <li>Les effacer (« droit à l'oubli »).</li>
                <li>Limiter ou vous opposer à leur traitement.</li>
                <li>Les exporter (portabilité).</li>
            </ul>
           <p class="text-gray-700 text-center">
    Pour exercer ces droits, contactez-nous à l'adresse 
    <a href="https://mail.google.com/mail/?view=cm&to=contact@universalwelfare.org" 
       target="_blank" 
       class="hover:opacity-80 transition-opacity duration-300" 
       title="Envoyer un email via Gmail">
        <img src="{{ asset('image/m.jpg') }}" alt="Email" class="w-6 h-6 rounded-full inline-block">
    </a>.
     Nous répondrons dans un délai d'un mois.
</p>


            <hr class="border-2 border-yellow my-8">
            <h2 class="text-2xl font-bold text-primary mt-8 mb-4 text-center">6. Sécurité de vos informations</h2>
            <p class="text-gray-700 text-center">Nous mettons en œuvre des mesures techniques et organisationnelles raisonnables pour protéger vos données, incluant le chiffrement, les contrôles d'accès et des audits réguliers. Cependant, aucune transmission en ligne n'est totalement sécurisée, et nous ne pouvons garantir une protection absolue.</p>

            <hr class="border-2 border-yellow my-8">
            <h2 class="text-2xl font-bold text-primary mt-8 mb-4 text-center">7. Transferts internationaux de données</h2>
            <p class="text-gray-700 text-center">Universal Welfare est basé à Yaoundé, Cameroun. Vos données peuvent être transférées vers des pays hors du Cameroun, avec des garanties appropriées pour assurer leur protection (par exemple, clauses contractuelles types pour les transferts vers l'Union européenne).</p>

            <hr class="border-2 border-yellow my-8">
            <h2 class="text-2xl font-bold text-primary mt-8 mb-4 text-center">8. Mineurs</h2>
            <p class="text-gray-700 text-center">Nos Services ne sont pas destinés aux enfants de moins de 13 ans (ou 16 ans selon les juridictions). Nous ne collectons pas sciemment de données sur les mineurs. Si nous en découvrons, nous les supprimerons immédiatement.</p>

            <hr class="border-2 border-yellow my-8">
            <h2 class="text-2xl font-bold text-primary mt-8 mb-4 text-center">9. Modifications de cette Politique</h2>
            <p class="text-gray-700 text-center">Nous pouvons mettre à jour cette Politique de temps à autre. Les changements seront publiés sur cette page avec la date d'entrée en vigueur. Nous vous notifierons des modifications importantes par e-mail ou via notre site.</p>

            <hr class="border-2 border-yellow my-8">
            <h2 class="text-2xl font-bold text-primary mt-8 mb-4 text-center">10. Contactez-nous</h2>
            <p class="text-gray-700 text-center">Pour toute question, préoccupation ou réclamation concernant cette Politique :</p>
            <ul class="list-disc mx-auto text-gray-700 text-center" style="list-style-position: inside;">
               <li>
    E-mail : 
    <a href="https://mail.google.com/mail/?view=cm&to=contact@universalwelfare.org" 
       target="_blank" 
       class="hover:opacity-80 transition-opacity duration-300" 
       title="Envoyer un email via Gmail">
        <img src="{{ asset('image/m.jpg') }}" alt="Email" class="w-6 h-6 rounded-full inline-block">
    </a>
</li>

                <li>Adresse postale : Universal Welfare, 123 Avenue du Bien-Être, Yaoundé, Cameroun</li>
            </ul>
            <p class="text-gray-700 text-center mt-6">Merci de faire confiance à Universal Welfare pour promouvoir un monde plus juste et solidaire.</p>
            <hr class="border-2 border-yellow mt-8">
        </div>
    </section>

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
        .legal-content h3 {
            color: #333;
            text-align: center;
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