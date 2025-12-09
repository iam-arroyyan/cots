<!DOCTYPE html>
<html>
<head>
    <title>UAS Web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">Toko Kampus</a>
            <div class="navbar-nav ms-auto">
                @if(session('user'))
                    <span class="nav-link text-white">Hi, {{ session('user') }} ({{ session('role') }})</span>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf <button class="btn btn-sm btn-danger">Logout</button>
                    </form>
                @endif
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>