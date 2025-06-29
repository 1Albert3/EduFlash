@extends('layouts.app')

@section('title', 'Search Flashcards - EduFlash')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-3">
            <!-- Search Filters -->
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ __('search') }}</h5>
                    
                    <form action="{{ route('search') }}" method="GET">
                        <div class="mb-3">
                            <label class="form-label"><i class="fas fa-search me-2" style="color: var(--university-gold);"></i>Recherche</label>
                            <input type="text" name="q" class="form-control" 
                                   placeholder="{{ __('search_placeholder') }}" 
                                   value="{{ $query }}">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label"><i class="fas fa-folder me-2" style="color: var(--university-gold);"></i>{{ __('categories') }}</label>
                            <select name="category" class="form-select">
                                <option value="">{{ __('all_categories') }}</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->slug }}" 
                                            {{ $categorySlug == $category->slug ? 'selected' : '' }}>
                                        {{ $category->getName(app()->getLocale()) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label"><i class="fas fa-sort me-2" style="color: var(--university-gold);"></i>Trier par</label>
                            <select name="sort" class="form-select">
                                <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Plus récent</option>
                                <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Plus populaire</option>
                                <option value="title" {{ request('sort') == 'title' ? 'selected' : '' }}>Titre A-Z</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label"><i class="fas fa-filter me-2" style="color: var(--university-gold);"></i>Filtres</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="featured" value="1" 
                                       {{ request('featured') ? 'checked' : '' }} id="featured">
                                <label class="form-check-label" for="featured">
                                    <i class="fas fa-star text-warning me-1"></i>Fiches en vedette
                                </label>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100 mb-2">
                            <i class="fas fa-search me-2"></i>{{ __('search_button') }}
                        </button>
                        
                        <a href="{{ route('search') }}" class="btn btn-outline-secondary w-100 btn-sm">
                            <i class="fas fa-times me-1"></i>Réinitialiser
                        </a>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-lg-9">
            <!-- Search Results -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>
                    @if($query)
                        Search Results for "{{ $query }}"
                    @elseif($categorySlug)
                        {{ $categories->where('slug', $categorySlug)->first()?->getName(app()->getLocale()) }} Flashcards
                    @else
                        All Flashcards
                    @endif
                </h2>
                <small class="text-muted">{{ $flashcards->total() }} results found</small>
            </div>
            
            @if($flashcards->count())
                <div class="row">
                    @foreach($flashcards as $flashcard)
                        @include('components.flashcard-card', ['flashcard' => $flashcard])
                    @endforeach
                </div>
                
                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $flashcards->appends(request()->query())->links() }}
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-search fa-3x text-muted mb-3"></i>
                    <h4>{{ __('no_flashcards') }}</h4>
                    <p class="text-muted">Try different keywords or browse categories</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection