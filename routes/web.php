<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController; 
use App\Http\Controllers\Admin\ArticleController as AdminArticleController; 


use App\Http\Controllers\Admin\FaqCategoryController;
use App\Http\Controllers\Admin\FaqItemController;

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/profiel/{user:username}', [ProfileController::class, 'show'])->name('profile.show');

Route::get('/nieuws', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/nieuws/{article}', [ArticleController::class, 'show'])->name('articles.show');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware(['auth', 'verified', 'admin'])->name('admin.')->prefix('admin')->group(function () {
    
    
    Route::resource('articles', AdminArticleController::class);

    
    Route::resource('faq-categories', FaqCategoryController::class);
    Route::resource('faq-items', FaqItemController::class);
    
});



require __DIR__.'/auth.php';