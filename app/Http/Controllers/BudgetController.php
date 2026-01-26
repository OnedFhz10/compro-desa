<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BudgetController extends Controller
{
    // Tampilkan Daftar
    public function index()
    {
        $budgets = Budget::orderBy('year', 'desc')->paginate(20);
        return view('admin.budgets.index', compact('budgets'));
    }

    // Form Tambah
    public function create()
    {
        return view('admin.budgets.create');
    }

    // Simpan Data
    public function store(Request $request)
    {
        $request->validate([
            'year' => 'required|integer',
            'type' => 'required|in:income,expense',
            'amount' => 'required|numeric',
            'description' => 'required|string',
            'file' => 'nullable|file|max:5120',
        ]);

        $data = $request->all();
        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('budgets', 'public');
        }

        Budget::create($data);
        return redirect()->route('admin.budgets.index')->with('success', 'Data berhasil disimpan');
    }

    // Form Edit
    public function edit(Budget $budget)
    {
        return view('admin.budgets.edit', compact('budget'));
    }

    // Update Data
    public function update(Request $request, Budget $budget)
    {
        $request->validate([
            'year' => 'required|integer',
            'type' => 'required|in:income,expense',
            'amount' => 'required|numeric',
            'description' => 'required|string',
        ]);

        $data = $request->all();
        if ($request->hasFile('file')) {
            if ($budget->file_path) Storage::disk('public')->delete($budget->file_path);
            $data['file_path'] = $request->file('file')->store('budgets', 'public');
        }

        $budget->update($data);
        return redirect()->route('admin.budgets.index')->with('success', 'Data berhasil diperbarui');
    }

    // Hapus Data
    public function destroy(Budget $budget)
    {
        if ($budget->file_path) Storage::disk('public')->delete($budget->file_path);
        $budget->delete();
        return redirect()->route('admin.budgets.index')->with('success', 'Data dihapus');
    }
}