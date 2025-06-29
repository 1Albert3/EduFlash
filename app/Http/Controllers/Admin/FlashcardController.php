<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Flashcard;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FlashcardController extends Controller
{
    public function index()
    {
        $flashcards = Flashcard::with('category')->latest()->paginate(20);
        return view('admin.flashcards.index', compact('flashcards'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.flashcards.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title_en' => 'required|max:255',
            'title_fr' => 'required|max:255',
            'summary_en' => 'required',
            'summary_fr' => 'required',
            'content_en' => 'required',
            'content_fr' => 'required',
            'keywords_en' => 'nullable',
            'keywords_fr' => 'nullable',
            'is_featured' => 'boolean',
            'is_published' => 'boolean'
        ]);
        
        $validated['slug'] = Str::slug($validated['title_en'] . '-' . time());
        
        Flashcard::create($validated);
        
        return redirect()->route('admin.flashcards.index')->with('success', 'Flashcard created successfully');
    }

    public function edit(Flashcard $flashcard)
    {
        $categories = Category::all();
        return view('admin.flashcards.edit', compact('flashcard', 'categories'));
    }

    public function update(Request $request, Flashcard $flashcard)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title_en' => 'required|max:255',
            'title_fr' => 'required|max:255',
            'summary_en' => 'required',
            'summary_fr' => 'required',
            'content_en' => 'required',
            'content_fr' => 'required',
            'keywords_en' => 'nullable',
            'keywords_fr' => 'nullable',
            'is_featured' => 'boolean',
            'is_published' => 'boolean'
        ]);
        
        $flashcard->update($validated);
        
        return redirect()->route('admin.flashcards.index')->with('success', 'Flashcard updated successfully');
    }

    public function destroy(Flashcard $flashcard)
    {
        $flashcard->delete();
        return redirect()->route('admin.flashcards.index')->with('success', 'Flashcard deleted successfully');
    }
}
