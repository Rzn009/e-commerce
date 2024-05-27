<?php

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\Dashboard as AdminDashboard;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\MyTransactionController;
use App\Http\Controllers\Admin\ProductGalleryController;
use App\Http\Controllers\FrontEnd\FrontEndController;
use App\Http\Controllers\User\Dashboard;

Route::get('/', [App\Http\Controllers\FrontEnd\FrontEndController::class, 'index']);
Route::get('/detail-product/{slug}', [App\Http\Controllers\FrontEnd\FrontEndController::class, 'deatailProduct'])->name('detail.product');
Route::get('/detail-category/{slug}', [App\Http\Controllers\FrontEnd\FrontEndController::class, 'detailCategory'])->name('detail.category');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/cart', [App\Http\Controllers\FrontEnd\FrontEndController::class, 'cart'])->name('cart');
    Route::post('/addCart/{id}', [App\Http\Controllers\FrontEnd\FrontEndController::class, 'adddToCart'])->name('cart.add');
    Route::delete('/deleteCart/{id}', [App\Http\Controllers\FrontEnd\FrontEndController::class, 'deleteCart'])->name('cart.delete');
    Route::post('/checkout', [App\Http\Controllers\FrontEnd\FrontEndController::class, 'checkout'])->name('checkout');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::name('admin.')->prefix('admin')->middleware('admin')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\Dashboard::class, 'index'])->name('dashboard');
    Route::get('/list-user', [\App\Http\Controllers\Admin\Dashboard::class, 'listUser'])->name('list-user');
    Route::resource('/category', CategoryController::class)->except(['create', 'show', 'edit']);
    Route::resource('/product', ProductController::class);
    Route::resource('/product.gallery', \App\Http\Controllers\Admin\ProductGallyerController::class)->except(['create', 'show', 'edit', 'update']);    Route::put('/list-user/{id}', [AdminDashboard::class, 'resetPassword'])->name('resetPassword');
    Route::resource('/my-transaction', MyTransactionController::class)->only(['index']);
    Route::get('/my-transaction/{id}/{slug}', [MyTransactionController::class, 'showDataBySlugAndId'])->name('my-transaction.showDataBySlugAndId');
    Route::resource('/transaction', TransactionController::class);
});

Route::name('user.')->prefix('user')->middleware('user')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\User\Dashboard::class, 'index'])->name('dashboard');
    Route::get('/change-password', [\App\Http\Controllers\User\Dashboard::class, 'changePassword'])->name('changePassword');
    Route::put('/update-password', [Dashboard::class, 'updatePassword'])->name('update-password');
    Route::resource('/my-transaction', MyTransactionController::class)->only(['index']);
    Route::get('/my-transaction/{id}/{slug}', [MyTransactionController::class, 'showDataBySlugAndId'])->name('my-transaction.showDataBySlugAndId');
});