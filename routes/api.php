<?php

use App\Http\Controllers\Api\ProfilController;
use App\Http\Controllers\Api\HistoryController;
use App\Http\Controllers\Api\KontakController;
use App\Http\Controllers\Api\PengalamanController;
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

Route::resources([
    'profil' => ProfilController::class,
    'history' => HistoryController::class,
    'kontak' => KontakController::class,
    'pengalaman' => PengalamanController::class,
    
]);