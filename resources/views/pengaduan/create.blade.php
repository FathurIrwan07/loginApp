@extends('layouts.app')

@section('content')
    @php
        $tanggalDefault = old('tanggal') ?? date('Y-m-d');
    @endphp

    <style>
        .pengaduan-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 40px;
        }

        .pengaduan-header {
            margin-bottom: 30px;
            text-align: center;
        }

        .pengaduan-header h2 {
            color: #1e3a8a;
            font-size: 1.8rem;
            margin-bottom: 10px;
        }

        .pengaduan-header p {
            color: #64748b;
            font-size: 0.95rem;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            color: #1e293b;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .form-group select,
        .form-group textarea,
        .form-group input {
            width: 100%;
            padding: 12px 16px;
            border: 1.5px solid #d1d5db;
            border-radius: 8px;
            font-size: 1rem;
            background: #f9fafb;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: #3b82f6;
            background: white;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .submit-btn {
            background: #3b82f6;
            color: white;
            font-size: 1rem;
            font-weight: 600;
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        .submit-btn:hover {
            background: #2563eb;
        }

        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
        }

        .alert-success {
            background-color: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #16a34a;
        }

        @media (max-width: 768px) {
            .pengaduan-container {
                padding: 25px;
                margin: 0 15px;
            }
        }
    </style>

    <div class="content">
        <div class="pengaduan-container">
            <div class="pengaduan-header">
                <h2>📝 Buat Pengaduan</h2>
                <p>Sampaikan keluhan, saran, atau masalah yang Anda alami kepada pihak berwenang.</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle" style="margin-right: 8px;"></i> {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('pengaduan.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select id="kategori" name="kategori" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Fasilitas" {{ old('kategori') == 'Fasilitas' ? 'selected' : '' }}>Fasilitas</option>
                        <option value="Pelayanan" {{ old('kategori') == 'Pelayanan' ? 'selected' : '' }}>Pelayanan</option>
                        <option value="Keamanan" {{ old('kategori') == 'Keamanan' ? 'selected' : '' }}>Keamanan</option>
                    </select>
                    @error('kategori')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tanggal">Tanggal Kejadian</label>
                    <input type="date" name="tanggal" id="tanggal" value="{{ $tanggalDefault }}" required>
                    @error('tanggal')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4" required>{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="bukti">Upload Bukti (opsional)</label>
                    <input type="file" name="bukti" id="bukti" accept="image/*">
                    @error('bukti')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="submit-btn">Kirim Pengaduan</button>
            </form>
        </div>
    </div>
@endsection