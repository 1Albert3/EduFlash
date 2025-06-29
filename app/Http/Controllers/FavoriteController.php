<?php

namespace App\Http\Controllers;

use App\Models\Flashcard;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function toggle(Request $request, Flashcard $flashcard)
    {
        $user = auth()->user();
        
        $favorite = Favorite::where('user_id', $user->id)
                           ->where('flashcard_id', $flashcard->id)
                           ->first();
        
        if ($favorite) {
            $favorite->delete();
            $favorited = false;
        } else {
            Favorite::create([
                'user_id' => $user->id,
                'flashcard_id' => $flashcard->id,
            ]);
            $favorited = true;
        }
        
        return response()->json([
            'favorited' => $favorited,
            'message' => $favorited ? 'Ajouté aux favoris' : 'Retiré des favoris'
        ]);
    }

    public function index()
    {
        try {
            $favorites = auth()->user()->favoriteFlashcards()
                                      ->with('category')
                                      ->paginate(12);
            
            return view('favorites.index', compact('favorites'));
        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', 'Erreur lors du chargement des favoris');
        }
    }
}