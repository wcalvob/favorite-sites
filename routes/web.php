<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

/* Route::get('/', function () {
    return view('sites');
}); */

/* Route::get('/register', function () {
    return view('register');
}); */


/* Route::get('/', [App\Http\Controllers\PublicController::class, 'public'])->name(''); */
Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/favorites/register', [App\Http\Controllers\FavoriteController::class, 'index'])->name('favorites');

Route::post('/favorites/register', [App\Http\Controllers\FavoriteController::class, 'store'])->name('favorites.store');
