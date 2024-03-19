<?php

use App\Http\Controllers\Payment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PagesContentController;
use App\Http\Controllers\BackendDashboardController;

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








Route::get('backend.charts', function () {
    return view('backend.charts');
})->name('backend.charts');

Route::get('backend.layout-sidenav-light', function () {
    return view('backend.layout-sidenav-light');
})->name('backend.layout-sidenav-light');

Route::get('backend.tables', function () {
    return view('backend.tables');
})->name('backend.tables');


Route::get('bazaar', function () {
    return view('frontend.bazaar');
})->name('bazaar');

Route::get('Pricing', function () {
    return view('frontend.pricing');
})->name('pricing');

// Route::get('frontend.contact', function () {
    //     return view('frontend.contact');
    // })->name('frontend.contact');


    Route::get('profile', function () {
        return view('dashbord.users-profile');
    })->name('profile');


    Route::get('404', function () {
        return view('dashbord.pages-error-404');
    })->name('404');

    // receive mail
    Route::post('receive.Mail',[PagesContentController::class,'receiveMail'])->name('receive.Mail');
    Route::post('user.receive.Mail',[UserController::class,'userReceiveMail'])->name('user.receive.Mail');
    // contact

    // Route::middleware(['auth:admin'])->group(function () {


        Route::get('frontend.contact',[PagesContentController::class,'frontendContact'])->name('frontend.contact');
         Route::get('about',[PagesContentController::class,'frontendabout'])->name('frontend.about');
         Route::get('privacy',[PagesContentController::class,'privacy'])->name('frontend.privacy');

         Route::get('blog',[PagesContentController::class,'blog'])->name('frontend.blog');

        Route::get('frontend.main',[PagesContentController::class,'frontendmain'] )->name('frontend.main');
        Route::get('payment/{id}',[Payment::class,'payment'] )->name('payment');

        // });

        Route::get('viewwithdrawal',[Payment::class,'viewwithdrawal'] )->name('viewwithdrawal');

        Route::get('withdrawal',[Payment::class,'withdrawal'] )->name('withdrawal');
        Route::get('withdrawalrequest',[Payment::class,'withdrawalrequest'] )->name('withdrawalrequest');
        Route::post('withdrawal.store/{id}',[Payment::class,'withdrawalstore'] )->name('withdrawal.store');
        Route::get('editwithdrawal/{user_id}/{id}',[Payment::class,'editwithdrawal'] )->name('editwithdrawal');
        Route::put('update.withdrawalstatus/{user_id}/{id}',[Payment::class,'withdrawalstatus'] )->name('update.withdrawalstatus');


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
            // });



            Route::post('receive.payment',[Payment::class,'receivepayment'])->name('receive.payment');


            Route::group(['middleware' => 'Check_Logout'], function () {



                Route::get('backend.payment',[Payment::class,'loadepayment'])->name('backend.payment');
                Route::put('update.paymentstatus/{id}',[Payment::class,'paymentstatus'])->name('update.paymentstatus');
                Route::get('backend.editpayment/{id}',[Payment::class,'editpayment'])->name('backend.editpayment');
                // Product Routes are all hear
                Route::get('backend.product',[BackendDashboardController::class,'loadeproduct'])->name('backend.product');


                Route::get('backend.permission/{id}',[AdminController::class,'loadepermission'])->name('backend.permission');


                // Admin routes are all hear
                Route::get('backend.admins',[AdminController::class,'loadeadmin'])->name('backend.admins');
                Route::get('backend.editadmins/{id}',[AdminController::class,'editadmins'])->name('backend.editadmins');
                Route::put('update.usertype/{id}', [AdminController::class, 'updateUsertype'])->name('update.usertype');
                // Route::put('user/{id}/update-role', [UserController::class, 'updateUserRole'])->name('updateUserRole');


                    Route::get('backend', [BackendDashboardController::class,'backendDashbord'])->name('backend');

            Route::get('backend.contact',[PagesContentController::class,'loadecontactpage'])->name('backend.contactpage');
        Route::get('backend/homepage',[PagesContentController::class,'loadehomepage'])->name("backend.homepage");
        Route::get('backend/aboutpage',[PagesContentController::class,'loadeaboutpage'])->name("backend.aboutpage");

        Route::get('backend.edit.home',[PagesContentController::class,'loadedithomepage'])->name("loade.edit.homepage");
        Route::get('backend.edit.contact',[PagesContentController::class,'loadeditcontactpage'])->name("loade.edit.contactpage");
        Route::get('backend.edit.about',[PagesContentController::class,'loadeditaboutpage'])->name("loade.edit.aboutpage");

        Route::patch('/update.home/{id}',[PagesContentController::class,'updatehomepage'])->name("update.homepage");
        Route::patch('/update.about/{id}',[PagesContentController::class,'updateaboutpage'])->name("update.aboutpage");
        Route::patch('/update.contact/{id}',[PagesContentController::class,'updatecontactpage'])->name("update.contactpage");

                Route::get('/addhome',[PagesContentController::class,'loadeaddhomepage'])->name("loade.add.homepage");
                Route::get('/addabout',[PagesContentController::class,'loadeaddaboutpage'])->name("loade.add.aboutpage");
                Route::get('/addcontact',[PagesContentController::class,'loadeaddcontactpage'])->name("loade.add.contactpage");

                Route::patch('/addhomepage',[PagesContentController::class,'addhomepage'])->name("add.homepage");
                Route::patch('/addaboutpage',[PagesContentController::class,'addaboutpage'])->name("add.aboutpage");
                Route::patch('/addcontactpage',[PagesContentController::class,'addcontactpage'])->name("add.contactpage");

                // pages Routes are all hear

                // Route::middleware(['auth:web'])->group(function () {




                    Route::get('profile', [ProfileController::class, 'viewProfile'])->name('profile');
                    Route::post('/addProfile', [ProfileController::class, 'addProfile'])->name('add_profile');
                    Route::get('/faq', [UserController::class, 'loadfaq'])->name('faq');
                    Route::get('/contact', [UserController::class, 'loadcontact'])->name('contact');
                    Route::get('/', [UserController::class, 'loadDashbord'])->name('/');


                    Route::get('/logout', [UserController::class, 'userLogout'])->name('logout');

               // Shop routes are hear
                Route::get('/shop', [ShopController::class, 'loadshop'])->name('shop');
                Route::post('/store', [ShopController::class, 'shop'])->name('store.create');
                Route::get('/category', [ShopController::class, 'loadcategory'])->name('category');

                Route::post('/add.category', [ShopController::class, 'addcategory'])->name('add.category');
                Route::get('/delete.category/{id}', [ShopController::class, 'deletecategory'])->name('delete.category');
                Route::get('/view.category/{id}', [ShopController::class, 'viewcategory'])->name('view.category');

                Route::get('/products', [ShopController::class, 'loadproduct'])->name('products');

                Route::post('/add.product', [ShopController::class, 'addproduct'])->name('add.product');
                // add product images uplaod
                Route::post('/upload', [ShopController::class, 'upload'])->name('upload.files');


                Route::get('/delete.product/{id}', [ShopController::class, 'deleteproduct'])->name('delete.product');

            });


