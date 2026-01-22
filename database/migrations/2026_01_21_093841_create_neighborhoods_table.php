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
    Schema::create('neighborhoods', function (Blueprint $table) {
        $table->id();
        $table->string('dusun'); // Nama Dusun / Wilayah
        $table->string('rw');    // Nomor RW (Contoh: 01)
        $table->string('rt');    // Nomor RT (Contoh: 03)
        $table->string('head_name'); // Nama Ketua RT/RW
        $table->string('phone')->nullable(); // No HP (Opsional)
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('neighborhoods');
    }
};
