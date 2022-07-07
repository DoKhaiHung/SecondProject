<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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
// Route::get('/', function () {
//     return view('layout.master');
// })->name('welcome');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/signout', [AuthController::class, 'signOut'])->name('signOut');

Route::post('/login', [AuthController::class, 'loggingIn'])->name('loggingIn');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registering'])->name('registering');
Route::get('/auth/redirect/{provider}', function ($provider) {
    return Socialite::driver($provider)->redirect();
})->name('social.redirect');
Route::get('/auth/callback/{provider}',  [AuthController::class, 'callback'])->name('social.callback');
