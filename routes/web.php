<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\verficationController;
use App\Http\Controllers\ProjectController;
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

Route::get('confirmation/{token}', [verficationController::class, 'ensureMail']);
Route::get('/', function () {
    return view('pages.home.index');
})->name('home');
Route::get('/home', function () {
    return view('pages.home.index');
});

Auth::routes();
Route::resource('login', LoginController::class);
Route::post('update/profile/{id}', [HomeController::class,'updateProfile'])->name('update.profile');
Route::resource('register', RegisterController::class);
Route::get('/logout', function () {
    Auth::logout();

    return redirect()->route('login.index');
});

// Route::get('verification_page', verficationController::class,'show_verification_page')->name('verification');


// project route
Route::resource('create_project', ProjectController::class);

//create card
Route::resource('wish_card', ProjectController::class);
Route::resource('wish_card_form', CardController::class);

Route::get('wish_card_list', [HomeController::class, 'wishCardList'])->name('wishcard.list');

Route::get('/wishes/{token}', [App\Http\Controllers\ProjectController::class, 'wishesFromAll']);
Route::post('/wishes', [App\Http\Controllers\ProjectController::class, 'storeWishes'])->name('store.wishes');


Route::get('/espace', function () {
    return view('pages.common_card.index');
});
