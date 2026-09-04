@extends('admin.layouts.app')

@section('title', 'Share Semua ke WhatsApp')

@section('content')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-4">
        <h1 class="h3 mb-0">
            <i class="fa-brands fa-whatsapp text-success me-2"></i>Share Semua Alumni
        </h1>
        <a href="{{ route('admin.alumni.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="fa-solid fa-arrow-left me-1"></i>Kembali
        </a>
    </div>

    <div class="alert alert-info rounded-4">
        <i class="fa-solid fa-info-circle me-2"></i>
        Klik tombol <strong>WhatsApp</strong> di sebelah nama untuk membuka pesan yang sudah terisi otomatis.
    </div>

    @foreach ($messages as $item)
        <div class="card rounded-4 shadow-sm border-0 mb-3">
            <div class="card-body d-flex flex-wrap align-items-center justify-content-between gap-2">
                <div>
                    <span class="fw-semibold">{{ $item['name'] }}</span>
                    <span class="badge text-bg-info ms-2">{{ $item['group'] }}</span>
                </div>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-outline-secondary btn-sm" onclick="copyMsg{{ $loop->iteration }}()" title="Copy Pesan">
                        <i class="fa-solid fa-copy"></i>
                    </button>
                    <a href="{{ $item['whatsapp_url'] }}" target="_blank" rel="noopener" class="btn btn-success btn-sm" title="Kirim via WhatsApp">
                        <i class="fa-brands fa-whatsapp me-1"></i>Kirim
                    </a>
                </div>
            </div>
        </div>

        <textarea id="msg-{{ $loop->iteration }}" class="d-none">{{ $item['message'] }}</textarea>
        <script>
            function copyMsg{{ $loop->iteration }}() {
                navigator.clipboard.writeText(document.getElementById('msg-{{ $loop->iteration }}').value).then(function() {
                    alert('Pesan untuk {{ addslashes($item["name"]) }} berhasil dicopy!');
                });
            }
        </script>
    @endforeach
@endsection
