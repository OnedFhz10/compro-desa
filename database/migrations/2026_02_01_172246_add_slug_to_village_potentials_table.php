<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('village_potentials', function (Blueprint $table) {
            // Cek jika kolom slug belum ada, baru dibuat
            if (!Schema::hasColumn('village_potentials', 'slug')) {
                $table->string('slug')->after('title')->nullable(); 
            }
        });
    }

    public function down()
    {
        Schema::table('village_potentials', function (Blueprint $table) {
            if (Schema::hasColumn('village_potentials', 'slug')) {
                $table->dropColumn('slug');
            }
        });
    }
};