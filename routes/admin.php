<?php


use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\AdminListController;
use App\Http\Controllers\Backend\BlogCategoryController;
use App\Http\Controllers\Backend\BlogCommentController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\CodSettingController;
use App\Http\Controllers\Backend\ManageUserController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminReviewController;
use App\Http\Controllers\Backend\AdminVendorProfileController;
use App\Http\Controllers\Backend\AdvertisementController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ChildCategoryController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\CustomerListController;
use App\Http\Controllers\Backend\FlashSaleController;
use App\Http\Controllers\Backend\FooterGridThreeController;
use App\Http\Controllers\Backend\FooterGridTwoController;
use App\Http\Controllers\Backend\FooterInfoController;
use App\Http\Controllers\Backend\FooterSocialController;
use App\Http\Controllers\Backend\HomePageSettingController;
use App\Http\Controllers\Backend\MessageController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\PaymentSettingController;
use App\Http\Controllers\Backend\PaypalSettingController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductImageGalleryController;
use App\Http\Controllers\Backend\ProductVariantController;
use App\Http\Controllers\Backend\ProductVariantOptionController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SellerProductController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\ShippingRuleController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubcategoryController;
use App\Http\Controllers\Backend\SubscribersController;
use App\Http\Controllers\Backend\TermsAndConditionController;
use App\Http\Controllers\Backend\TransactionController;
use App\Http\Controllers\Backend\VendorApplicationController;
use App\Http\Controllers\Backend\VendorConditionController;
use App\Http\Controllers\Backend\VendorListController;
use App\Http\Controllers\Backend\WithdrawMethodController;
use App\Http\Controllers\ReferralCodeController;
use Illuminate\Support\Facades\Route;

/**
 * Dashboard Routes
 */
Route::controller(AdminController::class)->group(function () {
    Route::get('/', 'dashboard')->name('dashboard');
    Route::get('dashboard', 'dashboard')->name('dashboard');
});

/**
 * Profile Routes
 */
Route::controller(ProfileController::class)->group(function () {
    Route::get('profile', 'index')->name('profile');
    Route::post('profile/update', 'updateProfile')->name('profile.update');
    Route::post('profile/update/password', 'updatePassword')->name('password.update');
});

/**
 * Slider Routes
 */
Route::put('slider/change-status', [SliderController::class, 'changeStatus'])
    ->name('slider.change-status');
Route::resource('slider', SliderController::class);

/**
 * Category Routes
 */
Route::put('category/change-status', [CategoryController::class, 'changeStatus'])
    ->name('category.change-status');
Route::resource('category', CategoryController::class);

/**
 * Subcategory Routes
 */
Route::put('subcategory/change-status', [SubcategoryController::class, 'changeStatus'])
    ->name('subcategory.change-status');
Route::resource('subcategory', SubcategoryController::class);

/**
 * Child Category Routes
 */
Route::controller(ChildCategoryController::class)->group(function () {
    Route::put('child-category/change-status', 'changeStatus')->name('child-category.change-status');
    Route::get('get-subcategories', 'getSubcategories')->name('get-subcategories');
});
Route::resource('child-category', ChildCategoryController::class);

/**
 * Brand Routes
 */
Route::controller(BrandController::class)->group(function () {
    Route::put('brand/change-status', 'changeStatus')->name('brand.change-status');
    Route::put('brand/change-is-featured', 'changeIsFeatured')->name('brand.change-is-featured');
});
Route::resource('brand', BrandController::class);

/**
 * Vendor Profile Routes
 */
Route::resource('vendor-profile', AdminVendorProfileController::class);

/**
 * Products Routes
 */
Route::controller(ProductController::class)->group(function () {
    Route::put('product/change-status', 'changeStatus')->name('product.change-status');
    Route::get('product/get-subcategories', 'getSubcategories')->name('product.get-subcategories');
    Route::get('product/get-child-categories', 'getChildCategories')
        ->name('product.get-child-categories');
});
Route::resource('products', ProductController::class);

/**
 * Products Image Gallery Routes
 */
Route::resource('products-image-gallery', ProductImageGalleryController::class);

/**
 * Products Variant Routes
 */
Route::put('products-variant/change-status', [ProductVariantController::class, 'changeStatus'])
    ->name('products-variant.change-status');
Route::resource('products-variant', ProductVariantController::class);

/**
 * Products Variant Option Routes
 */
