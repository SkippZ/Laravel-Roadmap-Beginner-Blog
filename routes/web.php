<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ArticleController::class, 'index'])->name('home');
Route::get('/article/{articleId}', [ArticleController::class, 'show'])->name('article');
Route::post('/article', [ArticleController::class, 'store'])->middleware('auth')->name('store_article');
Route::delete('/article/{articleId}', [ArticleController::class, 'destroy'])->middleware('auth')->name('destroy_article');
Route::get('/article/{articleId}/edit', [ArticleController::class, 'edit'])->name('edit_article');
Route::put('/article/{articleId}', [ArticleController::class, 'update'])->name('update_article');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
