<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Budget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BudgetController extends Controller
{
    public function index()
    {
        // Urutkan: Tahun (Desc) -> Kategori -> Tipe
        $budgets = Budget::orderBy('year', 'desc')
                        ->orderBy('category', 'asc')
                        ->orderBy('type', 'asc') // Pendapatan dulu, baru belanja
                        ->paginate(20);
                        
        return view('admin.budgets.index', compact('budgets'));
    }

    public function create()
    {
        return view('admin.budgets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'year'        => 'required|integer|digits:4',
            'category'    => 'required|in:apbdes,realisasi,laporan',
            'type'        => 'required|in:income,expense',
            'amount'      => 'required|numeric|min:0',
            'description' => 'required|string|max:255',
            'file'        => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120', // Max 5MB
        ]);

        $data = $request->all();
        
        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('budgets', 'public');
        }

        Budget::create($data);

        return redirect()->route('admin.budgets.index')->with('success', 'Data anggaran berhasil disimpan!');
    }

    public function edit(Budget $budget)
    {
        return view('admin.budgets.edit', compact('budget'));
    }

    public function update(Request $request, Budget $budget)
    {
        $request->validate([
            'year'        => 'required|integer|digits:4',
            'category'    => 'required|in:apbdes,realisasi,laporan',
            'type'        => 'required|in:income,expense',
            'amount'      => 'required|numeric|min:0',
            'description' => 'required|string|max:255',
            'file'        => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        $data = $request->all();

        if ($request->hasFile('file')) {
            if ($budget->file_path && Storage::disk('public')->exists($budget->file_path)) {
                Storage::disk('public')->delete($budget->file_path);
            }
            $data['file_path'] = $request->file('file')->store('budgets', 'public');
        }

        $budget->update($data);

        return redirect()->route('admin.budgets.index')->with('success', 'Data anggaran berhasil diperbarui!');
    }

    public function destroy(Budget $budget)
    {
        if ($budget->file_path && Storage::disk('public')->exists($budget->file_path)) {
            Storage::disk('public')->delete($budget->file_path);
        }
        
        $budget->delete();
        return redirect()->route('admin.budgets.index')->with('success', 'Data dihapus.');
    }
}