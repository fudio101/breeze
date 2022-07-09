<?php

use App\Http\Controllers\FoodController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/home-page', function () {
        return view('home-page');
    })->name('home-page');

    Route::get('/tourism', function () {
        return view('tourism');
    })->name('tourism');

    Route::prefix('food')->group( function () {
        Route::get('/', [FoodController::class, 'index'])->name('food');
        Route::post('/store', [FoodController::class, 'store'])->name('food.store');
        Route::post('/destroy/{food}', [FoodController::class, 'destroy'])->name('food.destroy');
    });

    Route::get('/about-us', function () {
        return view('about-us');
    })->name('about-us');

    Route::get('/contact-us', function () {
        return view('contact-us');
    })->name('contact-us');

    Route::get('/help', function () {
        return view('help');
    })->name('help');
});

require __DIR__ . '/auth.php';
