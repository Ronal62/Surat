@extends('layout.master')


@section('title', 'Beranda')

@section('content')
    <div class="text-center">
        <h1 class="mb-4">Selamat Datang di Aplikasi Persuratan</h1>
        <p class="lead">Aplikasi ini digunakan untuk mengelola surat masuk dan surat keluar secara efisien.</p>
        <hr>
        <div class="row mt-5">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Data Pengguna</h5>
                        <p class="card-text">Kelola data pengguna sistem.</p>
                        <a href="/users" class="btn btn-primary">Lihat</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-4 mt-md-0">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Surat</h5>
                        <p class="card-text">Kelola surat keluar instansi.</p>
                        <a href="/surat" class="btn btn-primary">Lihat</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
