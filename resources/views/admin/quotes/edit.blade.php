@extends('admin.layouts.app')

@section('title', 'Edit Quote')

@section('content')
    <h1 class="h3 mb-4">Edit Quote</h1>

    <form action="{{ route('admin.quotes.update', $quote) }}" method="POST" class="card rounded-4 shadow-sm border-0">
        @csrf
        @method('PUT')

        <div class="card-body row g-3">
            <div class="col-lg-8">
                <label for="body" class="form-label">Isi Quote</label>
                <textarea id="body" name="body" rows="3" class="form-control" required maxlength="1000">{{ old('body', $quote->body) }}</textarea>
            </div>
            <div class="col-lg-4">
                <div class="mb-3">
                    <label for="source" class="form-label">Sumber</label>
                    <input id="source" name="source" type="text" class="form-control" value="{{ old('source', $quote->source) }}" required maxlength="100">
                </div>
                <div>
                    <label for="sort_order" class="form-label">Urutan</label>
                    <input id="sort_order" name="sort_order" type="number" min="0" class="form-control" value="{{ old('sort_order', $quote->sort_order) }}" required>
                </div>
            </div>
        </div>

        <div class="card-footer bg-transparent border-0 pb-3 d-flex flex-column-reverse flex-sm-row justify-content-stretch justify-content-sm-between gap-2">
            <a href="{{ route('admin.quotes.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            <button type="submit" class="btn btn-primary rounded-pill px-4"><i class="fa-solid fa-floppy-disk me-2"></i>Simpan</button>
        </div>
    </form>
@endsection
