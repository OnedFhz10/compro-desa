<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AgendaController extends Controller
{
    /**
     * Tampilkan daftar agenda (Read)
     */
    public function index()
    {
        // Ambil data terbaru, 10 per halaman
        $agendas = Agenda::latest()->paginate(10);
        return view('admin.agendas.index', compact('agendas'));
    }

    /**
     * Tampilkan form tambah (Create View)
     */
    public function create()
    {
        return view('admin.agendas.create');
    }

    /**
     * Simpan data agenda ke database (Store)
     */
    public function store(Request $request)
    {
        // Validasi Input
        $request->validate([
            'title'       => 'required|max:255',
            'description' => 'required',
            'event_date'  => 'required|date',
            'location'    => 'nullable|string|max:255',
        ]);

        $data = $request->all();
        // Buat slug otomatis dari judul (contoh: Kerja Bakti -> kerja-bakti)
        $data['slug'] = Str::slug($request->title);

        Agenda::create($data);

        return redirect()->route('admin.agendas.index')->with('success', 'Agenda berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit (Edit View)
     */
    public function edit(Agenda $agenda)
    {
        return view('admin.agendas.edit', compact('agenda'));
    }

    /**
     * Update data agenda (Update)
     */
    public function update(Request $request, Agenda $agenda)
    {
        $request->validate([
            'title'       => 'required|max:255',
            'description' => 'required',
            'event_date'  => 'required|date',
            'location'    => 'nullable|string|max:255',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        $agenda->update($data);

        return redirect()->route('admin.agendas.index')->with('success', 'Agenda berhasil diperbarui!');
    }

    /**
     * Hapus agenda (Delete)
     */
    public function destroy(Agenda $agenda)
    {
        $agenda->delete();
        return redirect()->route('admin.agendas.index')->with('success', 'Agenda telah dihapus.');
    }
}