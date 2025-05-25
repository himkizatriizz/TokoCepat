<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - TokoCepat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4e73df;
            --secondary: #f8f9fc;
        }
        body {
            background: linear-gradient(135deg, #f8f9fa 0%, #e3f2fd 100%);
            height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .login-card {
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 400px;
        }
        .login-header {
            background: var(--primary);
            color: white;
            padding: 1.5rem;
            text-align: center;
        }
        .login-body {
            background: white;
            padding: 2rem;
        }
        .form-control {
            border-radius: 50px;
            padding: 12px 20px;
            margin-bottom: 1rem;
        }
        .btn-login {
            background: var(--primary);
            border: none;
            border-radius: 50px;
            padding: 12px;
            font-weight: 600;
            width: 100%;
        }
        .divider {
            display: flex;
            align-items: center;
            margin: 1.5rem 0;
        }
        .divider::before, .divider::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid #dee2e6;
        }
        .divider-text {
            padding: 0 10px;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center h-100">
        <div class="login-card">
            <div class="login-header">
                <h2><i class="fas fa-store me-2"></i> TokoCepat</h2>
                <p class="mb-0">Masuk ke akun Anda</p>
            </div>
            <div class="login-body">
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        {{ $errors->first() }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" class="form-control" id="email" name="email" 
                                   placeholder="contoh@email.com" required autofocus>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" id="password" 
                                   name="password" placeholder="Minimal 8 karakter" required>
                        </div>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Ingat saya</label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-login mb-3">
                        <i class="fas fa-sign-in-alt me-2"></i> Masuk
                    </button>
                    
                    <div class="divider">
                        <span class="divider-text">ATAU</span>
                    </div>
                    
                    <a href="#" class="btn btn-outline-primary w-100 mb-3">
                        <i class="fab fa-google me-2"></i> Lanjut dengan Google
                    </a>
                    
                    <div class="text-center">
                        <a href="#" class="text-decoration-none">Lupa password?</a>
                        <p class="mt-2">Belum punya akun? <a href="#" class="text-primary">Daftar sekarang</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Animasi untuk alert
        document.querySelectorAll('.alert').forEach(alert => {
            setTimeout(() => {
                alert.classList.add('fade');
                setTimeout(() => alert.remove(), 150);
            }, 5000);
        });
    </script>
</body>
</html>