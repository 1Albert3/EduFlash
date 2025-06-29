<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'EduFlash') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/university-theme.css') }}" rel="stylesheet">
    <style>
        .auth-container {
            background: linear-gradient(135deg, var(--university-gray) 0%, var(--university-light-gray) 100%);
            min-height: 100vh;
        }
        .auth-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: none;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        .auth-logo {
            color: var(--university-gold);
            font-size: 3rem;
            margin-bottom: 1rem;
        }
        .form-control:focus {
            border-color: var(--university-gold);
            box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.25);
        }
    </style>
</head>
<body>
    <div class="auth-container d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="card auth-card">
                        <div class="card-body p-5">
                            <div class="text-center mb-4">
                                <a href="{{ route('home') }}" class="text-decoration-none">
                                    <i class="fas fa-graduation-cap auth-logo"></i>
                                    <h2 class="fw-bold" style="color: var(--university-gray);">EduFlash</h2>
                                </a>
                                <p class="text-muted">Plateforme de Micro-Apprentissage</p>
                            </div>
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
