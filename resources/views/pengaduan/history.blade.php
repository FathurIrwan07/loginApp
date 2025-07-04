@extends('layouts.app')

@section('content')
    <style>
        .history-container {
            max-width: 900px;
            margin: 50px auto;
            padding: 40px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .history-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .history-header h2 {
            font-size: 1.8rem;
            color: #1e3a8a;
            margin-bottom: 10px;
        }

        .history-header p {
            color: #64748b;
            font-size: 0.95rem;
        }

        .stat-card {
            border: 1.5px solid #e5e7eb;
            border-left: 5px solid #3b82f6;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            background: #f9fafb;
        }

        .stat-card h3 {
            color: #1e40af;
            margin-bottom: 8px;
        }

        .stat-card p {
            margin-bottom: 5px;
            color: #374151;
            font-size: 0.95rem;
        }

        .stat-card p strong {
            color: #1e293b;
        }

        @media (max-width: 768px) {
            .history-container {
                padding: 25px;
            }
        }
    </style>

    <div class="history-container">
        <div class="history-header">
            <h2>📜 Riwayat Pengaduan Anda</h2>
            <p>Berikut adalah daftar pengaduan yang telah Anda kirimkan.</p>
        </div>

        @forelse($pengaduans as $pengaduan)
            <div class="stat-card">
                <h3>{{ $pengaduan->kategori }}</h3>
                <p><strong>Kode:</strong> {{ $pengaduan->kode_pengaduan }}</p>
                <p><strong>Deskripsi:</strong> {{ $pengaduan->deskripsi }}</p>
                <p><strong>Tanggal:</strong>
                    {{ \Carbon\Carbon::parse($pengaduan->tanggal)->format('d M Y') }}
                </p>
                <p><strong>Status:</strong> {{ $pengaduan->status }}</p>
            </div>
        @empty
            <p style="text-align: center; color: #9ca3af;">Tidak ada data pengaduan ditemukan.</p>
        @endforelse
    </div>
@endsection