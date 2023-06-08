<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web;

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

Route::get('/test', [Web\AreaController::class, 'index']);
Route::get('/', [Web\LandingController::class, 'index'])->name('landing');
Route::get('/area', [Web\AreaController::class, 'index'])->name('landing.area');
Route::get('/products', [Web\ProductController::class, 'index'])->name('landing.product');
Route::get('/contact', function () {
    return view('landing.contact');
})->name('landing.contact');
Route::post('/form', [Web\FormregistrationController::class, 'form'])->name('form.store');
Route::post('/send-otp', [Web\FormregistrationController::class, 'otp'])->name('form.otp');