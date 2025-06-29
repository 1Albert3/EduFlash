<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FlashcardController as AdminFlashcardController;
use App\Http\Controllers\FlashcardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/flashcard/{slug}', [FlashcardController::class, 'show'])->name('flashcard.show');
Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('/demo', function () { return view('demo'); })->name('demo');
Route::get('/about', function () { return view('about'); })->name('about');

// Favorites routes
Route::middleware('auth')->group(function () {
    Route::post('/favorites/{flashcard}/toggle', [App\Http\Controllers\FavoriteController::class, 'toggle'])->name('favorites.toggle');
    Route::get('/favorites', [App\Http\Controllers\FavoriteController::class, 'index'])->name('favorites.index');
});

// Quiz routes
Route::middleware('auth')->group(function () {
    Route::get('/flashcard/{flashcard}/quiz', [App\Http\Controllers\QuizController::class, 'show'])->name('quiz.show');
    Route::post('/flashcard/{flashcard}/quiz', [App\Http\Controllers\QuizController::class, 'submit'])->name('quiz.submit');
});

// PDF routes (Premium)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/flashcard/{flashcard}/pdf', [App\Http\Controllers\PDFController::class, 'download'])->name('pdf.download');
    Route::post('/pdf/multiple', [App\Http\Controllers\PDFController::class, 'downloadMultiple'])->name('pdf.multiple');
});

// Subscription routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/premium', [App\Http\Controllers\SubscriptionController::class, 'index'])->name('subscription.index');
    Route::post('/premium/checkout', [App\Http\Controllers\SubscriptionController::class, 'checkout'])->name('subscription.checkout');
    Route::get('/premium/payment/{payment}', [App\Http\Controllers\SubscriptionController::class, 'payment'])->name('subscription.payment');
    Route::post('/premium/success/{payment}', [App\Http\Controllers\SubscriptionController::class, 'success'])->name('subscription.success');
});

// Language switching
Route::get('/lang/{locale}', [LanguageController::class, 'switch'])->name('lang.switch');

// Newsletter
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
Route::get('/newsletter/unsubscribe/{email}', [NewsletterController::class, 'unsubscribe'])->name('newsletter.unsubscribe');

// Authentication routes
require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('flashcards', AdminFlashcardController::class);
});
