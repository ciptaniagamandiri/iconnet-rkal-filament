<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/test', [Web\AreaController::class, 'index'])->name('landing.area');
Route::get('fetch/data/kota', [Web\AreaController::class, 'fetchDataKota'])->name('kota');
Route::get('fetch/data/kecamatan', [Web\AreaController::class, 'fetchDataKecamatan'])->name('kecamatan');
Route::get('fetch/data/kelurahan', [Web\AreaController::class, 'fetchDataKelurahan'])->name('kelurahan');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});