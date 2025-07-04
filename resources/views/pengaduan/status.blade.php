@extends('layouts.app')

@section('content')
    <style>
        .status-container {
            max-width: 900px;
            margin: 50px auto;
            padding: 40px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .status-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .status-header h2 {
            font-size: 1.8rem;
            color: #1e3a8a;
            margin-bottom: 10px;
        }

        .status-header p {
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
            .status-container {
                padding: 25px;
            }
        }
    </style>

    <div class="status-container">
        <div class="status-header">
            <h2>📌 Status Pengaduan</h2>
            <p>Berikut status terkini dari pengaduan yang telah Anda kirimkan.</p>
        </div>

        @forelse($pengaduans as $pengaduan)
            <div class="stat-card">
                <h3>Status: <span style="color: #10b981;">{{ $pengaduan->status }}</span></h3>
                <p><strong>Kategori:</strong> {{ $pengaduan->kategori }}</p>
                <p><strong>Deskripsi:</strong> {{ $pengaduan->deskripsi }}</p>
                <p><strong>Kode:</strong> {{ $pengaduan->kode_pengaduan }}</p>
                <p><strong>Tanggal:</strong>
                    {{ \Carbon\Carbon::parse($pengaduan->tanggal)->format('d M Y') }}
                </p>
            </div>
        @empty
            <p style="text-align: center; color: #9ca3af;">Belum ada pengaduan yang dikirimkan.</p>
        @endforelse
    </div>
@endsection