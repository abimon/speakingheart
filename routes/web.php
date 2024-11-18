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
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/dashboard', function () {
    return view('dashboard.home');
});
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home');
    Route::get('/dashboard', 'dashboard');
    Route::get('/articles/{slug}','article');
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
Route::middleware('auth')->group(function () {
    Route::resources([
        'poems' => PoetryController::class,
        'posts' => ArticleController::class,
        'music' => MusicController::class,
        'book' => BookController::class,
        'user'=>UserController::class
    ]);
});
require __DIR__ . '/auth.php';
