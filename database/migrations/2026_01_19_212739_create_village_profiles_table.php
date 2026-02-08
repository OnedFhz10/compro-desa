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
            $table->text('history')->nullable(); 
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();
            
            // SEO & Statistik
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->integer('population')->nullable();
            $table->decimal('area_size', 8, 2)->nullable();
            $table->integer('rt_count')->nullable();
            $table->integer('rw_count')->nullable();

            // Kontak & Lokasi
            $table->string('address')->nullable();
            $table->string('postal_code', 10)->nullable();
            $table->string('district')->nullable();
            $table->string('regency')->nullable();
            $table->string('province')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            
            // Assets
            $table->string('logo_path')->nullable();
            $table->string('structure_image_path')->nullable();
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
