<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::resource('movies', MovieController::class);
Route::resource('movies.reviews', ReviewController::class);
Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies/create', [MovieController::class, 'create'])->name('movies.create');
Route::post('/movies/create', [MovieController::class, 'store'])->name('movies.store');
Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movies.show');
Route::get('/movies/edit/{movie}', [MovieController::class, 'edit'])->name('movies.edit');
Route::post('/movies/edit/{movie}', [MovieController::class, 'update'])->name('movies.update');
Route::delete('/movies/{movie}',[MovieController::class, 'destroy'])->name('movies.delete');

