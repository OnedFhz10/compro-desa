<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // 1. TAMPILKAN DAFTAR BERITA
    public function index()
    {
        $posts = Post::with('category')->latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    // 2. FORM TAMBAH BERITA
    public function create()
    {
        $categories = PostCategory::all();
        return view('admin.posts.create', compact('categories'));
    }

    // 3. PROSES SIMPAN BERITA
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        Post::create([
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . time(), // Slug unik
            'excerpt' => Str::limit(strip_tags($request->content), 150),
            'content' => $request->content,
            'image_path' => $imagePath,
            'is_published' => true,
            'published_at' => now(),
        ]);

        return redirect()->route('admin.posts.index')->with('success', 'Berita berhasil diterbitkan!');
    }

    // 4. FORM EDIT BERITA
    public function edit(Post $post)
    {
        $categories = PostCategory::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    // 5. PROSES UPDATE BERITA
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($post->image_path) Storage::disk('public')->delete($post->image_path);
            $post->image_path = $request->file('image')->store('posts', 'public');
        }

        $post->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . time(),
            'excerpt' => Str::limit(strip_tags($request->content), 150),
            'content' => $request->content,
        ]);

        return redirect()->route('admin.posts.index')->with('success', 'Berita berhasil diperbarui!');
    }

    // 6. HAPUS BERITA
    public function destroy(Post $post)
    {
        if ($post->image_path) Storage::disk('public')->delete($post->image_path);
        $post->delete();
        return back()->with('success', 'Berita dihapus!');
    }
}