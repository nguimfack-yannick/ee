
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Ajout du jeton CSRF pour AJAX -->
    <title>ABEC - Santos - Branche Santé</title>
    <link rel="icon" type="image/png" href="{{ asset('santos.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        santosRed: '#D32F2F',
                        santosWhite: '#FFFFFF',
                        santosBlue: '#1976D2',
                        santosGray: '#F5F5F5',
                        santosYellow: '#FFEB3B',
                    },
                    fontFamily: {
                        'custom': ['Arial Black', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        [x-cloak] { display: none; }
        .hero-section { 
            background: url('{{ asset('/image/gens.png') }}');
            background-size: 200%;
            background-position: center;
            height: 100vh;
            width: 100%;
        }
        .top-nav { background: linear-gradient(to right, #1976D2, #D32F2F); }
        nav a { transition: all 0.3s ease; }
        nav a:hover { transform: translateY(-2px); box-shadow: 0px 2px 8px rgba(0,0,0,0.15); }
        .media-card {
            border: none;
            overflow: hidden;
            border-radius: 0.75rem;
            background: linear-gradient(to bottom, #ffffff, #f9f9f9);
            transition: all 0.3s ease;
        }
        .media-card:hover { transform: translateY(-4px); box-shadow: 0 8px 20px rgba(0,0,0,0.12); }
        .like-button, .heart-button, .comment-button {
            display: inline-flex;
            align-items: center;
            padding: 8px 12px;
            margin-right: 8px;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            transition: all 0.2s ease-in-out;
        }
        .like-button {
            background: linear-gradient(to right, #1976D2, #1565C0);
            color: #fff;
        }
        .like-button.liked { background: linear-gradient(to right, #0D47A1, #082f77); }
        .like-button:hover { background: linear-gradient(to right, #1565C0, #0D47A1); transform: scale(1.05); }
        .heart-button {
            background: linear-gradient(to right, #D32F2F, #B71C1C);
            color: #fff;
        }
        .heart-button.hearted { background: linear-gradient(to right, #880E4F, #6B0839); }
        .heart-button:hover { background: linear-gradient(to right, #B71C1F, #880E4F); transform: scale(1.05); }
        .comment-button {
            background: linear-gradient(to right, #4CAF50, #388E3C);
            color: #fff;
        }
        .comment-button:hover { background: linear-gradient(to right, #388E3C, #2E7D32); transform: scale(1.05); }
        footer { background: linear-gradient(to right, #D32F2F, #1976D2); }
        body {
            font-family: 'custom', sans-serif;
        }
    </style>
</head>
<body id="top" x-data="{ mobileMenuOpen: false }" class="bg-santosGray antialiased">
    <!-- Top Nav -->
    <nav class="top-nav text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-10">
                <div class="flex items-center space-x-4">
                    <a href="https://www.facebook.com/profile.php?id=61568266295634" target="_blank" class="hover:opacity-80 font-custom" title="Facebook">
                        <img src="{{ asset('/image/feacebook.jpg') }}" alt="Facebook" class="w-6 h-6 rounded-full">
                    </a>
                    <a href="https://whatsapp.com/channel/0029VaYTsNkD8SE42sDpnk1w" target="_blank" class="hover:opacity-80 font-custom" title="WhatsApp">
                        <img src="{{ asset('/image/wastapp.jpg') }}" alt="WhatsApp" class="w-6 h-6 rounded-full">
                    </a>
                    <a href="https://www.instagram.com/abec.officiel/" target="_blank" class="hover:opacity-80 font-custom" title="Instagram">
                        <img src="{{ asset('/image/insta.jpg') }}" alt="Instagram" class="w-6 h-6 rounded-full">
                    </a>
                </div>
                <a href="mailto:globaluniversalwelfare@gmail.com" class="hover:opacity-80 font-custom" title="Email">
                    <img src="{{ asset('/image/m.jpg') }}" alt="Email" class="w-6 h-6 rounded-full">
                </a>
            </div>
        </div>
    </nav>
    <!-- Nav Bar Principale -->
    <header class="bg-white shadow py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex-shrink-0 w-6/12 sm:w-4/12 md:w-2/12 h-auto flex justify-center">
                    <img src="{{ asset('/image/santos.png') }}" alt="logo" class="w-8/12 sm:w-6/12 md:w-5/12 lg:w-4/12">
                </div>
                <!-- Navigation Desktop -->
                <nav class="hidden md:flex space-x-4">
                    <a href="{{ route('branche') }}" class="px-3 py-2 rounded-md text-sm text-gray-800 hover:bg-gray-200 font-custom">Branches</a>
                </nav>
                <!-- Menu Mobile -->
                <div class="md:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-500 focus:outline-none">
                        <svg x-show="!mobileMenuOpen" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <svg x-show="mobileMenuOpen" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- Menu Mobile -->
        <div x-show="mobileMenuOpen" x-cloak class="md:hidden px-2 pt-2 pb-3 space-y-1">
            <a href="#top" class="block px-3 py-2 rounded-md text-base font-medium text-gray-800 hover:bg-gray-200 font-custom">Accueil</a>
            <a href="#about" class="block px-3 py-2 rounded-md text-base font-medium text-gray-800 hover:bg-gray-200 font-custom">À propos</a>
            <a href="#actions" class="block px-3 py-2 rounded-md text-base font-medium text-gray-800 hover:bg-gray-200 font-custom">Nos Actions</a>
            <a href="#contact" class="block px-3 py-2 rounded-md text-base font-medium text-gray-800 hover:bg-gray-200 font-custom">Contact</a>
            <a href="{{ route('branche') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-800 hover:bg-gray-200 font-custom">Branches</a>
        </div>
    </header>
    <!-- Hero -->
    <section class="relative hero-section overflow-hidden">
        <div class="relative w-full h-full flex items-center justify-center text-center">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-white">
                <h1 class="text-5xl font-extrabold sm:text-6xl">Santos - Branche Santé</h1>
                <p class="mt-4 text-xl">Découvrez les moments de nos événements.</p>
                <div class="mt-8">
                    <a href="#media-section" class="inline-block bg-santosYellow text-black px-8 py-3 font-medium rounded-md hover:bg-opacity-80 transition transform hover:scale-105 font-custom">
                        Voir les Médias
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Media Section -->
<section id="media-section" class="py-16 bg-santosGray">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-santosBlue mb-8 font-custom">Publications Médias</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @if ($posts->isNotEmpty())
    @foreach ($posts as $post)
        <div class="media-card">
            <img src="{{ asset($post->image_path) }}" alt="Media Post" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="text-lg font-semibold text-gray-800">{{ $post->title }}</h3>
                <p class="mt-2 text-gray-600">{{ $post->description }}</p>
                <div class="mt-4 flex">
                    <button class="like-button">Like ({{ $post->likes_count }})</button>
                    <button class="heart-button">J'aime ({{ $post->hearts_count }})</button>
                    <button class="comment-button">Commenter</button>
                </div>
            </div>
        </div>
    @endforeach
@else
    <p>Aucun post disponible pour le moment.</p>
@endif

        </div>
    </div>
</section>

    <!-- Footer -->
    <footer id="contact" class="bg-primary text-white" role="contentinfo">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex flex-col items-center text-center">
                <nav>
                    <ul class="flex flex-col space-y-2">
                        <li><a href="#top" class="text-sm font-bold hover:text-gray-200 font-custom">Accueil</a></li>
                        <li><a href="#about" class="text-sm font-bold hover:text-gray-200 font-custom">À propos</a></li>
                        <li><a href="#actions" class="text-sm font-bold hover:text-gray-200 font-custom">Nos Actions</a></li>
                        <li><a href="actualites.html" class="text-sm font-bold hover:text-gray-200 font-custom">Actualités</a></li>
                        <li><a href="#contact" class="text-sm font-bold hover:text-gray-200 font-custom">Contact</a></li>
                    </ul>
                </nav>
                <hr class="my-4 border-gray-300 w-full" />
                <p class="text-sm font-bold mt-4 font-custom">Basée à Yaoundé, Cameroun</p>
                <a href="#top" class="mt-4 inline-block text-sm font-bold hover:text-gray-200 font-custom">Retour en haut</a>
                <hr class="my-4 border-gray-300 w-full" />
                <p class="text-sm font-bold mt-4 font-custom">Organisation internationale. Tous droits réservés.</p>
                <p class="text-xs mt-2 font-custom">Suivez-nous sur nos réseaux sociaux :</p>
                <div class="flex space-x-4 mt-2">
                    <a href="https://www.facebook.com/profile.php?id=61568266295634" target="_blank" class="hover:opacity-80 font-custom" title="Facebook">
                        <img src="{{ asset('image/feacebook.jpg') }}" alt="Facebook" class="w-6 h-6 rounded-full">
                    </a>
                    <a href="https://whatsapp.com/channel/0029VaYTsNkD8SE42sDpnk1w" target="_blank" class="hover:opacity-80 font-custom" title="WhatsApp">
                        <img src="{{ asset('/image/wastapp.jpg') }}" alt="WhatsApp" class="w-6 h-6 rounded-full">
                    </a>
                    <a href="https://www.instagram.com/abec.officiel/" target="_blank" class="hover:opacity-80 font-custom" title="Instagram">
                        <img src="{{ asset('/image/insta.jpg') }}" alt="Instagram" class="w-6 h-6 rounded-full">
                    </a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
