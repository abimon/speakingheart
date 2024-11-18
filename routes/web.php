<?php

use App\Http\Controllers\AcommentController;
use App\Http\Controllers\AlikeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\McommentController;
use App\Http\Controllers\MlikeController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\PcommentController;
use App\Http\Controllers\PlikeController;
use App\Http\Controllers\PoetryController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\isAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home');
    Route::get('/dashboard', 'dashboard')->middleware(isAdmin::class);
    Route::get('/articles/{slug}','article');
    Route::get('/books','books');
    Route::get('/poetry','poems');
    Route::get('/poetry/{slug}','poem');
});
Route::resources([
    'acomment'=>AcommentController::class,
    'pcomment'=>PcommentController::class,
    'mcomment'=>McommentController::class,
    'alike'=>AlikeController::class,
    'plike'=>PlikeController::class,
    'mlike'=>MlikeController::class,
]);
Route::middleware(['auth',isAdmin::class])->group(function () {
    Route::resources([
        'poems' => PoetryController::class,
        'posts' => ArticleController::class,
        'music' => MusicController::class,
        'book' => BookController::class,
        'user'=>UserController::class
    ]);
});
Auth::routes();
