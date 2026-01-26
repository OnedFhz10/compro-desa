<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // 1. TAMPILKAN DAFTAR BERITA
    public function index()
    {
        // Ambil berita terbaru dengan pagination (10 per halaman)
        $posts = Post::with('category')->latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    // 2. FORM TAMBAH BERITA
    public function create()
    {
        // Ambil kategori untuk dropdown
        $categories = PostCategory::all();
        return view('admin.posts.create', compact('categories'));
    }

    // 3. SIMPAN BERITA BARU
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|max:255',
            'category_id' => 'required|exists:post_categories,id',
            'content'     => 'required',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // Max 2MB
        ]);

        $data = $request->all();
        
        // Buat Slug otomatis dari Judul
        $data['slug'] = Str::slug($request->title);
        
        // Set User ID (Admin yang login)
        $data['user_id'] = Auth::id();

        // Handle Upload Gambar
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('posts', 'public');
        }

        Post::create($data);

        return redirect()->route('admin.posts.index')->with('success', 'Berita berhasil diterbitkan!');
    }

    // 4. FORM EDIT BERITA
    public function edit(Post $post)
    {
        $categories = PostCategory::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    // 5. UPDATE BERITA
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'       => 'required|max:255',
            'category_id' => 'required|exists:post_categories,id',
            'content'     => 'required',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title); // Update slug jika judul berubah

        // Handle Ganti Gambar
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $data['image'] = $request->file('image')->store('posts', 'public');
        }

        $post->update($data);

        return redirect()->route('admin.posts.index')->with('success', 'Berita berhasil diperbarui!');
    }

    // 6. HAPUS BERITA
    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Berita telah dihapus.');
    }
}