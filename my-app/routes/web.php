<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

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

Route::get('/', function () {
    return view('welcome');
});
 
Route::get('/login',[UsersController::class, 'index']);
Route::get('/register',[UsersController::class, 'register']);
Route::post('/register',[UsersController::class, 'saveUser'])->name('auth.register');
Route::post('/login',[UsersController::class, 'loginUser'])->name('auth.login');
Route::get('/logout',[UsersController::class, 'logout'])->name('auth.logout');
Route::get('/profile',[UsersController::class, 'profile'])->name('profile');
Route::post('/profile-image', [UsersController::class, 'profileImageUpdate'])->name('profile.image');

