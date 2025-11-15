<?php

use App\Http\Controllers\ProfileController;

// Publieke Controllers
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactController; // <-- HIER TOEGEVOEGD

// Admin Controllers
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\FaqCategoryController;
use App\Http\Controllers\Admin\FaqItemController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Publieke Pagina's
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/profiel/{user:username}', [ProfileController::class, 'show'])->name('profile.show');

Route::get('/nieuws', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/nieuws/{article}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

// --- PUBLIEKE CONTACT PAGINA ROUTES ---
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


/*
|--------------------------------------------------------------------------
| Ingelogde Gebruiker Pagina's (Auth)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/*
|--------------------------------------------------------------------------
| Admin Sectie
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified', 'admin'])->name('admin.')->prefix('admin')->group(function () {
    
    Route::resource('articles', AdminArticleController::class);
    Route::resource('faq-categories', FaqCategoryController::class);
    Route::resource('faq-items', FaqItemController::class);
    
});


/*
|--------------------------------------------------------------------------
| Auth Routes (Login, Register, etc.)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';