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
    Schema::create('village_potentials', function (Blueprint $table) {
        $table->id();
        $table->string('title'); // Nama Potensi (Misal: Keripik Pisang)
        $table->string('category'); // UMKM, Pariwisata, Pertanian
        $table->text('description');
        $table->string('image_path')->nullable();
        $table->text('location_link')->nullable(); // Link Google Maps
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('village_potentials');
    }
};
