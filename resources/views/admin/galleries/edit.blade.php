@extends('admin.layouts.app')

@section('title', 'Edit Foto Galeri')

@section('content')
    <h1 class="h3 mb-4">Edit Foto Galeri</h1>

    <form action="{{ route('admin.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data" class="card rounded-4 shadow-sm border-0">
        @csrf
        @method('PUT')

        <div class="card-body row g-3">
            <div class="col-md-4 text-center">
                <img src="{{ $gallery->imageUrl('image', 'galeri-'.$gallery->id) }}" alt="Foto saat ini" class="img-fluid rounded-4 border mb-2">
                <input type="file" name="image_file" accept="image/*" class="form-control form-control-sm">
            </div>
            <div class="col-md-8">
                <div class="mb-3">
                    <label for="caption" class="form-label">Caption</label>
                    <input id="caption" name="caption" type="text" class="form-control" value="{{ old('caption', $gallery->caption) }}" maxlength="255">
                </div>
                <div class="mb-3">
                    <label for="sort_order" class="form-label">Urutan</label>
                    <input id="sort_order" name="sort_order" type="number" min="0" class="form-control" value="{{ old('sort_order', $gallery->sort_order) }}" required>
                </div>
            </div>
        </div>

        <div class="card-footer bg-transparent border-0 pb-3 d-flex flex-column-reverse flex-sm-row justify-content-stretch justify-content-sm-between gap-2">
            <a href="{{ route('admin.galleries.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            <button type="submit" class="btn btn-primary rounded-pill px-4"><i class="fa-solid fa-floppy-disk me-2"></i>Simpan</button>
        </div>
    </form>
@endsection
