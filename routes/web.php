<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\frontend\HomeController;

use Illuminate\Support\Facades\Auth;

Route::get('/',[HomeController::class,'homepage'])->name('home');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



