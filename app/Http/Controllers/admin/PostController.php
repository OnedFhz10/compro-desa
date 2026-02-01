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
    // 1. METHOD INDEX (Daftar Berita)
    public function index(Request $request)
    {
        $query = Post::with('category')->latest();

        // Filter berdasarkan kategori di URL (?category=berita)
        if ($request->has('category') && $request->category != '') {
            $slug = $request->category;
            $query->whereHas('category', function($q) use ($slug) {
                $q->where('slug', $slug);
            });
        }

        $posts = $query->paginate(10);
        
        // PENTING: Variabel ini dikirim ke View index
        $activeCategory = $request->category ?? null;

        return view('admin.posts.index', compact('posts', 'activeCategory'));
    }

    // 2. METHOD CREATE (Form Tambah)
    public function create(Request $request)
    {
        // Ambil parameter category dari URL
        $slug = $request->query('category');
        
        // Cari kategori jika ada slug
        $selectedCategory = null;
        if ($slug) {
            $selectedCategory = PostCategory::where('slug', $slug)->first();
        }

        // Ambil semua kategori untuk fallback
        $categories = PostCategory::all();

        // PENTING: Kirim $selectedCategory ke View create
        return view('admin.posts.create', compact('categories', 'selectedCategory'));
    }

    // 3. METHOD STORE (Simpan Data)
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|max:255',
            'category_id' => 'required|exists:post_categories,id',
            'content'     => 'required',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->except(['image']);
        $data['slug'] = Str::slug($request->title) . '-' . Str::random(5);
        $data['user_id'] = Auth::id();
        $data['excerpt'] = Str::limit(strip_tags($request->content), 150);
        $data['is_published'] = $request->has('is_published');

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('posts', 'public');
        }

        Post::create($data);

        return redirect()->route('admin.posts.index', ['category' => $request->query('category')])
                         ->with('success', 'Data berhasil diterbitkan!');
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
        $data['excerpt'] = Str::limit(strip_tags($request->content), 150);
        $data['is_published'] = $request->has('is_published');

        if ($request->hasFile('image')) {
            if ($post->image_path && Storage::disk('public')->exists($post->image_path)) {
                Storage::disk('public')->delete($post->image_path);
            }
            $data['image_path'] = $request->file('image')->store('posts', 'public');
        }

        $post->update($data);

        return redirect()->route('admin.posts.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(Post $post)
    {
        if ($post->image_path && Storage::disk('public')->exists($post->image_path)) {
            Storage::disk('public')->delete($post->image_path);
        }
        
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Data dihapus.');
    }
}