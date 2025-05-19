<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengirimen', function (Blueprint $table) {
            $table->string('no_resi')->primary();
            $table->date('tanggal_kirim');
            $table->time('jam_kirim');
            $table->integer('jumlah_barang');
            $table->decimal('berat_kiriman', 8, 2); // kg
            $table->integer('volume_cm3');
            $table->text('isi_kiriman');
            $table->date('eta'); // estimated time of arrival

            // Foreign keys
            $table->unsignedBigInteger('id_pengirim');
            $table->unsignedBigInteger('id_penerima');
            $table->unsignedBigInteger('id_kurir');
            $table->unsignedBigInteger('id_produk');

            // Relasi
            $table->foreign('id_pengirim')->references('id_pengguna')->on('penggunas')->onDelete('cascade');
            $table->foreign('id_penerima')->references('id_pengguna')->on('penggunas')->onDelete('cascade');
            $table->foreign('id_kurir')->references('id_kurir')->on('kurirs')->onDelete('cascade');
            $table->foreign('id_produk')->references('id_produk')->on('produks')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengirimen');
    }
};
