<a href="{{ route('admin.dashboard') }}" class="d-none d-lg-inline-flex align-items-center text-decoration-none mb-3">
    <span class="fs-5 fw-bold"><i class="fa-solid fa-heart me-2 text-danger"></i>Admin Undangan</span>
</a>

<ul class="nav nav-pills flex-column gap-1">
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
            <i class="fa-solid fa-gauge me-2"></i>Dashboard
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}" href="{{ route('admin.settings.edit') }}">
            <i class="fa-solid fa-gear me-2"></i>Pengaturan
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}" href="{{ route('admin.galleries.index') }}">
            <i class="fa-solid fa-images me-2"></i>Galeri
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.gifts.*') ? 'active' : '' }}" href="{{ route('admin.gifts.index') }}">
            <i class="fa-solid fa-gift me-2"></i>Love Gift
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.quotes.*') ? 'active' : '' }}" href="{{ route('admin.quotes.index') }}">
            <i class="fa-solid fa-quote-left me-2"></i>Quote
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.comments.*') ? 'active' : '' }}" href="{{ route('admin.comments.index') }}">
            <i class="fa-solid fa-comments me-2"></i>Ucapan
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.alumni.*') ? 'active' : '' }}" href="{{ route('admin.alumni.index') }}">
            <i class="fa-brands fa-whatsapp me-2"></i>Share WA Alumni
        </a>
    </li>
</ul>

<a href="{{ route('home') }}" target="_blank" rel="noopener" class="btn btn-outline-primary btn-sm mt-auto mt-3">
    <i class="fa-solid fa-up-right-from-square me-2"></i>Lihat Undangan
</a>
