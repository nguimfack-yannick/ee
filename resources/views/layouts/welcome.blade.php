<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>@yield('title', 'Organisation du Bien-Être Communautaire | ABEC International')</title>
    <meta name="description" content="@yield('meta_description', 'ABEC International œuvre pour le bien-être communautaire à travers des actions concrètes en santé, éducation et environnement.')">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="64x64" href="{{ asset('image/ab.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('image/ab.png') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Sora:wght@700;800;900&display=swap" rel="stylesheet">

    <!-- Remix Icons -->
    <link rel="stylesheet" href="https://unpkg.com/remixicon@3.5.0/fonts/remixicon.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        display: ['Sora', 'sans-serif'],
                    },
                    colors: {
                        primary: '#1E90FF',
                        primaryDark: '#0B5ED7',
                        secondary: '#87CEFA',
                        yellow: '#FFD700',
                        dark: '#0a0f1c',
                    }
                }
            }
        }
    </script>

    <!-- AlpineJS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')

    <style>
        [x-cloak] { display: none !important; }

        /* ===== GLOBAL ===== */
        *, *::before, *::after { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body {
            font-family: 'Inter', sans-serif;
            background-color: #ffffff;
            overflow-x: hidden;
        }
        .font-all-bold, body, h1, h2, h3, p, a, li { font-weight: bold; }

        /* ===== PAGE LOADER ===== */
        .page-loader {
            position: fixed; inset: 0; z-index: 99999;
            background: #fff;
            display: flex; align-items: center; justify-content: center;
            flex-direction: column; gap: 1rem;
            transition: opacity 0.7s ease;
        }
        .page-loader.loaded { opacity: 0; pointer-events: none; }
        .loader-ring {
            position: relative; width: 60px; height: 60px;
        }
        .loader-ring::before {
            content: '';
            position: absolute; inset: 0;
            border: 4px solid rgba(30,144,255,0.15);
            border-top-color: #1E90FF;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        .loader-ring img {
            position: absolute; top: 50%; left: 50%;
            transform: translate(-50%, -50%);
            width: 36px; height: 36px;
            object-fit: contain;
        }
        @keyframes spin { to { transform: rotate(360deg); } }

        /* ===== HEADER PREMIUM ===== */
        .site-header {
            position: fixed; top: 0; left: 0; right: 0;
            z-index: 9000;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Top bar announcement */
        .top-announcement {
            background: linear-gradient(90deg, #1E90FF 0%, #0B5ED7 50%, #1E90FF 100%);
            background-size: 200% 100%;
            animation: shimmer-bg 4s ease infinite;
            overflow: hidden;
            white-space: nowrap;
            height: 36px;
            display: flex; align-items: center;
            position: relative;
        }
        @keyframes shimmer-bg {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .announcement-scroll {
            display: inline-block;
            animation: announcement-run 20s linear infinite;
            font-size: 0.78rem;
            font-weight: 700;
            color: #FFD700;
            letter-spacing: 0.05em;
            padding-left: 100%;
            white-space: nowrap;
        }
        @keyframes announcement-run {
            from { transform: translateX(0); }
            to   { transform: translateX(-100%); }
        }
        .top-announcement .social-links {
            position: absolute; right: 1rem; top: 50%; transform: translateY(-50%);
            display: flex; align-items: center; gap: 0.5rem;
        }
        .top-social-icon {
            width: 22px; height: 22px; border-radius: 50%;
            overflow: hidden;
            border: 1px solid rgba(255,255,255,0.3);
            transition: transform 0.2s ease, border-color 0.2s ease;
        }
        .top-social-icon:hover { transform: scale(1.1); border-color: #FFD700; }
        .top-social-icon img { width: 100%; height: 100%; object-fit: cover; }

        /* Main nav area */
        .nav-glass {
            background: rgba(255, 255, 255, 0.97);
            backdrop-filter: blur(16px) saturate(180%);
            -webkit-backdrop-filter: blur(16px) saturate(180%);
            border-bottom: 1px solid rgba(0, 0, 0, 0.06);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .nav-glass.scrolled {
            background: rgba(255, 255, 255, 0.99);
            box-shadow: 0 4px 24px -4px rgba(0,0,0,0.12), 0 1px 0 rgba(0,0,0,0.04);
        }
        .nav-inner {
            max-width: 1280px; margin: 0 auto;
            padding: 0 1rem;
            display: flex; align-items: center; justify-content: space-between;
            height: 68px;
            transition: height 0.4s ease;
        }
        .nav-glass.scrolled .nav-inner { height: 58px; }

        /* Logo */
        .nav-logo {
            display: flex; align-items: center; gap: 0.75rem;
            text-decoration: none;
        }
        .nav-logo-img-wrap {
            width: 48px; height: 48px;
            border-radius: 50%;
            overflow: hidden;
            border: 2px solid transparent;
            background: linear-gradient(white, white) padding-box,
                        linear-gradient(135deg, #1E90FF, #FFD700) border-box;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            flex-shrink: 0;
        }
        .nav-logo:hover .nav-logo-img-wrap {
            transform: scale(1.05);
            box-shadow: 0 4px 20px rgba(30,144,255,0.3);
        }
        .nav-logo-img-wrap img { width: 100%; height: 100%; object-fit: cover; }
        .nav-logo-text { line-height: 1; }
        .nav-logo-name {
            font-family: 'Sora', sans-serif;
            font-size: 1.3rem; font-weight: 900;
            color: #111827;
            letter-spacing: -0.02em;
            transition: color 0.3s ease;
        }
        .nav-logo:hover .nav-logo-name { color: #1E90FF; }
        .nav-logo-tagline {
            font-size: 0.6rem; font-weight: 700;
            text-transform: uppercase; letter-spacing: 0.12em;
            color: #9ca3af;
            margin-top: 2px;
        }

        /* Desktop Nav Links */
        .nav-links { display: flex; align-items: center; gap: 0.25rem; }
        .nav-link-item {
            position: relative;
            padding: 0.4rem 0.85rem;
            border-radius: 0.5rem;
            font-size: 0.875rem; font-weight: 700;
            color: #374151;
            text-decoration: none;
            transition: color 0.25s ease, background-color 0.25s ease;
        }
        .nav-link-item::after {
            content: '';
            position: absolute; bottom: -2px; left: 0.85rem; right: 0.85rem;
            height: 2px; background: #1E90FF; border-radius: 9999px;
            transform: scaleX(0);
            transform-origin: center;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .nav-link-item:hover { color: #1E90FF; background-color: rgba(30,144,255,0.06); }
        .nav-link-item:hover::after, .nav-link-item.active::after { transform: scaleX(1); }
        .nav-link-item.active { color: #1E90FF; }

        /* Donate button in header */
        .btn-header-donate {
            display: inline-flex; align-items: center; gap: 0.4rem;
            padding: 0.55rem 1.4rem;
            background: linear-gradient(135deg, #FFD700 0%, #F59E0B 100%);
            color: #000;
            font-weight: 800; font-size: 0.875rem;
            border-radius: 9999px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 14px rgba(255,215,0,0.35);
            white-space: nowrap;
        }
        .btn-header-donate:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(255,215,0,0.5);
        }

        /* Mobile menu */
        .mobile-nav-overlay {
            position: fixed; inset: 0; z-index: 8999;
            background: rgba(0,0,0,0.4); backdrop-filter: blur(4px);
            opacity: 0; pointer-events: none;
            transition: opacity 0.3s ease;
        }
        .mobile-nav-overlay.open { opacity: 1; pointer-events: all; }
        .mobile-nav-panel {
            position: fixed; top: 0; right: 0; bottom: 0;
            width: min(320px, 85vw);
            background: #fff;
            z-index: 9100;
            transform: translateX(100%);
            transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            overflow-y: auto;
            display: flex; flex-direction: column;
        }
        .mobile-nav-panel.open { transform: translateX(0); }
        .mobile-nav-panel-header {
            display: flex; align-items: center; justify-content: space-between;
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid #f3f4f6;
        }
        .mobile-nav-close {
            width: 36px; height: 36px;
            border-radius: 50%; background: #f3f4f6;
            display: flex; align-items: center; justify-content: center;
            color: #374151; cursor: pointer;
            transition: background 0.2s ease, color 0.2s ease;
        }
        .mobile-nav-close:hover { background: #fee2e2; color: #ef4444; }
        .mobile-nav-links { padding: 1rem 1rem 1.5rem; flex: 1; }
        .mobile-nav-link {
            display: flex; align-items: center; gap: 0.85rem;
            padding: 0.9rem 1rem; border-radius: 0.75rem;
            color: #374151; font-weight: 700; font-size: 0.95rem;
            text-decoration: none;
            transition: background 0.2s ease, color 0.2s ease;
            margin-bottom: 0.25rem;
        }
        .mobile-nav-link .icon-wrap {
            width: 40px; height: 40px; border-radius: 0.6rem;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.1rem; flex-shrink: 0;
        }
        .mobile-nav-link:hover { background: #eff6ff; color: #1E90FF; }
        .mobile-nav-footer { padding: 1.5rem; border-top: 1px solid #f3f4f6; }

        /* ===== FOOTER PREMIUM ===== */
        /* Footer Marquee */
        .footer-marquee {
            background: rgba(255, 255, 255, 0.05);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 1rem 0;
            overflow: hidden;
            white-space: nowrap;
        }
        .footer-marquee-content {
            display: inline-block;
            animation: footer-marquee-run 15s linear infinite;
            font-family: 'Sora', sans-serif;
            font-size: 1.25rem;
            font-weight: 900;
            color: #FFD700;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            padding-left: 100%;
        }
        @keyframes footer-marquee-run {
            from { transform: translateX(0); }
            to   { transform: translateX(-100%); }
        }

        .site-footer {
            background: linear-gradient(160deg, #0c1f3f 0%, #1E90FF 60%, #0c1f3f 100%);
            position: relative; overflow: hidden;
            color: white;
            padding-top: 5rem;
        }
        .footer-wave-top {
            position: absolute; top: 0; left: 0; width: 100%;
            overflow: hidden; line-height: 0;
            transform: translateY(-1px);
        }
        .footer-wave-top svg {
            position: relative; display: block;
            width: calc(100% + 1.3px); height: 60px;
        }
        .footer-wave-top .shape-fill { fill: #ffffff; }
        .footer-glow-orb {
            position: absolute; border-radius: 50%;
            pointer-events: none; filter: blur(80px);
        }
        .footer-glow-1 {
            width: 700px; height: 700px;
            background: radial-gradient(circle, rgba(255,215,0,0.1) 0%, transparent 70%);
            top: -350px; right: -200px;
        }
        .footer-glow-2 {
            width: 500px; height: 500px;
            background: radial-gradient(circle, rgba(255,255,255,0.05) 0%, transparent 70%);
            bottom: -200px; left: -100px;
        }
        .footer-social-btn {
            display: flex; align-items: center; justify-content: center;
            width: 42px; height: 42px; border-radius: 50%;
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.2);
            color: white; font-size: 1.1rem;
            text-decoration: none;
            transition: all 0.3s ease;
            backdrop-filter: blur(4px);
        }
        .footer-social-btn:hover {
            background: #FFD700; color: #000;
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(255,215,0,0.4);
            border-color: #FFD700;
        }
        .footer-nav-title {
            font-size: 0.8rem; font-weight: 800;
            text-transform: uppercase; letter-spacing: 0.12em;
            color: rgba(255,255,255,0.5);
            margin-bottom: 1.25rem;
            display: flex; align-items: center; gap: 0.5rem;
        }
        .footer-nav-title::before {
            content: '';
            width: 24px; height: 2px;
            background: #FFD700; border-radius: 9999px;
        }
        .footer-link-item {
            display: flex; align-items: center; gap: 0.5rem;
            color: rgba(255,255,255,0.7); font-size: 0.9rem; font-weight: 600;
            text-decoration: none;
            padding: 0.35rem 0;
            transition: color 0.3s ease, transform 0.3s ease, gap 0.3s ease;
        }
        .footer-link-item i { color: #FFD700; font-size: 0.9rem; transition: transform 0.3s ease; }
        .footer-link-item:hover { color: #FFD700; transform: translateX(5px); gap: 0.75rem; }
        .footer-link-item:hover i { transform: translateX(3px); }
        .footer-contact-card {
            background: rgba(0,0,0,0.2);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 1rem;
            padding: 1.5rem;
        }
        .footer-contact-row {
            display: flex; align-items: flex-start; gap: 0.85rem;
            padding: 0.75rem 0;
            border-bottom: 1px solid rgba(255,255,255,0.06);
        }
        .footer-contact-row:last-child { border-bottom: none; padding-bottom: 0; }
        .footer-contact-icon {
            width: 36px; height: 36px; border-radius: 0.5rem;
            background: rgba(255,215,0,0.15);
            display: flex; align-items: center; justify-content: center;
            color: #FFD700; font-size: 1rem; flex-shrink: 0;
        }
        .footer-contact-label {
            font-size: 0.7rem; font-weight: 800;
            text-transform: uppercase; letter-spacing: 0.1em;
            color: rgba(255,255,255,0.4); margin-bottom: 2px;
        }
        .footer-contact-value { color: white; font-weight: 600; font-size: 0.9rem; }

        /* Footer CTA */
        .footer-cta {
            background: linear-gradient(135deg, #FFD700 0%, #F59E0B 100%);
            border-radius: 1.5rem; padding: 2.5rem;
            position: relative; overflow: hidden;
            margin: 3rem 0;
        }
        .footer-cta::before {
            content: '';
            position: absolute; inset: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23000' fill-opacity='0.04'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        .footer-cta-btn {
            display: inline-flex; align-items: center; gap: 0.6rem;
            background: #000; color: #fff;
            padding: 0.9rem 2rem; border-radius: 0.75rem;
            font-weight: 800; font-size: 0.95rem;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }
        .footer-cta-btn:hover { background: #1a1a1a; transform: translateY(-2px); box-shadow: 0 12px 30px rgba(0,0,0,0.3); }

        /* Back to top */
        #btt-btn {
            position: fixed; bottom: 1.5rem; right: 1.5rem;
            width: 46px; height: 46px;
            background: #1E90FF; color: white;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.25rem; z-index: 40;
            box-shadow: 0 4px 14px rgba(30,144,255,0.5);
            opacity: 0; transform: translateY(20px);
            transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
        }
        #btt-btn.visible { opacity: 1; transform: translateY(0); }
        #btt-btn:hover { background: #FFD700; color: #000; transform: translateY(-3px); box-shadow: 0 8px 24px rgba(255,215,0,0.5); }

        /* Section enter animations */
        .section-animate {
            opacity: 0; transform: translateY(28px);
            transition: opacity 0.75s ease, transform 0.75s ease;
        }
        .section-animate.visible { opacity: 1; transform: translateY(0); }
    </style>
</head>
<body class="flex flex-col min-h-screen antialiased">

    <!-- ===== PAGE LOADER ===== -->
    <div class="page-loader" id="page-loader">
        <div class="loader-ring">
            <img src="{{ asset('image/ab.png') }}" alt="Logo ABEC">
        </div>
        <p style="font-size:0.75rem; font-weight:700; color:#9ca3af; letter-spacing:0.1em; text-transform:uppercase;">Chargement...</p>
    </div>

    <!-- ===== HEADER PREMIUM ===== -->
    <header class="site-header" id="site-header">

        <!-- Bande d'annonce supérieure -->
        <div class="top-announcement hidden sm:flex">
            <span class="announcement-scroll">
                🌍 Agir ensemble pour le Bien-Être Communautaire — ABEC International &nbsp;&nbsp;|&nbsp;&nbsp;
                ✓ Actions en Santé, Éducation, Environnement &nbsp;&nbsp;|&nbsp;&nbsp;
                💛 Soutenez notre mission — Faites un don aujourd'hui &nbsp;&nbsp;|&nbsp;&nbsp;
                🌍 Agir ensemble pour le Bien-Être Communautaire — ABEC International &nbsp;&nbsp;|&nbsp;&nbsp;
                ✓ Actions en Santé, Éducation, Environnement &nbsp;&nbsp;|&nbsp;&nbsp;
                💛 Soutenez notre mission — Faites un don aujourd'hui
            </span>
            <div class="social-links">
                <a href="https://www.facebook.com/profile.php?id=61568266295634" target="_blank" class="top-social-icon" title="Facebook">
                    <img src="{{ asset('image/feacebook.jpg') }}" alt="Facebook">
                </a>
                <a href="https://whatsapp.com/channel/0029VaYTsNkD8SE42sDpnk1w" target="_blank" class="top-social-icon" title="WhatsApp">
                    <img src="{{ asset('image/wastapp.jpg') }}" alt="WhatsApp">
                </a>
                <a href="https://www.instagram.com/abec.officiel/" target="_blank" class="top-social-icon" title="Instagram">
                    <img src="{{ asset('image/insta.jpg') }}" alt="Instagram">
                </a>
                <a href="https://mail.google.com/mail/?view=cm&to=contact@universalwelfare.org" target="_blank" class="top-social-icon" title="Email">
                    <img src="{{ asset('image/m.jpg') }}" alt="Email">
                </a>
            </div>
        </div>

        <!-- Navigation principale -->
        <div class="nav-glass" id="nav-glass">
            <div class="nav-inner">

                <!-- Logo -->
                <a href="{{ url('/') }}" class="nav-logo">
                    <div class="nav-logo-img-wrap">
                        <img src="{{ asset('image/ab.png') }}" alt="Logo ABEC">
                    </div>
                    <div class="nav-logo-text hidden sm:block">
                        <div class="nav-logo-name">ABEC</div>
                        <div class="nav-logo-tagline">International</div>
                    </div>
                </a>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex nav-links">
                    <a href="{{ url('/') }}" class="nav-link-item {{ request()->is('/') ? 'active' : '' }}">Accueil</a>
                    <a href="#actions" class="nav-link-item">Nos Actions</a>
                    <a href="{{ route('aPropos') }}" class="nav-link-item {{ request()->routeIs('aPropos') ? 'active' : '' }}">À propos</a>
                    <a href="{{ route('news') }}" class="nav-link-item {{ request()->routeIs('news') ? 'active' : '' }}">News</a>
                    <a href="{{ route('branche') }}" class="nav-link-item {{ request()->routeIs('branche') ? 'active' : '' }}">Événements</a>
                    <a href="#contact" class="nav-link-item">Contact</a>
                </nav>

                <!-- Desktop Actions -->
                <div class="hidden md:flex items-center gap-3">
                    <a href="{{ url('/dons') }}" class="btn-header-donate">
                        <i class="ri-heart-3-fill text-red-500"></i>
                        Faire un don
                    </a>
                </div>

                <!-- Mobile Hamburger -->
                <button id="mobile-menu-toggle" class="md:hidden w-10 h-10 rounded-xl bg-gray-100 flex items-center justify-center text-gray-700 hover:bg-blue-50 hover:text-primary transition-colors" aria-label="Ouvrir le menu">
                    <i class="ri-menu-4-line text-xl" id="hamburger-icon"></i>
                    <i class="ri-close-line text-xl hidden" id="close-icon"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- Mobile Nav Overlay -->
    <div class="mobile-nav-overlay" id="mobile-overlay"></div>

    <!-- Mobile Nav Panel -->
    <div class="mobile-nav-panel" id="mobile-panel">
        <div class="mobile-nav-panel-header">
            <div class="flex items-center gap-3">
                <img src="{{ asset('image/ab.png') }}" alt="Logo" class="w-8 h-8 rounded-full">
                <div>
                    <div style="font-family:'Sora',sans-serif; font-weight:900; font-size:1rem; color:#111;">ABEC</div>
                    <div style="font-size:0.6rem; font-weight:700; text-transform:uppercase; letter-spacing:0.1em; color:#9ca3af;">International</div>
                </div>
            </div>
            <button class="mobile-nav-close" id="mobile-menu-close" aria-label="Fermer">
                <i class="ri-close-line text-lg"></i>
            </button>
        </div>
        <div class="mobile-nav-links">
            <a href="{{ url('/') }}" class="mobile-nav-link">
                <span class="icon-wrap" style="background:#eff6ff; color:#1E90FF;"><i class="ri-home-smile-2-line"></i></span>
                Accueil
            </a>
            <a href="#actions" class="mobile-nav-link" id="mobile-actions-link">
                <span class="icon-wrap" style="background:#fef3c7; color:#d97706;"><i class="ri-heart-pulse-line"></i></span>
                Nos Actions
            </a>
            <a href="{{ route('aPropos') }}" class="mobile-nav-link">
                <span class="icon-wrap" style="background:#ede9fe; color:#7c3aed;"><i class="ri-team-line"></i></span>
                À propos
            </a>
            <a href="{{ route('news') }}" class="mobile-nav-link">
                <span class="icon-wrap" style="background:#f0fdf4; color:#16a34a;"><i class="ri-newspaper-line"></i></span>
                News
            </a>
            <a href="{{ route('branche') }}" class="mobile-nav-link">
                <span class="icon-wrap" style="background:#fdf2f8; color:#9d174d;"><i class="ri-calendar-event-line"></i></span>
                Événements
            </a>
            <a href="#contact" class="mobile-nav-link" id="mobile-contact-link">
                <span class="icon-wrap" style="background:#ecfeff; color:#0891b2;"><i class="ri-map-pin-2-line"></i></span>
                Contact
            </a>
        </div>
        <div class="mobile-nav-footer">
            <a href="{{ url('/dons') }}" class="btn-header-donate w-full justify-center py-3 rounded-xl text-base">
                <i class="ri-heart-3-fill text-red-500"></i>
                Faire un don
            </a>
            <div class="flex justify-center gap-4 mt-4">
                <a href="https://www.facebook.com/profile.php?id=61568266295634" target="_blank" class="footer-social-btn"><i class="ri-facebook-fill"></i></a>
                <a href="https://whatsapp.com/channel/0029VaYTsNkD8SE42sDpnk1w" target="_blank" class="footer-social-btn"><i class="ri-whatsapp-line"></i></a>
                <a href="https://www.instagram.com/abec.officiel/" target="_blank" class="footer-social-btn"><i class="ri-instagram-line"></i></a>
            </div>
        </div>
    </div>

    <!-- ===== MAIN CONTENT ===== -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- ===== FOOTER PREMIUM ===== -->
        <!-- Phrase défilante premium -->
        <div class="footer-marquee">
            <span class="footer-marquee-content">
                Agir — Grandir — Changer &nbsp;&nbsp;&bull;&nbsp;&nbsp;
                Agir — Grandir — Changer &nbsp;&nbsp;&bull;&nbsp;&nbsp;
                Agir — Grandir — Changer &nbsp;&nbsp;&bull;&nbsp;&nbsp;
                Agir — Grandir — Changer
            </span>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 py-16">
            <!-- Grille principale -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10">

                <!-- Colonne Marque (5 colonnes) -->
                <div class="lg:col-span-5 space-y-6">
                    <div class="flex items-center gap-4">
                        <div class="w-16 h-16 bg-white rounded-2xl shadow-xl flex items-center justify-center p-2 transform -rotate-3 hover:rotate-0 transition-transform duration-300">
                            <img src="{{ asset('image/ab.png') }}" alt="Logo ABEC" class="w-full h-full object-contain">
                        </div>
                        <div>
                            <h2 class="text-3xl font-black text-white leading-none" style="font-family:'Sora',sans-serif;">ABEC</h2>
                            <p class="text-yellow-400 text-xs font-black uppercase tracking-widest mt-1" style="color:#FFD700;">Association du Bien-Être Communautaire</p>
                        </div>
                    </div>

                    <p class="text-white/80 leading-relaxed font-medium text-lg italic">
                        "Nous œuvrons depuis 2021 pour améliorer les conditions de vie des communautés vulnérables dans plusieurs Pays."
                    </p>
                    
                    <div class="flex items-center gap-4 pt-2">
                        <a href="https://www.facebook.com/profile.php?id=61568266295634" target="_blank" class="footer-social-btn" title="Facebook">
                            <i class="ri-facebook-fill"></i>
                        </a>
                        <a href="https://whatsapp.com/channel/0029VaYTsNkD8SE42sDpnk1w" target="_blank" class="footer-social-btn" title="WhatsApp">
                            <i class="ri-whatsapp-line"></i>
                        </a>
                        <a href="https://www.instagram.com/abec.officiel/" target="_blank" class="footer-social-btn" title="Instagram">
                            <i class="ri-instagram-line"></i>
                        </a>
                        <a href="https://mail.google.com/mail/?view=cm&to=contact@universalwelfare.org" target="_blank" class="footer-social-btn" title="Email">
                            <i class="ri-mail-line"></i>
                        </a>
                    </div>
                </div>

                <!-- Colonne Navigation (3 colonnes, offset 6) -->
                <div class="lg:col-span-3 lg:col-start-6">
                    <p class="footer-nav-title">Navigation</p>
                    <ul class="space-y-2">
                        <li><a href="{{ url('/') }}" class="footer-link-item"><i class="ri-arrow-right-s-line"></i> Accueil</a></li>
                        <li><a href="{{ route('aPropos') }}" class="footer-link-item"><i class="ri-arrow-right-s-line"></i> Qui sommes-nous ?</a></li>
                        <li><a href="{{ url('/news') }}" class="footer-link-item"><i class="ri-arrow-right-s-line"></i> Actualités</a></li>
                        <li><a href="{{ url('/branche') }}" class="footer-link-item"><i class="ri-arrow-right-s-line"></i> Événements</a></li>
                        <li><a href="{{ url('/faq') }}" class="footer-link-item"><i class="ri-arrow-right-s-line"></i> FAQ</a></li>
                        <li><a href="{{ url('/dons') }}" class="footer-link-item" style="color:#FFD700;"><i class="ri-heart-pulse-fill"></i> Faire un don</a></li>
                    </ul>
                </div>

                <!-- Colonne Contact (4 colonnes) -->
                <div class="lg:col-span-4">
                    <p class="footer-nav-title">Nous Contacter</p>
                    <div class="footer-contact-card">
                        <div class="footer-contact-row">
                            <div class="footer-contact-icon"><i class="ri-map-pin-2-fill"></i></div>
                            <div>
                                <div class="footer-contact-label">Siège Social</div>
                                <div class="footer-contact-value">Yaoundé, Cameroun</div>
                            </div>
                        </div>
                        <div class="footer-contact-row">
                            <div class="footer-contact-icon"><i class="ri-phone-fill"></i></div>
                            <div>
                                <div class="footer-contact-label">Téléphone</div>
                                <div class="footer-contact-value">+237 6 21 62 06 77</div>
                                <div class="footer-contact-value">+237 6 91 42 53 34</div>
                            </div>
                        </div>
                        <div class="footer-contact-row">
                            <div class="footer-contact-icon"><i class="ri-mail-send-fill"></i></div>
                            <div>
                                <div class="footer-contact-label">Email</div>
                                <a href="https://mail.google.com/mail/?view=cm&to=contact@universalwelfare.org" target="_blank" class="footer-contact-value" style="color:#FFD700; text-decoration:none; transition:opacity 0.2s;">contact@universalwelfare.org</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Banner -->
            <div class="footer-cta">
                <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-6">
                    <div>
                        <h4 class="text-2xl font-black text-black mb-1" style="font-family:'Sora',sans-serif;">Prêt à faire la différence ?</h4>
                        <p class="text-black/70 font-semibold">Rejoignez une communauté engagée — chaque contribution compte.</p>
                    </div>
                    <a href="{{ url('/dons') }}" class="footer-cta-btn whitespace-nowrap">
                        Aider maintenant <i class="ri-arrow-right-line"></i>
                    </a>
                </div>
            </div>

            <!-- Bottom bar -->
            <div class="border-t border-white/10 pt-6 flex flex-col md:flex-row justify-between items-center gap-4 text-sm font-medium text-white/50">
                <p>&copy; {{ date('Y') }} ABEC International. Tous droits réservés.</p>
                <div class="flex flex-wrap gap-4 md:gap-6 justify-center">
                    <a href="{{ route('mention') }}" class="hover:text-yellow-300 transition-colors" style="--tw-text-yellow-300:#FFD700;">Mentions Légales</a>
                    <a href="{{ route('politique') }}" class="hover:text-yellow-300 transition-colors">Politique de confidentialité</a>
                    <a href="{{ route('copitt') }}" class="hover:text-yellow-300 transition-colors">Conditions Générales</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to top button -->
    <button id="btt-btn" aria-label="Retour en haut">
        <i class="ri-arrow-up-line"></i>
    </button>

    @stack('scripts')

    <script>
        // ===== PAGE LOADER =====
        window.addEventListener('load', () => {
            setTimeout(() => document.getElementById('page-loader').classList.add('loaded'), 350);
        });

        // ===== HEADER SCROLL EFFECT =====
        const navGlass = document.getElementById('nav-glass');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 40) {
                navGlass.classList.add('scrolled');
            } else {
                navGlass.classList.remove('scrolled');
            }
        }, { passive: true });

        // ===== MOBILE MENU =====
        const toggleBtn  = document.getElementById('mobile-menu-toggle');
        const closeBtn   = document.getElementById('mobile-menu-close');
        const overlay    = document.getElementById('mobile-overlay');
        const panel      = document.getElementById('mobile-panel');
        const hamIcon    = document.getElementById('hamburger-icon');
        const closeIcon  = document.getElementById('close-icon');

        function openMobileMenu() {
            panel.classList.add('open');
            overlay.classList.add('open');
            hamIcon.classList.add('hidden');
            closeIcon.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
        function closeMobileMenu() {
            panel.classList.remove('open');
            overlay.classList.remove('open');
            hamIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
            document.body.style.overflow = '';
        }

        toggleBtn && toggleBtn.addEventListener('click', openMobileMenu);
        closeBtn  && closeBtn.addEventListener('click', closeMobileMenu);
        overlay   && overlay.addEventListener('click', closeMobileMenu);

        // Close on anchor link click in mobile
        ['mobile-actions-link', 'mobile-contact-link'].forEach(id => {
            const el = document.getElementById(id);
            el && el.addEventListener('click', closeMobileMenu);
        });

        // ===== BACK TO TOP =====
        const bttBtn = document.getElementById('btt-btn');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 400) {
                bttBtn.classList.add('visible');
            } else {
                bttBtn.classList.remove('visible');
            }
        }, { passive: true });
        bttBtn && bttBtn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

        // ===== SCROLL REVEAL =====
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        document.querySelectorAll('.section-animate').forEach(el => revealObserver.observe(el));

        // Active nav link highlighting (footer links)
        document.querySelectorAll('.hover\\:text-yellow-300').forEach(a => {
            a.style.transition = 'color 0.3s';
            a.addEventListener('mouseover', () => a.style.color = '#FFD700');
            a.addEventListener('mouseout',  () => a.style.color = '');
        });
    </script>
</body>
</html>
