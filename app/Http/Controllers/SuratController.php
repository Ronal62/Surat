<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;

class SuratController extends Controller
{
    // Tampilkan semua surat
    public function index()
    {
        $surat = Surat::all();
        return view('pages.surat', compact('surat'));
    }

    // Tampilkan form tambah surat
    public function create()
    {
        return view('pages.surat.create');
    }

    // Simpan data surat baru
    public function store(Request $request)
    {
        $request->validate([
            'surat_judul' => 'required',
            'surat_tgl_upload' => 'required|date',
            'surat_kode' => 'required|unique:surat,surat_kode',
            'surat_pdf' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        // Simpan PDF jika ada
        $pdfPath = null;
        if ($request->hasFile('surat_pdf')) {
            $namaFile = time() . '_' . $request->file('surat_pdf')->getClientOriginalName();
            $request->file('surat_pdf')->move(public_path('PDF File'), $namaFile);
            $pdfPath = $namaFile;
        }


        Surat::create([
            'surat_judul' => $request->surat_judul,
            'surat_tgl_upload' => $request->surat_tgl_upload,
            'surat_kode' => $request->surat_kode,
            'surat_pdf' => $pdfPath,
        ]);

        return redirect()->route('surat.index')->with('success', 'Surat berhasil ditambahkan');
    }

    // Tampilkan detail surat (opsional)
    public function show($id)
    {
        $surat = Surat::findOrFail($id);
        return view('pages.surat.show', compact('surat'));
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $surat = Surat::findOrFail($id);
        return view('pages.surat.edit', compact('surat'));
    }

    // Update surat
    public function update(Request $request, $id)
    {
        $surat = Surat::findOrFail($id);

        $request->validate([
            'surat_judul' => 'required',
            'surat_tgl_upload' => 'required|date',
            'surat_kode' => 'required|unique:surat,surat_kode,' . $id . ',surat_id',
            'surat_pdf' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        // Update PDF jika ada file baru
        if ($request->hasFile('surat_pdf')) {
            $namaFile = time() . '_' . $request->file('surat_pdf')->getClientOriginalName();
            $request->file('surat_pdf')->move(public_path('PDF File'), $namaFile);
            $surat->surat_pdf = $namaFile;
        }


        $surat->update([
            'surat_judul' => $request->surat_judul,
            'surat_tgl_upload' => $request->surat_tgl_upload,
            'surat_kode' => $request->surat_kode,
        ]);

        return redirect()->route('surat.index')->with('success', 'Surat berhasil diupdate');
    }

    // Hapus surat
    public function destroy($id)
    {
        $surat = Surat::findOrFail($id);
        $surat->delete();

        return redirect()->route('surat.index')->with('success', 'Surat berhasil dihapus');
    }
}