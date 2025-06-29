<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'EduFlash - Learn Fast, Learn Smart')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" rel="stylesheet">
    <link href="{{ asset('css/university-theme.css') }}" rel="stylesheet">
    <style>
        :root {
            --university-gold: #D4AF37;
            --university-dark-gold: #B8941F;
            --university-gray: #4A4A4A;
            --university-light-gray: #6C6C6C;
            --university-bg-gray: #F5F5F5;
        }
        
        .bg-primary { background-color: var(--university-gray) !important; }
        .btn-primary { 
            background-color: var(--university-gold); 
            border-color: var(--university-gold);
            color: #000;
        }
        .btn-primary:hover { 
            background-color: var(--university-dark-gold); 
            border-color: var(--university-dark-gold);
            color: #000;
        }
        .btn-outline-primary { 
            color: var(--university-gold); 
            border-color: var(--university-gold);
        }
        .btn-outline-primary:hover { 
            background-color: var(--university-gold); 
            border-color: var(--university-gold);
            color: #000;
        }
        .badge.bg-primary { 
            background-color: var(--university-gold) !important;
            color: #000;
        }
        .text-primary { color: var(--university-gold) !important; }
        .border-primary { border-color: var(--university-gold) !important; }
        
        .hero-section { 
            background: linear-gradient(135deg, var(--university-gray) 0%, var(--university-light-gray) 100%);
        }
        .bg-light { background-color: var(--university-bg-gray) !important; }
        
        .flashcard-item { 
            transition: all 0.3s ease;
            border: 1px solid #e0e0e0;
        }
        .flashcard-item:hover { 
            transform: translateY(-8px);
            box-shadow: 0 8px 25px rgba(212, 175, 55, 0.2);
            border-color: var(--university-gold);
        }
        
        .category-badge { 
            font-size: 0.8rem;
            background-color: var(--university-gold) !important;
            color: #000;
        }
        
        .search-bar { max-width: 500px; }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
        }
        
        .card {
            border: none;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .btn-light {
            background-color: var(--university-gold);
            border-color: var(--university-gold);
            color: #000;
        }
        .btn-light:hover {
            background-color: var(--university-dark-gold);
            border-color: var(--university-dark-gold);
            color: #000;
        }
        
        @media (max-width: 768px) {
            .hero-section { padding: 2rem 0; }
            .navbar-brand { font-size: 1.3rem; }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: var(--university-gray);">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">
                <i class="fas fa-graduation-cap me-2"></i>EduFlash
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">{{ __('home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('search') }}">{{ __('search') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('search') }}">{{ __('categories') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">À propos</a>
                    </li>
                </ul>
                
                <ul class="navbar-nav">
                    <!-- Language Switcher -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            @if(app()->getLocale() == 'en')
                                <span class="flag-icon">🇺🇸</span> English
                            @else
                                <span class="flag-icon">🇫🇷</span> Français
                            @endif
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('lang.switch', 'en') }}"><span class="flag-icon">🇺🇸</span> English</a></li>
                            <li><a class="dropdown-item" href="{{ route('lang.switch', 'fr') }}"><span class="flag-icon">🇫🇷</span> Français</a></li>
                        </ul>
                    </li>
                    
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                <i class="fas fa-user me-1"></i>{{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('dashboard') }}">
                                    <i class="fas fa-tachometer-alt me-2"></i>Tableau de bord
                                </a></li>
                                <li><a class="dropdown-item" href="{{ route('favorites.index') }}">
                                    <i class="fas fa-heart me-2 text-warning"></i>Mes favoris
                                </a></li>
                                <li><a class="dropdown-item" href="{{ route('subscription.index') }}">
                                    <i class="fas fa-crown me-2 text-warning"></i>Premium
                                    @if(!auth()->user()->isPremium())
                                        <span class="badge bg-warning text-dark ms-1">New</span>
                                    @endif
                                </a></li>
                                @if(Auth::user()->isEditor())
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">{{ __('admin_panel') }}</a></li>
                                @endif
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">{{ __('logout') }}</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('login') }}</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show m-3">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show m-3">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-light py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>EduFlash</h5>
                    <p class="mb-0">{{ __('welcome_subtitle') }}</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0">&copy; {{ date('Y') }} EduFlash. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    @stack('scripts')
    
    <script>
        // Initialize Swiper for mobile
        document.addEventListener('DOMContentLoaded', function() {
            if (document.querySelector('.featured-swiper')) {
                new Swiper('.featured-swiper', {
                    slidesPerView: 1,
                    spaceBetween: 20,
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    autoplay: {
                        delay: 5000,
                        disableOnInteraction: false,
                    },
                    loop: true,
                });
            }
            
            // Handle favorites
            document.querySelectorAll('.favorite-btn').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const flashcardId = this.dataset.flashcardId;
                    const icon = this.querySelector('i');
                    
                    fetch(`/favorites/${flashcardId}/toggle`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Content-Type': 'application/json',
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.favorited) {
                            icon.classList.add('text-warning');
                            this.dataset.favorited = 'true';
                        } else {
                            icon.classList.remove('text-warning');
                            this.dataset.favorited = 'false';
                        }
                        
                        // Show toast notification
                        if (typeof bootstrap !== 'undefined') {
                            const toast = new bootstrap.Toast(document.createElement('div'));
                            // Simple alert for now
                            // alert(data.message);
                        }
                    })
                    .catch(error => console.error('Error:', error));
                });
            });
        });
    </script>
</body>
</html>