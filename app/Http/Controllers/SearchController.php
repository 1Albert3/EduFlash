<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Flashcard;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->get('q');
        $categorySlug = $request->get('category');
        $sort = $request->get('sort', 'latest');
        $featured = $request->get('featured');
        $locale = app()->getLocale();
        
        $flashcards = Flashcard::published()->with('category');
        
        if ($query) {
            $flashcards->where(function($q) use ($query, $locale) {
                $q->where("title_$locale", 'LIKE', "%$query%")
                  ->orWhere("summary_$locale", 'LIKE', "%$query%")
                  ->orWhere("content_$locale", 'LIKE', "%$query%")
                  ->orWhere("keywords_$locale", 'LIKE', "%$query%");
            });
        }
        
        if ($categorySlug) {
            $flashcards->whereHas('category', fn($q) => $q->where('slug', $categorySlug));
        }
        
        if ($featured) {
            $flashcards->where('is_featured', true);
        }
        
        // Sorting
        switch ($sort) {
            case 'popular':
                $flashcards->orderBy('views_count', 'desc');
                break;
            case 'title':
                $flashcards->orderBy("title_$locale");
                break;
            default:
                $flashcards->latest();
        }
        
        $flashcards = $flashcards->paginate(12);
        $categories = Category::all();
        
        return view('search', compact('flashcards', 'categories', 'query', 'categorySlug', 'sort', 'featured'));
    }
}
