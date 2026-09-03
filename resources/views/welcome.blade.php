<!DOCTYPE html>
<html lang="id" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, viewport-fit=cover">

    <title>Undangan Pernikahan {{ $wedding->coupleNames() }}</title>

    <meta name="author" content="{{ $wedding->groom_short_name }}">
    <meta name="description" content="Website Undangan Pernikahan {{ $wedding->coupleNames() }} Secara Online">
    <meta name="theme-color" content="#000000">
    <meta property="og:title" content="Undangan Pernikahan {{ $wedding->coupleNames() }}">
    <meta property="og:description" content="Website Undangan Pernikahan {{ $wedding->coupleNames() }} Secara Online">
    <meta property="og:type" content="website">

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- Preconnect CDN -->
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">

    <!-- Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Sacramento&family=Noto+Naskh+Arabic&display=swap">

    <!-- Dependencies CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" integrity="sha256-2FMn2Zx6PuH5tdBQDRNwrOo60ts5wWPC9R8jK67b3t4=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@7.1.0/css/all.min.css" integrity="sha256-4rTIfo5GQTi/7UJqoyUJQKzxW8VN/YBH31+Cy+vTZj4=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" crossorigin="anonymous">

    <!-- Custom Style (static port of refrensi/css/guest.css + common.css + animation.css) -->
    <style>
        html {
            scroll-behavior: smooth !important;
            width: 100vw !important;
            scrollbar-width: none !important;
            -ms-overflow-style: none !important;
        }

        body {
            font-family: 'Josefin Sans', sans-serif !important;
            padding: 0 !important;
            width: 100% !important;
            overflow-x: clip !important;
        }

        i {
            width: auto !important;
        }

        body,
        div,
        nav,
        svg,
        section {
            will-change: background-color;
            transition: background-color 350ms ease;
        }

        svg>path {
            will-change: color;
            transition: color 350ms ease;
        }

        .font-esthetic {
            font-family: 'Sacramento', cursive !important;
        }

        .font-arabic {
            font-family: 'Noto Naskh Arabic', serif !important;
        }

        .img-center-crop {
            width: 13rem;
            height: 13rem;
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
        }

        html[data-bs-theme="dark"] .btn-transparent {
            background-color: rgba(var(--bs-dark-rgb), 0.5) !important;
            backdrop-filter: blur(0.5rem);
        }

        html[data-bs-theme="light"] .btn-transparent {
            background-color: rgba(var(--bs-light-rgb), 0.5) !important;
            backdrop-filter: blur(0.5rem);
        }

        .loading-page {
            position: fixed;
            inset: 0;
            width: 100%;
            height: 100%;
            z-index: 1056;
            transition: opacity 600ms ease;
        }

        #root {
            transition: opacity 800ms ease;
        }

        html[data-bs-theme="light"] .color-theme-svg {
            color: rgb(255, 255, 255);
            background-color: var(--bs-light);
        }

        html[data-bs-theme="dark"] .color-theme-svg {
            color: rgb(0, 0, 0);
            background-color: var(--bs-dark);
        }

        html[data-bs-theme="light"] .bg-light-dark {
            background-color: rgb(var(--bs-light-rgb));
        }

        html[data-bs-theme="dark"] .bg-light-dark {
            background-color: rgb(var(--bs-dark-rgb));
        }

        html[data-bs-theme="light"] .bg-white-black {
            background-color: rgb(var(--bs-white-rgb));
        }

        html[data-bs-theme="dark"] .bg-white-black {
            background-color: rgb(var(--bs-black-rgb));
        }

        .bg-cover-home {
            width: 100%;
            height: 100%;
            object-fit: cover;
            mask-image: linear-gradient(0.5turn, transparent, black 40%, black 60%, transparent);
        }

        .cursor-pointer {
            cursor: pointer;
        }

        svg {
            display: block;
            line-height: 0;
            shape-rendering: geometricPrecision;
            backface-visibility: hidden;
        }

        .svg-wrapper {
            overflow: hidden !important;
            transform: translateZ(0) !important;
        }

        .no-gap-bottom {
            margin-bottom: -0.75rem !important;
        }

        @keyframes scroll {
            0% {
                transform: translateY(1rem);
                opacity: 0;
            }

            10% {
                transform: translateY(0);
                opacity: 1;
            }

            100% {
                transform: translateY(0);
                opacity: 0;
            }
        }

        .mouse-animation>.scroll-animation {
            width: 0.25rem;
            height: 0.625rem;
            animation: scroll 3s linear infinite;
        }

        .mouse-animation {
            height: 2rem;
            box-sizing: content-box;
        }

        @keyframes spin-icon {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .spin-button {
            animation: spin-icon 5s linear infinite;
        }

        @keyframes love {
            50% {
                transform: translateY(1rem);
            }
        }

        .animate-love {
            animation: love 5s ease-in-out infinite;
        }

        html[data-bs-theme="dark"] .navbar {
            background-color: rgba(var(--bs-dark-rgb), 0.75) !important;
            backdrop-filter: blur(0.5rem);
        }

        html[data-bs-theme="light"] .navbar {
            background-color: rgba(var(--bs-light-rgb), 0.75) !important;
            backdrop-filter: blur(0.5rem);
        }

        html[data-bs-theme="dark"] .text-theme-auto {
            color: rgb(var(--bs-light-rgb));
        }

        html[data-bs-theme="light"] .text-theme-auto {
            color: rgb(var(--bs-dark-rgb));
        }

        html[data-bs-theme="dark"] .nav-link {
            color: rgba(var(--bs-white-rgb), 0.5);
        }

        html[data-bs-theme="light"] .nav-link {
            color: rgba(var(--bs-black-rgb), 0.5);
        }

        html[data-bs-theme="dark"] .nav-link.active {
            color: rgba(var(--bs-white-rgb), 1);
        }

        html[data-bs-theme="light"] .nav-link.active {
            color: rgba(var(--bs-black-rgb), 1);
        }

        html[data-bs-theme="dark"] .bg-theme-auto {
            background-color: var(--bs-gray-800);
        }

        html[data-bs-theme="light"] .bg-theme-auto {
            background-color: var(--bs-gray-100);
        }

        html[data-bs-theme="dark"] .btn-outline-auto {
            --bs-btn-color: var(--bs-light);
            --bs-btn-border-color: var(--bs-light);
            --bs-btn-hover-color: var(--bs-black);
            --bs-btn-hover-bg: var(--bs-light);
            --bs-btn-hover-border-color: var(--bs-light);
            --bs-btn-focus-shadow-rgb: var(--bs-light-rgb);
            --bs-btn-active-color: var(--bs-black);
            --bs-btn-active-bg: var(--bs-light);
            --bs-btn-active-border-color: var(--bs-light);
            --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
            --bs-btn-disabled-color: var(--bs-light);
            --bs-btn-disabled-bg: transparent;
            --bs-btn-disabled-border-color: var(--bs-light);
            --bs-gradient: none;
        }

        html[data-bs-theme="light"] .btn-outline-auto {
            --bs-btn-color: var(--bs-dark);
            --bs-btn-border-color: var(--bs-dark);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: var(--bs-dark);
            --bs-btn-hover-border-color: var(--bs-dark);
            --bs-btn-focus-shadow-rgb: var(--bs-dark-rgb);
            --bs-btn-active-color: var(--bs-white);
            --bs-btn-active-bg: var(--bs-dark);
            --bs-btn-active-border-color: var(--bs-dark);
            --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
            --bs-btn-disabled-color: var(--bs-dark);
            --bs-btn-disabled-bg: transparent;
            --bs-btn-disabled-border-color: var(--bs-dark);
            --bs-gradient: none;
        }

        html[data-bs-theme="dark"] .bg-overlay-auto {
            background-color: rgba(var(--bs-black-rgb), 0.5);
            backdrop-filter: blur(0.25rem);
        }

        html[data-bs-theme="light"] .bg-overlay-auto {
            background-color: rgba(var(--bs-white-rgb), 0.5);
            backdrop-filter: blur(0.25rem);
        }

        #navbar-menu {
            position: sticky !important;
            bottom: 0;
            z-index: 1020;
        }

        .comment-avatar {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            object-fit: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            flex-shrink: 0;
            background-color: var(--bs-gray-300);
            color: var(--bs-dark);
        }

        html[data-bs-theme="dark"] .comment-avatar {
            background-color: var(--bs-gray-700);
            color: var(--bs-light);
        }

        .like-btn.active {
            color: var(--bs-danger) !important;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes scaleIn {
            from { opacity: 0; transform: scale(0.8); }
            to { opacity: 1; transform: scale(1); }
        }

        @keyframes shimmer {
            0% { background-position: -200% center; }
            100% { background-position: 200% center; }
        }

        .shimmer-text {
            background: linear-gradient(90deg, var(--bs-dark) 0%, #e74c3c 25%, var(--bs-dark) 50%, #e74c3c 75%, var(--bs-dark) 100%);
            background-size: 200% auto;
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: shimmer 4s linear infinite;
        }

        html[data-bs-theme="dark"] .shimmer-text {
            background: linear-gradient(90deg, var(--bs-light) 0%, #ff6b6b 25%, var(--bs-light) 50%, #ff6b6b 75%, var(--bs-light) 100%);
            background-size: 200% auto;
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        #welcome .font-esthetic {
            animation: fadeInUp 1.5s ease forwards;
        }

        #welcome #welcome-couple-name {
            animation: fadeInUp 1.5s ease 0.3s forwards;
            opacity: 0;
        }

        #welcome #guest-name {
            animation: fadeIn 1.5s ease 0.6s forwards;
            opacity: 0;
        }

        #welcome .btn {
            animation: scaleIn 1s ease 1s forwards;
            opacity: 0;
        }

        .orb-container {
            position: absolute;
            inset: 0;
            overflow: hidden;
            pointer-events: none;
            z-index: 0;
        }

        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(60px);
            opacity: 0.4;
        }

        .orb-green-1 {
            width: 250px;
            height: 250px;
            background: radial-gradient(circle, #2ecc71 0%, transparent 70%);
            top: -80px;
            left: -60px;
            animation: orbFloat1 8s ease-in-out infinite;
        }

        .orb-green-2 {
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, #27ae60 0%, transparent 70%);
            bottom: -60px;
            right: -40px;
            animation: orbFloat2 10s ease-in-out infinite;
        }

        .orb-white-1 {
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(255,255,255,0.8) 0%, transparent 70%);
            top: 20%;
            right: -100px;
            animation: orbFloat3 12s ease-in-out infinite;
        }

        .orb-white-2 {
            width: 180px;
            height: 180px;
            background: radial-gradient(circle, rgba(255,255,255,0.6) 0%, transparent 70%);
            bottom: 10%;
            left: -50px;
            animation: orbFloat4 9s ease-in-out infinite;
        }

        .orb-green-3 {
            width: 150px;
            height: 150px;
            background: radial-gradient(circle, #1abc9c 0%, transparent 70%);
            top: 50%;
            left: 50%;
            animation: orbFloat5 11s ease-in-out infinite;
        }

        @keyframes orbFloat1 {
            0%, 100% { transform: translate(0, 0) scale(1); }
            25% { transform: translate(40px, 30px) scale(1.1); }
            50% { transform: translate(-20px, 60px) scale(0.95); }
            75% { transform: translate(30px, -20px) scale(1.05); }
        }

        @keyframes orbFloat2 {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(-50px, -40px) scale(1.15); }
            66% { transform: translate(30px, -20px) scale(0.9); }
        }

        @keyframes orbFloat3 {
            0%, 100% { transform: translate(0, 0) scale(1); }
            25% { transform: translate(-60px, 40px) scale(1.1); }
            50% { transform: translate(-30px, -30px) scale(1.05); }
            75% { transform: translate(20px, 50px) scale(0.95); }
        }

        @keyframes orbFloat4 {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(50px, -40px) scale(1.2); }
        }

        @keyframes orbFloat5 {
            0%, 100% { transform: translate(-50%, -50%) scale(1); }
            33% { transform: translate(-30%, -60%) scale(1.15); }
            66% { transform: translate(-60%, -40%) scale(0.9); }
        }
    </style>
