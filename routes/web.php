<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\RoleAdmin;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', [MovieController::class, 'index']);
Route::get('/movie/{id}/edit', [MovieController::class, 'edit'])->name('movie.edit')->middleware('auth',RoleAdmin::class);
Route::delete('/movie/{id}', [MovieController::class, 'destroy'])->name('movie.destroy')->middleware('auth');
Route::put('/movie/{id}', [MovieController::class, 'update'])->name('movie.update')->middleware('auth',RoleAdmin::class);
Route::get('/movie/detail/{id}', [MovieController::class, 'detail'])->name('detail')->middleware('auth');

Route::get('/movies/{id}', [MovieController::class, 'show'])->name('movies.show');
Route::get('/movie/create', [MovieController::class, 'create'])->name('movies.create')-> middleware('auth');
Route::post('/movie', [MovieController::class, 'store'])->name('movies.store')-> middleware('auth');
Route::get('/', [MovieController::class, 'index'])->name('homepage');
Route::get('/login', [AuthController::class,'formLogin'])->name('login');

Route::post('/login', [AuthController::class,'login']);
Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');

Route::get('/movie', [MovieController::class,'data_movie'])->name('dataMovie')->middleware('auth');
