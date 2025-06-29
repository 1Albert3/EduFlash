@extends('layouts.app')

@section('title', 'Tableau de Bord - EduFlash')

@section('content')
<section class="py-4" style="background: linear-gradient(135deg, var(--university-gray) 0%, var(--university-light-gray) 100%);">
    <div class="container text-white">
        <h1 class="h3 mb-0"><i class="fas fa-tachometer-alt me-2"></i>Mon Tableau de Bord</h1>
    </div>
</section>

<section class="py-4">
    <div class="container">
        <!-- Stats Cards -->
        <div class="row mb-4">
            <div class="col-6 col-md-3 mb-3">
                <div class="card text-center border-0 shadow-sm">
                    <div class="card-body">
                        <i class="fas fa-heart fa-2x text-warning mb-2"></i>
                        <h4 class="fw-bold">{{ $stats['favorites_count'] }}</h4>
                        <small class="text-muted">Favoris</small>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 mb-3">
                <div class="card text-center border-0 shadow-sm">
                    <div class="card-body">
                        <i class="fas fa-question-circle fa-2x text-primary mb-2"></i>
                        <h4 class="fw-bold">{{ $stats['quiz_attempts'] }}</h4>
                        <small class="text-muted">Quiz réalisés</small>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 mb-3">
                <div class="card text-center border-0 shadow-sm">
                    <div class="card-body">
                        <i class="fas fa-trophy fa-2x text-success mb-2"></i>
                        <h4 class="fw-bold">{{ round($stats['avg_score'], 1) }}/10</h4>
                        <small class="text-muted">Score moyen</small>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 mb-3">
                <div class="card text-center border-0 shadow-sm">
                    <div class="card-body">
                        <i class="fas fa-clock fa-2x text-info mb-2"></i>
                        <h4 class="fw-bold">{{ round($stats['total_time']/60) }}min</h4>
                        <small class="text-muted">Temps total</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Recent Quiz Attempts -->
            <div class="col-lg-8 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-history me-2"></i>Quiz récents</h5>
                    </div>
                    <div class="card-body">
                        @if($recentAttempts->count() > 0)
                            @foreach($recentAttempts as $attempt)
                                <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                                    <div>
                                        <h6 class="mb-1">{{ $attempt->quiz->flashcard->getTitle(app()->getLocale()) }}</h6>
                                        <small class="text-muted">{{ $attempt->created_at->diffForHumans() }}</small>
                                    </div>
                                    <div class="text-end">
                                        <span class="badge {{ $attempt->percentage >= 70 ? 'bg-success' : ($attempt->percentage >= 50 ? 'bg-warning' : 'bg-danger') }}">
                                            {{ $attempt->score }}/{{ $attempt->total_questions }} ({{ $attempt->percentage }}%)
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="text-muted text-center py-4">Aucun quiz réalisé pour le moment</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Favorite Flashcards -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-heart me-2 text-warning"></i>Mes favoris</h5>
                    </div>
                    <div class="card-body">
                        @if($favoriteFlashcards->count() > 0)
                            @foreach($favoriteFlashcards as $flashcard)
                                <div class="mb-3">
                                    <a href="{{ route('flashcard.show', $flashcard->slug) }}" class="text-decoration-none">
                                        <h6 class="mb-1">{{ Str::limit($flashcard->getTitle(app()->getLocale()), 40) }}</h6>
                                    </a>
                                    <small class="text-muted">{{ $flashcard->category->getName(app()->getLocale()) }}</small>
                                </div>
                            @endforeach
                            <a href="{{ route('favorites.index') }}" class="btn btn-outline-primary btn-sm w-100">
                                Voir tous mes favoris
                            </a>
                        @else
                            <p class="text-muted text-center py-4">Aucun favori</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection