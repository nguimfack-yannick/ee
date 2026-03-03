@extends('layouts.welcome')

@section('title', 'Accueil | Organisation du Bien-Être Communautaire | ABEC International')
@section('meta_description', 'ABEC International - Une organisation internationale de jeunes engagés pour le bien-être communautaire : santé, éducation, environnement, droits humains.')

@push('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Arial+Black&display=swap');
    
    /* Animation de la flèche vers le bas */
    @keyframes bounceDown {
        0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
        40% { transform: translateY(6px); }
        60% { transform: translateY(3px); }
    }
    .bounce-down-arrow {
        display: inline-block;
        animation: bounceDown 2s infinite;
        color: #1E90FF;
        margin-left: 6px;
        vertical-align: middle;
    }

    /* Flèche animée bleue pointant vers la section actions */
    .animated-arrow {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        cursor: pointer;
        z-index: 10;
    }
    .arrow-bounce { animation: bounce 2s infinite; }
    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
        40% { transform: translateY(-10px); }
        60% { transform: translateY(-5px); }
    }
    .arrow-svg {
        width: 40px; height: 40px;
        fill: #1E90FF;
        filter: drop-shadow(0 2px 4px rgba(0,0,0,0.3));
        transition: all 0.3s ease;
    }
    .arrow-svg:hover { fill: #0D47A1; transform: scale(1.1); }

    /* PARTNERS MARQUEE PREMIUM */
    @keyframes marquee-infinite {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }
    .animate-marquee-infinite {
        animation: marquee-infinite 40s linear infinite;
        display: flex;
        width: max-content;
    }
    .marquee-track:hover .animate-marquee-infinite { animation-play-state: paused; }

    .partner-glass-card {
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 1.25rem;
        padding: 2.5rem;
        margin: 0 1rem;
        width: 180px;
        height: 120px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        flex-shrink: 0;
    }
    .partner-glass-card:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: rgba(255, 215, 0, 0.4);
        transform: translateY(-8px) scale(1.05);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
    }
    .partner-logo-img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
        filter: grayscale(1) brightness(2);
        opacity: 0.7;
        transition: all 0.4s ease;
    }
    .partner-glass-card:hover .partner-logo-img {
        filter: grayscale(0) brightness(1);
        opacity: 1;
    }
        /* PARTNERS MARQUEE PREMIUM */
        @keyframes marquee-infinite {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee-infinite {
            animation: marquee-infinite 40s linear infinite;
            display: flex;
            width: max-content;
        }
        .marquee-track:hover .animate-marquee-infinite {
            animation-play-state: paused;
        }
        .marquee-fade-left {
            position: absolute; top: 0; left: 0; width: 15%; height: 100%;
            background: linear-gradient(to right, #f3f4f6 0%, transparent 100%);
            z-index: 2; pointer-events: none;
        }
        .marquee-fade-right {
            position: absolute; top: 0; right: 0; width: 15%; height: 100%;
            background: linear-gradient(to left, #f3f4f6 0%, transparent 100%);
            z-index: 2; pointer-events: none;
        }
        .partner-glass-card {
            background: #ffffff;
            border: 1px solid #f1f3f5;
            border-radius: 1.5rem;
            padding: 1.25rem 2.25rem;
            width: 270px;
            height: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 3rem;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05), 0 2px 5px rgba(0,0,0,0.02);
            transition: all 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            flex-shrink: 0;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }
        .partner-glass-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(30,144,255,0.05) 0%, transparent 100%);
            opacity: 0;
            transition: opacity 0.4s ease;
        }
        .partner-glass-card:hover {
            transform: translateY(-12px);
            border-color: #1E90FF;
            box-shadow: 0 25px 50px -12px rgba(30,144,255,0.15);
        }
        .partner-glass-card:hover::before {
            opacity: 1;
        }
        .partner-logo-img {
            max-width: 90%;
            max-height: 90%;
            object-fit: contain;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.05));
            transition: all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        .partner-glass-card:hover .partner-logo-img {
            transform: scale(1.1);
            filter: drop-shadow(0 8px 15px rgba(30,144,255,0.2));
        }
        /* ===== HERO CAROUSEL PREMIUM ===== */
        #heroCarousel {
            position: relative;
            width: 100%;
            height: 100vh;
            min-height: 500px;
            overflow: hidden;
            touch-action: pan-y;
            user-select: none;
        }
        @media (max-width: 640px) { #heroCarousel { height: 80vh; min-height: 420px; } }
        .hero-slide {
            position: absolute; inset: 0;
            opacity: 0;
            transition: opacity 1.2s ease-in-out;
            z-index: 1;
        }
        .hero-slide.active { opacity: 1; z-index: 2; }
        .hero-slide-bg {
            position: absolute; inset: 0;
            background-size: cover;
            background-position: center;
            transform: scale(1.08);
            transition: transform 8s ease-in-out;
        }
        .hero-slide.active .hero-slide-bg { transform: scale(1); }
        .hero-slide-overlay {
            position: absolute; inset: 0;
            background: linear-gradient(135deg, rgba(0,0,30,0.68) 0%, rgba(30,144,255,0.18) 60%, rgba(0,0,0,0.55) 100%);
        }
        .hero-slide-content {
            position: relative; z-index: 3;
            display: flex; flex-direction: column;
            align-items: center; justify-content: center;
            height: 100%; text-align: center; padding: 0 1.5rem;
        }
        .hero-tag {
            display: inline-block;
            background: rgba(255,215,0,0.18);
            border: 1px solid rgba(255,215,0,0.55);
            color: #FFD700;
            font-size: 0.7rem; letter-spacing: 0.18em; text-transform: uppercase;
            padding: 0.25rem 0.85rem; border-radius: 9999px;
            margin-bottom: 1rem;
            opacity: 0; transform: translateY(20px);
            transition: opacity 0.7s ease 0.2s, transform 0.7s ease 0.2s;
        }
        .hero-slide.active .hero-tag { opacity: 1; transform: translateY(0); }
        .hero-title {
            font-size: clamp(1.8rem, 5.5vw, 3.8rem);
            font-weight: 900; color: #fff;
            line-height: 1.15; max-width: 860px;
            text-shadow: 0 4px 24px rgba(0,0,0,0.45);
            opacity: 0; transform: translateY(30px);
            transition: opacity 0.8s ease 0.35s, transform 0.8s ease 0.35s;
        }
        .hero-slide.active .hero-title { opacity: 1; transform: translateY(0); }
        .hero-sub {
            margin-top: 1rem;
            font-size: clamp(0.85rem, 2vw, 1.1rem);
            color: rgba(255,255,255,0.85); max-width: 600px;
            opacity: 0; transform: translateY(20px);
            transition: opacity 0.8s ease 0.55s, transform 0.8s ease 0.55s;
        }
        .hero-slide.active .hero-sub { opacity: 1; transform: translateY(0); }
        .hero-btns {
            margin-top: 2rem; display: flex; gap: 1rem; flex-wrap: wrap; justify-content: center;
            opacity: 0; transform: translateY(20px);
            transition: opacity 0.8s ease 0.75s, transform 0.8s ease 0.75s;
        }
        .hero-slide.active .hero-btns { opacity: 1; transform: translateY(0); }
        .hero-btn-primary {
            background: #FFD700; color: #000;
            font-weight: 800; font-size: 0.9rem;
            padding: 0.75rem 1.8rem; border-radius: 0.6rem;
            transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 0.4rem;
        }
        .hero-btn-primary:hover { background: #fff; transform: translateY(-2px); box-shadow: 0 8px 24px rgba(255,215,0,0.4); }
        .hero-btn-secondary {
            background: transparent;
            border: 2px solid rgba(255,255,255,0.7);
            color: #fff; font-weight: 700; font-size: 0.9rem;
            padding: 0.75rem 1.8rem; border-radius: 0.6rem;
            transition: all 0.3s ease;
        }
        .hero-btn-secondary:hover { background: rgba(255,255,255,0.15); transform: translateY(-2px); }
        /* Nav arrows */
        .hero-arrow {
            position: absolute; top: 50%; transform: translateY(-50%);
            z-index: 10; width: 46px; height: 46px;
            background: rgba(255,255,255,0.12);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255,255,255,0.25);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            color: #fff; cursor: pointer;
            transition: all 0.3s ease;
        }
        .hero-arrow:hover { background: #FFD700; color: #000; border-color: #FFD700; transform: translateY(-50%) scale(1.12); }
        .hero-arrow.prev { left: 1.2rem; }
        .hero-arrow.next { right: 1.2rem; }
        @media (max-width: 480px) { .hero-arrow { width: 36px; height: 36px; } .hero-arrow.prev { left: 0.5rem; } .hero-arrow.next { right: 0.5rem; } }
        /* Dots */
        .hero-dots-wrap {
            position: absolute; bottom: 3.5rem; left: 50%; transform: translateX(-50%);
            z-index: 10; display: flex; gap: 0.5rem; align-items: center;
        }
        .h-dot {
            position: relative; overflow: hidden;
            height: 4px; width: 22px; border-radius: 9999px;
            background: rgba(255,255,255,0.3);
            cursor: pointer;
            transition: width 0.35s cubic-bezier(.4,0,.2,1), background 0.3s;
        }
        .h-dot.active { width: 44px; background: rgba(255,255,255,0.55); }
        .h-dot-fill {
            position: absolute; left: 0; top: 0;
            height: 100%; width: 0; background: #FFD700; border-radius: 9999px;
        }
        .h-dot.active .h-dot-fill { animation: hDotFill 5s linear forwards; }
        .h-dot.paused .h-dot-fill { animation-play-state: paused !important; }
        @keyframes hDotFill { from { width: 0; } to { width: 100%; } }
        /* Pause btn */
        .hero-pause-btn {
            position: absolute; bottom: 3rem; right: 1.2rem; z-index: 10;
            width: 38px; height: 38px; border-radius: 50%;
            background: rgba(255,255,255,0.12); backdrop-filter: blur(8px);
            border: 1px solid rgba(255,255,255,0.25);
            display: flex; align-items: center; justify-content: center;
            color: #fff; cursor: pointer; transition: all 0.3s ease;
        }
        .hero-pause-btn:hover { background: #FFD700; color: #000; border-color: #FFD700; }
        /* Progress bar strip at bottom */
        .hero-progress-strip {
            position: absolute; bottom: 0; left: 0; right: 0; height: 3px;
            background: rgba(255,255,255,0.15); z-index: 10;
        }
        .hero-progress-fill {
            height: 100%; background: #FFD700; width: 0;
            transition: width 5s linear;
        }
        .hero-progress-fill.instant { transition: none; }
        /* Responsive images in Nos Actions */
        .action-image {
            width: 100%;
            height: 120px;
            object-fit: cover;
            border-radius: 0.5rem;
            transition: transform 0.3s ease, opacity 0.3s ease;
        }
        .action-card:hover .action-image {
            transform: scale(1.05);
            opacity: 0.9;
        }
        /* Action Card Styles with Before/After */
        .action-card {
            background-color: #FFF8DC;
            position: relative;
            overflow: hidden;
            transition: transform 0.5s ease, box-shadow 0.5s ease, opacity 0.5s ease;
            opacity: 0;
            transform: translateY(50px);
        }
        .action-card.visible {
            opacity: 1;
            transform: translateY(0);
        }
        .action-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 215, 0, 0.3), transparent);
            transition: left 0.6s ease;
        }
        .action-card:hover::before {
            left: 100%;
        }
        .action-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 3px;
            background-color: #FFD700;
            transition: width 0.3s ease;
        }
        .action-card:hover::after {
            width: 100%;
        }
        .action-card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
        }
        /* Stagger animation for cards */
        .action-card:nth-child(1).visible {
            transition-delay: 0.1s;
        }
        .action-card:nth-child(2).visible {
            transition-delay: 0.2s;
        }
        .action-card:nth-child(3).visible {
            transition-delay: 0.3s;
        }
        .action-card:nth-child(4).visible {
            transition-delay: 0.4s;
        }
        .action-card:nth-child(5).visible {
            transition-delay: 0.1s;
        }
        .action-card:nth-child(6).visible {
            transition-delay: 0.2s;
        }
        .action-card:nth-child(7).visible {
            transition-delay: 0.3s;
        }
        .action-card:nth-child(8).visible {
            transition-delay: 0.4s;
        }
        .action-card:nth-child(9).visible {
            transition-delay: 0.1s;
        }
        .action-card:nth-child(10).visible {
            transition-delay: 0.2s;
        }
        .action-card:nth-child(11).visible {
            transition-delay: 0.3s;
        }
        .action-card:nth-child(12).visible {
            transition-delay: 0.4s;
        }
        /* Responsive video */
        .responsive-video {
            width: 100%;
            max-width: 90%;
            height: auto;
            opacity: 0;
            transform: scale(0.95);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }
        .responsive-video.visible {
            opacity: 1;
            transform: scale(1);
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
            background: rgba(255, 255, 255, 0.95);
            z-index: 9999;
            transition: opacity 0.7s ease-out;
        }
        .loading-hidden {
            opacity: 0;
            pointer-events: none;
        }
        .animate-spin {
            animation: spin 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
        }
        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
        /* Mobile Menu Animation */
        .mobile-menu {
            transform: translateX(100%);
            transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
            opacity: 0;
        }
        .mobile-menu.open {
            transform: translateX(0);
            opacity: 1;
        }
        .mobile-menu a {
            transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
        }
        .mobile-menu a:hover {
            transform: translateX(5px);
        }
        /* Section Entrance Animation on Scroll */
        .section-animate {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }
        .section-animate.visible {
            opacity: 1;
            transform: translateY(0);
        }
        /* Navigation Links Animation */
        nav a {
            transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
        }
        nav a:hover {
            transform: translateY(-2px);
        }
        /* Modal Styles */
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
        /* Footer animations */
        footer a,
        footer p {
            transition: color 0.3s ease, transform 0.3s ease, opacity 0.3s ease;
            opacity: 0;
            transform: translateY(10px);
        }
        footer.visible a,
        footer.visible p {
            opacity: 1;
            transform: translateY(0);
        }
        footer a:hover {
            transform: translateY(-2px);
        }
        /* Style pour les titres des sections avec ombre derrière */
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
        /* Style pour les cartes de la section Nos Actions */
        .action-card h3 {
            color: #1E90FF;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        .action-card p {
            color: #333333;
        }
        .action-card button {
            color: #000000;
            background-color: #FFD700;
            border: 1px solid #FFD700;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
        }
        .action-card button:hover {
            background-color: #DAA520;
            color: #ffffff;
        }
        /* Styles pour le footer compact */
        .wave-divider {
            position: absolute;
            top: -1px;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
        }
        .wave-divider svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 40px;
        }
        .wave-divider .shape-fill {
            fill: url(#gradient-wave);
        }
        .footer-link {
            transition: color 0.3s ease, transform 0.3s ease;
        }
        .footer-link:hover {
            transform: translateX(5px);
        }
        .social-icon {
            transition: transform 0.3s ease, opacity 0.3s ease;
        }
        .social-icon:hover {
            transform: scale(1.2);
            opacity: 0.8;
        }
        /* ===== HERO DOTS DE PROGRESSION ===== */
        .hero-dot {
            position: relative;
            display: block;
            height: 4px;
            width: 24px;
            border-radius: 9999px;
            background: rgba(255,255,255,0.35);
            cursor: pointer;
            overflow: hidden;
            transition: width 0.35s cubic-bezier(.4,0,.2,1), background 0.3s ease;
            flex-shrink: 0;
        }
        .hero-dot.active {
            width: 48px;
            background: rgba(255,255,255,0.55);
        }
        .hero-dot-fill {
            position: absolute;
            left: 0; top: 0;
            height: 100%;
            width: 0%;
            background: #FFD700;
            border-radius: 9999px;
        }
        .hero-dot.active .hero-dot-fill {
            animation: heroDotFill 4s linear forwards;
        }
        .hero-dot.paused .hero-dot-fill {
            animation-play-state: paused !important;
        }
        @keyframes heroDotFill {
            from { width: 0%; }
            to   { width: 100%; }
        }
        /* Animation pour la phrase défilante */
        .marquee-container {
            width: 100%;
            overflow: hidden;
            white-space: nowrap;
            background-color: #1E90FF;
            padding: 0.5rem 0;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            z-index: 10;
        }
        .marquee-text {
            display: inline-block;
            font-size: 1rem;
            font-weight: bold;
            color: #FFD700;
            animation: marquee 15s linear infinite;
            text-align: center;
        }
        @keyframes marquee {
            0% {
                transform: translateX(100%);
            }
            100% {
                transform: translateX(-100%);
            }
        }
        /* Responsive adjustments */
        @media (max-width: 640px) {
            body {
                padding-top: 0;
            }
            .top-bar {
                height: 40px;
                margin-bottom: 12px;
            }
            .main-header {
                padding-top: 0;
            }
            .hero-text {
                font-size: clamp(1.25rem, 4vw, 2rem);
            }
            .hero-subtext {
                font-size: clamp(0.75rem, 2vw, 0.875rem);
            }
            .partner-logo {
                width: 70px;
                height: 70px;
            }
            .action-image {
                height: 100px;
            }
            .modal-content {
                padding: 0.75rem;
                max-width: 98%;
            }
            .modal-image {
                max-height: 20vh;
            }
            .modal-title {
                font-size: clamp(1rem, 2.5vw, 1.25rem);
            }
            .modal-content p {
                font-size: clamp(0.7rem, 1.8vw, 0.8rem);
            }
            .modal-close {
                width: 20px;
                height: 20px;
            }
            .action-card {
                padding: 0.75rem;
            }
        }
        @media (min-width: 641px) and (max-width: 1023px) {
            .hero-text {
                font-size: clamp(1.5rem, 4.5vw, 2.5rem);
            }
            .hero-subtext {
                font-size: clamp(0.875rem, 2.5vw, 1rem);
            }
            .action-image {
                height: 130px;
            }
            .modal-content {
                max-width: 90%;
            }
            .modal-image {
                max-height: 25vh;
            }
            .partner-logo {
                width: 85px;
                height: 85px;
            }
        }
        @media (min-width: 1024px) {
            .action-image {
                height: 150px;
            }
            .modal-content {
                max-width: 80%;
            }
        }
    /* Offset pour header fixe (top-bar 36px + nav 68px) */
    .hero-spacing-offset { padding-top: 104px; }
    @media (max-width: 640px) { .hero-spacing-offset { padding-top: 68px; } }
</style>
@endpush

@section('content')
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
    <!-- ===== HERO SECTION PREMIUM ===== -->
    <section id="heroCarousel">

        <!-- Slide 1 -->
        <div class="hero-slide active" id="hSlide0">
            <div class="hero-slide-bg" style="background-image:url('{{ asset('image/elev.png') }}')"></div>
            <div class="hero-slide-overlay"></div>
            <div class="hero-slide-content">
                <span class="hero-tag">Organisation Internationale</span>
                <h1 class="hero-title">Agissons ensemble pour le Bien-Être Communautaire</h1>
                <p class="hero-sub">Une jeunesse multinationale engagée au service des communautés vulnérables à travers le monde.</p>
                <div class="hero-btns">
                    <a href="{{ route('dons') }}" class="hero-btn-primary">Faites un don ↓</a>
                    <a href="{{ route('aPropos') }}" class="hero-btn-secondary">En savoir plus</a>
                </div>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="hero-slide" id="hSlide1">
            <div class="hero-slide-bg" style="background-image:url('{{ asset('image/pl.png') }}')"></div>
            <div class="hero-slide-overlay"></div>
            <div class="hero-slide-content">
                <span class="hero-tag">Jeunesse &amp; Avenir</span>
                <h1 class="hero-title">La Jeunesse Africaine, Moteur du Changement</h1>
                <p class="hero-sub">Investir dans les jeunes, c'est construire un avenir plus solide, innovant et équitable pour toute l'Afrique.</p>
                <div class="hero-btns">
                    <a href="{{ route('dons') }}" class="hero-btn-primary">Soutenir notre mission ↓</a>
                    <a href="#actions" class="hero-btn-secondary">Nos actions</a>
                </div>
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="hero-slide" id="hSlide2">
            <div class="hero-slide-bg" style="background-image:url('{{ asset('image/enfants.png') }}')"></div>
            <div class="hero-slide-overlay"></div>
            <div class="hero-slide-content">
                <span class="hero-tag">Éducation &amp; Droits</span>
                <h1 class="hero-title">Chaque Enfant Mérite un Avenir Meilleur</h1>
                <p class="hero-sub">Nous œuvrons pour l'éducation, la protection et l'épanouissement des enfants les plus vulnérables.</p>
                <div class="hero-btns">
                    <a href="{{ route('dons') }}" class="hero-btn-primary">Aider maintenant ↓</a>
                    <a href="{{ route('news') }}" class="hero-btn-secondary">Nos actualités</a>
                </div>
            </div>
        </div>

        <!-- Slide 4 -->
        <div class="hero-slide" id="hSlide3">
            <div class="hero-slide-bg" style="background-image:url('{{ asset('image/p.png') }}')"></div>
            <div class="hero-slide-overlay"></div>
            <div class="hero-slide-content">
                <span class="hero-tag">Paix &amp; Justice</span>
                <h1 class="hero-title">Construire un Monde Plus Juste et Pacifique</h1>
                <p class="hero-sub">Agir pour la paix, c'est promouvoir le dialogue, la coopération et le respect des droits fondamentaux.</p>
                <div class="hero-btns">
                    <a href="{{ route('dons') }}" class="hero-btn-primary">Rejoindre le mouvement ↓</a>
                    <a href="{{ route('branche') }}" class="hero-btn-secondary">Événements</a>
                </div>
            </div>
        </div>

        <!-- Slide 5 -->
        <div class="hero-slide" id="hSlide4">
            <div class="hero-slide-bg" style="background-image:url('{{ asset('image/e.png') }}')"></div>
            <div class="hero-slide-overlay"></div>
            <div class="hero-slide-content">
                <span class="hero-tag">Environnement &amp; Durabilité</span>
                <h1 class="hero-title">Protéger Notre Planète pour les Générations Futures</h1>
                <p class="hero-sub">Le Bassin du Congo, poumon de l'Afrique, mérite notre engagement pour sa préservation et sa biodiversité.</p>
                <div class="hero-btns">
                    <a href="{{ route('dons') }}" class="hero-btn-primary">Agir maintenant ↓</a>
                    <a href="#about" class="hero-btn-secondary">Notre mission</a>
                </div>
            </div>
        </div>

        <!-- Flèches -->  
        <button class="hero-arrow prev" id="heroPrev" aria-label="Précédent">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
        </button>
        <button class="hero-arrow next" id="heroNext" aria-label="Suivant">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
        </button>

        <!-- Dots de progression -->
        <div class="hero-dots-wrap" id="heroDots"></div>

        <!-- Bouton pause/play -->
        <button class="hero-pause-btn" id="heroPauseBtn" aria-label="Pause">
            <svg id="heroPauseIcon" width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/></svg>
            <svg id="heroPlayIcon" width="16" height="16" fill="currentColor" viewBox="0 0 24 24" style="display:none"><path d="M8 5v14l11-7z"/></svg>
        </button>

        <!-- Barre de progression en bas -->
        <div class="hero-progress-strip">
            <div class="hero-progress-fill" id="heroProgressFill"></div>
        </div>

        <!-- Scroll arrow -->
        <div class="animated-arrow">
            <a href="#actions" class="arrow-bounce inline-block">
                <svg class="arrow-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/></svg>
            </a>
        </div>
    </section>
    <!-- ===== NOS ACTIONS — REDESIGN PREMIUM ===== -->
    <style>
        /* === SECTION ACTIONS PREMIUM === */
        #actions {
            background: linear-gradient(160deg, #0f0f1a 0%, #0d1b2a 50%, #0f0f1a 100%);
            padding: 5rem 0;
            position: relative;
            overflow: hidden;
        }
        #actions::before {
            content: '';
            position: absolute; inset: 0;
            background: radial-gradient(ellipse at 20% 50%, rgba(30,144,255,0.07) 0%, transparent 60%),
                        radial-gradient(ellipse at 80% 20%, rgba(255,215,0,0.05) 0%, transparent 50%);
            pointer-events: none;
        }
        .actions-title {
            font-size: clamp(1.6rem, 4vw, 2.8rem);
            font-weight: 900;
            color: #ffffff;
            text-align: center;
            letter-spacing: -0.02em;
        }
        .actions-title span { color: #FFD700; }
        .actions-sub {
            text-align: center;
            color: rgba(255,255,255,0.55);
            font-size: 0.95rem;
            margin-top: 0.6rem;
        }
        /* Grid */
        .actions-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.1rem;
            margin-top: 2.5rem;
        }
        @media (min-width: 640px)  { .actions-grid { grid-template-columns: repeat(3, 1fr); } }
        @media (min-width: 1024px) { .actions-grid { grid-template-columns: repeat(4, 1fr); gap: 1.4rem; } }
        /* Card */
        .act-card {
            position: relative;
            border-radius: 1rem;
            overflow: hidden;
            cursor: pointer;
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
            transition: transform 0.4s cubic-bezier(.4,0,.2,1), box-shadow 0.4s ease, border-color 0.3s;
            opacity: 0;
            transform: translateY(32px);
        }
        .act-card.in-view {
            opacity: 1;
            transform: translateY(0);
        }
        .act-card:hover {
            transform: translateY(-6px) scale(1.02);
            box-shadow: 0 20px 50px rgba(0,0,0,0.55), 0 0 0 1px rgba(255,215,0,0.25);
            border-color: rgba(255,215,0,0.3);
        }
        /* Image layer */
        .act-img-wrap {
            position: relative;
            width: 100%;
            padding-top: 62%;
            overflow: hidden;
        }
        .act-img-wrap img {
            position: absolute; inset: 0;
            width: 100%; height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(.4,0,.2,1);
            filter: brightness(0.75);
        }
        .act-card:hover .act-img-wrap img {
            transform: scale(1.08);
            filter: brightness(0.55);
        }
        /* Badge */
        .act-badge {
            position: absolute; top: 0.6rem; left: 0.6rem;
            font-size: 0.6rem; font-weight: 800;
            letter-spacing: 0.1em; text-transform: uppercase;
            padding: 0.2rem 0.55rem; border-radius: 9999px;
            backdrop-filter: blur(6px);
        }
        /* Icon overlay on image */
        .act-icon {
            position: absolute; bottom: 0.5rem; right: 0.7rem;
            font-size: 1.6rem;
            filter: drop-shadow(0 2px 6px rgba(0,0,0,0.6));
            transition: transform 0.3s ease;
        }
        .act-card:hover .act-icon { transform: scale(1.2) rotate(-5deg); }
        /* Card body */
        .act-body {
            padding: 0.9rem 1rem 1rem;
        }
        .act-body h3 {
            font-size: 0.9rem;
            font-weight: 800;
            color: #fff;
            line-height: 1.3;
            margin-bottom: 0.35rem;
        }
        .act-body p {
            font-size: 0.7rem;
            color: rgba(255,255,255,0.5);
            line-height: 1.5;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .act-btn {
            display: inline-flex; align-items: center; gap: 0.3rem;
            margin-top: 0.7rem;
            font-size: 0.7rem; font-weight: 700;
            color: #FFD700;
            background: rgba(255,215,0,0.1);
            border: 1px solid rgba(255,215,0,0.25);
            padding: 0.3rem 0.8rem; border-radius: 9999px;
            transition: all 0.25s ease;
        }
        .act-btn:hover { background: #FFD700; color: #000; }
        /* Stagger delays */
        .act-card:nth-child(1)  { transition-delay: 0.05s; }
        .act-card:nth-child(2)  { transition-delay: 0.10s; }
        .act-card:nth-child(3)  { transition-delay: 0.15s; }
        .act-card:nth-child(4)  { transition-delay: 0.20s; }
        .act-card:nth-child(5)  { transition-delay: 0.25s; }
        .act-card:nth-child(6)  { transition-delay: 0.30s; }
        .act-card:nth-child(7)  { transition-delay: 0.35s; }
        .act-card:nth-child(8)  { transition-delay: 0.40s; }
        .act-card:nth-child(9)  { transition-delay: 0.45s; }
        .act-card:nth-child(10) { transition-delay: 0.50s; }
        .act-card:nth-child(11) { transition-delay: 0.55s; }
        .act-card:nth-child(12) { transition-delay: 0.60s; }
        .act-card { transition: opacity 0.6s ease, transform 0.6s ease, box-shadow 0.4s ease, border-color 0.3s; }
    </style>

    <section id="actions">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- En-tête -->
            <p class="actions-sub">Nous œuvrons pour un monde plus juste, plus vert et plus solidaire.</p>
            <h2 class="actions-title">Nos <span>Domaines d'Action</span></h2>

            <!-- Grille de cartes -->
            <div class="actions-grid">

                <!-- 1 — La Jeunesse -->
                <div class="act-card" onclick="openModal(`{{ str_replace(['`','\n','\r'],['\\`','<br>',''],addslashes('L\'Afrique possède une population extrêmement jeune, dans de nombreuses zones, près de 40 % des habitants ont moins de 15 ans, et plus de 400 millions de personnes sont âgées de 15 à 35 ans. Pourtant, ce secteur de la population fait face à des défis sérieux. Agir en faveur des jeunes, c\'est investir dans un avenir plus solide, plus innovant et plus équitable pour toute l\'Afrique.')) }}`, 'La Jeunesse', '{{ asset('image/ge.png') }}')">
                    <div class="act-img-wrap">
                        <img src="{{ asset('image/ge.png') }}" alt="La Jeunesse">
                        <span class="act-badge" style="background:rgba(30,144,255,0.7);color:#fff;">Jeunesse</span>
                        <span class="act-icon">🌱</span>
                    </div>
                    <div class="act-body">
                        <h3>La Jeunesse</h3>
                        <p>L'Afrique possède une population extrêmement jeune. Agir en faveur des jeunes, c'est investir dans un avenir plus solide et équitable.</p>
                        <button class="act-btn">Voir plus →</button>
                    </div>
                </div>

                <!-- 2 — L'Environnement -->
                <div class="act-card" onclick="openModal(`{{ str_replace(['`','\n','\r'],['\\`','<br>',''],addslashes('La région du Bassin du Congo abrite l\'une des dernières grandes étendues de forêt tropicale intacte au monde. La forêt du Bassin du Congo peut capturer environ 0,61 gigatonne de CO₂ par an. Agir pour l\'environnement, c\'est prendre soin de la nature qui a toujours pris soin de nous.')) }}`, 'L\'Environnement', '{{ asset('image/vegete.png') }}')">
                    <div class="act-img-wrap">
                        <img src="{{ asset('image/vegete.png') }}" alt="L'Environnement">
                        <span class="act-badge" style="background:rgba(34,197,94,0.75);color:#fff;">Écologie</span>
                        <span class="act-icon">🌍</span>
                    </div>
                    <div class="act-body">
                        <h3>L'Environnement</h3>
                        <p>Le Bassin du Congo, puits de carbone vital. Protéger cette forêt, c'est préserver un patrimoine pour l'humanité entière.</p>
                        <button class="act-btn">Voir plus →</button>
                    </div>
                </div>

                <!-- 3 — Les Droits de l'Homme -->
                <div class="act-card" onclick="openModal(`{{ str_replace(['`','\n','\r'],['\\`','<br>',''],addslashes('En Afrique et ailleurs, de nombreuses personnes sont persécutées en raison de leur identité ethnique ou de leurs opinions. La dignité humaine est universelle et inaliénable. Agir pour la défense des droits de l\'Homme, c\'est se lever contre l\'injustice.')) }}`, 'Les Droits de l\'Homme', '{{ asset('image/droit.png') }}')">
                    <div class="act-img-wrap">
                        <img src="{{ asset('image/droit.png') }}" alt="Droits de l'Homme">
                        <span class="act-badge" style="background:rgba(239,68,68,0.7);color:#fff;">Droits</span>
                        <span class="act-icon">⚖️</span>
                    </div>
                    <div class="act-body">
                        <h3>Les Droits de l'Homme</h3>
                        <p>La dignité humaine est universelle. Nous défendons chaque individu contre toute forme d'injustice et de discrimination.</p>
                        <button class="act-btn">Voir plus →</button>
                    </div>
                </div>

                <!-- 4 — La Santé -->
                <div class="act-card" onclick="openModal(`{{ str_replace(['`','\n','\r'],['\\`','<br>',''],addslashes('La santé mondiale est marquée par des inégalités profondes. En 2023, environ 260 000 femmes sont décédées des suites de complications liées à la grossesse. Agir pour la santé mondiale, c\'est investir dans la vie et le bien-être de chaque individu.')) }}`, 'La Santé', '{{ asset('image/santee.png') }}')">
                    <div class="act-img-wrap">
                        <img src="{{ asset('image/santee.png') }}" alt="La Santé">
                        <span class="act-badge" style="background:rgba(236,72,153,0.7);color:#fff;">Santé</span>
                        <span class="act-icon">🏥</span>
                    </div>
                    <div class="act-body">
                        <h3>La Santé</h3>
                        <p>Des inégalités profondes marquent la santé mondiale. Nous œuvrons pour un accès universel à des soins de qualité.</p>
                        <button class="act-btn">Voir plus →</button>
                    </div>
                </div>

                <!-- 5 — La Paix -->
                <div class="act-card" onclick="openModal(`{{ str_replace(['`','\n','\r'],['\\`','<br>',''],addslashes('Selon le Global Peace Index 2025, le niveau de paix mondiale est au plus bas. En 2024, le monde a enregistré 152 000 décès liés aux conflits. Agir pour la paix, c\'est œuvrer pour un monde plus juste et harmonieux.')) }}`, 'La Paix', '{{ asset('image/paix.png') }}')">
                    <div class="act-img-wrap">
                        <img src="{{ asset('image/paix.png') }}" alt="La Paix">
                        <span class="act-badge" style="background:rgba(99,102,241,0.7);color:#fff;">Paix</span>
                        <span class="act-icon">🕊️</span>
                    </div>
                    <div class="act-body">
                        <h3>La Paix</h3>
                        <p>152 000 décès liés aux conflits en 2024. Promouvoir le dialogue et la coopération pour bâtir un avenir pacifique.</p>
                        <button class="act-btn">Voir plus →</button>
                    </div>
                </div>

                <!-- 6 — La Justice -->
                <div class="act-card" onclick="openModal(`{{ str_replace(['`','\n','\r'],['\\`','<br>',''],addslashes('La justice est un pilier fondamental pour des sociétés équitables. En 2023, environ 4,4 milliards de personnes vivaient dans des pays où l\'accès à la justice est limité. Agir pour la justice, c\'est promouvoir l\'égalité devant la loi.')) }}`, 'La Justice', '{{ asset('image/bel.png') }}')">
                    <div class="act-img-wrap">
                        <img src="{{ asset('image/bel.png') }}" alt="La Justice">
                        <span class="act-badge" style="background:rgba(245,158,11,0.75);color:#000;">Justice</span>
                        <span class="act-icon">🔍</span>
                    </div>
                    <div class="act-body">
                        <h3>La Justice</h3>
                        <p>4,4 milliards de personnes sans accès à la justice. Nous renforçons les institutions pour garantir l'égalité de tous.</p>
                        <button class="act-btn">Voir plus →</button>
                    </div>
                </div>

                <!-- 7 — Le Développement Durable -->
                <div class="act-card" onclick="openModal(`{{ str_replace(['`','\n','\r'],['\\`','<br>',''],addslashes('Le développement durable est essentiel pour répondre aux besoins actuels sans compromettre les générations futures. Nos actions incluent des formations et des projets visant à promouvoir des pratiques agricoles durables et l\'accès à l\'énergie renouvelable.')) }}`, 'Le Développement Durable', '{{ asset('image/deve.png') }}')">
                    <div class="act-img-wrap">
                        <img src="{{ asset('image/deve.png') }}" alt="Développement Durable">
                        <span class="act-badge" style="background:rgba(20,184,166,0.75);color:#fff;">Durabilité</span>
                        <span class="act-icon">♻️</span>
                    </div>
                    <div class="act-body">
                        <h3>Développement Durable</h3>
                        <p>Pratiques agricoles durables et accès aux énergies renouvelables pour un futur viable pour tous.</p>
                        <button class="act-btn">Voir plus →</button>
                    </div>
                </div>

                <!-- 8 — Le Bien-être des Communautés -->
                <div class="act-card" onclick="openModal(`{{ str_replace(['`','\n','\r'],['\\`','<br>',''],addslashes('Le bien-être des communautés est au cœur de nos actions. L\'insécurité alimentaire touche environ 2,4 milliards de personnes dans le monde. Nos initiatives incluent la distribution de repas nutritifs et des programmes de formation agricole.')) }}`, 'Le Bien-être des Communautés', '{{ asset('image/pont.png') }}')">
                    <div class="act-img-wrap">
                        <img src="{{ asset('image/pont.png') }}" alt="Bien-être Communauté">
                        <span class="act-badge" style="background:rgba(30,144,255,0.7);color:#fff;">Communauté</span>
                        <span class="act-icon">🤝</span>
                    </div>
                    <div class="act-body">
                        <h3>Bien-être Communautaire</h3>
                        <p>2,4 milliards face à l'insécurité alimentaire. Nous distribuons des repas et formons aux techniques agricoles durables.</p>
                        <button class="act-btn">Voir plus →</button>
                    </div>
                </div>

                <!-- 9 — La Culture -->
                <div class="act-card" onclick="openModal(`{{ str_replace(['`','\n','\r'],['\\`','<br>',''],addslashes('L\'Afrique est un continent riche d\'une diversité culturelle exceptionnelle, avec plus de 3 000 groupes ethniques. Agir pour la culture africaine, c\'est préserver notre identité et investir dans la mémoire collective.')) }}`, 'La Culture', '{{ asset('image/f.png') }}')">
                    <div class="act-img-wrap">
                        <img src="{{ asset('image/f.png') }}" alt="La Culture">
                        <span class="act-badge" style="background:rgba(168,85,247,0.7);color:#fff;">Culture</span>
                        <span class="act-icon">🎭</span>
                    </div>
                    <div class="act-body">
                        <h3>La Culture</h3>
                        <p>Plus de 3 000 groupes ethniques. Préserver l'identité africaine, c'est construire un futur ancré dans ses valeurs.</p>
                        <button class="act-btn">Voir plus →</button>
                    </div>
                </div>

                <!-- 10 — L'Histoire -->
                <div class="act-card" onclick="openModal(`{{ str_replace(['`','\n','\r'],['\\`','<br>',''],addslashes('L\'Afrique possède une histoire millénaire, riche de civilisations anciennes. La jeunesse africaine joue un rôle clé dans la revalorisation de ce patrimoine. Agir pour l\'histoire africaine, c\'est préserver la mémoire du continent.')) }}`, 'L\'Histoire', '{{ asset('image/h.png') }}')">
                    <div class="act-img-wrap">
                        <img src="{{ asset('image/h.png') }}" alt="L'Histoire">
                        <span class="act-badge" style="background:rgba(245,158,11,0.75);color:#000;">Histoire</span>
                        <span class="act-icon">📜</span>
                    </div>
                    <div class="act-body">
                        <h3>L'Histoire</h3>
                        <p>Civilisations de l'Égypte au royaume de Kongo. Valoriser ce patrimoine, c'est éclairer l'avenir par le passé.</p>
                        <button class="act-btn">Voir plus →</button>
                    </div>
                </div>

                <!-- 11 — Le Panafricanisme -->
                <div class="act-card" onclick="openModal(`{{ str_replace(['`','\n','\r'],['\\`','<br>',''],addslashes('Le panafricanisme est un mouvement visant à unir les peuples africains autour de valeurs de solidarité, de développement et d\'autonomie. Agir pour le panafricanisme, c\'est œuvrer pour l\'unité et la solidarité du continent africain.')) }}`, 'Le Panafricanisme', '{{ asset('image/pp.png') }}')">
                    <div class="act-img-wrap">
                        <img src="{{ asset('image/pp.png') }}" alt="Le Panafricanisme">
                        <span class="act-badge" style="background:rgba(34,197,94,0.75);color:#fff;">Panafricanisme</span>
                        <span class="act-icon">🌐</span>
                    </div>
                    <div class="act-body">
                        <h3>Le Panafricanisme</h3>
                        <p>Unir 54 pays autour de valeurs communes. L'Afrique unie est une Afrique forte, innovante et souveraine.</p>
                        <button class="act-btn">Voir plus →</button>
                    </div>
                </div>

                <!-- 12 — Égalité & Équité -->
                <div class="act-card" onclick="openModal(`{{ str_replace(['`','\n','\r'],['\\`','<br>',''],addslashes('Dans de nombreuses régions du monde, les inégalités persistent encore: inégalités de genre, économiques, sociales et éducatives. Promouvoir l\'égalité et l\'équité, c\'est reconnaître la dignité de chaque personne.')) }}`, 'Promotion de l\'Égalité et de l\'Équité', '{{ asset('image/b.png') }}')">
                    <div class="act-img-wrap">
                        <img src="{{ asset('image/b.png') }}" alt="Égalité et Équité">
                        <span class="act-badge" style="background:rgba(236,72,153,0.7);color:#fff;">Égalité</span>
                        <span class="act-icon">⚡</span>
                    </div>
                    <div class="act-body">
                        <h3>Égalité &amp; Équité</h3>
                        <p>Lutter contre les inégalités de genre, économiques et sociales pour que chaque personne puisse s'épanouir.</p>
                        <button class="act-btn">Voir plus →</button>
                    </div>
                </div>

            </div><!-- /actions-grid -->
        </div>

        <script>
        // Intersection Observer pour animation staggerée des cartes
        (function(){
            const cards = document.querySelectorAll('.act-card');
            const obs = new IntersectionObserver((entries) => {
                entries.forEach(e => {
                    if (e.isIntersecting) { e.target.classList.add('in-view'); obs.unobserve(e.target); }
                });
            }, { threshold: 0.08 });
            cards.forEach(c => obs.observe(c));
        })();
        </script>
    </section>
    <!-- ===== SECTION À PROPOS (TEASER PREMIUM) ===== -->
    <style>
        #about-teaser {
            background: linear-gradient(160deg, #0d1b2a 0%, #0f0f1a 100%);
            padding: 6rem 0;
            position: relative;
            overflow: hidden;
            border-top: 1px solid rgba(255,215,0,0.05);
        }
        .teaser-video-wrap {
            position: relative;
            border-radius: 1.5rem;
            overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            border: 1px solid rgba(255,215,0,0.2);
        }
        .teaser-video-wrap::after {
            content: '';
            position: absolute; inset: 0;
            background: linear-gradient(to right, rgba(13,27,42,0.4), transparent);
            pointer-events: none;
        }
        .teaser-content h2 {
            font-size: clamp(1.8rem, 4vw, 2.6rem);
            font-weight: 900;
            color: #fff;
            line-height: 1.2;
            margin-bottom: 1.5rem;
        }
        .teaser-content h2 span { color: #FFD700; }
        .teaser-content p {
            color: rgba(255,255,255,0.7);
            font-size: 1rem;
            line-height: 1.8;
            margin-bottom: 2rem;
        }
        .teaser-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            background: #FFD700;
            color: #000;
            font-weight: 800;
            padding: 0.9rem 2.2rem;
            border-radius: 0.8rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 10px 20px rgba(255,215,0,0.2);
        }
        .teaser-btn:hover {
            transform: translateY(-3px) scale(1.02);
            background: #fff;
            box-shadow: 0 15px 30px rgba(255,215,0,0.3);
        }
    </style>

    <section id="about-teaser" class="section-animate">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                
                <!-- Vidéo à gauche -->
                <div class="teaser-video-wrap lg:order-1 order-2">
                    <video class="w-full h-full object-cover" autoplay loop muted playsinline>
                        <source src="{{ asset('image/Orange.mp4') }}" type="video/mp4">
                    </video>
                    <!-- Overlay glassmorphism sur la vidéo -->
                    <div class="absolute bottom-6 left-6 right-6 p-4 rounded-xl bg-white/10 backdrop-blur-md border border-white/20 hidden sm:block">
                        <p class="text-white text-xs font-bold leading-tight">
                            "Une jeunesse engagée pour un impact communautaire durable."
                        </p>
                    </div>
                </div>

                <!-- Texte à droite -->
                <div class="teaser-content lg:order-2 order-1 lg:pl-8">
                    <span class="text-yellow text-sm font-black tracking-widest uppercase mb-4 block">QUI SOMMES-NOUS ?</span>
                    <h2>Défendre la <span>Dignité Humaine</span> &amp; Agir pour le Bien-Être</h2>
                    <p>
                        L'ABEC est une organisation internationale à but non lucratif qui rassemble des jeunes visionnaires déterminés à changer le cours des choses. À travers des actions concrètes en santé, environnement et éducation, nous bâtissons un avenir plus juste.
                    </p>
                    <a href="{{ route('aPropos') }}" class="teaser-btn">
                        Découvrir notre mission 
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </div>

            </div>
        </div>
    </section>
    <!-- ===== SECTION NOS PARTENAIRES PREMIUM ===== -->
    <section id="partners" class="overflow-hidden relative" style="background: linear-gradient(170deg, #0a0f1e 0%, #0c1f3f 40%, #1E90FF 100%); padding: 6rem 0;">

        <!-- Orbes décoratifs -->
        <div style="position:absolute; width:600px; height:600px; background:radial-gradient(circle, rgba(255,215,0,0.08) 0%, transparent 70%); top:-200px; right:-100px; border-radius:50%; pointer-events:none;"></div>
        <div style="position:absolute; width:400px; height:400px; background:radial-gradient(circle, rgba(30,144,255,0.15) 0%, transparent 70%); bottom:-150px; left:-100px; border-radius:50%; pointer-events:none;"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center mb-16 relative z-10 section-animate">
            <!-- Badge -->
            <div class="inline-flex items-center gap-2 px-5 py-2 rounded-full mb-6" style="background:rgba(255,215,0,0.1); border:1px solid rgba(255,215,0,0.25);">
                <span style="width:6px;height:6px;background:#FFD700;border-radius:50%;animation:pulse 2s infinite;"></span>
                <span style="font-size:0.7rem; font-weight:800; text-transform:uppercase; letter-spacing:0.15em; color:#FFD700;">Espace Partenariat</span>
            </div>

            <!-- Titre -->
            <h2 style="font-size:clamp(2rem,5vw,3.2rem); font-weight:900; color:#ffffff; line-height:1.1; margin-bottom:1rem;">
                Nos <span style="color:#FFD700;">Partenaires</span> Stratégiques
            </h2>
            <p style="color:rgba(255,255,255,0.6); max-width:550px; margin:0 auto; font-size:1rem; font-weight:500; line-height:1.7;">
                Ils nous accompagnent au quotidien pour maximiser notre impact social et communautaire à travers le Monde.
            </p>

            <!-- Stats partenaires -->
            <div class="flex justify-center gap-8 mt-8 flex-wrap">
                <div style="text-align:center;">
                    <div style="font-size:2rem;font-weight:900;color:#FFD700;">10+</div>
                    <div style="font-size:0.75rem;font-weight:700;color:rgba(255,255,255,0.5);text-transform:uppercase;letter-spacing:0.1em;">Partenaires actifs</div>
                </div>
                <div style="width:1px;background:rgba(255,255,255,0.1);"></div>
                <div style="text-align:center;">
                    <div style="font-size:2rem;font-weight:900;color:#FFD700;">5+</div>
                    <div style="font-size:0.75rem;font-weight:700;color:rgba(255,255,255,0.5);text-transform:uppercase;letter-spacing:0.1em;">Pays couverts</div>
                </div>
                <div style="width:1px;background:rgba(255,255,255,0.1);"></div>
                <div style="text-align:center;">
                    <div style="font-size:2rem;font-weight:900;color:#FFD700;">2021</div>
                    <div style="font-size:0.75rem;font-weight:700;color:rgba(255,255,255,0.5);text-transform:uppercase;letter-spacing:0.1em;">Depuis</div>
                </div>
            </div>
        </div>

        <!-- Fade edges -->
        <div style="position:absolute;top:0;left:0;width:12%;height:100%;background:linear-gradient(to right,#0a0f1e,transparent);z-index:2;pointer-events:none;"></div>
        <div style="position:absolute;top:0;right:0;width:12%;height:100%;background:linear-gradient(to left,#1E90FF,transparent);z-index:2;pointer-events:none;"></div>

        <!-- Infinite Marquee -->
        <div class="marquee-track relative py-4 overflow-hidden">
            <div class="animate-marquee-infinite">
                <!-- First Set -->
                <div class="partner-glass-card"><img src="{{ asset('image/la paix.png') }}" alt="La Paix" class="partner-logo-img"></div>
                <div class="partner-glass-card"><img src="{{ asset('image/lion.png') }}" alt="Lion" class="partner-logo-img"></div>
                <div class="partner-glass-card"><img src="{{ asset('image/brasserie (5).png') }}" alt="Brasserie" class="partner-logo-img"></div>
                <div class="partner-glass-card"><img src="{{ asset('image/yo.png') }}" alt="Partenaire" class="partner-logo-img"></div>
                <div class="partner-glass-card"><img src="{{ asset('image/ee.png') }}" alt="Partenaire" class="partner-logo-img"></div>
                <div class="partner-glass-card"><img src="{{ asset('image/canvas.jpeg') }}" alt="Canvas" class="partner-logo-img"></div>
                <div class="partner-glass-card"><img src="{{ asset('image/MTN.png') }}" alt="MTN" class="partner-logo-img"></div>
                <div class="partner-glass-card"><img src="{{ asset('image/orange.png') }}" alt="Orange" class="partner-logo-img"></div>
                <div class="partner-glass-card"><img src="{{ asset('image/la paix.png') }}" alt="La Paix" class="partner-logo-img"></div>
                <div class="partner-glass-card"><img src="{{ asset('image/brasserie (6).png') }}" alt="Brasserie" class="partner-logo-img"></div>
                <!-- Clone Set -->
                <div class="partner-glass-card"><img src="{{ asset('image/la paix.png') }}" alt="La Paix" class="partner-logo-img"></div>
                <div class="partner-glass-card"><img src="{{ asset('image/lion.png') }}" alt="Lion" class="partner-logo-img"></div>
                <div class="partner-glass-card"><img src="{{ asset('image/brasserie (5).png') }}" alt="Brasserie" class="partner-logo-img"></div>
                <div class="partner-glass-card"><img src="{{ asset('image/yo.png') }}" alt="Partenaire" class="partner-logo-img"></div>
                <div class="partner-glass-card"><img src="{{ asset('image/ee.png') }}" alt="Partenaire" class="partner-logo-img"></div>
                <div class="partner-glass-card"><img src="{{ asset('image/canvas.jpeg') }}" alt="Canvas" class="partner-logo-img"></div>
                <div class="partner-glass-card"><img src="{{ asset('image/MTN.png') }}" alt="MTN" class="partner-logo-img"></div>
                <div class="partner-glass-card"><img src="{{ asset('image/orange.png') }}" alt="Orange" class="partner-logo-img"></div>
                <div class="partner-glass-card"><img src="{{ asset('image/la paix.png') }}" alt="La Paix" class="partner-logo-img"></div>
                <div class="partner-glass-card"><img src="{{ asset('image/brasserie (6).png') }}" alt="Brasserie" class="partner-logo-img"></div>
            </div>
        </div>

        <!-- CTA Partenariat -->
        <div class="max-w-2xl mx-auto px-4 mt-16 text-center relative z-10 section-animate">
            <div style="background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);border-radius:1.5rem;padding:2rem;backdrop-filter:blur(10px);">
                <p style="color:rgba(255,255,255,0.7);font-size:0.95rem;margin-bottom:1.25rem;font-weight:500;">Vous souhaitez devenir partenaire d'ABEC et contribuer à notre mission ?</p>
                <a href="https://mail.google.com/mail/?view=cm&to=contact@universalwelfare.org" target="_blank"
                   style="display:inline-flex;align-items:center;gap:0.5rem;background:#FFD700;color:#000;font-weight:800;padding:0.8rem 2rem;border-radius:9999px;text-decoration:none;transition:all 0.3s ease;box-shadow:0 6px 20px rgba(255,215,0,0.3);"
                   onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 10px 30px rgba(255,215,0,0.5)'"
                   onmouseout="this.style.transform='';this.style.boxShadow='0 6px 20px rgba(255,215,0,0.3)'">
                    Devenir Partenaire <i class="ri-arrow-right-line"></i>
                </a>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    // ===== FONCTIONS MODALE =====
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
    }
    function closeModal() {
        document.getElementById('modal').classList.remove('show');
    }
    document.getElementById('modal').addEventListener('click', function(e) {
        if (e.target === this) closeModal();
    });

    // ===== HERO CAROUSEL (Ken Burns + dots + pause/play + swipe) =====
    (function(){
        const SLIDES = 5, DELAY = 5000;
        let cur = 0, paused = false, timer = null, tx = 0, ty = 0;

        const slides  = Array.from(document.querySelectorAll('.hero-slide'));
        const dotsWrap = document.getElementById('heroDots');
        const fill    = document.getElementById('heroProgressFill');
        const pauseBtn = document.getElementById('heroPauseBtn');
        const pauseIco = document.getElementById('heroPauseIcon');
        const playIco  = document.getElementById('heroPlayIcon');
        const prevBtn  = document.getElementById('heroPrev');
        const nextBtn  = document.getElementById('heroNext');

        const dots = [];
        for(let i=0;i<SLIDES;i++){
            const d = document.createElement('button');
            d.className = 'h-dot'+(i===0?' active':'');
            d.setAttribute('aria-label','Slide '+(i+1));
            const f = document.createElement('span'); f.className='h-dot-fill';
            d.appendChild(f); dotsWrap.appendChild(d); dots.push(d);
            d.addEventListener('click',()=>goTo(i));
        }

        function resetFill(d){ const f=d.querySelector('.h-dot-fill'); f.style.animation='none'; f.offsetHeight; f.style.animation=''; }
        function updateDots(idx){ dots.forEach((d,i)=>{ d.classList.toggle('active',i===idx); d.classList.remove('paused'); resetFill(d); }); }
        function updateBar(){ fill.classList.add('instant'); fill.style.width='0%'; fill.offsetHeight; fill.classList.remove('instant'); fill.style.transition='width '+DELAY+'ms linear'; fill.style.width='100%'; }
        function showSlide(idx){ slides.forEach(s=>s.classList.remove('active')); slides[idx].classList.add('active'); updateDots(idx); updateBar(); }
        function goTo(idx){ cur=((idx%SLIDES)+SLIDES)%SLIDES; showSlide(cur); if(!paused){ clearTimeout(timer); schedule(); } }
        function schedule(){ timer=setTimeout(()=>goTo(cur+1),DELAY); }
        function doPause(){
            if(paused) return; paused=true; clearTimeout(timer);
            fill.style.transition='none';
            const cw=parseFloat(getComputedStyle(fill).width),pw=parseFloat(getComputedStyle(fill.parentElement).width);
            fill.style.width=(cw/pw*100)+'%';
            dots[cur].classList.add('paused');
            pauseIco.style.display='none'; playIco.style.display='block';
        }
        function doPlay(){
            if(!paused) return; paused=false;
            dots[cur].classList.remove('paused'); resetFill(dots[cur]);
            fill.style.transition='width '+DELAY+'ms linear'; fill.style.width='100%';
            pauseIco.style.display='block'; playIco.style.display='none';
            schedule();
        }

        pauseBtn.addEventListener('click',()=>paused?doPlay():doPause());
        prevBtn && prevBtn.addEventListener('click',()=>goTo(cur-1));
        nextBtn && nextBtn.addEventListener('click',()=>goTo(cur+1));

        const el = document.getElementById('heroCarousel');
        el.addEventListener('touchstart',e=>{tx=e.touches[0].clientX;ty=e.touches[0].clientY;},{passive:true});
        el.addEventListener('touchend',e=>{
            const dx=e.changedTouches[0].clientX-tx, dy=e.changedTouches[0].clientY-ty;
            if(Math.abs(dx)>Math.abs(dy)&&Math.abs(dx)>40){ dx<0?goTo(cur+1):goTo(cur-1); }
        },{passive:true});

        showSlide(0); schedule();
    })();

    // ===== INTERSECTION OBSERVER pour actions cards =====
    (function(){
        const cards = document.querySelectorAll('.act-card');
        const obs = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                if (e.isIntersecting) { e.target.classList.add('in-view'); obs.unobserve(e.target); }
            });
        }, { threshold: 0.08 });
        cards.forEach(c => obs.observe(c));
    })();
</script>
@endpush
