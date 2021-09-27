<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/categories/register', [App\Http\Controllers\CategoryController::class, 'index'])->name('');

Route::post('/categories/register', [App\Http\Controllers\CategoryController::class, 'store'])->name('categories.index');


Route::delete('/home/{id}', [App\Http\Controllers\FavoriteController::class, 'destroy'])->name('sites.destroy');

Route::get('/favorites/register', [App\Http\Controllers\FavoriteController::class, 'index'])->name('favorites.index');

Route::post('/favorites/register', [App\Http\Controllers\FavoriteController::class, 'store'])->name('favorites.store');
