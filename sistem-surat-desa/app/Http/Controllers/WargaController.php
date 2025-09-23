<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\DataWarga;
use App\Models\JenisSurat;
use App\Models\PengajuanSurat;

class WargaController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $dataWarga = $user->dataWarga;
        $pengajuanCount = $user->pengajuanSurat()->count();
        
        return view('warga.dashboard', compact('dataWarga', 'pengajuanCount'));
    }

    public function profile()
    {
        $user = Auth::user();
        $dataWarga = $user->dataWarga;
        
        return view('warga.profile', compact('dataWarga'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $dataWarga = $user->dataWarga;
        
        $request->validate([
            'name' => 'required|string|max:255',
            'nik' => 'required|string|max:16',
            'no_kk' => 'required|string|max:16',
            'alamat' => 'required|string',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);

        $user->update([
            'name' => $request->name,
        ]);

        $dataWarga->update([
            'nik' => $request->nik,
            'no_kk' => $request->no_kk,
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function surat()
    {
        $jenisSurat = JenisSurat::all();
        return view('warga.surat', compact('jenisSurat'));
    }

    public function ajukanSurat($id)
    {
        $jenisSurat = JenisSurat::findOrFail($id);
        $dataWarga = Auth::user()->dataWarga;
        
        return view('warga.ajukan-surat', compact('jenisSurat', 'dataWarga'));
    }

    public function storeAjukanSurat(Request $request, $id)
    {
        $jenisSurat = JenisSurat::findOrFail($id);
        
        // Validate based on the specific letter type
        $request->validate([
            'data_tambahan' => 'required|array',
        ]);

        $pengajuan = new PengajuanSurat();
        $pengajuan->user_id = Auth::id();
        $pengajuan->jenis_surat_id = $jenisSurat->id;
        $pengajuan->status = 'diajukan';
        $pengajuan->data_tambahan = $request->data_tambahan;
        $pengajuan->save();

        return redirect()->route('warga.riwayat')->with('success', 'Surat berhasil diajukan');
    }

    public function riwayat()
    {
        $pengajuan = Auth::user()->pengajuanSurat()->with('jenisSurat')->latest()->get();
        return view('warga.riwayat', compact('pengajuan'));
    }

    public function downloadSurat($id)
    {
        $pengajuan = PengajuanSurat::findOrFail($id);
        
        // Only allow download if the letter is approved
        if ($pengajuan->status !== 'disetujui') {
            return redirect()->back()->with('error', 'Surat belum disetujui');
        }

        // Check if the logged in user is the owner of the application
        if ($pengajuan->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke surat ini');
        }

        // Check if the file exists
        if (!$pengajuan->file_path_final || !Storage::disk('public')->exists($pengajuan->file_path_final)) {
            return redirect()->back()->with('error', 'File surat tidak ditemukan');
        }

        // Return the PDF file
        return Storage::disk('public')->download($pengajuan->file_path_final, 'surat-' . $pengajuan->id . '.pdf');
    }
}
