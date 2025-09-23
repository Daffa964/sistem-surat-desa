<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanSurat;

class VerifikasiController extends Controller
{
    public function index()
    {
        return view('verifikasi.index');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'kode_qr' => 'required|string'
        ]);

        // In a real application, you would decode the QR code and find the letter
        // For now, we'll simulate this with a simple search
        $pengajuan = PengajuanSurat::where('id', $request->kode_qr)
            ->where('status', 'disetujui')
            ->with(['user', 'jenisSurat'])
            ->first();

        if (!$pengajuan) {
            return redirect()->back()->with('error', 'Surat tidak ditemukan atau belum disetujui');
        }

        return view('verifikasi.result', compact('pengajuan'));
    }

    public function show($id)
    {
        $pengajuan = PengajuanSurat::where('id', $id)
            ->where('status', 'disetujui')
            ->with(['user', 'jenisSurat'])
            ->first();

        if (!$pengajuan) {
            return redirect()->route('verifikasi.index')->with('error', 'Surat tidak ditemukan atau belum disetujui');
        }

        return view('verifikasi.show', compact('pengajuan'));
    }
}
