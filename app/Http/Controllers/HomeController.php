<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Flashcard;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredFlashcards = Flashcard::published()->featured()->with('category')->latest()->take(6)->get();
        $recentFlashcards = Flashcard::published()->with('category')->latest()->take(12)->get();
        $categories = Category::withCount('flashcards')->get();
        
        return view('home', compact('featuredFlashcards', 'recentFlashcards', 'categories'));
    }
}
