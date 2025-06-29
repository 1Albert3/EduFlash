<?php

namespace App\Http\Controllers;

use App\Models\Flashcard;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function download(Flashcard $flashcard)
    {
        if (!auth()->user()->isPremium()) {
            return redirect()->route('subscription.index')
                           ->with('error', 'Fonctionnalité réservée aux membres Premium');
        }

        $pdf = PDF::loadView('pdf.flashcard', compact('flashcard'));
        return $pdf->download($flashcard->slug . '.pdf');
    }

    public function downloadMultiple(Request $request)
    {
        if (!auth()->user()->isPremium()) {
            return redirect()->route('subscription.index')
                           ->with('error', 'Fonctionnalité réservée aux membres Premium');
        }

        $flashcardIds = $request->input('flashcards', []);
        $flashcards = Flashcard::whereIn('id', $flashcardIds)->with('category')->get();

        $pdf = PDF::loadView('pdf.multiple', compact('flashcards'));
        return $pdf->download('flashcards-' . date('Y-m-d') . '.pdf');
    }
}