<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MyTransactionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductGallyerController;
use App\Http\Controllers\Admin\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\Frontend\FrontendController::class , 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::name('admin.')->prefix('admin')->middleware('admin')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\Dashboard::class, 'index'])->name('dashboard');
    Route::get('/listUser', [\App\Http\Controllers\Admin\Dashboard::class, 'listUser'])->name('listUser');
    Route::get('/listUser', [\App\Http\Controllers\User\Dashboard::class, 'listUser'])->name('listUser');
    Route::put('/reset-password/{id}', [\App\Http\Controllers\Admin\Dashboard::class, 'resetPassword'])->name('resetPassword');
    Route::resource('/category', CategoryController::class)->except(['create', 'show', 'edit']);
    Route::resource('/product', ProductController::class);
    Route::resource('/product.gallery', ProductGallyerController::class)->except(['create', 'show', 'edit', 'update']);
    Route::resource('/transaction', TransactionController::class);
    Route::resource('/my-transaction', MyTransactionController::class)->only('index','show');
});

Route::name('user.')->prefix('user')->middleware('user')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\User\Dashboard::class, 'index'])->name('dashboard');
    Route::get('/change-password', [\App\Http\Controllers\User\Dashboard::class, 'changePassword'])->name('changePassword');
    Route::put('/reset-password/{id}', [\App\Http\Controllers\User\Dashboard::class, 'resetPassword'])->name('resetPassword');
    Route::put('/update-password', [\App\Http\Controllers\User\Dashboard::class, 'updatePassword'])->name('updatePassword');
    Route::resource('/my-transaction', MyTransactionController::class)->only('index','show');
});
