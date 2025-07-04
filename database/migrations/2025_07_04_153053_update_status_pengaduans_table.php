<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Normalisasi data lama agar cocok dengan enum baru
        DB::table('pengaduans')
            ->where('status', 'Menunggu Konfirmasi')
            ->update(['status' => 'Menunggu konfirmasi']);

        DB::table('pengaduans')
            ->where('status', 'Selesai dan diterima')
            ->update(['status' => 'Selesai & diterima']);

        DB::table('pengaduans')
            ->whereNotIn('status', [
                'Menunggu konfirmasi',
                'Selesai & diterima',
                'Ditolak'
            ])
            ->update(['status' => 'Menunggu konfirmasi']);

        // 2. Ubah kolom ke tipe ENUM
        Schema::table('pengaduans', function (Blueprint $table) {
            $table->enum('status', [
                'Menunggu konfirmasi',
                'Selesai & diterima',
                'Ditolak',
            ])->default('Menunggu konfirmasi')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengaduans', function (Blueprint $table) {
            $table->string('status')->default('Menunggu konfirmasi')->change();
        });
    }
};
