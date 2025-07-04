@extends('layouts.app')

@section('content')
<div class="content-container">
    <div class="welcome-card">
        <div class="welcome-content">
            <h2>📝 Buat Pengaduan Baru</h2>
            <p>Silakan isi formulir berikut untuk menyampaikan keluhan atau saran Anda.</p>
        </div>
    </div>

    @if(session('success'))
    <div style="background: #d1fae5; padding: 12px; border-radius: 8px; color: #065f46; margin-bottom: 20px;">
        {{ session('success') }}
    </div>
    @endif

    <form method="POST" action="{{ route('pengaduan.store') }}" enctype="multipart/form-data"
        style="background: white; padding: 20px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08);">
        @csrf

        <div style="margin-bottom: 15px;">
            <label for="kategori">Kategori:</label><br>
            <select name="kategori" id="kategori" required style="width: 100%; padding: 10px; border-radius: 6px;">
                <option value="Fasilitas">Fasilitas</option>
                <option value="Pelayanan">Pelayanan</option>
                <option value="Keamanan">Keamanan</option>
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="deskripsi">Deskripsi:</label><br>
            <textarea name="deskripsi" id="deskripsi" rows="4" required
                style="width: 100%; padding: 10px; border-radius: 6px;"></textarea>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="bukti">Upload Bukti (opsional):</label><br>
            <input type="file" name="bukti" id="bukti" accept="image/*">
        </div>

        <button type="submit"
            style="background: #3b82f6; color: white; padding: 10px 20px; border-radius: 8px; border: none; cursor: pointer;">Kirim
            Pengaduan</button>
    </form>
</div>
@endsection