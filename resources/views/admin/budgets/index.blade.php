@extends('layouts.admin')

@section('title', 'APBDes')

@section('content')
    <div class="bg-gray-800 rounded-lg p-6 text-white">
        <div class="flex justify-between mb-4">
            <h2 class="text-xl font-bold">Data APBDes</h2>
            <a href="{{ route('admin.budgets.create') }}" class="bg-blue-600 px-4 py-2 rounded">Tambah</a>
        </div>

        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-gray-700">
                    <th class="p-3">Tahun</th>
                    <th class="p-3">Jenis</th>
                    <th class="p-3">Uraian</th>
                    <th class="p-3">Jumlah</th>
                    <th class="p-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($budgets as $budget)
                    <tr class="border-b border-gray-700">
                        <td class="p-3">{{ $budget->year }}</td>
                        <td class="p-3">{{ $budget->type == 'income' ? 'Pendapatan' : 'Belanja' }}</td>
                        <td class="p-3">{{ $budget->description }}</td>
                        <td class="p-3">Rp {{ number_format($budget->amount, 0, ',', '.') }}</td>
                        <td class="p-3">
                            <form action="{{ route('admin.budgets.destroy', $budget->id) }}" method="POST"
                                onsubmit="return confirm('Hapus?')">
                                @csrf @method('DELETE')
                                <button class="text-red-400">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">{{ $budgets->links() }}</div>
    </div>
@endsection
