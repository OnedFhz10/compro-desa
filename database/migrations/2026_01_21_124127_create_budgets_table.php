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
    Schema::create('budgets', function (Blueprint $table) {
        $table->id();
        $table->string('year'); // Tahun Anggaran (misal: 2024)
        $table->enum('category', ['apbdes', 'realisasi', 'laporan']); // Kategori
        $table->string('title'); // Judul Dokumen
        $table->text('description')->nullable(); // Keterangan tambahan
        $table->decimal('amount', 15, 2)->nullable(); // Total Anggaran (Opsional)
        $table->string('image_path')->nullable(); // Untuk Infografis/Grafik
        $table->string('file_path')->nullable(); // Untuk Download PDF/Excel
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budgets');
    }
};
