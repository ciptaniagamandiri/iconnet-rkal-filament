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

Route::get('/', [Web\LandingController::class, 'index'])->name('landing');
Route::get('/area', [Web\AreaController::class, 'index'])->name('landing.area');
Route::get('/products', function () {
    return view('landing.product');
})->name('landing.product');
Route::get('/contact', function () {
    return view('landing.contact');
})->name('landing.contact');
Route::post('/form', [Web\FormregistrationController::class, 'form'])->name('form.store');
Route::post('/send-otp', [Web\FormregistrationController::class, 'otp'])->name('form.otp');

Route::get('fetch/data/kota/{id}', [Web\AreaController::class, 'fetchDataKota'])->name('fetch.data.kota');
Route::get('fetch/data/kecamatan/{id}', [Web\AreaController::class, 'fetchDataKecamatan'])->name('fetch.data.kecamatan');
Route::get('fetch/data/kelurahan/{id}', [Web\AreaController::class, 'fetchDataKelurahan'])->name('fetch.data.kelurahan');

Route::get('/product/{product:id}/registration',  [Web\RegistrationController::class, 'registration'])->name('product.registration');
Route::get('/request/otp', [Web\RegistrationController::class, 'requestOtp'])->name('otp.request');