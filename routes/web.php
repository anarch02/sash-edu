<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function (){
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'login_process')->name('login_proccess');
    Route::post('/logout', 'logout')->name('logout');
});

Route::get('/home', function (){
   return view('dashboard.dashboard');
})->middleware('auth');
