@extends('admin.layouts.app')

@section('title', 'Pengaturan')

@section('content')
    <h1 class="h3 mb-4">Pengaturan Pernikahan</h1>

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="card rounded-4 shadow-sm border-0">
        @csrf
        @method('PUT')

        <div class="card-body">
            <h2 class="h5 mb-3"><i class="fa-solid fa-person me-2 text-primary"></i>Mempelai Pria</h2>
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label for="groom_short_name" class="form-label">Nama Panggilan</label>
                    <input id="groom_short_name" name="groom_short_name" type="text" class="form-control" value="{{ old('groom_short_name', $wedding->groom_short_name) }}" required maxlength="50">
                </div>
                <div class="col-md-6">
                    <label for="groom_full_name" class="form-label">Nama Lengkap</label>
                    <input id="groom_full_name" name="groom_full_name" type="text" class="form-control" value="{{ old('groom_full_name', $wedding->groom_full_name) }}" required maxlength="100">
                </div>
                <div class="col-md-4">
                    <label for="groom_title" class="form-label">Gelar</label>
                    <input id="groom_title" name="groom_title" type="text" class="form-control" value="{{ old('groom_title', $wedding->groom_title) }}" required maxlength="50">
                </div>
                <div class="col-md-4">
                    <label for="groom_father" class="form-label">Nama Ayah</label>
                    <input id="groom_father" name="groom_father" type="text" class="form-control" value="{{ old('groom_father', $wedding->groom_father) }}" required maxlength="100">
                </div>
                <div class="col-md-4">
                    <label for="groom_mother" class="form-label">Nama Ibu</label>
                    <input id="groom_mother" name="groom_mother" type="text" class="form-control" value="{{ old('groom_mother', $wedding->groom_mother) }}" required maxlength="100">
                </div>
            </div>

            <h2 class="h5 mb-3"><i class="fa-solid fa-person-dress me-2 text-danger"></i>Mempelai Wanita</h2>
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label for="bride_short_name" class="form-label">Nama Panggilan</label>
                    <input id="bride_short_name" name="bride_short_name" type="text" class="form-control" value="{{ old('bride_short_name', $wedding->bride_short_name) }}" required maxlength="50">
                </div>
                <div class="col-md-6">
                    <label for="bride_full_name" class="form-label">Nama Lengkap</label>
                    <input id="bride_full_name" name="bride_full_name" type="text" class="form-control" value="{{ old('bride_full_name', $wedding->bride_full_name) }}" required maxlength="100">
                </div>
                <div class="col-md-4">
                    <label for="bride_title" class="form-label">Gelar</label>
                    <input id="bride_title" name="bride_title" type="text" class="form-control" value="{{ old('bride_title', $wedding->bride_title) }}" required maxlength="50">
                </div>
                <div class="col-md-4">
                    <label for="bride_father" class="form-label">Nama Ayah</label>
                    <input id="bride_father" name="bride_father" type="text" class="form-control" value="{{ old('bride_father', $wedding->bride_father) }}" required maxlength="100">
                </div>
                <div class="col-md-4">
                    <label for="bride_mother" class="form-label">Nama Ibu</label>
                    <input id="bride_mother" name="bride_mother" type="text" class="form-control" value="{{ old('bride_mother', $wedding->bride_mother) }}" required maxlength="100">
                </div>
            </div>

            <h2 class="h5 mb-3"><i class="fa-solid fa-calendar-day me-2 text-success"></i>Acara</h2>
            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <label for="wedding_at" class="form-label">Tanggal &amp; Waktu (countdown)</label>
                    <input id="wedding_at" name="wedding_at" type="datetime-local" class="form-control"
                        value="{{ old('wedding_at', $wedding->wedding_at->format('Y-m-d\TH:i')) }}" required>
                </div>
                <div class="col-md-4">
                    <label for="akad_time" class="form-label">Jam Akad</label>
                    <input id="akad_time" name="akad_time" type="text" class="form-control" value="{{ old('akad_time', $wedding->akad_time) }}" required maxlength="100">
                </div>
                <div class="col-md-4">
                    <label for="resepsi_time" class="form-label">Jam Resepsi</label>
                    <input id="resepsi_time" name="resepsi_time" type="text" class="form-control" value="{{ old('resepsi_time', $wedding->resepsi_time) }}" required maxlength="100">
                </div>
                <div class="col-12">
                    <label for="address" class="form-label">Alamat</label>
                    <textarea id="address" name="address" rows="2" class="form-control" required maxlength="500">{{ old('address', $wedding->address) }}</textarea>
                </div>
                <div class="col-12">
                    <label for="maps_url" class="form-label">Link Google Maps</label>
                    <input id="maps_url" name="maps_url" type="url" class="form-control" value="{{ old('maps_url', $wedding->maps_url) }}" placeholder="https://...">
                </div>
            </div>

            <h2 class="h5 mb-3"><i class="fa-solid fa-camera me-2 text-warning"></i>Gambar</h2>
            <div class="row g-3">
                @foreach ([
                    'cover_photo' => 'Foto Couple (Home & Welcome)',
                    'background_image' => 'Background Home',
                    'groom_photo' => 'Foto Mempelai Pria',
                    'bride_photo' => 'Foto Mempelai Wanita',
                ] as $field => $label)
                    <div class="col-sm-6 col-lg-3">
                        <label class="form-label">{{ $label }}</label>
                        <img src="{{ $wedding->imageUrl($field, $field) }}" alt="{{ $label }}" class="gallery-thumb d-block mb-2 border" style="width: 6rem; height: 6rem;">
                        <input type="file" name="{{ $field }}_file" accept="image/*" class="form-control form-control-sm">
                    </div>
                @endforeach
            </div>
        </div>

        <div class="card-footer bg-transparent border-0 pb-3">
            <div class="d-grid d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary rounded-pill px-4">
                    <i class="fa-solid fa-floppy-disk me-2"></i>Simpan
                </button>
            </div>
        </div>
    </form>
@endsection
