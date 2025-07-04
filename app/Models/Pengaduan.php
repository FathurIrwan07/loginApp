<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Pengaduan extends Model
{
    use HasFactory;

    protected $fillable = [
        'masyarakat_id',
        'kategori',
        'deskripsi',
        'bukti',
        'status',
        'tanggal',
        'kode_pengaduan',
    ];

    // Set default value untuk kolom 'status'
    protected $attributes = [
        'status' => 'menunggu',
    ];

    /**
     * Relasi ke user (masyarakat)
     */
    public function masyarakat()
    {
        return $this->belongsTo(User::class, 'masyarakat_id');
    }

    /**
     * Scope untuk filter berdasarkan status (opsional)
     */
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }
}
