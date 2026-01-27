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
    Schema::create('village_profiles', function (Blueprint $table) {
        $table->id();
        $table->string('village_name');
        $table->text('history')->nullable(); // Pakai text agar muat banyak
        $table->text('vision')->nullable();
        $table->text('mission')->nullable();
        $table->string('address')->nullable();
        $table->string('email')->nullable();
        $table->string('phone')->nullable();
        $table->string('logo_path')->nullable(); // Menyimpan path gambar
        $table->string('structure_image')->nullable(); // Menyimpan path gambar struktur
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('village_profiles');
    }
};
