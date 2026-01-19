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

Route::resource('articles', ArticleController::class);
