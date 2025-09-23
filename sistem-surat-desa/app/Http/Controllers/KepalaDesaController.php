<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanSurat;
use App\Models\JenisSurat;
use App\Services\LetterService;

class KepalaDesaController extends Controller
{
    protected $letterService;
    
    public function __construct(LetterService $letterService)
    {
        $this->letterService = $letterService;
    }
    
    public function dashboard()
    {
        $totalPengajuan = PengajuanSurat::count();
        $pengajuanMenunggu = PengajuanSurat::where('status', 'diverifikasi_admin')->count();
        $pengajuanDisetujui = PengajuanSurat::where('status', 'disetujui')->count();
        
        return view('kepala-desa.dashboard', compact('totalPengajuan', 'pengajuanMenunggu', 'pengajuanDisetujui'));
    }

    public function pengajuan()
    {
        $pengajuan = PengajuanSurat::where('status', 'diverifikasi_admin')
            ->with(['user', 'jenisSurat'])
            ->latest()
            ->get();
            
        return view('kepala-desa.pengajuan', compact('pengajuan'));
    }

    public function detailPengajuan($id)
    {
        $pengajuan = PengajuanSurat::with(['user', 'user.dataWarga', 'jenisSurat'])->findOrFail($id);
        return view('kepala-desa.detail-pengajuan', compact('pengajuan'));
    }

    public function verifikasiPengajuan(Request $request, $id)
    {
        $pengajuan = PengajuanSurat::findOrFail($id);
        
        $request->validate([
            'status' => 'required|in:disetujui,ditolak',
            'alasan' => 'nullable|string'
        ]);

        $pengajuan->status = $request->status;
        // In a real application, you might want to store the reason in a separate table
        $pengajuan->save();

        // If approved, generate the letter
        if ($request->status == 'disetujui') {
            // Generate the letter with PDF and QR code
            $this->letterService->generateLetter($pengajuan);
        }

        return redirect()->route('kepala-desa.pengajuan')->with('success', 'Pengajuan berhasil diverifikasi');
    }

    public function riwayat()
    {
        $pengajuan = PengajuanSurat::whereIn('status', ['disetujui', 'ditolak'])
            ->with(['user', 'jenisSurat'])
            ->latest()
            ->get();
            
        return view('kepala-desa.riwayat', compact('pengajuan'));
    }
}
