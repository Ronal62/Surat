@extends('layout.master')


@section('title', 'Edit Pengguna')

@section('content')
    <h2>Edit Pengguna</h2>

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

    <form action="{{ route('users.update', $user->user_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="user_kode" class="form-label">Kode Pengguna</label>
            <input type="text" class="form-control" name="user_kode" value="{{ $user->user_kode }}" required>
        </div>
        <div class="mb-3">
            <label for="user_name" class="form-label">Nama Pengguna</label>
            <input type="text" class="form-control" name="user_name" value="{{ $user->user_name }}" required>
        </div>
        <div class="mb-3">
            <label for="user_password" class="form-label">Password Baru <small>(Opsional)</small></label>
            <input type="password" class="form-control" name="user_password">
        </div>
        <div class="mb-3">
            <label for="user_role" class="form-label">Role</label>
            <select name="user_role" class="form-select" required>
                <option value="admin" {{ $user->user_role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ $user->user_role == 'user' ? 'selected' : '' }}>User</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
