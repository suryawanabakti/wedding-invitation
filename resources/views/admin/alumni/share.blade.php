@extends('admin.layouts.app')

@section('title', 'Share WhatsApp - ' . $alumni->name)

@section('content')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-4">
        <h1 class="h3 mb-0">
            <i class="fa-brands fa-whatsapp text-success me-2"></i>Share WhatsApp
        </h1>
        <a href="{{ route('admin.alumni.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="fa-solid fa-arrow-left me-1"></i>Kembali
        </a>
    </div>

    <div class="row g-4">
        <div class="col-lg-6">
            <div class="card rounded-4 shadow-sm border-0">
                <div class="card-header bg-transparent border-0 pt-3">
                    <h5 class="mb-0">Kepada: <strong>{{ $alumni->name }}</strong></h5>
                    <span class="badge text-bg-info">{{ $alumni->group }}</span>
                </div>
                <div class="card-body">
                    <label class="form-label fw-semibold">Preview Pesan:</label>
                    <div class="bg-light rounded-3 p-3 border" style="white-space: pre-wrap; font-size: 0.9rem; max-height: 400px; overflow-y: auto;">{{ $message }}</div>
                </div>
                <div class="card-footer bg-transparent border-0 pb-3">
                    <div class="d-flex gap-2">
                        <a href="{{ $whatsappUrl }}" target="_blank" rel="noopener" class="btn btn-success rounded-pill px-4">
                            <i class="fa-brands fa-whatsapp me-2"></i>Kirim via WhatsApp
                        </a>
                        <button type="button" class="btn btn-outline-secondary rounded-pill px-4" onclick="copyMessage()">
                            <i class="fa-solid fa-copy me-2"></i>Copy Pesan
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card rounded-4 shadow-sm border-0">
                <div class="card-body">
                    <label class="form-label fw-semibold">Link Undangan:</label>
                    <div class="input-group">
                        <input type="text" class="form-control" value="{{ $invitationUrl }}" readonly id="invitation-link">
                        <button type="button" class="btn btn-outline-primary" onclick="copyLink()">
                            <i class="fa-solid fa-copy"></i>
                        </button>
                    </div>
                    <div class="form-text">Link akan membuka undangan dengan nama <strong>{{ $alumni->name }}</strong>.</div>
                </div>
            </div>

            <div class="card rounded-4 shadow-sm border-0 mt-3">
                <div class="card-body">
                    <h6 class="card-title"><i class="fa-solid fa-lightbulb me-2 text-warning"></i>Cara Mengirim</h6>
                    <ol class="mb-0 small">
                        <li class="mb-1">Klik tombol <strong>"Kirim via WhatsApp"</strong></li>
                        <li class="mb-1">Pilih kontak atau grup WhatsApp</li>
                        <li class="mb-1">Paste pesan yang sudah ter-copy</li>
                        <li class="mb-0">Kirim!</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <textarea id="message-text" class="d-none">{{ $message }}</textarea>

    <script>
        function copyMessage() {
            const textarea = document.getElementById('message-text');
            navigator.clipboard.writeText(textarea.value).then(function() {
                alert('Pesan berhasil dicopy!');
            });
        }

        function copyLink() {
            const input = document.getElementById('invitation-link');
            navigator.clipboard.writeText(input.value).then(function() {
                alert('Link berhasil dicopy!');
            });
        }
    </script>
@endsection
