<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\{
    HomeController,
};
// controller in a slide page folder
use App\Http\Controllers\SlidePage\{
    CompanyProfile,
    CompassController
};

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



Auth::routes(['verify' => true]);
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/company-profile', [CompanyProfile::class, 'index'])->name('company_profile');
Route::get('/compass', [CompassController::class, 'index'])->name('compass');
Route::group(['middleware' => ['auth']], function () {
    // Route::get('/home', [HomeController::class, 'index'])->name('home');

});
