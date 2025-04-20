<!-- resources/views/pages/users.blade.php -->
@extends('layout.master')

@section('title', 'daftar surat')

@section('content')
    <div class="container">
        <h2>Daftar Surat</h2>
        <a href="{{ route('surat.create') }}" class="btn btn-primary mb-3">Tambah Surat</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Tanggal Upload</th>
                    <th>Kode</th>
                    <th>QR Code</th>
                    <th>Link</th>
                    <th>PDF</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($surat as $s)
                    <tr>
                        <td>{{ $s->surat_judul }}</td>
                        <td>{{ $s->surat_tgl_upload }}</td>
                        <td>{{ $s->surat_kode }}</td>
                        <td><img src="{{ asset('storage/qrcodes/' . $s->surat_qr_code) }}" width="60"></td>
                        <td>
                            @if ($s->surat_link)
                                <a href="{{ $s->surat_link }}" target="_blank">Lihat</a>
                            @elseif ($s->surat_pdf)
                                <a href="{{ asset('PDF File/' . $s->surat_pdf) }}" target="_blank">Lihat</a>
                            @else
                                <span class="text-muted">Tidak tersedia</span>
                            @endif
                        </td>

                        <td><a href="{{ asset('PDF File/' . $s->surat_pdf) }}" target="_blank">PDF</a></td>
                        <td>
                            <a href="{{ route('surat.edit', $s->surat_id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('surat.destroy', $s->surat_id) }}" method="POST"
                                style="display:inline;">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Yakin hapus surat?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
@endsection
