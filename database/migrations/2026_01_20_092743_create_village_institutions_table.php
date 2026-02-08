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
    Schema::create('village_institutions', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Contoh: BPD, Karang Taruna
        $table->string('slug')->unique();
        $table->string('abbreviation')->nullable(); // Singkatan (Opsional)
        $table->text('description')->nullable(); // Tugas & Fungsi
        $table->string('image_path')->nullable(); // Logo Lembaga
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('village_institutions');
    }
};
