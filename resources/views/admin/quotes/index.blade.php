@extends('admin.layouts.app')

@section('title', 'Quote')

@section('content')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-4">
        <h1 class="h3 mb-0">Quote / Firman</h1>
        <span class="badge text-bg-secondary">{{ $quotes->count() }} quote</span>
    </div>

    <form action="{{ route('admin.quotes.store') }}" method="POST" class="card rounded-4 shadow-sm mb-4">
        @csrf
        <div class="card-body row g-3 align-items-end">
            <div class="col-lg-7">
                <label for="body" class="form-label">Isi Quote</label>
                <textarea id="body" name="body" rows="2" class="form-control" required maxlength="1000">{{ old('body') }}</textarea>
            </div>
            <div class="col-lg-3">
                <label for="source" class="form-label">Sumber</label>
                <input id="source" name="source" type="text" class="form-control" placeholder="QS. Adh-Dhariyat: 49" required maxlength="100">
            </div>
                <div class="col-lg-2 d-grid d-lg-flex justify-content-lg-end">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i>Tambah</button>
                </div>
        </div>
    </form>

    <div class="row g-3">
        @forelse ($quotes as $quote)
            <div class="col-md-6">
                <div class="card rounded-4 shadow-sm h-100">
                    <div class="card-body">
                        <p class="mb-2">{{ $quote->body }}</p>
                        <small class="text-secondary fw-semibold">{{ $quote->source }}</small>
                    </div>
                    <div class="card-footer bg-transparent border-0 d-flex justify-content-end gap-2 pb-3">
                        <a href="{{ route('admin.quotes.edit', $quote) }}" class="btn btn-outline-primary btn-sm"><i class="fa-solid fa-pen me-1"></i>Edit</a>
                        <form action="{{ route('admin.quotes.destroy', $quote) }}" method="POST" onsubmit="return confirm('Hapus quote ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash me-1"></i>Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-secondary rounded-4 mb-0">Belum ada quote.</div>
            </div>
        @endforelse
    </div>
@endsection
