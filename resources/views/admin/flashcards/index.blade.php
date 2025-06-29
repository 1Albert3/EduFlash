@extends('layouts.app')

@section('title', 'Manage Flashcards - EduFlash')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>{{ __('manage_flashcards') }}</h1>
        <a href="{{ route('admin.flashcards.create') }}" class="btn" style="background-color: var(--university-gold); border-color: var(--university-gold); color: #000;">
            <i class="fas fa-plus me-2"></i>{{ __('create_flashcard') }}
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Views</th>
                            <th>Created</th>
                            <th>{{ __('actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($flashcards as $flashcard)
                            <tr>
                                <td>
                                    <div>
                                        <strong>{{ $flashcard->getTitle('en') }}</strong>
                                        @if($flashcard->is_featured)
                                            <i class="fas fa-star ms-1" style="color: var(--university-gold);"></i>
                                        @endif
                                    </div>
                                    <small class="text-muted">{{ Str::limit($flashcard->getSummary('en'), 60) }}</small>
                                </td>
                                <td>{{ $flashcard->category->getName('en') }}</td>
                                <td>
                                    @if($flashcard->is_published)
                                        <span class="badge" style="background-color: var(--university-gold); color: #000;">{{ __('published') }}</span>
                                    @else
                                        <span class="badge bg-secondary">Draft</span>
                                    @endif
                                </td>
                                <td>{{ $flashcard->views_count }}</td>
                                <td>{{ $flashcard->created_at->format('M d, Y') }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('flashcard.show', $flashcard->slug) }}" 
                                           class="btn btn-outline-info" target="_blank">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.flashcards.edit', $flashcard) }}" 
                                           class="btn btn-outline-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.flashcards.destroy', $flashcard) }}" 
                                              method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger" 
                                                    onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $flashcards->links() }}
            </div>
        </div>
    </div>
</div>
@endsection