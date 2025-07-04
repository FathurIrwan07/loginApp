@extends('layouts.app')

@section('content')
<div class="content-container">
    <div class="welcome-card">
        <div class="welcome-content">
            <h2>📜 Riwayat Pengaduan Anda</h2>
            <p>Berikut daftar pengaduan yang pernah Anda kirimkan.</p>
        </div>
    </div>

    @forelse($pengaduans as $pengaduan)
    <div class="stat-card">
        <h3>{{ $pengaduan->kategori }}</h3>
        <p><strong>Kode:</strong> {{ $pengaduan->kode_pengaduan }}</p>
        <p><strong>Deskripsi:</strong> {{ $pengaduan->deskripsi }}</p>
        <p><strong>Tanggal:</strong> {{ $pengaduan->tanggal->format('d M Y H:i') }}</p>
        <p><strong>Status:</strong> {{ $pengaduan->status }}</p>
    </div>
    @empty
    <p>Tidak ada data pengaduan ditemukan.</p>
    @endforelse
</div>
@endsection