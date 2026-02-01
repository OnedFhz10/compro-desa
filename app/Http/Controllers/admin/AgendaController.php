<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AgendaController extends Controller
{
    public function index()
    {
        // Tampilkan agenda, urutkan dari yang terbaru (atau terdekat)
        $agendas = Agenda::orderBy('date', 'desc')->paginate(10);
        return view('admin.agendas.index', compact('agendas'));
    }

    public function create()
    {
        return view('admin.agendas.create');
    }

    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'title'       => 'required|max:255',
            'description' => 'required',
            'date'        => 'required|date',
            'time'        => 'required|string|max:100', // misal: "08:00 - Selesai"
            'location'    => 'required|string|max:255',
        ]);

        // 2. Siapkan Data
        $data = $request->all();
        
        // Buat Slug otomatis dari Judul
        $data['slug'] = Str::slug($request->title) . '-' . Str::random(5);
        
        // Cek status aktif (checkbox)
        // Jika dicentang bernilai 1, jika tidak ada (tidak dicentang) dianggap 0
        $data['is_active'] = $request->has('is_active');

        // 3. Simpan ke Database
        Agenda::create($data);

        // 4. Redirect kembali ke index
        return redirect()->route('admin.agendas.index')->with('success', 'Agenda berhasil ditambahkan.');
    }

    public function edit(Agenda $agenda)
    {
        return view('admin.agendas.edit', compact('agenda'));
    }

    public function update(Request $request, Agenda $agenda)
    {
        $request->validate([
            'title'       => 'required|max:255',
            'description' => 'required',
            'date'        => 'required|date',
            'time'        => 'required|string|max:100',
            'location'    => 'required|string|max:255',
        ]);

        $data = $request->all();
        
        // Update slug jika judul berubah (opsional, tapi disarankan tidak berubah agar SEO aman)
        // $data['slug'] = Str::slug($request->title); 

        $data['is_active'] = $request->has('is_active');

        $agenda->update($data);

        return redirect()->route('admin.agendas.index')->with('success', 'Agenda berhasil diperbarui.');
    }

    public function destroy(Agenda $agenda)
    {
        $agenda->delete();
        return redirect()->route('admin.agendas.index')->with('success', 'Agenda dihapus.');
    }
}