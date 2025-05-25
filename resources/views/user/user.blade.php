<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Halaman User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
    <div class="container">
        <h2 class="mb-4">👤 Halaman User</h2>

        <div class="card p-3 shadow rounded-4">
            <p>Selamat datang, <strong>{{ Auth::user()->name }}</strong>!</p>
            <p>Email: {{ Auth::user()->email }}</p>

            <a href="/dashboard" class="btn btn-secondary mt-3">Kembali ke Dashboard</a>

            <form method="POST" action="{{ route('logout') }}" class="d-inline-block mt-3">
                @csrf
                <button class="btn btn-danger">Logout</button>
            </form>
        </div>
    </div>
</body>
</html>
