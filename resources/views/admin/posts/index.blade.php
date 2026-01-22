@extends('layouts.admin')
@section('title', 'Kelola Berita')
@section('content')
    <div class="mb-4">
        <a href="{{ route('admin.posts.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Tulis
            Berita</a>
    </div>

    <div class="bg-white rounded shadow overflow-hidden">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th class="px-6 py-3">Judul</th>
                    <th class="px-6 py-3">Kategori</th>
                    <th class="px-6 py-3">Tanggal</th>
                    <th class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $post->title }}</td>
                        <td class="px-6 py-4">{{ $post->category->name }}</td>
                        <td class="px-6 py-4">{{ $post->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4 flex space-x-2">
                            <a href="{{ route('admin.posts.edit', $post->id) }}"
                                class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST"
                                onsubmit="return confirm('Hapus berita ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="p-4">{{ $posts->links() }}</div>
    </div>
@endsection
