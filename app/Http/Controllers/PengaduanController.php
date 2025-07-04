<?php

// app/Http/Controllers/PengaduanController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Pengaduan;

class PengaduanController extends Controller
{
    public function create()
    {
        return view('pengaduan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string',
            'deskripsi' => 'required|string',
            'bukti' => 'nullable|image|max:2048',
        ]);

        $buktiPath = null;
        if ($request->hasFile('bukti')) {
            $buktiPath = $request->file('bukti')->store('bukti', 'public');
        }

        Pengaduan::create([
            'masyarakat_id' => Auth::id(),
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'bukti' => $buktiPath,
            'status' => 'Menunggu Tindakan',
            'tanggal' => now(),
            'kode_pengaduan' => 'PGD-' . strtoupper(Str::random(6)),
        ]);

        return redirect()->route('pengaduan.history')->with('success', 'Pengaduan berhasil dikirim.');
    }

    public function history()
    {
        $pengaduans = Pengaduan::where('masyarakat_id', Auth::id())->latest()->get();
        return view('pengaduan.history', compact('pengaduans'));
    }

    public function status()
    {
        $pengaduans = Pengaduan::where('masyarakat_id', Auth::id())->latest()->get();
        return view('pengaduan.status', compact('pengaduans'));
    }
}