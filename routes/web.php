<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ContentController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', ProductController::class);
    Route::resource('contents', ContentController::class)->only(['index', 'update']);
});
Route::get('/', function () {
    return view('welcome');
});
