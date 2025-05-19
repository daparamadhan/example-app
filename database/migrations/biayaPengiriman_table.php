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
        Schema::create('biaya_pengirimen', function (Blueprint $table) {
            $table->id('id_biaya');

            // Foreign key ke tabel pengirimen
            $table->string('no_resi');
            $table->foreign('no_resi')->references('no_resi')->on('pengirimen')->onDelete('cascade');

            // Detail biaya
            $table->decimal('ongkir', 10, 2)->default(0);
            $table->decimal('asuransi', 10, 2)->default(0);
            $table->decimal('packing', 10, 2)->default(0);
            $table->decimal('surcharge_berat', 10, 2)->default(0);
            $table->decimal('biaya_lain', 10, 2)->default(0);
            $table->decimal('diskon', 10, 2)->default(0);
            $table->decimal('total_biaya', 12, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biaya_pengirimen');
    }
};
