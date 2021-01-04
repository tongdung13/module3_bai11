<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Locale;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(['middleware' => 'locale'], function () {
    Route::get('/posts', [PostController::class, 'index'])->name('posts.list');

    Route::get('change-language/{language}', [LanguageController::class, 'changeLanguage'])->name('user.change-language');

    Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

Route::group(["middleware" => "auth"], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/post/create', [PostController::class, 'create'])->name('posts.create');

    Route::post('/post/create', [PostController::class, 'store'])->name('posts.store');
});
});

