
<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\backend\DashboardController;
use Illuminate\Support\Facades\Route;




//backend
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware('auth');

Route::resource('/post', PostController::class)->middleware('auth');



Route::group(['prefix' => 'category'], function () {

    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/index', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::post('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
});

Route::group(['prefix' => 'sub_category'], function () {

    Route::get('/create', [SubCategoryController::class, 'create'])->name('sub_category.create');
    Route::post('/store', [SubCategoryController::class, 'store'])->name('sub_category.store');
    Route::get('/index', [SubCategoryController::class, 'index'])->name('sub_category.index');
    Route::get('/edit/{id}', [SubCategoryController::class, 'edit'])->name('sub_category.edit');
    Route::get('/delete/{id}', [SubCategoryController::class, 'destroy'])->name('sub_category.destroy');
    Route::post('/update/{id}', [SubCategoryController::class, 'update'])->name('sub_category.update');
});
