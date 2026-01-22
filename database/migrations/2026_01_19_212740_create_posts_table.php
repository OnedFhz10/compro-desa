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
    Schema::create('posts', function (Blueprint $table) {
        $table->id();
        $table->foreignId('category_id')->constrained('post_categories'); // Relasi ke Kategori
        $table->foreignId('user_id')->constrained('users'); // Penulis
        $table->string('title');
        $table->string('slug')->unique();
        $table->string('image_path')->nullable();
        $table->text('excerpt')->nullable(); // Ringkasan pendek
        $table->longText('content'); // Isi berita lengkap
        $table->boolean('is_published')->default(true);
        $table->date('published_at')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
