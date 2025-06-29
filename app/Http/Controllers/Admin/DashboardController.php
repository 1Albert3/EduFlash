<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Flashcard;
use App\Models\NewsletterSubscription;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_flashcards' => Flashcard::count(),
            'published_flashcards' => Flashcard::published()->count(),
            'total_views' => Flashcard::sum('views_count'),
            'total_subscribers' => NewsletterSubscription::where('is_active', true)->count(),
        ];
        
        $recentFlashcards = Flashcard::with('category')->latest()->take(5)->get();
        $popularFlashcards = Flashcard::published()->orderBy('views_count', 'desc')->take(5)->get();
        
        return view('admin.dashboard', compact('stats', 'recentFlashcards', 'popularFlashcards'));
    }
}
