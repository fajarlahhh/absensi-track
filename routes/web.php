<?php

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

Route::group(['middleware' => ['auth']], function () {
  Route::get('/', \App\Http\Livewire\Dashboard::class);
  Route::prefix('dataanggota')->group(function ($q) {
    Route::get('/', \App\Http\Livewire\Dataanggota\Index::class);
    Route::get('/tambah', \App\Http\Livewire\Dataanggota\Form::class);
  });
  Route::get('/pelacakan', \App\Http\Livewire\Lacak::class);
  Route::get('/absensi', \App\Http\Livewire\Absensi::class);
});
