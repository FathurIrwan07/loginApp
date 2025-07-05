<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Pengaduan;

class PengaduanController extends Controller
{
    /**
     * Tampilkan form buat pengaduan baru
     */
    public function create()
    {
        return view('pengaduan.create');
    }

    /**
     * Simpan data pengaduan ke database
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'kategori' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'bukti' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Proses upload gambar bukti jika ada
        $buktiPath = null;
        if ($request->hasFile('bukti')) {
            $buktiPath = $request->file('bukti')->store('bukti', 'public');
        }

        // Simpan ke database
        Pengaduan::create([
            'masyarakat_id' => Auth::id(),
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'bukti' => $buktiPath,
            'status' => 'Menunggu konfirmasi',
            'tanggal' => now(),
            'kode_pengaduan' => 'PGD-' . strtoupper(Str::random(6)),
        ]);

        return redirect()->route('pengaduan.history')->with('success', 'Pengaduan berhasil dikirim.');
    }

    /**
     * Tampilkan riwayat pengaduan milik user yang sedang login
     */
    public function history()
    {
        $pengaduans = Pengaduan::where('masyarakat_id', Auth::id())->latest()->get();
        return view('pengaduan.history', compact('pengaduans'));
    }

    /**
     * Tampilkan status pengaduan milik user yang sedang login
     */
    public function status()
    {
        $pengaduans = Pengaduan::where('masyarakat_id', Auth::id())->latest()->get();
        return view('pengaduan.status', compact('pengaduans'));
    }
}