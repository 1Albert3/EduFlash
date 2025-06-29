<div class="col-md-6 col-lg-4 mb-4">
    <div class="card h-100 flashcard-item shadow-sm">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <span class="badge category-badge">
                    <i class="{{ $flashcard->category->icon ?? 'fas fa-folder' }} me-1"></i>
                    {{ $flashcard->category->getName(app()->getLocale()) }}
                </span>
                <div class="d-flex gap-1">
                    @if($flashcard->is_featured)
                        <div class="featured-badge">
                            <i class="fas fa-star text-warning"></i>
                            <small class="text-warning ms-1">Vedette</small>
                        </div>
                    @endif
                    @if($flashcard->is_premium && (!auth()->check() || !auth()->user()->isPremium()))
                        <div class="premium-badge">
                            <i class="fas fa-crown text-warning"></i>
                            <small class="text-warning ms-1">Premium</small>
                        </div>
                    @endif
                </div>
            </div>
            
            <h5 class="card-title">{{ $flashcard->getTitle(app()->getLocale()) }}</h5>
            <p class="card-text text-muted">{{ Str::limit($flashcard->getSummary(app()->getLocale()), 100) }}</p>
            
            <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">
                    <i class="fas fa-eye me-1"></i>{{ $flashcard->views_count }} {{ __('views') }}
                </small>
                <div class="d-flex gap-2">
                    @auth
                        <button class="btn btn-sm btn-outline-warning favorite-btn" 
                                data-flashcard-id="{{ $flashcard->id }}"
                                data-favorited="{{ auth()->user()->hasFavorited($flashcard) ? 'true' : 'false' }}">
                            <i class="fas fa-heart {{ auth()->user()->hasFavorited($flashcard) ? 'text-warning' : '' }}"></i>
                        </button>
                    @endauth
                    <div class="btn-group-mobile d-flex flex-column flex-sm-row gap-1">
                        <a href="{{ route('flashcard.show', $flashcard->slug) }}" class="btn btn-primary btn-sm read-more-btn flex-fill">
                            <i class="fas fa-arrow-right me-1"></i>{{ __('read_more') }}
                        </a>
                        @if($flashcard->quiz)
                            <a href="{{ route('quiz.show', $flashcard) }}" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-question-circle"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>