<div class="row">
    <div class="col-md-8">
        <!-- English Content -->
        <div class="card mb-4">
            <div class="card-header">
                <h5>English Content</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">{{ __('title_en') }}</label>
                    <input type="text" name="title_en" class="form-control @error('title_en') is-invalid @enderror" 
                           value="{{ old('title_en', $flashcard->title_en ?? '') }}" required>
                    @error('title_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label class="form-label">{{ __('summary_en') }}</label>
                    <textarea name="summary_en" class="form-control @error('summary_en') is-invalid @enderror" 
                              rows="3" required>{{ old('summary_en', $flashcard->summary_en ?? '') }}</textarea>
                    @error('summary_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label class="form-label">{{ __('content_en') }}</label>
                    <textarea name="content_en" class="form-control @error('content_en') is-invalid @enderror" 
                              rows="10" required>{{ old('content_en', $flashcard->content_en ?? '') }}</textarea>
                    @error('content_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Keywords (English)</label>
                    <input type="text" name="keywords_en" class="form-control" 
                           value="{{ old('keywords_en', $flashcard->keywords_en ?? '') }}" 
                           placeholder="Comma separated keywords">
                </div>
            </div>
        </div>
        
        <!-- French Content -->
        <div class="card mb-4">
            <div class="card-header">
                <h5>French Content</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">{{ __('title_fr') }}</label>
                    <input type="text" name="title_fr" class="form-control @error('title_fr') is-invalid @enderror" 
                           value="{{ old('title_fr', $flashcard->title_fr ?? '') }}" required>
                    @error('title_fr')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label class="form-label">{{ __('summary_fr') }}</label>
                    <textarea name="summary_fr" class="form-control @error('summary_fr') is-invalid @enderror" 
                              rows="3" required>{{ old('summary_fr', $flashcard->summary_fr ?? '') }}</textarea>
                    @error('summary_fr')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label class="form-label">{{ __('content_fr') }}</label>
                    <textarea name="content_fr" class="form-control @error('content_fr') is-invalid @enderror" 
                              rows="10" required>{{ old('content_fr', $flashcard->content_fr ?? '') }}</textarea>
                    @error('content_fr')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Keywords (French)</label>
                    <input type="text" name="keywords_fr" class="form-control" 
                           value="{{ old('keywords_fr', $flashcard->keywords_fr ?? '') }}" 
                           placeholder="Mots-clés séparés par des virgules">
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <!-- Settings -->
        <div class="card">
            <div class="card-header">
                <h5>Settings</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">{{ __('category') }}</label>
                    <select name="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" 
                                {{ old('category_id', $flashcard->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                {{ $category->getName('en') }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" name="is_featured" value="1" class="form-check-input" 
                               {{ old('is_featured', $flashcard->is_featured ?? false) ? 'checked' : '' }}>
                        <label class="form-check-label">{{ __('featured') }}</label>
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" name="is_published" value="1" class="form-check-input" 
                               {{ old('is_published', $flashcard->is_published ?? true) ? 'checked' : '' }}>
                        <label class="form-check-label">{{ __('published') }}</label>
                    </div>
                </div>
                
                <div class="d-grid gap-2">
                    <button type="submit" class="btn" style="background-color: var(--university-gold); border-color: var(--university-gold); color: #000;">{{ __('save') }}</button>
                    <a href="{{ route('admin.flashcards.index') }}" class="btn btn-secondary">{{ __('cancel') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>