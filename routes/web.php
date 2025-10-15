<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

Route::resource('recipes', RecipeController::class)
    ->except(['index', 'show']) 
    ->middleware('auth');

Route::get('/', [RecipeController::class, 'index'])->name('recipes.index');
Route::get('/recipes/{recipe}', [RecipeController::class, 'show'])->name('recipes.show');

Route::post('/recipes/{recipe}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::post('/recipes/{recipe}/ratings', [RatingController::class, 'store'])->name('ratings.store');

require __DIR__ . '/auth.php';
