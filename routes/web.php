<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\FrontendController;

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

Route::get('/about', function () {
    return view('about');
});

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