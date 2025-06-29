<?php

namespace App\Http\Controllers;

use App\Models\Flashcard;
use App\Models\QuizAttempt;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();
        
        $stats = [
            'favorites_count' => $user->favorites()->count(),
            'quiz_attempts' => QuizAttempt::where('user_id', $user->id)->count(),
            'avg_score' => QuizAttempt::where('user_id', $user->id)->avg('score') ?? 0,
            'total_time' => QuizAttempt::where('user_id', $user->id)->sum('time_spent'),
        ];
        
        $recentAttempts = QuizAttempt::where('user_id', $user->id)
                                   ->with('quiz.flashcard')
                                   ->latest()
                                   ->limit(5)
                                   ->get();
        
        $favoriteFlashcards = $user->favoriteFlashcards()
                                  ->with('category')
                                  ->limit(6)
                                  ->get();

        return view('dashboard.index', compact('stats', 'recentAttempts', 'favoriteFlashcards'));
    }
}