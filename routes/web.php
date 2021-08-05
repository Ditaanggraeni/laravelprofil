<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\PengalamanController;
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

/*Route::get('/', function () {
    return view('welcome');
});

Route::get('/detcam', function () {
    return view('kamera.datcam');
});

Route::get('/detcam/{no}', [KameraController::class, 'detcam']);*/
Route::get('', [HomeController::class, 'index']);
Route::resources([
    'home' => HomeController::class,
    'profil' => ProfilController::class,
    'history' => HistoryController::class,
    'kontak' => KontakController::class,
    'pengalaman' => PengalamanController::class,
]);