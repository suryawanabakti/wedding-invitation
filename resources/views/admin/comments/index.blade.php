@extends('admin.layouts.app')

@section('title', 'Ucapan & Doa')

@section('content')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-4">
        <h1 class="h3 mb-0">Ucapan &amp; Doa</h1>
        <span class="badge text-bg-secondary">{{ $comments->total() }} ucapan</span>
    </div>

    <div class="card rounded-4 shadow-sm border-0">
        <div class="table-responsive">
            <table class="table table-hover table-mobile align-middle mb-0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Presensi</th>
                        <th style="min-width: 20rem;">Ucapan</th>
                        <th>Waktu</th>
                        <th>Status</th>
                        <th class="text-end" style="width: 14rem;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($comments as $comment)
                        @php
                            $presenceBadge = ['text-bg-secondary', 'text-bg-success', 'text-bg-danger'][$comment->presence] ?? 'text-bg-secondary';
                        @endphp
                        <tr class="{{ $comment->is_hidden ? 'opacity-50' : '' }}">
                            <td data-label="Nama" class="fw-semibold">{{ $comment->name }}</td>
                            <td data-label="Presensi"><span class="badge {{ $presenceBadge }}">{{ $comment->presenceLabel() }}</span></td>
                            <td data-label="Ucapan"><span class="text-break">{{ $comment->body }}</span></td>
                            <td data-label="Waktu"><span class="small text-secondary">{{ $comment->created_at->locale('id')->diffForHumans() }}</span></td>
                            <td data-label="Status">
                                @if ($comment->is_hidden)
                                    <span class="badge text-bg-warning">Disembunyikan</span>
                                @else
                                    <span class="badge text-bg-success">Tampil</span>
                                @endif
                            </td>
                            <td data-label="Aksi">
                                <div class="d-flex gap-2 justify-content-end">
                                    <form action="{{ route('admin.comments.toggle', $comment) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-outline-warning btn-sm" title="{{ $comment->is_hidden ? 'Tampilkan' : 'Sembunyikan' }}">
                                            <i class="fa-solid fa-eye{{ $comment->is_hidden ? '-slash' : '' }}"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST" onsubmit="return confirm('Hapus komentar ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm" title="Hapus"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="empty-cell text-center text-secondary py-4">Belum ada ucapan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($comments->hasPages())
            <div class="card-footer bg-transparent d-flex justify-content-center overflow-x-auto">
                {{ $comments->links() }}
            </div>
        @endif
    </div>
@endsection
