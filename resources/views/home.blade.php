@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="hero-section text-white py-5 position-relative overflow-hidden">
    <div class="hero-pattern position-absolute w-100 h-100"></div>
    
    <div class="container position-relative">
        <div class="row align-items-center min-vh-50">
            <div class="col-lg-8">
                <div class="hero-content">
                    <h1 class="hero-title mb-3 animate-fade-in">
                        {{ __('welcome_title') }}
                        <br><small class="hero-subtitle text-warning">Learn Fast, Learn Smart</small>
                    </h1>
                    <p class="lead mb-4 fs-5 animate-fade-in-delay">{{ __('welcome_subtitle') }}</p>
                    
                    <!-- Enhanced Search Bar -->
                    <form action="{{ route('search') }}" method="GET" class="search-container mx-auto mx-lg-0 animate-fade-in-delay-2">
                        <div class="input-group input-group-lg shadow-lg">
                            <input type="text" name="q" class="form-control search-input" 
                                   placeholder="{{ __('search_placeholder') }}" value="{{ request('q') }}">
                            <button type="submit" class="btn btn-search">
                                <i class="fas fa-search me-2"></i>{{ __('search_button') }}
                            </button>
                        </div>
                    </form>
                    
                    <!-- Quick Stats -->
                    <div class="hero-stats mt-4 animate-fade-in-delay-3">
                        <div class="row text-center">
                            <div class="col-4">
                                <div class="stat-item">
                                    <h4 class="text-warning mb-0">{{ $recentFlashcards->count() }}+</h4>
                                    <small>Fiches disponibles</small>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stat-item">
                                    <h4 class="text-warning mb-0">5</h4>
                                    <small>Catégories</small>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stat-item">
                                    <h4 class="text-warning mb-0">3-5</h4>
                                    <small>Minutes par fiche</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <div class="hero-illustration animate-float">
                    <div class="illustration-bg">
                        <i class="fas fa-graduation-cap fa-8x text-warning opacity-75"></i>
                        <div class="floating-elements">
                            <i class="fas fa-book floating-icon-1"></i>
                            <i class="fas fa-lightbulb floating-icon-2"></i>
                            <i class="fas fa-star floating-icon-3"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Categories -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="fw-bold" style="color: var(--university-gray);">Explorez par Catégories</h2>
            <p class="text-muted">Choisissez votre domaine d'apprentissage</p>
        </div>
        <div class="row justify-content-center">
            @foreach($categories as $category)
                <div class="col-6 col-md-4 col-lg-2 mb-3">
                    <a href="{{ route('search', ['category' => $category->slug]) }}" 
                       class="category-card btn w-100 h-100 p-3 text-decoration-none">
                        <div class="category-icon mb-2">
                            @if($category->icon)
                                <i class="{{ $category->icon }} fa-2x"></i>
                            @else
                                <i class="fas fa-folder fa-2x"></i>
                            @endif
                        </div>
                        <h6 class="category-name mb-1">{{ $category->getName(app()->getLocale()) }}</h6>
                        <small class="category-count">({{ $category->flashcards_count }} fiches)</small>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Featured Flashcards -->
@if($featuredFlashcards->count())
<section class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0" style="color: var(--university-gray);">{{ __('featured_flashcards') }}</h2>
            <div class="d-none d-md-block">
                <span class="badge" style="background-color: var(--university-gold); color: #000;">
                    <i class="fas fa-star me-1"></i>{{ $featuredFlashcards->count() }} fiches
                </span>
            </div>
        </div>
        
        <!-- Desktop View -->
        <div class="row d-none d-md-flex">
            @foreach($featuredFlashcards as $flashcard)
                @include('components.flashcard-card', ['flashcard' => $flashcard])
            @endforeach
        </div>
        
        <!-- Mobile Swiper -->
        <div class="d-md-none">
            <div class="swiper-container featured-swiper">
                <div class="swiper-wrapper">
                    @foreach($featuredFlashcards as $flashcard)
                        <div class="swiper-slide">
                            <div class="col-12">
                                @include('components.flashcard-card', ['flashcard' => $flashcard])
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Recent Flashcards -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="mb-4">{{ __('recent_flashcards') }}</h2>
        <div class="row">
            @foreach($recentFlashcards as $flashcard)
                @include('components.flashcard-card', ['flashcard' => $flashcard])
            @endforeach
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold" style="color: var(--university-gray);">Ce que disent nos utilisateurs</h2>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="testimonial-card card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div class="testimonial-stars mb-3">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                        </div>
                        <p class="testimonial-text">"EduFlash m'aide à réviser tous les jours pendant mes pauses. Parfait pour l'apprentissage rapide !"</p>
                        <div class="testimonial-author">
                            <strong>Marie L.</strong>
                            <small class="text-muted d-block">Étudiante en langues</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="testimonial-card card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div class="testimonial-stars mb-3">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                        </div>
                        <p class="testimonial-text">"Interface claire et contenu de qualité. Idéal pour les professionnels occupés comme moi."</p>
                        <div class="testimonial-author">
                            <strong>Thomas R.</strong>
                            <small class="text-muted d-block">Chef de projet IT</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="testimonial-card card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div class="testimonial-stars mb-3">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                        </div>
                        <p class="testimonial-text">"Les fiches sont bien structurées et le système bilingue est un vrai plus pour mon travail."</p>
                        <div class="testimonial-author">
                            <strong>Sophie M.</strong>
                            <small class="text-muted d-block">Formatrice</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter -->
<section class="py-5 text-white newsletter-section">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="newsletter-content">
                    <i class="fas fa-envelope fa-3x text-warning mb-3"></i>
                    <h3 class="mb-3">{{ __('newsletter_title') }}</h3>
                    <p class="mb-4 fs-5">{{ __('newsletter_subtitle') }}</p>
                    
                    <form action="{{ route('newsletter.subscribe') }}" method="POST" class="newsletter-form">
                        @csrf
                        <div class="input-group input-group-lg shadow-lg">
                            <input type="email" name="email" class="form-control newsletter-input" 
                                   placeholder="{{ __('email_placeholder') }}" required>
                            <button type="submit" class="btn btn-newsletter">
                                <i class="fas fa-paper-plane me-2"></i>{{ __('subscribe') }}
                            </button>
                        </div>
                        <small class="text-light mt-2 d-block">Recevez une fiche utile chaque semaine par email</small>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection