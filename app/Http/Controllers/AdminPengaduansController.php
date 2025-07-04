<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class AdminPengaduansController extends Controller
{

    public function index(Request $request)
    {
        $query = Pengaduan::with('masyarakat')->latest();

        // Cek jika ada filter status dari request
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $pengaduans = $query->get();

        return view('admin.pengaduans.index', compact('pengaduans'));
    }

    public function konfirmasi(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Menunggu konfirmasi,Selesai & diterima,Ditolak',
        ]);

        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->status = $request->status;
        $pengaduan->save();

        return redirect()->route('admin.pengaduans.index')->with('success', 'Status pengaduan berhasil diperbarui.');
    }

}
