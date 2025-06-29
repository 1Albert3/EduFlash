@extends('layouts.app')

@section('title', $flashcard->getTitle(app()->getLocale()) . ' - EduFlash')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Flashcard Content -->
            <article class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <span class="badge" style="background-color: var(--university-gold); color: #000;">
                            {{ $flashcard->category->getName(app()->getLocale()) }}
                        </span>
                        @if($flashcard->is_featured)
                            <i class="fas fa-star fs-5" style="color: var(--university-gold);"></i>
                        @endif
                    </div>
                    
                    <h1 class="mb-3">{{ $flashcard->getTitle(app()->getLocale()) }}</h1>
                    
                    <div class="mb-4">
                        <p class="lead text-muted">{{ $flashcard->getSummary(app()->getLocale()) }}</p>
                    </div>
                    
                    <div class="content">
                        {!! $flashcard->getContent(app()->getLocale()) !!}
                    </div>
                    
                    <hr class="my-4">
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">
                            <i class="fas fa-eye me-1"></i>{{ $flashcard->views_count }} {{ __('views') }}
                        </small>
                        <small class="text-muted">
                            {{ $flashcard->created_at->format('M d, Y') }}
                        </small>
                    </div>
                </div>
            </article>
            
            <!-- Related Flashcards -->
            @if($relatedFlashcards->count())
            <section class="mt-5">
                <h3 class="mb-4">Related Flashcards</h3>
                <div class="row">
                    @foreach($relatedFlashcards as $related)
                        @include('components.flashcard-card', ['flashcard' => $related])
                    @endforeach
                </div>
            </section>
            @endif
        </div>
        
        <div class="col-lg-4">
            <!-- Sidebar -->
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ __('category') }}</h5>
                    <p class="card-text">{{ $flashcard->category->getName(app()->getLocale()) }}</p>
                    
                    <a href="{{ route('search', ['category' => $flashcard->category->slug]) }}" 
                       class="btn btn-sm" style="color: var(--university-gold); border-color: var(--university-gold);">
                        View More in {{ $flashcard->category->getName(app()->getLocale()) }}
                    </a>
                </div>
            </div>
            
            <div class="mt-4">
                <a href="{{ route('home') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Home
                </a>
            </div>
        </div>
    </div>
</div>
@endsection