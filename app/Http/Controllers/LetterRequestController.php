<?php

namespace App\Http\Controllers;

use App\Models\LetterRequest;
use Illuminate\Http\Request;

class LetterRequestController extends Controller
{
    // 1. DAFTAR SURAT MASUK
    public function index()
    {
        // Ambil data terbaru, urutkan dari yang paling baru
        $letters = LetterRequest::latest()->paginate(10);
        return view('admin.letters.index', compact('letters'));
    }

    // 2. DETAIL & PROSES SURAT
    public function show($id)
    {
        $letter = LetterRequest::findOrFail($id);
        return view('admin.letters.show', compact('letter'));
    }

    // 3. UPDATE STATUS (Pending -> Diproses -> Selesai)
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,diproses,selesai,ditolak',
            'admin_note' => 'nullable|string' // Catatan admin untuk warga (opsional)
        ]);

        $letter = LetterRequest::findOrFail($id);
        
        $letter->update([
            'status' => $request->status,
            // Jika ada kolom 'admin_note' di database, bisa diaktifkan:
            // 'admin_note' => $request->admin_note 
        ]);

        return redirect()->route('admin.letters.index')
            ->with('success', 'Status surat berhasil diperbarui menjadi ' . ucfirst($request->status));
    }

    // 4. HAPUS PENGAJUAN (Jika perlu)
    public function destroy($id)
    {
        $letter = LetterRequest::findOrFail($id);
        $letter->delete();

        return redirect()->route('admin.letters.index')->with('success', 'Data pengajuan surat dihapus.');
    }
}