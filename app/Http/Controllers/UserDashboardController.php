<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Pengaduan;

class UserDashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id(); // ID user login

        $total = Pengaduan::where('masyarakat_id', $userId)->count();
        $diproses = Pengaduan::where('masyarakat_id', $userId)->where('status', 'diproses')->count();
        $selesai = Pengaduan::where('masyarakat_id', $userId)->where('status', 'selesai')->count();
        $menunggu = Pengaduan::where('masyarakat_id', $userId)->where('status', 'menunggu')->count();

        return view('dashboard', compact('total', 'diproses', 'selesai', 'menunggu'));
    }
}