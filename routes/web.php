<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

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



Route::get('shop', function () {
    return view('frontend.shop');
})->name('shop');

Route::get('Pricing', function () {
    return view('frontend.pricing');
})->name('pricing');

Route::get('frontend.contact', function () {
    return view('frontend.contact');
})->name('frontend.contact');

Route::get('frontend.about', function () {
    return view('frontend.about');
})->name('frontend.about');

Route::get('frontend.main', function () {
    return view('frontend.main');
})->name('frontend.main');


Route::get('profile', function () {
    return view('dashbord.users-profile');
})->name('profile');


Route::get('404', function () {
    return view('dashbord.pages-error-404');
})->name('404');



    Route::group(['middleware' => 'Check_Login'], function () {
Route::get('/login', [UserController::class, 'loadLogin'])->name('login');
Route::get('register', [UserController::class, 'loadRegister'])->name('register');
Route::post('users', [UserController::class, 'registerd'])->name('users.store');
Route::get('/referral_register', [UserController::class, 'loadReferralRegister'])->name('referral_register');
Route::get('/email_varification/{token}', [UserController::class, 'emailVarification'])->name('email_varification');
Route::post('/login', [UserController::class, 'userLogin'])->name('login.store');
Route::get('/referral-track',[UserController::class, 'referralTrack'])->name('referralTrack');
Route::get('/deleteAccount', [UserController::class, 'deleteAccount'])->name('deleteAccount');




});


Route::group(['middleware' => 'Check_Logout'], function () {

    Route::get('profile', [ProfileController::class, 'viewProfile'])->name('profile');
    Route::post('/addProfile', [ProfileController::class, 'addProfile'])->name('add_profile');
    Route::get('/faq', [UserController::class, 'loadfaq'])->name('faq');
    Route::get('/blank', [UserController::class, 'loadblank'])->name('blank');
    Route::get('/contact', [UserController::class, 'loadcontact'])->name('contact');
Route::get('/', [UserController::class, 'loadDashbord'])->name('/');


Route::get('/logout', [UserController::class, 'userLogout'])->name('logout');

});

