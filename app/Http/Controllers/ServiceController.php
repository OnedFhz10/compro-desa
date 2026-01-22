<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\LetterRequest;
use App\Models\Complaint;
use App\Models\Faq;

class ServiceController extends Controller
{
    // 1. LAYANAN SURAT
    public function indexSurat()
    {
        return view('public.layanan.surat');
    }

    public function storeSurat(Request $request)
    {
        $request->validate([
            'nik' => 'required|numeric|digits:16',
            'name' => 'required',
            'phone' => 'required',
            'letter_type' => 'required',
        ]);

        // Generate Kode Unik
        $code = 'SRT-' . strtoupper(Str::random(6));

        LetterRequest::create([
            'tracking_code' => $code,
            'nik' => $request->nik,
            'name' => $request->name,
            'phone' => $request->phone,
            'letter_type' => $request->letter_type,
            'keperluan' => $request->keperluan,
            'status' => 'pending'
        ]);

        return redirect()->route('public.layanan.status')
            ->with('success', 'Permohonan berhasil! Kode Resi Anda: ' . $code . '. Simpan kode ini untuk cek status.');
    }

    // 2. CEK STATUS
    public function indexStatus(Request $request)
    {
        $search = $request->query('kode');
        $resultSurat = null;
        $resultAduan = null;

        if ($search) {
            $resultSurat = LetterRequest::where('tracking_code', $search)->first();
            $resultAduan = Complaint::where('ticket_code', $search)->first();
        }

        return view('public.layanan.status', compact('resultSurat', 'resultAduan', 'search'));
    }

    // 3. PENGADUAN
    public function indexPengaduan()
    {
        return view('public.layanan.pengaduan');
    }

    public function storePengaduan(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'category' => 'required',
        ]);

        $code = 'ADU-' . strtoupper(Str::random(6));

        Complaint::create([
            'ticket_code' => $code,
            'name' => $request->name ?? 'Hamba Allah',
            'phone' => $request->phone,
            'category' => $request->category,
            'description' => $request->description,
            'status' => 'pending'
        ]);

        return redirect()->route('public.layanan.status')
            ->with('success', 'Laporan diterima! Kode Tiket: ' . $code . '. Gunakan untuk memantau tindak lanjut.');
    }

    // 4. FAQ
    public function indexFaq()
    {
        $faqs = Faq::where('is_active', true)->get();
        return view('public.layanan.faq', compact('faqs'));
    }
}