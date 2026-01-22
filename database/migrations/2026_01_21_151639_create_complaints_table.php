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
    Schema::create('complaints', function (Blueprint $table) {
        $table->id();
        $table->string('ticket_code')->unique(); // Kode Tiket (Misal: ADU-999)
        $table->string('name')->nullable(); // Bisa Anonim
        $table->string('phone')->nullable();
        $table->string('category'); // Infrastruktur, Pelayanan, dll
        $table->text('description');
        $table->string('image_path')->nullable(); // Bukti Foto
        $table->enum('status', ['pending', 'proses', 'selesai'])->default('pending');
        $table->text('admin_response')->nullable(); // Tanggapan Admin
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
