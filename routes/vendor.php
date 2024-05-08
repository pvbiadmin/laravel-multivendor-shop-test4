<?php

use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\VendorMessageController;
use App\Http\Controllers\Backend\VendorOrderController;
use App\Http\Controllers\Backend\VendorProductController;
use App\Http\Controllers\Backend\VendorProductImageGalleryController;
use App\Http\Controllers\Backend\VendorProductReviewController;
use App\Http\Controllers\Backend\VendorProductVariantController;
use App\Http\Controllers\Backend\VendorProductVariantOptionController;
use App\Http\Controllers\Backend\VendorProfileController;
use App\Http\Controllers\Backend\VendorShopProfileController;
use App\Http\Controllers\Backend\VendorWithdrawController;
use Illuminate\Support\Facades\Route;

/**
 * Vendor Routes
 */
Route::controller(VendorController::class)->group(function () {
    Route::get('/', 'dashboard')->name('dashboard');
    Route::get('dashboard', 'dashboard')->name('dashboard');
});

Route::controller(VendorProfileController::class)->group(function () {
    Route::get('profile', 'index')->name('profile');
    Route::put('profile', 'updateProfile')->name('profile.update');
    Route::post('profile', 'updatePassword')->name('profile.update.password');
});

/** Message Route */
Route::controller(VendorMessageController::class)->group(function () {
    Route::get('messages', 'index')->name('messages.index');
    Route::post('send-message', 'sendMessage')->name('send-message');
    Route::get('get-messages', 'getMessages')->name('get-messages');
});

/**
 * Vendor Shop Profile Routes
 */
Route::resource('shop-profile', VendorShopProfileController::class);

/**
 * Vendor Product Routes
 */
Route::controller(VendorProductController::class)->group(function () {
    Route::put('product/change-status', 'changeStatus')->name('product.change-status');
    Route::get('product/get-subcategories', 'getSubcategories')->name('product.get-subcategories');
    Route::get('product/get-child-categories', 'getChildCategories')
        ->name('product.get-child-categories');
});
Route::resource('products', VendorProductController::class);

/**
 * Vendor Products Image Gallery Routes
 */
Route::resource('products-image-gallery', VendorProductImageGalleryController::class);

/**
 * Vendor Products Variant Routes
 */
Route::put('products-variant/change-status', [VendorProductVariantController::class, 'changeStatus'])
    ->name('products-variant.change-status');
Route::resource('products-variant', VendorProductVariantController::class);

/**
 * Products Variant Option Routes
 */
Route::controller(VendorProductVariantOptionController::class)->group(function () {
    Route::put('products-variant-option/change-status', 'changeStatus')
        ->name('products-variant-option.change-status');
    Route::put('products-variant-option/change-is-default', 'changeIsDefault')
        ->name('products-variant-option.change-is-default');
    Route::get('products-variant-option/{productId}/{variantId}', 'index')
        ->name('products-variant-option.index');
    Route::get('products-variant-option/create/{productId}/{variantId}',
        'create')->name('products-variant-option.create');
    Route::post('products-variant-option', 'store')
        ->name('products-variant-option.store');
    Route::get('products-variant-option-edit/{variantOptionId}', 'edit')
        ->name('products-variant-option.edit');
    Route::put('products-variant-option-update/{variantOptionId}', 'update')
        ->name('products-variant-option.update');
    Route::delete('products-variant-option/{variantOptionId}', 'destroy')
        ->name('products-variant-option.destroy');
});

/**
 * Orders Route
 */
Route::controller(VendorOrderController::class)->group(function () {
    Route::get('order/change-order-status', 'changeOrderStatus')->name('order.change-order-status');
    Route::get('orders', 'index')->name('orders.index');
    Route::get('orders/show/{id}', 'show')->name('orders.show');
});

/** Reviews route */
Route::get('reviews', [VendorProductReviewController::class, 'index'])->name('reviews.index');

/** Withdraw route */
Route::get('withdraw-request/{id}', [VendorWithdrawController::class, 'showRequest'])->name('withdraw-request.show');
Route::resource('withdraw', VendorWithdrawController::class);
