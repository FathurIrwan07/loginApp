@extends('admin.app')

@section('content')
    <!-- BAGIAN DASHBOARD -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pengaduan</h1>
    </div>

    <!-- TABEL DATA PENGADUAN -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelapor</th>
                            <th>Kode Pengaduan</th>
                            <th>Kategori</th>
                            <th>Deskripsi</th>
                            <th>Bukti</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pengaduans as $key => $pengaduan)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $pengaduan->masyarakat->name ?? 'Tidak Ditemukan' }}</td>
                                <td>{{ $pengaduan->kode_pengaduan }}</td>
                                <td>{{ $pengaduan->kategori }}</td>
                                <td>{{ $pengaduan->deskripsi }}</td>
                                <td>
                                    @if($pengaduan->bukti)
                                        <a href="{{ asset('storage/' . $pengaduan->bukti) }}" target="_blank">Lihat Bukti</a>
                                    @else
                                        Tidak Ada
                                    @endif
                                </td>
                                <td>{{ $pengaduan->tanggal }}</td>
                                <td>
                                    <span class="badge badge-info">
                                        {{ ucfirst($pengaduan->status) }}
                                    </span>
                                </td>
                                <td>
                                    <form action="{{ route('admin.pengaduans.konfirmasi', $pengaduan->id) }}" method="POST"
                                        style="display:inline-block; width: 150px;">
                                        @csrf
                                        @method('PUT')
                                        <select name="status" class="form-control form-control-sm"
                                            onchange="this.form.submit()">
                                            <option disabled selected>Ubah Status</option>
                                            <option value="Menunggu konfirmasi" {{ $pengaduan->status === 'Menunggu konfirmasi' ? 'selected' : '' }}>Menunggu konfirmasi</option>
                                            <option value="Selesai & diterima" {{ $pengaduan->status === 'Selesai & diterima' ? 'selected' : '' }}>Selesai & diterima</option>
                                            <option value="Ditolak" {{ $pengaduan->status === 'Ditolak' ? 'selected' : '' }}>
                                                Ditolak</option>
                                        </select>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection