@extends('layouts.app')

@section('title', 'Mes Favoris - EduFlash')

@section('content')
<!-- Header -->
<section class="py-5" style="background: linear-gradient(135deg, var(--university-gray) 0%, var(--university-light-gray) 100%);">
    <div class="container text-center text-white">
        <h1 class="display-5 fw-bold mb-3">
            <i class="fas fa-heart text-warning me-3"></i>Mes Favoris
        </h1>
        <p class="lead">Retrouvez toutes vos fiches préférées en un seul endroit</p>
    </div>
</section>

<!-- Favorites Content -->
<section class="py-5">
    <div class="container">
        @if($favorites->count() > 0)
            <div class="row mb-4">
                <div class="col-12 col-md-8 mb-2">
                    <h3 style="color: var(--university-gray);">{{ $favorites->total() }} fiche(s) en favoris</h3>
                </div>
                <div class="col-12 col-md-4 text-md-end">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-outline-secondary btn-sm active" id="grid-view">
                            <i class="fas fa-th"></i> Grille
                        </button>
                        <button type="button" class="btn btn-outline-secondary btn-sm" id="list-view">
                            <i class="fas fa-list"></i> Liste
                        </button>
                    </div>
                </div>
            </div>

            <!-- Grid View -->
            <div id="favorites-grid" class="row">
                @foreach($favorites as $flashcard)
                    @include('components.flashcard-card', ['flashcard' => $flashcard])
                @endforeach
            </div>

            <!-- List View (Hidden by default) -->
            <div id="favorites-list" class="d-none">
                @foreach($favorites as $flashcard)
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <div class="d-flex align-items-start mb-2">
                                        <span class="badge category-badge me-2">
                                            <i class="{{ $flashcard->category->icon ?? 'fas fa-folder' }} me-1"></i>
                                            {{ $flashcard->category->getName(app()->getLocale()) }}
                                        </span>
                                        @if($flashcard->is_featured)
                                            <span class="badge bg-warning text-dark">
                                                <i class="fas fa-star me-1"></i>Vedette
                                            </span>
                                        @endif
                                    </div>
                                    <h5 class="card-title mb-2">
                                        <a href="{{ route('flashcard.show', $flashcard->slug) }}" class="text-decoration-none" style="color: var(--university-gray);">
                                            {{ $flashcard->getTitle(app()->getLocale()) }}
                                        </a>
                                    </h5>
                                    <p class="card-text text-muted">{{ Str::limit($flashcard->getSummary(app()->getLocale()), 120) }}</p>
                                    <small class="text-muted">
                                        <i class="fas fa-eye me-1"></i>{{ $flashcard->views_count }} vues
                                        <span class="mx-2">•</span>
                                        <i class="fas fa-calendar me-1"></i>{{ $flashcard->created_at->diffForHumans() }}
                                    </small>
                                </div>
                                <div class="col-md-4 text-md-end">
                                    <div class="d-flex gap-2 justify-content-md-end">
                                        <button class="btn btn-sm btn-outline-warning favorite-btn" 
                                                data-flashcard-id="{{ $flashcard->id }}"
                                                data-favorited="true">
                                            <i class="fas fa-heart text-warning"></i>
                                        </button>
                                        <a href="{{ route('flashcard.show', $flashcard->slug) }}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-arrow-right me-1"></i>Lire
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $favorites->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-5">
                <i class="fas fa-heart fa-5x text-muted mb-4"></i>
                <h3 class="text-muted mb-3">Aucun favori pour le moment</h3>
                <p class="text-muted mb-4">Commencez à explorer nos fiches et ajoutez vos préférées à vos favoris !</p>
                <a href="{{ route('search') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-search me-2"></i>Explorer les fiches
                </a>
            </div>
        @endif
    </div>
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const gridViewBtn = document.getElementById('grid-view');
    const listViewBtn = document.getElementById('list-view');
    const gridContainer = document.getElementById('favorites-grid');
    const listContainer = document.getElementById('favorites-list');

    if (gridViewBtn && listViewBtn) {
        gridViewBtn.addEventListener('click', function() {
            gridContainer.classList.remove('d-none');
            listContainer.classList.add('d-none');
            gridViewBtn.classList.add('active');
            listViewBtn.classList.remove('active');
        });

        listViewBtn.addEventListener('click', function() {
            gridContainer.classList.add('d-none');
            listContainer.classList.remove('d-none');
            listViewBtn.classList.add('active');
            gridViewBtn.classList.remove('active');
        });
    }
});
</script>
@endpush
@endsection