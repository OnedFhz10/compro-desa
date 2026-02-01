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
        Schema::table('budgets', function (Blueprint $table) {
            // Kita tambahkan kolom category setelah kolom year
            // Gunakan nullable() dulu agar data lama tidak error, atau beri default 'apbdes'
            $table->string('category')->default('apbdes')->after('year'); 
        });
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