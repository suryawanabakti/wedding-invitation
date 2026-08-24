@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-4">
        <h1 class="h3 mb-0">Dashboard</h1>
        @if ($wedding)
            <a href="{{ route('admin.settings.edit') }}" class="btn btn-primary btn-sm rounded-pill px-3">
                <i class="fa-solid fa-pen me-2"></i>Edit Pengaturan
            </a>
        @endif
    </div>

    <div class="row g-3 mb-4">
        <div class="col-6 col-lg-3">
            <a href="{{ route('admin.galleries.index') }}" class="text-decoration-none">
                <div class="card rounded-4 shadow-sm h-100 border-0">
                    <div class="card-body d-flex align-items-center gap-3">
                        <span class="stat-icon bg-primary-subtle text-primary"><i class="fa-solid fa-images"></i></span>
                        <div>
                            <p class="fs-4 fw-bold mb-0 text-body">{{ $galleryCount }}</p>
                            <span class="text-secondary small">Foto Galeri</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-6 col-lg-3">
            <a href="{{ route('admin.gifts.index') }}" class="text-decoration-none">
                <div class="card rounded-4 shadow-sm h-100 border-0">
                    <div class="card-body d-flex align-items-center gap-3">
                        <span class="stat-icon bg-success-subtle text-success"><i class="fa-solid fa-gift"></i></span>
                        <div>
                            <p class="fs-4 fw-bold mb-0 text-body">{{ $giftCount }}</p>
                            <span class="text-secondary small">Love Gift</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-6 col-lg-3">
            <a href="{{ route('admin.quotes.index') }}" class="text-decoration-none">
                <div class="card rounded-4 shadow-sm h-100 border-0">
                    <div class="card-body d-flex align-items-center gap-3">
                        <span class="stat-icon bg-warning-subtle text-warning"><i class="fa-solid fa-quote-left"></i></span>
                        <div>
                            <p class="fs-4 fw-bold mb-0 text-body">{{ $quoteCount }}</p>
                            <span class="text-secondary small">Quote</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-6 col-lg-3">
            <a href="{{ route('admin.comments.index') }}" class="text-decoration-none">
                <div class="card rounded-4 shadow-sm h-100 border-0">
                    <div class="card-body d-flex align-items-center gap-3">
                        <span class="stat-icon bg-info-subtle text-info"><i class="fa-solid fa-comments"></i></span>
                        <div>
                            <p class="fs-4 fw-bold mb-0 text-body">{{ $commentCount }}</p>
                            <span class="text-secondary small">Ucapan</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    @if ($wedding)
        <div class="card rounded-4 shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex flex-column flex-sm-row flex-wrap gap-3 align-items-sm-center justify-content-between">
                    <div class="min-w-0">
                        <h2 class="h5 mb-1 font-monospace">{{ $wedding->coupleNames() }}</h2>
                        <small class="text-secondary d-block">
                            <i class="fa-solid fa-calendar-day me-1"></i>{{ $wedding->wedding_at->locale('id')->translatedFormat('l, d F Y') }}
                        </small>
                        <small class="text-secondary d-block text-break">
                            <i class="fa-solid fa-location-dot me-1"></i>{{ $wedding->address }}
                        </small>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('home') }}" target="_blank" rel="noopener" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
                            <i class="fa-solid fa-up-right-from-square me-2"></i>Lihat
                        </a>
                        <a href="{{ route('admin.settings.edit') }}" class="btn btn-primary btn-sm rounded-pill px-3">
                            <i class="fa-solid fa-pen me-2"></i>Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-warning rounded-4 mb-0">Data pernikahan belum ada. Jalankan seeder terlebih dahulu.</div>
    @endif
@endsection
