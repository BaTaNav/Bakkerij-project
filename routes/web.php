<?php

use App\Http\Controllers\ProfileController;

// Publieke Controllers
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

// Admin Controllers
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\FaqCategoryController;
use App\Http\Controllers\Admin\FaqItemController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Publieke Pagina's
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/profiel/{user:username}', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/nieuws', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/nieuws/{article}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/producten', [ProductController::class, 'index'])->name('products.index');
Route::get('/producten/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/winkelwagen', [CartController::class, 'index'])->name('cart.index');
Route::post('/winkelwagen/toevoegen/{product}', [CartController::class, 'store'])->name('cart.store');
Route::delete('/winkelwagen/verwijder/{productId}', [CartController::class, 'destroy'])->name('cart.destroy');


/*
|--------------------------------------------------------------------------
| Ingelogde Gebruiker Pagina's (Auth)
|--------------------------------------------------------------------------
*/


Route::get('/dashboard', function (Request $request) {
    if ($request->user()->is_admin) {
        return view('admin.dashboard');
    }
    return redirect()->route('home');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    
    Route::get('/mijn-account', function () {
        return view('dashboard');
    })->middleware(['verified'])->name('mijn-account');
    
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
   
    Route::post('/afrekenen', [CartController::class, 'checkout'])->name('cart.checkout');
});


/*
|--------------------------------------------------------------------------
| Admin Sectie
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified', 'admin'])->name('admin.')->prefix('admin')->group(function () {
    
    Route::get('/', function () { return view('admin.dashboard'); })->name('dashboard');

    Route::resource('articles', AdminArticleController::class);
    Route::resource('faq-categories', FaqCategoryController::class);
    Route::resource('faq-items', FaqItemController::class);
    Route::resource('products', AdminProductController::class);
    
});


/*
|--------------------------------------------------------------------------
| Auth Routes (Login, Register, etc.)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';