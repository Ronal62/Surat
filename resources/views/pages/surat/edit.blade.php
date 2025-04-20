<!-- resources/views/pages/users.blade.php -->
@extends('layout.master')

@section('title', 'Edit Surat')

@section('content')
    <div class="container">
        <h2>Edit Surat</h2>
        <form action="{{ route('surat.update', $surat->surat_id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="mb-3">
                <label>Judul Surat</label>
                <input type="text" name="surat_judul" class="form-control" value="{{ $surat->surat_judul }}" required>
            </div>
            <div class="mb-3">
                <label>Tanggal Upload</label>
                <input type="date" name="surat_tgl_upload" class="form-control" value="{{ $surat->surat_tgl_upload }}"
                    required>
            </div>
            <div class="mb-3">
                <label>Kode Surat</label>
                <input type="text" name="surat_kode" class="form-control" value="{{ $surat->surat_kode }}" required>
            </div>
            <div class="mb-3">
                <label>Link Surat</label>
                <input type="url" name="surat_link" class="form-control" value="{{ $surat->surat_link }}">
            </div>
            <div class="mb-3">
                <label>File PDF</label>
                <input type="file" name="surat_pdf" class="form-control">
                <small>Biarkan kosong jika tidak ingin mengganti</small>
            </div>
            <button class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
