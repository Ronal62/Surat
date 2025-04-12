<!-- resources/views/pages/users.blade.php -->
@extends('layout.master')

@section('title', 'Daftar Pengguna')

@section('content')
    <h2>Daftar Pengguna</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">+ Tambah Pengguna</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Role</th>
                <th>Waktu Dibuat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->user_id }}</td>
                    <td>{{ $user->user_kode }}</td>
                    <td>{{ $user->user_name }}</td>
                    <td>{{ $user->user_role }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->user_id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('users.destroy', $user->user_id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data pengguna.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
