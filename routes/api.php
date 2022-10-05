<?php

use App\Http\Controllers\KoordinatController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
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
Route::post('/koordinat', [KoordinatController::class, 'index']);
Route::post('/login', [LoginController::class, 'index']);
Route::post('/logout', [LogoutController::class, 'index']);
