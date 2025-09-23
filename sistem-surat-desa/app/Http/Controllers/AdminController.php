<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanSurat;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalPengajuan = PengajuanSurat::count();
        $pengajuanPending = PengajuanSurat::where('status', 'diajukan')->count();
        $pengajuanDiverifikasi = PengajuanSurat::where('status', 'diverifikasi_admin')->count();
        
        return view('admin.dashboard', compact('totalPengajuan', 'pengajuanPending', 'pengajuanDiverifikasi'));
    }

    public function pengajuan()
    {
        $pengajuan = PengajuanSurat::where('status', 'diajukan')->with(['user', 'jenisSurat'])->latest()->get();
        return view('admin.pengajuan', compact('pengajuan'));
    }

    public function detailPengajuan($id)
    {
        $pengajuan = PengajuanSurat::with(['user', 'user.dataWarga', 'jenisSurat'])->findOrFail($id);
        return view('admin.detail-pengajuan', compact('pengajuan'));
    }

    public function verifikasiPengajuan(Request $request, $id)
    {
        $pengajuan = PengajuanSurat::findOrFail($id);
        
        $request->validate([
            'status' => 'required|in:diverifikasi_admin,perbaikan',
            'catatan' => 'nullable|string'
        ]);

        $pengajuan->status = $request->status;
        // In a real application, you might want to store the notes in a separate table
        $pengajuan->save();

        return redirect()->route('admin.pengajuan')->with('success', 'Pengajuan berhasil diverifikasi');
    }

    public function riwayat()
    {
        $pengajuan = PengajuanSurat::whereIn('status', ['diverifikasi_admin', 'disetujui', 'ditolak', 'perbaikan'])
            ->with(['user', 'jenisSurat'])
            ->latest()
            ->get();
            
        return view('admin.riwayat', compact('pengajuan'));
    }
}
