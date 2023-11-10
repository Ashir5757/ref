<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('dashbord.index');
})->name('home');

Route::get('register', function () {
    return view('dashbord.pages-register');
})->name('register');



Route::get('contact', function () {
    return view('dashbord.pages-contact');
})->name('contact');

Route::get('profile', function () {
    return view('dashbord.users-profile');
})->name('profile');

Route::get('faq', function () {
    return view('dashbord.pages-faq');
})->name('faq');

Route::get('404', function () {
    return view('dashbord.pages-error-404');
})->name('404');

Route::get('blank', function () {
    return view('dashbord.pages-blank');
})->name('blank');



Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'store'])->name('login.store');

Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::get('users/create', [UserController::class, 'create'])->name('users.create');
Route::post('users', [UserController::class, 'store'])->name('users.store');
Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');

