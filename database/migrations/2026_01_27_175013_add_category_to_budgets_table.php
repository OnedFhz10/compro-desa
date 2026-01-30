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
    // Cek dulu, jika kolom 'category' BELUM ada, baru tambahkan
    if (!Schema::hasColumn('budgets', 'category')) {
        Schema::table('budgets', function (Blueprint $table) {
            $table->string('category')->default('apbdes')->after('year');
        });
    }
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('budgets', function (Blueprint $table) {
            $table->dropColumn('category');
        });
    }
};