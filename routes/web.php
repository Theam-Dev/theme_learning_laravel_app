<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\ProductsController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::controller(CategoriesController::class)->prefix('categories')->group(function () {
    Route::get('/index', 'index')->name("categories");
    Route::get('/create', 'create')->name("categories-create");
    Route::get('/cagegories/{id}', 'edit')->name("categories-edit");
    Route::post('/store', 'store')->name("categories-store");
    Route::put('/update/{id}', 'update')->name("categories-update");
    Route::get('/delete/{id}', 'delete')->name("categories-delete");
});

Route::controller(SlideController::class)->prefix('sides')->group(function () {
    Route::get('/index', 'index')->name("slide");
    Route::get('/create', 'create')->name("slide-create");
    Route::post('/store', 'store')->name("slide-store");
    Route::get('/delete/{id}', 'destroy')->name("slide-delete");
});

Route::controller(ProductsController::class)->prefix('product')->group(function () {
    Route::get('/index', 'index')->name("product");
    Route::get('/create', 'create')->name("product-create");
    Route::get('/edit/{id}', 'edit')->name("product-edit");
    Route::post('/store', 'store')->name("product-store");
    Route::put('/update/{id}', 'update')->name("product-update");
    Route::get('/delete/{id}', 'destroy')->name("product-delete");
});
