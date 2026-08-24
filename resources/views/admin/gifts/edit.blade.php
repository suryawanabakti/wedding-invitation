@extends('admin.layouts.app')

@section('title', 'Edit Love Gift')

@section('content')
    <h1 class="h3 mb-4">Edit Love Gift</h1>

    <form action="{{ route('admin.gifts.update', $gift) }}" method="POST" enctype="multipart/form-data" class="card rounded-4 shadow-sm border-0">
        @csrf
        @method('PUT')

        <div class="card-body row g-3">
            <div class="col-md-3">
                <label for="type" class="form-label">Tipe</label>
                <select id="type" name="type" class="form-select" required>
                    @foreach ($types as $value => $label)
                        <option value="{{ $value }}" @selected(old('type', $gift->type) === $value)>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="holder_name" class="form-label">Nama Pemilik</label>
                <input id="holder_name" name="holder_name" type="text" class="form-control" value="{{ old('holder_name', $gift->holder_name) }}" required maxlength="100">
            </div>
            <div class="col-md-3">
                <label for="bank_name" class="form-label">Bank</label>
                <input id="bank_name" name="bank_name" type="text" class="form-control" value="{{ old('bank_name', $gift->bank_name) }}" maxlength="100">
            </div>
            <div class="col-md-2">
                <label for="account_number" class="form-label">No. Rekening</label>
                <input id="account_number" name="account_number" type="text" class="form-control" value="{{ old('account_number', $gift->account_number) }}" maxlength="50">
            </div>
            <div class="col-md-3">
                <label for="phone" class="form-label">No. HP</label>
                <input id="phone" name="phone" type="text" class="form-control" value="{{ old('phone', $gift->phone) }}" maxlength="30">
            </div>
            <div class="col-md-5">
                <label for="address" class="form-label">Alamat</label>
                <input id="address" name="address" type="text" class="form-control" value="{{ old('address', $gift->address) }}" maxlength="500">
            </div>
            <div class="col-md-2">
                <label for="image_url" class="form-label">URL Gambar</label>
                <input id="image_url" name="image_url" type="url" class="form-control" value="{{ old('image_url', str_starts_with((string) $gift->image, 'http') ? $gift->image : null) }}">
            </div>
            <div class="col-md-2 text-center">
                @if ($gift->image)
                    <img src="{{ $gift->imageUrl('image') }}" alt="gambar saat ini" class="gift-thumb border mb-1 d-block mx-auto">
                @endif
                <input type="file" name="image_file" accept="image/*" class="form-control form-control-sm">
            </div>
        </div>

        <div class="card-footer bg-transparent border-0 pb-3 d-flex flex-column-reverse flex-sm-row justify-content-stretch justify-content-sm-between gap-2">
            <a href="{{ route('admin.gifts.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            <button type="submit" class="btn btn-primary rounded-pill px-4"><i class="fa-solid fa-floppy-disk me-2"></i>Simpan</button>
        </div>
    </form>
@endsection
