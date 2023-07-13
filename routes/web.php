<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AboutController;

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
Auth::routes();
require __DIR__.'/dynamic.php';

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/', [FrontendController::class, 'index']);

// Route::get('/about', function () {
//     return view('about');
// });

Route::get('/blogs', function () {
    return view('blogs');
});

Route::get('/chefs', function () {
    return view('chefs');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/menu', function () {
    return view('menu');
});

Route::get('/menu', [FrontendController::class, 'menu']);

Route::get('menu_details/{id}', [FrontendController::class, 'menu_detail']);

Route::post('add-to-cart', [CartController::class, 'addFood']);

Route::middleware(['auth'])->group(function () {
    Route::get('cart', [CartController::class, 'viewcart']);
    Route::get('checkout', [CheckoutController::class, 'index']);
});

Route::post('delete-cart-item', [CartController::class, 'deletefood']);

Route::get('about', [FrontendController::class, 'about']);


Route::middleware(['auth','isUser'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
});

Route::middleware(['guest'])->group(function () {
    Route::get('/dashboard-create-user', function () {
        return view('dashboard_create_user');
    });
    
    Route::get('/dashboard-login-user', function () {
        return view('dashboard_login_user');
    })->name('dashboard-login-user');

    Route::get('/dashboard-reset-password', function () {
        return view('dashboard_reset_password');
    });

    Route::get('/dashboard-email-password', function () {
        return view('dashboard_email_password');
    })->name('dashboard-email-password');
});
