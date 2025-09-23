<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisSurat;

class SuratController extends Controller
{
    public function index()
    {
        $jenisSurat = JenisSurat::all();
        return view('surat.index', compact('jenisSurat'));
    }

    public function create()
    {
        return view('surat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_surat' => 'required|string|max:50|unique:jenis_surat',
            'nama_surat' => 'required|string|max:255',
            'template_path' => 'required|string|max:255',
        ]);

        JenisSurat::create($request->all());

        return redirect()->route('surat.index')->with('success', 'Jenis surat berhasil ditambahkan');
    }

    public function edit($id)
    {
        $jenisSurat = JenisSurat::findOrFail($id);
        return view('surat.edit', compact('jenisSurat'));
    }

    public function update(Request $request, $id)
    {
        $jenisSurat = JenisSurat::findOrFail($id);

        $request->validate([
            'kode_surat' => 'required|string|max:50|unique:jenis_surat,kode_surat,' . $id,
            'nama_surat' => 'required|string|max:255',
            'template_path' => 'required|string|max:255',
        ]);

        $jenisSurat->update($request->all());

        return redirect()->route('surat.index')->with('success', 'Jenis surat berhasil diperbarui');
    }

    public function destroy($id)
    {
        $jenisSurat = JenisSurat::findOrFail($id);
        $jenisSurat->delete();

        return redirect()->route('surat.index')->with('success', 'Jenis surat berhasil dihapus');
    }
}
