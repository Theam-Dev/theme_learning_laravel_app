<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;

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
});
