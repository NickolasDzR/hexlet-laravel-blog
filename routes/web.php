<?php

use App\Http\Controllers\ArticleCommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::resources([
    'articles' => ArticleController::class,
    'article.comments' => ArticleCommentController::class,
]);
