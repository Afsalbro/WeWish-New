<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {
    return view('pages.home.index');
});

Auth::routes();
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::get('/register_new', [RegisterController::class, 'show'])->name('register.show');
Route::post('/register_asdsad', [RegisterController::class, 'register'])->name('register.perform');
Route::post('/logout', [RegisterController::class, 'perform'])->name('logout');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/card', [CardController::class, 'index']);
// Route::get('/card/{url}', [CardController::class, 'show']);
Route::get('/wish-card', [CardController::class, 'wishCard']);
Route::get('/card/messages', [CardController::class, 'show']);

Route::post('/card', [CardController::class, 'create'])->name('card.create');
// Route::post('/wish-card', [HomeController::class, 'create'])->name('card.create');
Route::post('/wish-card-form', [CardController::class, 'store'])->name('card.store');


// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home2/{token}', [App\Http\Controllers\CardController::class, 'secondhome']);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
