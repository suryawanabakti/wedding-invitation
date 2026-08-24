@extends('admin.layouts.app')

@section('title', 'Love Gift')

@section('content')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-4">
        <h1 class="h3 mb-0">Love Gift</h1>
        <span class="badge text-bg-secondary">{{ $gifts->count() }} item</span>
    </div>

    <form action="{{ route('admin.gifts.store') }}" method="POST" enctype="multipart/form-data" class="card rounded-4 shadow-sm border-0 mb-4">
        @csrf
        <div class="card-body">
            <div class="row g-3">
                <div class="col-12 col-md-6 col-lg-2">
                    <label for="type" class="form-label">Tipe</label>
                    <select id="type" name="type" class="form-select" required>
                        @foreach ($types as $value => $label)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <label for="holder_name" class="form-label">Nama Pemilik</label>
                    <input id="holder_name" name="holder_name" type="text" class="form-control" required maxlength="100">
                </div>
                <div class="col-6 col-lg-3">
                    <label for="bank_name" class="form-label">Bank <span class="text-secondary fw-normal">(transfer)</span></label>
                    <input id="bank_name" name="bank_name" type="text" class="form-control" maxlength="100">
                </div>
                <div class="col-6 col-lg-3">
                    <label for="account_number" class="form-label">No. Rekening <span class="text-secondary fw-normal">(transfer)</span></label>
                    <input id="account_number" name="account_number" type="text" class="form-control" maxlength="50">
                </div>

                <div class="col-12"><hr class="my-0"></div>

                <div class="col-6 col-lg-3">
                    <label for="phone" class="form-label">No. HP <span class="text-secondary fw-normal">(gift)</span></label>
                    <input id="phone" name="phone" type="text" class="form-control" maxlength="30">
                </div>
                <div class="col-12 col-lg-5">
                    <label for="address" class="form-label">Alamat <span class="text-secondary fw-normal">(gift)</span></label>
                    <input id="address" name="address" type="text" class="form-control" maxlength="500">
                </div>
                <div class="col-6 col-lg-2">
                    <label for="image_url" class="form-label">URL QRIS</label>
                    <input id="image_url" name="image_url" type="url" class="form-control" placeholder="https://...">
                </div>
                <div class="col-6 col-lg-2">
                    <label for="image_file" class="form-label">Upload QRIS</label>
                    <input id="image_file" name="image_file" type="file" accept="image/*" class="form-control">
                </div>

                <div class="col-12 d-grid d-lg-flex justify-content-lg-end">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i>Tambah Love Gift</button>
                </div>
            </div>
        </div>
    </form>

    <div class="card rounded-4 shadow-sm border-0">
        <div class="table-responsive">
            <table class="table table-hover table-mobile align-middle mb-0">
                <thead>
                    <tr>
                        <th style="width: 6rem;">Gambar</th>
                        <th>Tipe</th>
                        <th>Pemilik</th>
                        <th>Detail</th>
                        <th class="text-end" style="width: 12rem;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($gifts as $gift)
                        @php
                            $badge = ['transfer' => 'text-bg-primary', 'qris' => 'text-bg-success', 'gift' => 'text-bg-warning'][$gift->type] ?? 'text-bg-secondary';
                        @endphp
                        <tr>
                            <td data-label="Gambar">
                                @if ($gift->image)
                                    <img src="{{ $gift->imageUrl('image') }}" alt="gambar" class="gift-thumb border">
                                @else
                                    <span class="text-secondary">-</span>
                                @endif
                            </td>
                            <td data-label="Tipe"><span class="badge {{ $badge }}">{{ $types[$gift->type] ?? $gift->type }}</span></td>
                            <td data-label="Pemilik">{{ $gift->holder_name }}</td>
                            <td data-label="Detail">
                                <span class="small text-secondary text-break">
                                    @if ($gift->bank_name)
                                        {{ $gift->bank_name }} &middot; {{ $gift->account_number }}
                                    @elseif ($gift->phone)
                                        {{ $gift->phone }}
                                    @endif
                                    @if ($gift->address)
                                        <br>{{ \Illuminate\Support\Str::limit($gift->address, 60) }}
                                    @endif
                                    @unless ($gift->bank_name || $gift->phone || $gift->address)
                                        -
                                    @endunless
                                </span>
                            </td>
                            <td data-label="Aksi">
                                <div class="d-flex gap-2 justify-content-end">
                                    <a href="{{ route('admin.gifts.edit', $gift) }}" class="btn btn-outline-primary btn-sm" title="Edit"><i class="fa-solid fa-pen"></i></a>
                                    <form action="{{ route('admin.gifts.destroy', $gift) }}" method="POST" onsubmit="return confirm('Hapus love gift ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm" title="Hapus"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="empty-cell text-center text-secondary py-4">Belum ada love gift.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
