@extends('admin.layouts.app')

@section('title', 'Alumni')

@section('content')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-4">
        <h1 class="h3 mb-0">Alumni</h1>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.alumni.share-all') }}" class="btn btn-success btn-sm" title="Share Semua ke WhatsApp">
                <i class="fa-brands fa-whatsapp me-1"></i>Share Semua
            </a>
            <span class="badge text-bg-secondary align-self-center">{{ $alumni->count() }} orang</span>
        </div>
    </div>

    <form action="{{ route('admin.alumni.store') }}" method="POST" class="card rounded-4 shadow-sm border-0 mb-4">
        @csrf
        <div class="card-body">
            <div class="row g-3 align-items-lg-end">
                <div class="col-lg-5">
                    <label for="name" class="form-label">Nama Alumni</label>
                    <input id="name" name="name" type="text" class="form-control" placeholder="Nama lengkap" required>
                </div>
                <div class="col-lg-4">
                    <label for="group" class="form-label">Grup <span class="text-secondary fw-normal">(opsional)</span></label>
                    <input id="group" name="group" type="text" class="form-control" value="Alumni SI.81" maxlength="255">
                </div>
                <div class="col-12 d-grid d-lg-flex justify-content-lg-end">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i>Tambah Alumni</button>
                </div>
            </div>
        </div>
    </form>

    <div class="card rounded-4 shadow-sm border-0">
        <div class="table-responsive">
            <table class="table table-hover table-mobile align-middle mb-0">
                <thead>
                    <tr>
                        <th style="width: 3rem;">#</th>
                        <th>Nama</th>
                        <th>Grup</th>
                        <th class="text-end" style="width: 18rem;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($alumni as $item)
                        <tr>
                            <td data-label="#" class="text-secondary">{{ $loop->iteration }}</td>
                            <td data-label="Nama" class="fw-semibold">{{ $item->name }}</td>
                            <td data-label="Grup"><span class="badge text-bg-info">{{ $item->group }}</span></td>
                            <td data-label="Aksi">
                                <div class="d-flex gap-2 justify-content-end">
                                    <a href="{{ route('admin.alumni.share', $item) }}" class="btn btn-success btn-sm" title="Share WhatsApp">
                                        <i class="fa-brands fa-whatsapp"></i>
                                    </a>
                                    <a href="{{ route('admin.alumni.edit', $item) }}" class="btn btn-outline-primary btn-sm" title="Edit">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <form action="{{ route('admin.alumni.destroy', $item) }}" method="POST" onsubmit="return confirm('Hapus alumni ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm" title="Hapus"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="empty-cell text-center text-secondary py-4">Belum ada data alumni.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
