@extends('layouts.app')

@section('content')
<div class="content-container">
    <div class="welcome-card">
        <div class="welcome-content">
            <h2>📌 Status Pengaduan</h2>
            <p>Berikut status terkini dari pengaduan yang telah Anda kirimkan.</p>
        </div>
    </div>

    @forelse($pengaduans as $pengaduan)
    <div class="stat-card">
        <h3>Status: {{ $pengaduan->status }}</h3>
        <p><strong>Kategori:</strong> {{ $pengaduan->kategori }}</p>
        <p><strong>Deskripsi:</strong> {{ $pengaduan->deskripsi }}</p>
        <p><strong>Kode:</strong> {{ $pengaduan->kode_pengaduan }}</p>
        <p><strong>Tanggal:</strong> {{ $pengaduan->tanggal->format('d M Y H:i') }}</p>
    </div>
    @empty
    <p>Belum ada pengaduan yang dikirimkan.</p>
    @endforelse
</div>
@endsection