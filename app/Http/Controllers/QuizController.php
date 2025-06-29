<?php

namespace App\Http\Controllers;

use App\Models\Flashcard;
use App\Models\Quiz;
use App\Models\QuizAttempt;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Flashcard $flashcard)
    {
        $quiz = $flashcard->quiz;
        if (!$quiz) {
            return redirect()->route('flashcard.show', $flashcard->slug)
                           ->with('error', 'Aucun quiz disponible pour cette fiche.');
        }

        return view('quiz.show', compact('flashcard', 'quiz'));
    }

    public function submit(Request $request, Flashcard $flashcard)
    {
        $quiz = $flashcard->quiz;
        $answers = $request->input('answers', []);
        $timeSpent = $request->input('time_spent', 0);
        
        $score = 0;
        $questions = $quiz->questions;
        
        foreach ($questions as $index => $question) {
            if (isset($answers[$index]) && $answers[$index] == $question['correct']) {
                $score++;
            }
        }

        QuizAttempt::create([
            'user_id' => auth()->id(),
            'quiz_id' => $quiz->id,
            'score' => $score,
            'total_questions' => count($questions),
            'time_spent' => $timeSpent,
        ]);

        return view('quiz.result', compact('flashcard', 'quiz', 'score', 'questions', 'answers'));
    }
}