</head>

<body class="bg-white-black overflow-hidden" data-time="{{ $wedding->wedding_at->format('Y-m-d H:i:s') }}">

    <!-- Root Invitation -->
    <div class="row m-0 p-0 justify-content-center opacity-0" id="root">

        <!-- Smartphone mode -->
        <div class="col-sm-7 col-md-6 col-lg-5 col-xl-4 col-xxl-3 m-0 p-0">
            <!-- Main Content -->
            <main data-bs-spy="scroll" data-bs-target="#navbar-menu" data-bs-root-margin="25% 0% 0% 0%" data-bs-smooth-scroll="true" tabindex="0">

                <!-- Home -->
                <section id="home" class="bg-light-dark position-relative overflow-hidden p-0 m-0" style="height: 100vh;">
                    <img src="{{ $wedding->imageUrl('background_image', 'wedding-bg') }}" alt="bg" class="position-absolute top-0 start-0 w-100 h-100" style="object-fit: cover;">
                    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(180deg, rgba(0,0,0,0.5) 0%, rgba(0,0,0,0.35) 50%, rgba(0,0,0,0.55) 100%);"></div>

                    <div class="position-relative text-center d-flex flex-column justify-content-start align-items-center h-100" style="background-color: unset;">
                        <h1 class="font-esthetic pt-4 pb-4 fw-medium text-white" style="font-size: 2.25rem;">Undangan Pernikahan</h1>

                        <h2 class="font-esthetic my-4 shimmer-text" style="font-size: 2.25rem;" id="home-couple-name">{{ $wedding->coupleNames() }}</h2>
                        <p class="my-2 text-white" style="font-size: 1.25rem;" id="home-wedding-day">{{ $wedding->wedding_at->locale('id')->translatedFormat('l, d F Y') }}</p>

                        <a href="{{ $wedding->googleCalendarUrl() }}"
                            target="_blank"
                            class="btn btn-light btn-sm shadow rounded-pill px-3 py-1" style="font-size: 0.825rem;">
                            <i class="fa-solid fa-calendar-check me-2"></i>Simpan di Kalender
                        </a>

                        <div class="d-flex justify-content-center align-items-center mt-4 mb-2">
                            <div class="mouse-animation border border-light border-2 rounded-5 px-2 py-1 opacity-75">
                                <div class="scroll-animation rounded-4 bg-light"></div>
                            </div>
                        </div>

                        <p class="pb-4 m-0 text-white opacity-75" style="font-size: 0.825rem;">Scroll Down</p>
                    </div>
                </section>

                <!-- Bride -->
                <section class="text-center position-relative overflow-hidden" id="bride">
                    <video autoplay muted loop playsinline class="position-absolute top-0 start-0 w-100 h-100" style="object-fit: cover; z-index: 0;">
                        <source src="{{ asset('bg2.mp4') }}" type="video/mp4">
                    </video>
                    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0,0,0,0.4); z-index: 1;"></div>
                    <div class="orb-container" style="z-index: 2;">
                        <div class="orb orb-green-1"></div>
                        <div class="orb orb-white-1"></div>
                        <div class="orb orb-green-3"></div>
                    </div>
                    <div class="position-relative" style="z-index: 3;">
                    <h2 class="font-arabic py-4 m-0 text-white" style="font-size: 2rem;">بِسْمِ اللّٰهِ الرَّحْمٰنِ الرَّحِيْمِ</h2>
                    <h2 class="font-esthetic py-4 m-0 text-white" style="font-size: 2rem;">Assalamualaikum Warahmatullahi Wabarakatuh</h2>
                    <p class="pb-4 px-2 m-0 text-white" style="font-size: 0.95rem;">Tanpa mengurangi rasa hormat, kami mengundang Anda untuk berkenan menghadiri acara pernikahan kami:</p>

                    <div class="overflow-x-hidden pb-4">

                        <div class="position-relative">
                            <div data-aos="fade-right" data-aos-duration="2000" class="pb-1">
                                <img src="{{ $wedding->imageUrl('groom_photo', 'groom') }}" alt="cowo" class="img-center-crop rounded-circle border border-3 border-light shadow my-4 mx-auto" id="groom-photo">
                                <h2 class="font-esthetic m-0 text-white" style="font-size: 2.125rem;" id="groom-name">{{ $wedding->groom_full_name }}</h2>
                                <p class="mt-3 mb-1 text-white" style="font-size: 1.25rem;" id="groom-title">{{ $wedding->groom_title }}</p>
                                <p class="mb-0 text-white" style="font-size: 0.95rem;" id="groom-father">{{ $wedding->groom_father }}</p>
                                <p class="mb-0 text-white" style="font-size: 0.95rem;">dan</p>
                                <p class="mb-0 text-white" style="font-size: 0.95rem;" id="groom-mother">{{ $wedding->groom_mother }}</p>
                            </div>
                        </div>

                        <h2 class="font-esthetic mt-4 text-white" style="font-size: 4.5rem;">&amp;</h2>

                        <div class="position-relative">
                            <div data-aos="fade-left" data-aos-duration="2000" class="pb-1">
                                <img src="{{ $wedding->imageUrl('bride_photo', 'bride') }}" alt="cewe" class="img-center-crop rounded-circle border border-3 border-light shadow my-4 mx-auto" id="bride-photo">
                                <h2 class="font-esthetic m-0 text-white" style="font-size: 2.125rem;" id="bride-name">{{ $wedding->bride_full_name }}</h2>
                                <p class="mt-3 mb-1 text-white" style="font-size: 1.25rem;" id="bride-title">{{ $wedding->bride_title }}</p>
                                <p class="mb-0 text-white" style="font-size: 0.95rem;" id="bride-father">{{ $wedding->bride_father }}</p>
                                <p class="mb-0 text-white" style="font-size: 0.95rem;">dan</p>
                                <p class="mb-0 text-white" style="font-size: 0.95rem;" id="bride-mother">{{ $wedding->bride_mother }}</p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Wave Separator -->
                <div class="svg-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="color-theme-svg no-gap-bottom">
                        <path fill="currentColor" fill-opacity="1" d="M0,192L40,181.3C80,171,160,149,240,149.3C320,149,400,171,480,165.3C560,160,640,128,720,128C800,128,880,160,960,186.7C1040,213,1120,235,1200,218.7C1280,203,1360,149,1400,122.7L1440,96L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z"></path>
                    </svg>
                </div>

                <!-- Firman Allah Subhanahu Wa Ta'ala -->
                <section class="bg-light-dark pt-2 pb-4 position-relative overflow-hidden">
                    <div class="orb-container">
                        <div class="orb orb-green-2"></div>
                        <div class="orb orb-white-2"></div>
                    </div>
                    <div class="container text-center position-relative" style="z-index: 1;">
                        <h2 class="font-esthetic pt-2 pb-1 m-0" style="font-size: 2rem;">Allah Subhanahu Wa Ta'ala berfirman</h2>

                        @foreach ($quotes as $quote)
                            <div class="bg-theme-auto mt-4 p-3 shadow rounded-4" data-aos="fade-down" data-aos-duration="2000">
                                <p class="p-1 mb-2" style="font-size: 0.95rem;">{{ $quote->body }}</p>
                                <p class="m-0 p-0 text-theme-auto" style="font-size: 0.95rem;">{{ $quote->source }}</p>
                            </div>
                        @endforeach
                    </div>
                </section>

                <!-- Wave Separator -->
                <div class="svg-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="color-theme-svg no-gap-bottom">
                        <path fill="currentColor" fill-opacity="1" d="M0,96L30,106.7C60,117,120,139,180,154.7C240,171,300,181,360,186.7C420,192,480,192,540,181.3C600,171,660,149,720,154.7C780,160,840,192,900,208C960,224,1020,224,1080,208C1140,192,1200,160,1260,138.7C1320,117,1380,107,1410,101.3L1440,96L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path>
                    </svg>
                </div>

                @if ($wedding->tudang_penni_enabled)
                <!-- Tudang Penni (Malam Mappacci) -->
                <section class="bg-white-black pb-2 position-relative overflow-hidden" id="tudang-penni">
                    <div class="orb-container">
                        <div class="orb orb-green-2"></div>
                        <div class="orb orb-white-1"></div>
                    </div>
                    <div class="container text-center position-relative" style="z-index: 1;">
                        <h2 class="font-esthetic py-4 m-0" style="font-size: 2.25rem;">Tudang Penni</h2>
                        <p class="mb-1" style="font-size: 0.95rem;">Malam Mappacci</p>

                        <div class="overflow-x-hidden">
                            <div class="py-2" data-aos="fade-down" data-aos-duration="1500">
                                <p style="font-size: 0.95rem;">{{ $wedding->tudang_penni_time }}</p>
                            </div>

                            <div class="py-2" data-aos="fade-up" data-aos-duration="1500">
                                <a href="{{ $wedding->tudang_penni_maps_url ?? '#' }}" target="_blank" rel="noopener" class="btn btn-outline-auto btn-sm rounded-pill shadow mb-2 px-3"><i class="fa-solid fa-map-location-dot me-2"></i>Lihat Google Maps</a>
                                <small class="d-block my-1">{{ $wedding->tudang_penni_address }}</small>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Wave Separator -->
                <div class="svg-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="color-theme-svg no-gap-bottom">
                        <path fill="currentColor" fill-opacity="1" d="M0,96L30,106.7C60,117,120,139,180,154.7C240,171,300,181,360,186.7C420,192,480,192,540,181.3C600,171,660,149,720,154.7C780,160,840,192,900,208C960,224,1020,224,1080,208C1140,192,1200,160,1260,138.7C1320,117,1380,107,1410,101.3L1440,96L1440,0L1410,0C1380,0,1320,0,1260,0C1200,0,1140,0,1080,0C1020,0,960,0,900,0C840,0,780,0,720,0C660,0,600,0,540,0C480,0,420,0,360,0C300,0,240,0,180,0C120,0,60,0,30,0L0,0Z"></path>
                    </svg>
                </div>
                @endif

                <!-- Wedding Date -->
                <section class="bg-white-black pb-2 position-relative overflow-hidden" id="wedding-date">
                    <div class="orb-container">
                        <div class="orb orb-white-1"></div>
                        <div class="orb orb-green-1"></div>
                    </div>
                    <div class="container text-center position-relative" style="z-index: 1;">
                        <h2 class="font-esthetic py-4 m-0" style="font-size: 2.25rem;">Moment Bahagia</h2>

                        <div class="border rounded-pill shadow py-2 px-4 mt-2 mb-4">
                            <div class="row justify-content-center">
                                <div class="col-3 p-1">
                                    <p class="d-inline m-0 p-0" style="font-size: 1.25rem;" id="day">0</p><small class="ms-1 me-0 my-0 p-0 d-inline">Hari</small>
                                </div>
                                <div class="col-3 p-1">
                                    <p class="d-inline m-0 p-0" style="font-size: 1.25rem;" id="hour">0</p><small class="ms-1 me-0 my-0 p-0 d-inline">Jam</small>
                                </div>
                                <div class="col-3 p-1">
                                    <p class="d-inline m-0 p-0" style="font-size: 1.25rem;" id="minute">0</p><small class="ms-1 me-0 my-0 p-0 d-inline">Menit</small>
                                </div>
                                <div class="col-3 p-1">
                                    <p class="d-inline m-0 p-0" style="font-size: 1.25rem;" id="second">0</p><small class="ms-1 me-0 my-0 p-0 d-inline">Detik</small>
                                </div>
                            </div>
                        </div>

                        <p class="py-2 m-0" style="font-size: 0.95rem;">Dengan memohon rahmat dan ridho Allah Subhanahu Wa Ta'ala, insyaAllah kami akan menyelenggarakan acara:</p>

                        <div class="overflow-x-hidden">
                            <div class="py-2" data-aos="fade-right" data-aos-duration="1500">
                                <h2 class="font-esthetic m-0 py-2" style="font-size: 2rem;">Akad</h2>
                                <p style="font-size: 0.95rem;" id="akad-time">{{ $wedding->akad_time }}</p>
                            </div>

                            <div class="py-2" data-aos="fade-left" data-aos-duration="1500">
                                <h2 class="font-esthetic m-0 py-2" style="font-size: 2rem;">Resepsi</h2>
                                <p style="font-size: 0.95rem;" id="resepsi-time">{{ $wedding->resepsi_time }}</p>
                            </div>
                        </div>

                        <div class="py-2" data-aos="fade-down" data-aos-duration="1500">
                            <a href="{{ $wedding->maps_url ?? '#' }}" target="_blank" rel="noopener" class="btn btn-outline-auto btn-sm rounded-pill shadow mb-2 px-3" id="maps-link"><i class="fa-solid fa-map-location-dot me-2"></i>Lihat Google Maps</a>
                            <small class="d-block my-1" id="address">{{ $wedding->address }}</small>
                        </div>
                    </div>
                </section>

                <!-- Gallery -->
                <section class="bg-white-black pb-5 pt-3 position-relative overflow-hidden" id="gallery">
                    <div class="orb-container">
                        <div class="orb orb-green-2"></div>
                        <div class="orb orb-white-2"></div>
                        <div class="orb orb-green-3"></div>
                    </div>
                    <div class="container position-relative" style="z-index: 1;">
                        <div class="border rounded-5 shadow p-3">

                            <h2 class="font-esthetic text-center py-2 m-0" style="font-size: 2.25rem;">Galeri</h2>

                            @foreach ($galleryChunks as $chunk)
                                <div id="carousel-image-{{ $loop->iteration }}" data-aos="fade-up" data-aos-duration="1500" class="carousel slide mt-4" data-bs-ride="carousel">
                                    {{-- <div class="carousel-indicators">
                                        @foreach ($chunk as $gallery)
                                            <button type="button"  data-bs-slide-to="{{ $loop->index }}" @if ($loop->first) class="active" aria-current="true" @endif aria-label="Slide {{ $loop->iteration }}"></button>
                                        @endforeach
                                    </div> --}}

                                    <div class="carousel-inner rounded-4">
                                        @foreach ($chunk as $gallery)
                                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                <img src="{{ $gallery->imageUrl('image', 'galeri-'.$gallery->id) }}" alt="{{ $gallery->caption ?? 'Galeri '.$gallery->id }}" class="d-block img-fluid cursor-pointer gallery-img" id="gallery-{{ $gallery->id }}">
                                            </div>
                                        @endforeach
                                    </div>

                                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-image-{{ $loop->iteration }}" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>

                                    <button class="carousel-control-next" type="button" data-bs-target="#carousel-image-{{ $loop->iteration }}" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>

                <!-- Wave Separator -->
                <div class="svg-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="color-theme-svg no-gap-bottom">
                        <path fill="currentColor" fill-opacity="1" d="M0,96L30,106.7C60,117,120,139,180,154.7C240,171,300,181,360,186.7C420,192,480,192,540,181.3C600,171,660,149,720,154.7C780,160,840,192,900,208C960,224,1020,224,1080,208C1140,192,1200,160,1260,138.7C1320,117,1380,107,1410,101.3L1440,96L1440,0L1410,0C1380,0,1320,0,1260,0C1200,0,1140,0,1080,0C1020,0,960,0,900,0C840,0,780,0,720,0C660,0,600,0,540,0C480,0,420,0,360,0C300,0,240,0,180,0C120,0,60,0,30,0L0,0Z"></path>
                    </svg>
                </div>

                <!-- Love Gift -->
                <section class="bg-light-dark pb-3 position-relative overflow-hidden">
                    <div class="orb-container">
                        <div class="orb orb-white-1"></div>
                        <div class="orb orb-green-1"></div>
                    </div>
                    <div class="container text-center position-relative" style="z-index: 1;">
                        <h2 class="font-esthetic pt-3 mb-4" style="font-size: 2.25rem;">Love Gift</h2>
                        <p class="mb-1" style="font-size: 0.95rem;">Dengan hormat, bagi Anda yang ingin memberikan tanda kasih kepada kami, dapat melalui:</p>

                        @foreach (['transfer' => $transferGifts, 'qris' => $qrisGifts, 'gift' => $otherGifts] as $giftType => $giftCollection)
                            @foreach ($giftCollection as $gift)
                                <div class="bg-theme-auto rounded-4 shadow p-3 mx-4 mt-4 text-start" data-aos="fade-up" data-aos-duration="2500">
                                    <i class="fa-solid {{ ['transfer' => 'fa-money-bill-transfer', 'qris' => 'fa-qrcode fa-lg', 'gift' => 'fa-gift fa-lg'][$giftType] }}"></i>
                                    <p class="d-inline">{{ ['transfer' => 'Transfer', 'qris' => 'Qris', 'gift' => 'Gift'][$giftType] }}</p>

                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                        <p class="m-0 p-0" style="font-size: 0.95rem;"><i class="fa-regular fa-user fa-sm me-1"></i><span>{{ $gift->holder_name }}</span></p>
                                    </div>

                                    <hr class="my-2 py-1">

                                    @if ($giftType === 'transfer')
                                        <p class="m-0" style="font-size: 0.9rem;"><i class="fa-solid fa-building-columns me-1"></i><span>{{ $gift->bank_name }}</span></p>
                                        <div class="d-flex justify-content-between align-items-center mt-2">
                                            <p class="m-0 p-0" style="font-size: 0.85rem;"><i class="fa-solid fa-credit-card me-1"></i><span>{{ $gift->account_number }}</span></p>
                                            <button class="btn btn-outline-auto btn-sm shadow-sm rounded-4 py-0" style="font-size: 0.75rem;" data-copy="{{ $gift->account_number }}"><i class="fa-solid fa-copy"></i></button>
                                        </div>
                                    @elseif ($giftType === 'qris')
                                        <div class="d-flex justify-content-center align-items-center">
                                            <img src="{{ $gift->imageUrl('image') }}" alt="donate" class="img-fluid rounded-3 mx-auto bg-white" id="qris-photo">
                                        </div>
                                    @else
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <p class="m-0 p-0" style="font-size: 0.85rem;"><i class="fa-solid fa-phone-volume me-1"></i><span>{{ $gift->phone }}</span></p>
                                            <button class="btn btn-outline-auto btn-sm shadow-sm rounded-4 py-0" style="font-size: 0.75rem;" data-copy="{{ $gift->phone }}"><i class="fa-solid fa-copy"></i></button>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="my-0 p-0 text-truncate me-2" style="font-size: 0.85rem;"><i class="fa-solid fa-location-dot me-1"></i><span>{{ $gift->address }}</span></p>
                                            <button class="btn btn-outline-auto btn-sm shadow-sm rounded-4 py-0" style="font-size: 0.75rem;" data-copy="{{ $gift->address }}"><i class="fa-solid fa-copy"></i></button>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </section>

                <!-- Comment -->
                <section class="bg-light-dark my-0 pb-0 pt-3 position-relative overflow-hidden" id="comment">
                    <div class="orb-container">
                        <div class="orb orb-green-2"></div>
                        <div class="orb orb-white-2"></div>
                    </div>
                    <div class="container position-relative" style="z-index: 1;">
                        <div class="border rounded-5 shadow p-3 mb-2">
                            <h2 class="font-esthetic text-center mt-2 mb-4" style="font-size: 2.25rem;">Ucapan &amp; Doa</h2>

                            <form id="comment-form" class="mb-3" action="{{ route('ucapan.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="form-name" class="form-label my-1"><i class="fa-solid fa-person me-2"></i>Nama</label>
                                    <input dir="auto" type="text" class="form-control shadow-sm rounded-4" id="form-name" name="name" minlength="2" maxlength="50" placeholder="Isikan Nama Anda" autocomplete="name" required>
                                </div>

                                <div class="mb-3">
                                    <label for="form-presence" class="form-label my-1"><i class="fa-solid fa-person-circle-question me-2"></i>Presensi</label>
                                    <select class="form-select shadow-sm rounded-4" id="form-presence" name="presence" autocomplete="off">
                                        @foreach (\App\Models\Comment::presences() as $value => $label)
                                            <option value="{{ $value }}" @selected($value === 0)>@php echo $label; @endphp</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="form-comment" class="form-label my-1"><i class="fa-solid fa-comment me-2"></i>Ucapan &amp; Doa</label>
                                    <textarea dir="auto" class="form-control shadow-sm rounded-4" id="form-comment" name="body" rows="4" minlength="1" maxlength="1000" placeholder="Tulis Ucapan dan Doa" autocomplete="off" required></textarea>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-sm rounded-4 shadow m-1">
                                        <i class="fa-solid fa-paper-plane me-2"></i>Send
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Comments -->
                        <div class="py-3" id="comments">
                            @forelse ($comments as $comment)
                                <div class="bg-theme-auto rounded-4 shadow p-3 mb-3 comment-card">
                                    <div class="d-flex align-items-center gap-2 mb-2">
                                        <div class="comment-avatar">{{ mb_strtoupper(mb_substr($comment->name, 0, 1)) }}</div>
                                        <div class="flex-grow-1">
                                            <strong class="d-block" style="font-size: 0.95rem;">{{ $comment->name }}</strong>
                                            <small class="text-secondary">{{ $comment->created_at->locale('id')->diffForHumans() }} &middot; {{ $comment->presenceLabel() }}</small>
                                        </div>
                                        <button type="button" class="btn btn-sm like-btn p-0 text-secondary" aria-label="Like"><i class="fa-regular fa-heart"></i></button>
                                    </div>
                                    <p class="m-0" style="font-size: 0.9rem;">{{ $comment->body }}</p>
                                </div>
                            @empty
                                <p class="text-center text-secondary" style="font-size: 0.95rem;">Jadilah yang pertama mengirim ucapan.</p>
                            @endforelse
                        </div>
                    </div>
                </section>

                <!-- Wave Separator -->
                <div class="svg-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="color-theme-svg no-gap-bottom">
                        <path fill="currentColor" fill-opacity="1" d="M0,224L34.3,234.7C68.6,245,137,267,206,266.7C274.3,267,343,245,411,234.7C480,224,549,224,617,213.3C685.7,203,754,181,823,197.3C891.4,213,960,267,1029,266.7C1097.1,267,1166,213,1234,192C1302.9,171,1371,181,1406,186.7L1440,192L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
                    </svg>
                </div>

                <!-- End Of Invitation -->
                <section class="bg-white-black py-2 no-gap-bottom position-relative overflow-hidden">
                    <div class="orb-container">
                        <div class="orb orb-green-1"></div>
                        <div class="orb orb-white-1"></div>
                        <div class="orb orb-green-3"></div>
                    </div>
                    <div class="container text-center position-relative" style="z-index: 1;">
                        <p class="pb-2 pt-4" style="font-size: 0.95rem;">Terima kasih atas perhatian dan doa restu Anda, yang menjadi kebahagiaan serta kehormatan besar bagi kami.</p>

                        <h2 class="font-esthetic" style="font-size: 2rem;">Wassalamualaikum Warahmatullahi Wabarakatuh</h2>
                        <h2 class="font-arabic pt-4" style="font-size: 2rem;">اَلْحَمْدُ لِلّٰهِ رَبِّ الْعٰلَمِيْنَۙ</h2>

                        <hr class="my-3">

                        <p class="pb-4 mb-0 text-secondary" style="font-size: 0.8rem;">
                            <small>Salam hangat,<br><span class="font-esthetic d-block fs-4 text-theme-auto">{{ $wedding->coupleNames() }}</span></small>
                        </p>
                    </div>
                </section>
            </main>

            <!-- Navbar Bottom -->
            <nav class="navbar navbar-expand sticky-bottom rounded-top-4 border-top p-0" id="navbar-menu">
                <ul class="navbar-nav nav-justified w-100 align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">
                            <i class="fa-solid fa-house"></i>
                            <span class="d-block" style="font-size: 0.7rem;">Home</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#bride">
                            <i class="fa-solid fa-user-group"></i>
                            <span class="d-block" style="font-size: 0.7rem;">Mempelai</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#wedding-date">
                            <i class="fa-solid fa-calendar-check"></i>
                            <span class="d-block" style="font-size: 0.7rem;">Tanggal</span>
                        </a>
                    </li>
                    @if ($wedding->tudang_penni_enabled)
                    <li class="nav-item">
                        <a class="nav-link" href="#tudang-penni">
                            <i class="fa-solid fa-moon"></i>
                            <span class="d-block" style="font-size: 0.7rem;">Tudang Penni</span>
                        </a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="#gallery">
                            <i class="fa-solid fa-images"></i>
                            <span class="d-block" style="font-size: 0.7rem;">Galeri</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#comment">
                            <i class="fa-solid fa-comments"></i>
                            <span class="d-block" style="font-size: 0.7rem;">Ucapan</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- Welcome Page -->
    <div class="loading-page bg-white-black d-flex justify-content-center align-items-center" id="welcome">
        <div class="d-flex justify-content-center align-items-center w-100 h-100 overflow-y-auto">
            <div class="d-flex flex-column text-center px-3">
                <h2 class="font-esthetic mb-4" style="font-size: 2.25rem;">The Wedding Of</h2>

                <img src="{{ $wedding->imageUrl('cover_photo', 'couple') }}" alt="background" class="img-center-crop rounded-circle border border-3 border-light shadow mb-4 mx-auto" id="welcome-profile-photo">

                <h2 class="font-esthetic shimmer-text mb-4" style="font-size: 2.25rem;" id="welcome-couple-name">{{ $wedding->coupleNames() }}</h2>
                <div id="guest-name" data-message="Kepada Yth. Bapak/Ibu/Saudara/i"></div>

                <button type="button" class="btn btn-light shadow rounded-4 mt-3 mx-auto" onclick="undangan.guest.open(this)"><i class="fa-solid fa-envelope-open fa-bounce me-2"></i>Buka Undangan</button>

                <noscript>
                    <small class="mt-3 text-danger">Mohon maaf, undangan ini membutuhkan javascript untuk dapat dibuka.</small>
                </noscript>
            </div>
        </div>
      
    </div>

    <!-- Button Group -->
    <div class="d-flex position-fixed flex-column" style="bottom: 10vh; right: 2vh; z-index: 1030;">
        <!-- Music Button -->
        <button type="button" id="button-music" class="btn bg-light-dark border btn-sm rounded-circle btn-transparent shadow-sm d-none" aria-label="Play or pause music" onclick="undangan.music.toggle()">
            <i class="fa-solid fa-compact-disc"></i>
        </button>
    </div>

    <!-- Background Music -->
    <audio src="{{ asset('wedsong.mp3') }}" type="audio/mpeg" loop id="audio-music"></audio>

    <!-- Modal Image -->
    <div class="modal fade" id="modal-image" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 border border-0">
                <div class="modal-body p-0">
                    <div class="d-flex position-absolute top-0 end-0">
                        
                        <button class="btn d-flex justify-content-center align-items-center bg-overlay-auto p-2 m-1 rounded-circle border shadow-sm z-1" data-bs-dismiss="modal">
                            <i class="fa-solid fa-circle-xmark" style="width: 1em !important;"></i>
                        </button>
                    </div>

                    <img src="#" class="img-fluid w-100 rounded-4 cursor-pointer" alt="image" id="show-modal-image">
                </div>
            </div>
        </div>
    </div>

    <!-- Dependencies JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha256-5P1JGBOIxI7FBAvT/mb1fCnI5n/NhQKzNUuW7Hq0fMc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js" crossorigin="anonymous"></script>

    <script>
        // Prevent all zoom (viewport meta is ignored by iOS Safari, so also block via events)
        document.addEventListener('gesturestart', (e) => e.preventDefault());
        document.addEventListener('touchmove', (e) => {
            if (e.touches.length > 1) {
                e.preventDefault();
            }
        }, { passive: false });

        let lastTouchEnd = 0;
        document.addEventListener('touchend', (e) => {
            const now = Date.now();
            if (now - lastTouchEnd <= 300) {
                e.preventDefault();
            }
            lastTouchEnd = now;
        }, false);

        document.addEventListener('wheel', (e) => {
            if (e.ctrlKey) {
                e.preventDefault();
            }
        }, { passive: false });

        document.addEventListener('keydown', (e) => {
            if ((e.ctrlKey || e.metaKey) && ['+', '-', '=', '0'].includes(e.key)) {
                e.preventDefault();
            }
        });
    </script>

    <script>
        const undangan = (() => {
            const guest = {
                open: () => {
                    document.getElementById('welcome').style.opacity = '0';
                    setTimeout(() => document.getElementById('welcome').remove(), 700);

                    const root = document.getElementById('root');
                    root.classList.remove('opacity-0');
                    document.body.classList.remove('overflow-hidden');

                    music.play();
                    window.scrollTo(0, 0);

                    if (window.AOS) {
                        AOS.init();
                        AOS.refresh();
                    }

                    let autoScrollStopped = false;
                    const stopAutoScroll = () => { autoScrollStopped = true; window.removeEventListener('touchstart', stopAutoScroll); window.removeEventListener('wheel', stopAutoScroll); };
                    window.addEventListener('touchstart', stopAutoScroll, { once: true });
                    window.addEventListener('wheel', stopAutoScroll, { once: true });

                    const autoScroll = setInterval(() => {
                        if (autoScrollStopped || (window.innerHeight + window.scrollY) >= document.body.scrollHeight - 10) {
                            clearInterval(autoScroll);
                            return;
                        }
                        window.scrollBy({ top: 1, behavior: 'auto' });
                    }, 80);
                },
                name: () => {
                    const el = document.getElementById('guest-name');
                    const to = new URLSearchParams(window.location.search).get('to');

                    if (!el || !to || !to.trim()) {
                        return;
                    }

                    const p = document.createElement('p');
                    p.className = 'mb-0';
                    p.style.fontSize = '0.95rem';
                    p.innerText = el.getAttribute('data-message') || 'Kepada Yth.';

                    const strong = document.createElement('strong');
                    strong.className = 'd-block mb-1';
                    strong.style.fontSize = '1.1rem';
                    strong.innerText = to;

                    el.appendChild(p);
                    el.appendChild(strong);
                },
            };

            const music = {
                play: () => {
                    const audio = document.getElementById('audio-music');
                    const btn = document.getElementById('button-music');

                    if (!audio || !audio.src) {
                        return;
                    }

                    audio.volume = 0.5;
                    audio.play().catch(() => {});
                    btn.classList.remove('d-none');
                    btn.querySelector('i').classList.add('fa-spin');
                },
                toggle: () => {
                    const audio = document.getElementById('audio-music');
                    const icon = document.querySelector('#button-music i');

                    if (audio.paused) {
                        audio.play();
                        icon.classList.add('fa-spin');
                    } else {
                        audio.pause();
                        icon.classList.remove('fa-spin');
                    }
                },
            };

            const theme = {
                change: () => {},
            };

            const util = {
                copy: async (btn) => {
                    const text = btn.getAttribute('data-copy');
                    if (!text) {
                        return;
                    }

                    try {
                        await navigator.clipboard.writeText(text);
                    } catch (e) {
                        const ta = document.createElement('textarea');
                        ta.value = text;
                        document.body.appendChild(ta);
                        ta.select();
                        document.execCommand('copy');
                        ta.remove();
                    }

                    const icon = btn.querySelector('i');
                    if (!icon) {
                        return;
                    }

                    icon.classList.replace('fa-copy', 'fa-check');
                    setTimeout(() => icon.classList.replace('fa-check', 'fa-copy'), 1500);
                },
            };

            const countdown = () => {
                const raw = document.body.getAttribute('data-time');

                if (!raw) {
                    return;
                }

                const [datePart, timePart] = raw.split(' ');
                const target = new Date(`${datePart}T${timePart ?? '00:00:00'}+07:00`).getTime();
                const show = (id, val) => {
                    const el = document.getElementById(id);
                    if (el) {
                        el.innerText = val;
                    }
                };

                const tick = () => {
                    const diff = Math.max(target - Date.now(), 0);
                    show('day', Math.floor(diff / 86400000));
                    show('hour', Math.floor(diff / 3600000) % 24);
                    show('minute', Math.floor(diff / 60000) % 60);
                    show('second', Math.floor(diff / 1000) % 60);
                };

                tick();
                setInterval(tick, 1000);
            };

            const comment = () => {
                const list = document.getElementById('comments');
                const form = document.getElementById('comment-form');

                list.addEventListener('click', (e) => {
                    const btn = e.target.closest('.like-btn');
                    if (!btn) {
                        return;
                    }

                    const icon = btn.querySelector('i');
                    const isActive = btn.classList.toggle('active');
                    icon.classList.toggle('fa-solid', isActive);
                    icon.classList.toggle('fa-regular', !isActive);
                });

                form.addEventListener('submit', async (e) => {
                    e.preventDefault();

                    const submitBtn = form.querySelector('button[type="submit"]');
                    const name = document.getElementById('form-name');
                    const body = document.getElementById('form-comment');

                    if (!name.value.trim() || !body.value.trim()) {
                        return;
                    }

                    submitBtn.disabled = true;

                    try {
                        const response = await fetch(form.action, {
                            method: 'POST',
                            headers: {
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value,
                            },
                            body: new FormData(form),
                        });

                        if (!response.ok) {
                            throw new Error('Gagal mengirim ucapan.');
                        }

                        const data = (await response.json()).comment;
                        const card = document.createElement('div');
                        card.className = 'bg-theme-auto rounded-4 shadow p-3 mb-3 comment-card';
                        card.innerHTML = `
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <div class="comment-avatar"></div>
                                <div class="flex-grow-1">
                                    <strong class="d-block" style="font-size: 0.95rem;"></strong>
                                    <small class="text-secondary"></small>
                                </div>
                                <button type="button" class="btn btn-sm like-btn p-0 text-secondary" aria-label="Like"><i class="fa-regular fa-heart"></i></button>
                            </div>
                            <p class="m-0" style="font-size: 0.9rem;"></p>`;

                        card.querySelector('.comment-avatar').textContent = data.initial;
                        card.querySelector('strong').textContent = data.name;
                        card.querySelector('small').textContent = `${data.time} \u00b7 ${data.presence}`;
                        card.querySelector('p').textContent = data.body;

                        list.prepend(card);
                        form.reset();
                    } catch (err) {
                        alert(err.message || 'Terjadi kesalahan, silakan coba lagi.');
                    } finally {
                        submitBtn.disabled = false;
                    }
                });
            };

            const modalImage = () => {
                const modalEl = document.getElementById('modal-image');
                const image = document.getElementById('show-modal-image');
                const openLink = document.getElementById('button-modal-click');
                const downloadLink = document.getElementById('button-modal-download');
                const modal = new bootstrap.Modal(modalEl);

                document.querySelectorAll('.gallery-img').forEach((el) => {
                    el.addEventListener('click', () => {
                        image.src = el.src;
                        openLink.href = el.src;
                        downloadLink.href = el.src;
                        modal.show();
                    });
                });
            };

            const init = () => {
                guest.name();
                countdown();
                comment();
                modalImage();

                document.addEventListener('click', (e) => {
                    const btn = e.target.closest('[data-copy]');
                    if (btn) {
                        util.copy(btn);
                    }
                });
            };

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', init);
            } else {
                init();
            }

            return { guest, music, theme, util };
        })();
    </script>
</body>

</html>
