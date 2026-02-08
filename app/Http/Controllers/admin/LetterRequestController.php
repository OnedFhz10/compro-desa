<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LetterRequest;
use Illuminate\Http\Request;

class LetterRequestController extends Controller
{
    public function index()
    {
        $letters = LetterRequest::latest()->paginate(10);
        return view('admin.letters.index', compact('letters'));
    }

    public function show($id)
    {
        $letter = LetterRequest::findOrFail($id);
        return view('admin.letters.show', compact('letter'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,proses,selesai,ditolak',
            'admin_note' => 'nullable|string'
        ]);

        $letter = LetterRequest::findOrFail($id);
        
        $letter->update([
            'status' => $request->status,
            // 'admin_note' => $request->admin_note // Aktifkan jika sudah ada kolom di DB
        ]);

        return redirect()->route('admin.letters.index')
            ->with('success', 'Status surat berhasil diperbarui menjadi ' . ucfirst($request->status));
    }

    public function destroy($id)
    {
        $letter = LetterRequest::findOrFail($id);
        $letter->delete();

        return redirect()->route('admin.letters.index')->with('success', 'Data pengajuan surat dihapus.');
    }
}