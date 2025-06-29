@extends('layouts.app')

@section('title', 'Edit Flashcard - EduFlash')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>{{ __('edit_flashcard') }}</h1>
        <a href="{{ route('admin.flashcards.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to List
        </a>
    </div>

    <form action="{{ route('admin.flashcards.update', $flashcard) }}" method="POST">
        @csrf
        @method('PUT')
        @include('admin.flashcards.form')
    </form>
</div>
@endsection