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
    Schema::create('letter_requests', function (Blueprint $table) {
        $table->id();
        $table->string('tracking_code')->unique(); // Kode Resi (Misal: SRT-12345)
        $table->string('nik', 16);
        $table->string('name');
        $table->string('phone');
        $table->string('letter_type'); // Jenis Surat (SKTM, Domisili, dll)
        $table->text('keperluan')->nullable();
        $table->string('attachment')->nullable(); // Foto KTP/KK
        $table->enum('status', ['pending', 'proses', 'selesai', 'ditolak'])->default('pending');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('letter_requests');
    }
};
