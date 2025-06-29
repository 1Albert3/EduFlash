<?php

namespace App\Http\Controllers;

use App\Models\Flashcard;
use Illuminate\Http\Request;

class FlashcardController extends Controller
{
    public function show($slug)
    {
        $flashcard = Flashcard::published()->with('category')->where('slug', $slug)->firstOrFail();
        $flashcard->incrementViews();
        
        $relatedFlashcards = Flashcard::published()
            ->where('category_id', $flashcard->category_id)
            ->where('id', '!=', $flashcard->id)
            ->take(4)->get();
            
        return view('flashcard.show', compact('flashcard', 'relatedFlashcards'));
    }
}
