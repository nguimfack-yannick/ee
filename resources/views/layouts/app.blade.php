<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABEC - ONG</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

       <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="64x64" href="{{ asset('image/ab.png') }}">

    <!-- Tailwind CDN & Police Inter -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <!-- Swiper.js -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

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

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <style>
      [x-cloak] { display: none; }
      body { font-family: 'Inter', sans-serif; background-color: #ffffff; }
      .partner-logo { width: 80px; height: 80px; object-fit: contain; transition: transform 0.3s; }
      .swiper-slide img { width: 100%; height: auto; max-height: 400px; object-fit: cover; }
      .swiper-slide-active .partner-logo { transform: scale(1.3); }
      .dropdown-menu { background-color: white; z-index: 50; }
      .font-all-bold, body, h1, h2, h3, p, a, li { font-weight: bold; }
    </style>
</head>
<body id="top" x-data="{ mobileMenuOpen: false }" class="bg-white font-all-bold flex flex-col min-h-screen">

    <!-- Top Bar avec réseaux sociaux -->
    <nav class="bg-primary text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-10">
            <div class="flex space-x-4">
                <a href="#" target="_blank"><img src="/image/feacebook.jpg" alt="Facebook" class="w-6 h-6 rounded-full"></a>
                <a href="#" target="_blank"><img src="/image/wastapp.jpg" alt="WhatsApp" class="w-6 h-6 rounded-full"></a>
                <a href="#" target="_blank"><img src="/image/insta.jpg" alt="Instagram" class="w-6 h-6 rounded-full"></a>
            </div>
            <a href="Contact@universalwelfare.org"><img src="/image/m.jpg" alt="Email" class="w-6 h-6 rounded-full"></a>
        </div>
    </nav>

    <!-- Header principal -->
  <!-- Header principal -->
<header class="bg-white shadow py-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-16">
        
        <!-- Logo réduit -->
        <div class="flex-shrink-0 w-20 flex justify-center"> <!-- Logo plus petit -->
            <img src="/image/ab.png" alt="logo" class="w-full h-auto">
        </div>

        <!-- Menu Desktop avec plus d'espace entre les liens -->
        <nav class="hidden md:flex space-x-6"> <!-- espace augmenté -->
            <a href="{{ url('/') }}" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Accueil</a>
                <a href="{{ url('/projects') }}" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Nos Actions</a>
            <a href="{{ url('/about') }}" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white">À propos</a>
            <a href="{{ url('/dons') }}" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Dons</a>
            <a href="#contact" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Contact</a>
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

    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen" x-cloak class="md:hidden px-2 pt-2 pb-3 space-y-1">
        <a href="{{ url('/') }}" class="block px-3 py-2 rounded-md text-base font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Accueil</a>
        <a href="{{ url('/about') }}" class="block px-3 py-2 rounded-md text-base font-bold text-gray-800 hover:bg-blue-500 hover:text-white">À propos</a>
        <a href="{{ url('/projects') }}" class="block px-3 py-2 rounded-md text-base font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Nos Actions</a>
        <a href="{{ url('/dons') }}" class="block px-3 py-2 rounded-md text-base font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Dons</a>
        <a href="{{ url('/contact') }}" class="block px-3 py-2 rounded-md text-base font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Contact</a>
    </div>
</header>


    <!-- Contenu dynamique Blade -->
    <main class="flex-1">
        @yield('content')
    </main>

    <!-- Footer moderne -->
    <footer id="contact" class="bg-primary text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-center">
            <nav>
                <ul class="flex flex-col space-y-2 sm:flex-row sm:space-x-6 sm:space-y-0 justify-center">
                    <li><a href="{{ url('/') }}" class="hover:text-gray-200">Accueil</a></li>
                    <li><a href="{{ url('/about') }}" class="hover:text-gray-200">À propos</a></li>
                    <li><a href="{{ url('/projects') }}" class="hover:text-gray-200">Nos Actions</a></li>
                    <li><a href="{{ url('/dons') }}" class="hover:text-gray-200">Faire un don</a></li>
                    <li><a href="{{ url('/contact') }}" class="hover:text-gray-200">Contact</a></li>
                </ul>
            </nav>
            <hr class="my-4 border-gray-300" />
            <p class="text-sm font-bold mt-4">Basée à Yaoundé, Cameroun</p>
            <p class="text-sm font-bold mt-2">Organisation internationale. Tous droits réservés.</p>
            <div class="flex justify-center space-x-4 mt-4">
                <a href="#"><img src="/image/feacebook.jpg" alt="Facebook" class="w-6 h-6 rounded-full"></a>
                <a href="#"><img src="/image/wastapp.jpg" alt="WhatsApp" class="w-6 h-6 rounded-full"></a>
                <a href="#"><img src="/image/insta.jpg" alt="Instagram" class="w-6 h-6 rounded-full"></a>
            </div>
        </div>
    </footer>

</body>
</html>
