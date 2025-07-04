<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengaduan;

class UserController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $userId = $user->id;

        // Hitung jumlah pengaduan
        $total = Pengaduan::where('masyarakat_id', $userId)->count();
        $diproses = Pengaduan::where('masyarakat_id', $userId)->where('status', 'diproses')->count();
        $selesai = Pengaduan::where('masyarakat_id', $userId)->where('status', 'selesai')->count();
        $menunggu = Pengaduan::where('masyarakat_id', $userId)->where('status', 'menunggu')->count();

        return view('user.dashboard', compact('user', 'total', 'diproses', 'selesai', 'menunggu'));
    }

    public function profile()
    {
        $user = auth()->user();
        return view('user.profile', compact('user'));
    }
}