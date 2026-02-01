<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('village_potentials', function (Blueprint $table) {
            // 1. Cek apakah kolom 'category' BELUM ada? Jika belum, baru buat.
            if (!Schema::hasColumn('village_potentials', 'category')) {
                $table->string('category')->after('title')->default('Umum');
            }

            // 2. Cek apakah kolom 'address' BELUM ada? Jika belum, baru buat.
            if (!Schema::hasColumn('village_potentials', 'address')) {
                $table->string('address')->after('description')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('village_potentials', function (Blueprint $table) {
            //
        });
    }
};
