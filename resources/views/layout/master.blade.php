<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Persuratan')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <!-- Navbar -->
    @if (!Request::is('login'))
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
            <a class="navbar-brand" href="/">Persuratan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" href="/home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('users') ? 'active' : '' }}" href="/users">Data Pengguna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('index') ? 'active' : '' }}" href="/surat">Surat</a>
                    </li>
                </ul>
            </div>
        </nav>
    @endif


    <!-- Main Content -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="text-center py-3 mt-5 border-top">
        <small>&copy; {{ date('Y') }} Aplikasi Persuratan</small>
    </footer>

    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
