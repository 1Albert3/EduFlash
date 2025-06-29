@extends('layouts.app')

@section('title', 'Admin Dashboard - EduFlash')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>{{ __('dashboard') }}</h1>
        <a href="{{ route('admin.flashcards.create') }}" class="btn" style="background-color: var(--university-gold); border-color: var(--university-gold); color: #000;">
            <i class="fas fa-plus me-2"></i>{{ __('create_flashcard') }}
        </a>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-white" style="background-color: var(--university-gray);">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4>{{ $stats['total_flashcards'] }}</h4>
                            <p class="mb-0">{{ __('total_flashcards') }}</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-cards-blank fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card text-white" style="background-color: var(--university-gold); color: #000 !important;">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4>{{ $stats['total_views'] }}</h4>
                            <p class="mb-0">{{ __('total_views') }}</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-eye fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card text-white" style="background-color: var(--university-light-gray);">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4>{{ $stats['total_subscribers'] ?? 0 }}</h4>
                            <p class="mb-0">Subscribers</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-envelope fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card text-white" style="background-color: var(--university-dark-gold); color: #000 !important;">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4>{{ $stats['published_flashcards'] }}</h4>
                            <p class="mb-0">{{ __('published') }}</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-check-circle fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent & Popular Flashcards -->
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">{{ __('recent_flashcards') }}</h5>
                </div>
                <div class="card-body">
                    @foreach($recentFlashcards as $flashcard)
                        <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                            <div>
                                <h6 class="mb-1">{{ $flashcard->getTitle('en') }}</h6>
                                <small class="text-muted">{{ $flashcard->category->getName('en') }}</small>
                            </div>
                            <div class="text-end">
                                <small class="text-muted">{{ $flashcard->created_at->diffForHumans() }}</small>
                                <br>
                                <a href="{{ route('admin.flashcards.edit', $flashcard) }}" class="btn btn-sm" style="color: var(--university-gold); border-color: var(--university-gold);">
                                    {{ __('edit') }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Most Viewed</h5>
                </div>
                <div class="card-body">
                    @foreach($popularFlashcards as $flashcard)
                        <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                            <div>
                                <h6 class="mb-1">{{ $flashcard->getTitle('en') }}</h6>
                                <small class="text-muted">{{ $flashcard->category->getName('en') }}</small>
                            </div>
                            <div class="text-end">
                                <span class="badge" style="background-color: var(--university-gold); color: #000;">{{ $flashcard->views_count }} {{ __('views') }}</span>
                                <br>
                                <a href="{{ route('flashcard.show', $flashcard->slug) }}" class="btn btn-sm btn-outline-success" target="_blank">
                                    View
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection