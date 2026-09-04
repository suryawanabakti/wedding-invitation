@extends('admin.layouts.app')

@section('title', 'Edit Alumni')

@section('content')
    <h1 class="h3 mb-4">Edit Alumni</h1>

    <form action="{{ route('admin.alumni.update', $alumni) }}" method="POST" class="card rounded-4 shadow-sm border-0">
        @csrf
        @method('PUT')

        <div class="card-body row g-3">
            <div class="col-md-6">
                <label for="name" class="form-label">Nama Alumni</label>
                <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $alumni->name) }}" required>
            </div>
            <div class="col-md-6">
                <label for="group" class="form-label">Grup</label>
                <input id="group" name="group" type="text" class="form-control" value="{{ old('group', $alumni->group) }}" maxlength="255">
            </div>
        </div>

        <div class="card-footer bg-transparent border-0 pb-3 d-flex flex-column-reverse flex-sm-row justify-content-stretch justify-content-sm-between gap-2">
            <a href="{{ route('admin.alumni.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            <button type="submit" class="btn btn-primary rounded-pill px-4"><i class="fa-solid fa-floppy-disk me-2"></i>Simpan</button>
        </div>
    </form>
@endsection
