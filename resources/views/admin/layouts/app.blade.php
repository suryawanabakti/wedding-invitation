<!DOCTYPE html>
<html lang="id" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard') &middot; Admin Undangan</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" integrity="sha256-2FMn2Zx6PuH5tdBQDRNwrOo60ts5wWPC9R8jK67b3t4=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@7.1.0/css/all.min.css" integrity="sha256-4rTIfo5GQTi/7UJqoyUJQKzxW8VN/YBH31+Cy+vTZj4=" crossorigin="anonymous">

    <style>
        .sidebar {
            --bs-offcanvas-width: 17rem;
        }

        @media (min-width: 992px) {
            .sidebar {
                position: sticky;
                top: 0;
                width: 16rem;
                height: 100vh;
                background-color: var(--bs-body-bg) !important;
                border-right: var(--bs-border-width) solid var(--bs-border-color) !important;
            }

            .sidebar .offcanvas-body {
                display: flex;
                flex-direction: column;
                height: 100%;
                padding: 1rem;
                overflow-y: auto;
            }
        }

        .sidebar .nav-link {
            border-radius: 0.5rem;
            color: var(--bs-emphasis-color);
        }

        .sidebar .nav-link:hover {
            background-color: var(--bs-tertiary-bg);
        }

        .sidebar .nav-link.active {
            background-color: var(--bs-primary);
            color: #fff;
        }

        .stat-icon {
            width: 3rem;
            height: 3rem;
            border-radius: 0.9rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .gallery-thumb {
            width: 4rem;
            height: 3rem;
            object-fit: cover;
            border-radius: 0.375rem;
        }

        .gift-thumb {
            max-width: 4rem;
            max-height: 4rem;
            object-fit: contain;
            background-color: #fff;
            border-radius: 0.375rem;
        }

        @media (max-width: 767.98px) {
            .table-mobile thead {
                display: none;
            }

            .table-mobile,
            .table-mobile tbody,
            .table-mobile tr,
            .table-mobile td {
                display: block;
                width: 100%;
            }

            .table-mobile tbody {
                padding: 0.25rem;
            }

            .table-mobile tr {
                border: 1px solid var(--bs-border-color);
                border-radius: 0.75rem;
                padding: 0.5rem 0.75rem;
                margin-bottom: 0.75rem;
            }

            .table-mobile td {
                border: 0;
                padding: 0.45rem 0;
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 1rem;
                text-align: right;
            }

            .table-mobile td::before {
                content: attr(data-label);
                font-weight: 600;
                font-size: 0.8125rem;
                color: var(--bs-secondary-color);
                text-align: left;
                flex-shrink: 0;
            }

            .table-mobile td:last-child {
                padding-bottom: 0.25rem;
            }

            .table-mobile td.empty-cell {
                display: block;
                text-align: center;
            }

            .table-mobile td.empty-cell::before {
                display: none;
            }
        }
    </style>
</head>
<body class="bg-body-tertiary">

    <!-- Topbar (mobile only) -->
    <nav class="navbar bg-body border-bottom sticky-top d-lg-none shadow-sm">
        <div class="container-fluid px-2">
            <button class="btn btn-outline-secondary btn-sm rounded-circle" type="button" data-bs-toggle="offcanvas" data-bs-target="#admin-sidebar" aria-controls="admin-sidebar" aria-label="Buka menu">
                <i class="fa-solid fa-bars"></i>
            </button>

            <span class="fw-bold">
                <i class="fa-solid fa-heart me-2 text-danger"></i>Admin Undangan
            </span>

            <a href="{{ route('home') }}" target="_blank" rel="noopener" class="btn btn-outline-primary btn-sm rounded-circle" aria-label="Lihat undangan">
                <i class="fa-solid fa-up-right-from-square"></i>
            </a>
        </div>
    </nav>

    <div class="d-flex">
        <!-- Sidebar -->
        <aside class="sidebar offcanvas-lg offcanvas-start bg-body border-end" tabindex="-1" id="admin-sidebar" aria-label="Menu admin">
            <div class="offcanvas-header border-bottom">
                <h5 class="offcanvas-title fw-bold">
                    <i class="fa-solid fa-heart me-2 text-danger"></i>Admin Undangan
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body">
                @include('admin.partials.nav')
            </div>
        </aside>

        <!-- Content -->
        <main class="flex-grow-1 py-4 px-3 px-lg-4" style="min-width: 0;">
            <div class="container-xxl px-0">
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show rounded-4" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha256-5P1JGBOIxI7FBAvT/mb1fCnI5n/NhQKzNUuW7Hq0fMc=" crossorigin="anonymous"></script>
</body>
</html>