Route::controller(ProductVariantOptionController::class)->group(function () {
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

/** reviews routes */
Route::get('reviews', [AdminReviewController::class, 'index'])->name('reviews.index');
Route::put('reviews/change-status', [AdminReviewController::class, 'changeStatus'])
    ->name('reviews.change-status');

/**
 * Seller Product Routes
 */
Route::controller(SellerProductController::class)->group(function () {
    Route::put('seller-products/change-status', 'changeStatus')
        ->name('seller-products.change-status');
    Route::put('seller-products/change-is-approved', 'changeIsApproved')
        ->name('seller-products.change-is-approved');
    Route::get('seller-products', 'index')->name('seller-products.index');
    Route::get('seller-products/pending', 'pendingProducts')->name('seller-products.pending');
});

/**
 * Flash Sale Routes
 */
Route::controller(FlashSaleController::class)->group(function () {
    Route::put('flash-sale/change-status', 'changeStatus')->name('flash-sale.change-status');
    Route::put('flash-sale/change-show-at-home', 'changeShowAtHome')
        ->name('flash-sale.change-show-at-home');
    Route::get('flash-sale', 'index')->name('flash-sale.index');
    Route::put('flash-sale', 'update')->name('flash-sale.update');
    Route::post('flash-sale/add-product', 'addProduct')->name('flash-sale.add-product');
    Route::delete('flash-sale/{flashSaleId}', 'destroy')->name('flash-sale.destroy');
});

/**
 * Coupon Routes
 */
Route::put('coupons/change-status', [CouponController::class, 'changeStatus'])
    ->name('coupons.change-status');
Route::resource('coupons', CouponController::class);

/**
 * Shipping Rule Routes
 */
Route::put('shipping-rules/change-status', [ShippingRuleController::class, 'changeStatus'])
    ->name('shipping-rules.change-status');
Route::resource('shipping-rules', ShippingRuleController::class);

/**
 * Orders Routes
 */
Route::controller(OrderController::class)->group(function () {
    Route::get('order/change-order-status', 'changeOrderStatus')->name('order.change-order-status');
    Route::get('order/change-payment-status', 'changePaymentStatus')
        ->name('order.change-payment-status');
    Route::get('order/pending', 'pendingOrders')->name('order-pending');
    Route::get('order/processed-and-ready-to-ship', 'processedAndReadyToShipOrders')
        ->name('order-processed-and-ready-to-ship');
    Route::get('order/dropped-off', 'droppedOffOrders')->name('order-dropped-off');
    Route::get('order/shipped', 'shippedOrders')->name('order-shipped');
    Route::get('order/out-for-delivery', 'outForDeliveryOrders')->name('order-out-for-delivery');
    Route::get('order/delivered', 'deliveredOrders')->name('order-delivered');
    Route::get('order/cancelled', 'cancelledOrders')->name('order-cancelled');
});
Route::resource('order', OrderController::class);

/**
 * Transaction Routes
 */
Route::get('transaction', [TransactionController::class, 'index'])->name('transaction');

/** Withdraw method route */
Route::controller(WithdrawMethodController::class)->group(function () {
    Route::get('withdraw', 'index')->name('withdraw.index');
    Route::get('withdraw/{id}', 'show')->name('withdraw.show');
    Route::put('withdraw/{id}', 'update')->name('withdraw.update');
});
Route::resource('withdraw-method', WithdrawMethodController::class);

/** Message route */
Route::controller(MessageController::class)->group(function () {
    Route::get('messages', 'index')->name('messages.index');
    Route::get('get-messages', 'getMessages')->name('get-messages');
    Route::post('send-message', 'sendMessage')->name('send-message');
});

/** Referral code route */
Route::get('referral-code', [ReferralCodeController::class, 'index'])->name('referral-code.index');

/**
 * Settings Routes
 */
Route::controller(SettingController::class)->group(function () {
    Route::get('settings', 'index')->name('settings.index');
    Route::put('settings/general/update', 'updateGeneralSetting')->name('settings.general.update');
    Route::put('settings/email/update', 'emailConfigSettingUpdate')->name('settings.email.update');
    Route::put('settings/logo/update', 'logoSettingUpdate')->name('settings.logo.update');
    Route::put('pusher-setting-update', 'pusherSettingUpdate')->name('pusher-setting-update');
});

/**
 * Home Page Settings Routes
 */
Route::controller(HomePageSettingController::class)->group(function () {
    Route::get('home-page-setting', 'index')->name('home-page-setting');
    Route::put('home-page-setting/popular-categories', 'updatePopularCategories')
        ->name('home-page-setting.popular-categories');
    Route::put('home-page-setting/category-product-slider', 'updateCategoryProductSlider')
        ->name('home-page-setting.category-product-slider');
});

/** Blog routes */
Route::put('blog-category/change-status', [BlogCategoryController::class, 'changeStatus'])
    ->name('blog-category.change-status');
Route::resource('blog-category', BlogCategoryController::class);

Route::put('blog/change-status', [BlogController::class, 'changeStatus'])->name('blog.change-status');
Route::resource('blog', BlogController::class);

Route::controller(BlogCommentController::class)->group(function () {
    Route::get('blog-comments', 'index')->name('blog-comments.index');
    Route::delete('blog-comments/{id}/destroy', 'destroy')->name('blog-comments.destroy');
});

/** Subscribers route */
Route::controller(SubscribersController::class)->group(function () {
    Route::get('subscribers', 'index')->name('subscribers.index');
    Route::delete('subscribers/{id}', 'destroy')->name('subscribers.destroy');
    Route::post('subscribers-send-mail', 'sendMail')->name('subscribers-send-mail');
});

/** Advertisement Routes */
Route::controller(AdvertisementController::class)->group(function () {
    Route::get('advertisement', 'index')->name('advertisement.index');
    Route::put('advertisement/homepage-banner-section-one', 'homepageBannerSectionOne')
        ->name('homepage-banner-section-one');
    Route::put('advertisement/homepage-banner-section-two', 'homepageBannerSectionTwo')
        ->name('homepage-banner-section-two');
    Route::put('advertisement/homepage-banner-section-three', 'homepageBannerSectionThree')
        ->name('homepage-banner-section-three');
    Route::put('advertisement/homepage-banner-section-four', 'homepageBannerSectionFour')
        ->name('homepage-banner-section-four');
    Route::put('advertisement/product-page-banner', 'productPageBanner')
        ->name('product-page-banner');
    Route::put('advertisement/cart-page-banner', 'cartPageBanner')->name('cart-page-banner');
});

/** Vendor request routes */
Route::controller(VendorApplicationController::class)->group(function () {
    Route::get('vendor-applications', 'index')->name('vendor-applications.index');
    Route::get('vendor-applications/{id}/show', 'show')->name('vendor-applications.show');
    Route::put('vendor-applications/{id}/change-status', 'changeStatus')
        ->name('vendor-applications.change-status');
});

/** customer list routes */
Route::controller(CustomerListController::class)->group(function () {
    Route::get('customer', 'index')->name('customer.index');
    Route::put('customer/change-status', 'changeStatus')->name('customer.change-status');
});

/** admin list routes */
Route::controller(AdminListController::class)->group(function () {
    Route::get('admin-list', 'index')->name('admin-list.index');
    Route::put('admin-list/change-status', 'changeStatus')->name('admin-list.change-status');
    Route::delete('admin-list/{id}', 'destroy')->name('admin-list.destroy');
});

/** manage user routes */
Route::controller(ManageUserController::class)->group(function () {
    Route::get('manage-user', 'index')->name('manage-user.index');
    Route::post('manage-user', 'create')->name('manage-user.create');
});

/** vendor list routes */
Route::controller(VendorListController::class)->group(function () {
    Route::get('vendor-list', 'index')->name('vendor-list.index');
    Route::put('vendor-list/change-status', 'changeStatus')->name('vendor-list.change-status');
});

/** vendor condition routes */
Route::controller(VendorConditionController::class)->group(function () {
    Route::get('vendor-condition', 'index')->name('vendor-condition.index');
    Route::put('vendor-condition/update', 'update')->name('vendor-condition.update');
});

/** about routes */
Route::controller(AboutController::class)->group(function () {
    Route::get('about', 'index')->name('about.index');
    Route::put('about/update', 'update')->name('about.update');
});

/** terms and conditions routes */
Route::controller(TermsAndConditionController::class)->group(function () {
    Route::get('terms-and-conditions', 'index')->name('terms-and-conditions.index');
    Route::put('terms-and-conditions/update', 'update')->name('terms-and-conditions.update');
});

/** footer routes */
Route::resource('footer-info', FooterInfoController::class);

Route::put('footer-socials/change-status', [FooterSocialController::class, 'changeStatus'])
    ->name('footer-socials.change-status');
Route::resource('footer-socials', FooterSocialController::class);

Route::controller(FooterGridTwoController::class)->group(function () {
    Route::put('footer-grid-two/change-status', 'changeStatus')->name('footer-grid-two.change-status');
    Route::put('footer-grid-two/change-title', 'changeTitle')->name('footer-grid-two.change-title');
});
Route::resource('footer-grid-two', FooterGridTwoController::class);

Route::controller(FooterGridThreeController::class)->group(function () {
    Route::put('footer-grid-three/change-status', 'changeStatus')
        ->name('footer-grid-three.change-status');
    Route::put('footer-grid-three/change-title', 'changeTitle')
        ->name('footer-grid-three.change-title');
});
Route::resource('footer-grid-three', FooterGridThreeController::class);

/**
 * Payment Setting Routes
 */
Route::get('payment-setting', [PaymentSettingController::class, 'index'])->name('payment-setting');
Route::resource('paypal-setting', PaypalSettingController::class);
Route::put('cod-setting/{id}', [CodSettingController::class, 'update'])->name('cod-setting.update');
