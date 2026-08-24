@extends('admin.layouts.app')

@section('title', 'Galeri')

@section('content')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-4">
        <h1 class="h3 mb-0">Galeri</h1>
        <span class="badge text-bg-secondary">{{ $galleries->count() }} foto</span>
    </div>

    <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data" class="card rounded-4 shadow-sm border-0 mb-4">
        @csrf
        <div class="card-body">
            <div class="row g-3 align-items-lg-end">
                <div class="col-lg-5">
                    <label for="images" class="form-label">Upload Foto</label>
                    <input id="images" name="images[]" type="file" accept="image/*" class="form-control" multiple required>
                    <div class="form-text">Bisa pilih lebih dari satu foto sekaligus.</div>
                </div>
                <div class="col-lg-4">
                    <label for="caption" class="form-label">Caption <span class="text-secondary fw-normal">(opsional)</span></label>
                    <input id="caption" name="caption" type="text" class="form-control" maxlength="255">
                </div>
                <div class="col-12 d-grid d-lg-flex justify-content-lg-end">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i>Tambah Foto</button>
                </div>
            </div>
        </div>
    </form>

    <div class="card rounded-4 shadow-sm border-0">
        <div class="table-responsive">
            <table class="table table-hover table-mobile align-middle mb-0">
                <thead>
                    <tr>
                        <th style="width: 6rem;">Foto</th>
                        <th>Caption</th>
                        <th style="width: 8rem;">Urutan</th>
                        <th class="text-end" style="width: 12rem;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($galleries as $gallery)
                        <tr>
                            <td data-label="Foto"><img src="{{ $gallery->imageUrl('image', 'galeri-'.$gallery->id) }}" alt="{{ $gallery->caption ?? 'Foto galeri' }}" class="gallery-thumb"></td>
                            <td data-label="Caption">{{ $gallery->caption ?? '-' }}</td>
                            <td data-label="Urutan">{{ $gallery->sort_order }}</td>
                            <td data-label="Aksi">
                                <div class="d-flex gap-2 justify-content-end">
                                    <a href="{{ route('admin.galleries.edit', $gallery) }}" class="btn btn-outline-primary btn-sm" title="Edit"><i class="fa-solid fa-pen"></i></a>
                                    <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST" onsubmit="return confirm('Hapus foto ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm" title="Hapus"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="empty-cell text-center text-secondary py-4">Belum ada foto galeri.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
