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
        $table->integer('year');
        $table->string('category')->default('apbdes'); // apbdes, realisasi, laporan
        $table->enum('type', ['income', 'expense']); // Pilihan: income / expense
        $table->decimal('amount', 15, 2); // Nominal uang (maks 15 digit)
        $table->string('description');
        $table->string('file_path')->nullable();
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
