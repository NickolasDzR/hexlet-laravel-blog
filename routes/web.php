<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;


Route::get('/', function () {
    $person = [
        'name' => 'nick',
        'email' => 'currentemail@example.com'
    ];

    return view('welcome');
})->name('home');

Route::get('articles', [ArticleController::class, 'index'])
    ->name('articles.index');


Route::get('articles/create', [ArticleController::class, 'create'])
    ->name('articles.create');

Route::get('articles/{id}/edit', [ArticleController::class, 'edit'])
    ->name('articles.edit');

Route::patch('articles/{id}', [ArticleController::class, 'update'])
    ->name('articles.update');

Route::get('articles/{article}', [ArticleController::class, 'show'])
    ->name('article.show');

Route::post('articles', [ArticleController::class, 'store'])
    ->name('articles.store');

Route::delete('articles/{id}', [ArticleController::class, 'destroy'])
    ->name('articles.destroy');
