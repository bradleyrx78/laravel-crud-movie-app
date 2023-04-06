<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//review this
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/movies', [HomeController::class, 'index']) -> name('movies.index');


Route::get('/movies/{movie}', [MovieController::class, 'show']) -> name('movies.show');
Route::post('/movies/{movie}', [ReviewController::class,'store']) -> name('movies.reviews.store');

//need auth

//Route::post('/movies/{movie}', [ReviewController::class,'update']) -> name('movies.reviews.update');

Route::post('/edit/{review}', [ReviewController::class, 'update']) -> name('movies.reviews.update');
Route::delete('/review/{review}', [ReviewController::class, 'destroy']) -> name('movies.reviews.destroy');



Route::prefix('admin')->middleware(['auth','admin'])->group(function(){

    Route::get('/home' , [AdminController::class, 'index']) -> name('admin.index');
    Route::get('/movies', [MovieController::class, 'index']) -> name('admin.indexmovie');
    Route::get('/movies/{movie}', [MovieController::class, 'showAdminMovie']) -> name('admin.showmovie');
    Route::get('/upload', [MovieController::class, 'create']) -> name('movies.create');
    Route::post('/upload', [MovieController::class, 'store']) -> name('movies.store');
    Route::get('/movies/edit/{movie}', [MovieController::class, 'edit']) -> name('movies.edit');
    Route::post('/movies/edit/{movie}', [MovieController::class, 'update']) ->name('movies.update');
    Route::delete('/movies/{movie}',[MovieController::class, 'destroy']) -> name('movies.delete');

});