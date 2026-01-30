<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = PostCategory::all();
        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|max:255',
            'category_id' => 'required|exists:post_categories,id',
            'content'     => 'required',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Ambil semua data KECUALI image (karena nama kolom beda)
        $data = $request->except(['image']);
        
        $data['slug'] = Str::slug($request->title);
        $data['user_id'] = Auth::id();
        $data['excerpt'] = Str::limit(strip_tags($request->content), 150); // Isi excerpt otomatis

        // Simpan file ke kolom 'image_path'
        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('posts', 'public');
        }

        Post::create($data);

        return redirect()->route('admin.posts.index')->with('success', 'Berita berhasil diterbitkan!');
    }

    public function edit(Post $post)
    {
        $categories = PostCategory::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'       => 'required|max:255',
            'category_id' => 'required|exists:post_categories,id',
            'content'     => 'required',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->except(['image']);
        $data['slug'] = Str::slug($request->title);
        $data['excerpt'] = Str::limit(strip_tags($request->content), 150);

        if ($request->hasFile('image')) {
            // Hapus gambar lama menggunakan image_path
            if ($post->image_path && Storage::disk('public')->exists($post->image_path)) {
                Storage::disk('public')->delete($post->image_path);
            }
            // Simpan yang baru ke image_path
            $data['image_path'] = $request->file('image')->store('posts', 'public');
        }

        $post->update($data);

        return redirect()->route('admin.posts.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy(Post $post)
    {
        if ($post->image_path && Storage::disk('public')->exists($post->image_path)) {
            Storage::disk('public')->delete($post->image_path);
        }
        
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Berita telah dihapus.');
    }
}