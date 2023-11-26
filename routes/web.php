<?php
use Illuminate\Support\Facades\Route;
//===========================================
//===========================================
//===========================================
// FRONTEND
//===========================================
//===========================================
//===========================================
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ForgotPasswordController;
//===========================================
//===========================================
//===========================================
// BACKEND
//===========================================
//===========================================
//===========================================
//===========================================
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminAccountController;
use App\Http\Controllers\Admin\AdminCustomerController;
//==============================================================
//===========================================
//===========================================
//===========================================
// FRONTEND
//===========================================
//===========================================
//===========================================
Route::get('/', [HomeController::class, 'index']);
Route::get('/ve-chung-toi', [AboutController::class, 'index']);
Route::get('/lienhe', [ContactController::class, 'index']);
Route::post('/send-email', [ContactController::class, 'sendEmail'])->name('contact.send');
Route::get('/search', [SearchController::class, 'index']);
//===========================================
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
//===========================================
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{linkProduct}', [ProductController::class, 'show'])->name('products.show');
Route::post('/get-quantity', [ProductController::class, 'getQuantity'])->name('get.quantity');
// Route::get('/products/{id}', [ProductController::class, 'show']);
// Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
//===========================================
Route::post('/cart/add', [CartController::class, 'addToCart']);
Route::delete('/cart/remove', [CartController::class, 'removeFromCart']);
Route::post('/cart/change-quantity', [CartController::class, 'changeQuantity']);
Route::get('/cart', [CartController::class, 'showCart']);
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
//===========================================
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
Route::post('/apply-discount', [CheckoutController::class, 'applyDiscount'])->name('apply.discount');
Route::post('/remove-discount', [CheckoutController::class, 'removeDiscount'])->name('remove.discount');
//===========================================
Route::post('/login', [AccountController::class, 'loginSubmit'])->name('login.submit');
Route::get('/login', [AccountController::class, 'showLoginForm'])->name('login');
Route::get('/logout', [AccountController::class, 'logout'])->name('logout');
//===========================================
Route::get('/register', [AccountController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AccountController::class, 'register'])->name('register.submit');
//===========================================
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('forgot.password.form');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('forgot.password.email');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.form');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('reset.password');
//===========================================
Route::get('/myaccount', [AccountController::class, 'myAccount'])->name('myaccount')->middleware('auth.account');
Route::post('/update-customer-info', [AccountController::class, 'updateCustomerInfo'])->name('update.customer.info');
//===========================================
Route::get('/change-password', [AccountController::class, 'showChangePasswordForm'])->name('change.password.view');
Route::post('/change-password', [AccountController::class, 'changePassword'])->name('change.password');
//===========================================
Route::get('/order/{orderId}/detail', [OrderController::class, 'orderDetail'])->name('order.detail');
Route::post('/order/search', [OrderController::class, 'search'])->name('order.search');
Route::get('/order/search', [OrderController::class, 'showSearchForm'])->name('order.search.view');
Route::get('/cancel-order/{orderId}', [OrderController::class, 'cancelOrder'])->name('cancel.order');
//==============================================================
//===========================================
//===========================================
//===========================================
// BACKEND
//===========================================
//===========================================
//===========================================
Route::get('/admin/login', [LoginController::class, 'showLogin']);
Route::post('/admin/login', [LoginController::class, 'login']);
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');
Route::middleware(['admin.auth'])->group(function () {
    //========================================================
    //========================================================
    Route::get('/admin', [AdminController::class, 'showDashboard'])->name('admin.dashboard');
    //========================================================
    //========================================================
    Route::get('/admin/categories', [AdminCategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/admin/categories/create', [AdminCategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/admin/categories/store', [AdminCategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/admin/categories/{id}/edit', [AdminCategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/admin/categories/{id}', [AdminCategoryController::class, 'update'])->name('admin.categories.update');
    Route::get('/admin/categories/delete/{id}', [AdminCategoryController::class, 'delete'])->name('admin.categories.delete');
    //========================================================
    //========================================================
    Route::get('/admin/accounts', [AdminAccountController::class, 'index'])->name('admin.accounts.index');
    Route::get('/admin/accounts/{id}/edit', [AdminAccountController::class, 'edit'])->name('admin.accounts.edit');
    Route::put('/admin/accounts/{id}', [AdminAccountController::class, 'update'])->name('admin.accounts.update');
    Route::get('/admin/accounts/delete/{id}', [AdminAccountController::class, 'delete'])->name('admin.accounts.delete');
    //========================================================
    //========================================================
    Route::get('/admin/customers', [AdminCustomerController::class, 'index'])->name('admin.customers.index');
    Route::get('/admin/customers/create', [AdminCustomerController::class, 'create'])->name('admin.customers.create');
    Route::post('/admin/customers/store', [AdminCustomerController::class, 'store'])->name('admin.customers.store');
    Route::get('/admin/customers/{id}/edit', [AdminCustomerController::class, 'edit'])->name('admin.customers.edit');
    Route::put('/admin/customers/{id}', [AdminCustomerController::class, 'update'])->name('admin.customers.update');
    Route::get('/admin/customers/delete/{id}', [AdminCustomerController::class, 'delete'])->name('admin.customers.delete');
});
