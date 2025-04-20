<!-- resources/views/pages/users.blade.php -->
@extends('layout.master')

@section('title', 'Tambah Surat')

@section('content')
    <div class="container">
        <h2>Tambah Surat</h2>
        <form action="{{ route('surat.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Judul Surat</label>
                <input type="text" name="surat_judul" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Tanggal Upload</label>
                <input type="date" name="surat_tgl_upload" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Kode Surat</label>
                <input type="text" name="surat_kode" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Link Surat</label>
                <input type="url" name="surat_link" class="form-control">
            </div>
            <div class="mb-3">
                <label>File PDF</label>
                <input type="file" name="surat_pdf" class="form-control" required>
            </div>
            <button class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
