@extends('layout.master')


@section('title', 'Tambah Pengguna')

@section('content')
    <h2>Tambah Pengguna</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan!</strong><br>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="user_kode" class="form-label">Kode Pengguna</label>
            <input type="text" class="form-control" name="user_kode" required>
        </div>
        <div class="mb-3">
            <label for="user_name" class="form-label">Nama Pengguna</label>
            <input type="text" class="form-control" name="user_name" required>
        </div>
        <div class="mb-3">
            <label for="user_password" class="form-label">Password</label>
            <input type="password" class="form-control" name="user_password" required>
        </div>
        <div class="mb-3">
            <label for="user_role" class="form-label">Role</label>
            <select name="user_role" class="form-select" required>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
