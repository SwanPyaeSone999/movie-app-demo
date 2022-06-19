<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\TvShowsController;
use Illuminate\Support\Facades\Route;

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
Route::get('/',[MoviesController::class,'index'])->name('movie.index');
Route::get('/movies/{id}',[MoviesController::class,'show'])->name('movie.show');


Route::get('/actors',[ActorController::class,'index'])->name('actor.index');
Route::get('/actors/page/{page?}',[ActorController::class,'index'])->name('actor.index');
Route::get('/actors/{id}',[ActorController::class,'show'])->name('actor.show');


Route::get('/tvshows',[TvShowsController::class,'index'])->name('tvshow.index');
Route::get('/tvshows/{id}',[TvShowsController::class,'show'])->name('tvshow.show');


