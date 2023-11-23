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


Route::get('/login', [UserController::class, 'loadLogin'])->name('login');



Route::get('/', function () {
    return view('dashbord.index');
});


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

// Route::get('email_varification', function () {
//     return view('dashbord.email_varification');
// })->name('email_varification');




// Route::group(['middleware' => ['is_login']], function () {
//     Route::get('users', [UserController::class, 'loadRegister'])->name('users.index');
//     Route::post('users', [UserController::class, 'registerd'])->name('users.store');
//     Route::get('/referral_register', [UserController::class, 'loadReferralRegister'])->name('referral_register');
//     Route::get('/email_varification/{token}', [UserController::class, 'emailVarification'])->name('email_varification');
//     // Route::post('/login', [UserController::class, 'userLogin'])->name('login.store');
//     Route::get('/yawalalogin', [UserController::class, 'loadLogin'])->name('login');

// });

// Route::group(['middleware' => ['is_logout']], function () {
//     Route::get('/', [UserController::class, 'loadDashbord']);
// });
