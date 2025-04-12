@extends('layout.master')

@section('title', 'Login')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <h3 class="mb-4 text-center">Login Aplikasi Persuratan</h3>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if ($errors->has('login_error'))
                <div class="alert alert-danger">{{ $errors->first('login_error') }}</div>
            @endif

            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Username</label>
                    <input type="text" name="user_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="user_password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
@endsection
