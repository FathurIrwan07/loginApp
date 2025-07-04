<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('masyarakat_id');
            $table->string('kategori');
            $table->text('deskripsi');
            $table->string('bukti')->nullable(); // nama file bukti
            $table->string('status')->default('Menunggu Konfirmasi');
            $table->date('tanggal');
            $table->string('kode_pengaduan')->unique();
            $table->timestamps();

            $table->foreign('masyarakat_id')->references('id')->on('users')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduans');
    }
};