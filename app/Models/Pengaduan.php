<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

public function user()
{
return $this->belongsTo(User::class, 'masyarakat_id');
}
}