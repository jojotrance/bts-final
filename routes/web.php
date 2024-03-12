<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StallController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ParkingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\InventoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

// Route::get('/user/dashboard', [UserController::class, 'index'])->middleware('auth')->name('user.index');
// Route::get('/tenant/apply', [TenantController::class, 'create'])->middleware('auth')->name('tenant.create');
// Route::post('/tenants/store/{stallId}', [TenantController::class, 'store'])->name('tenant.store');

Route::middleware(['admin'])->group(function () {
    Route::get('/analytics', [AdminController::class, 'index'])->name('admin.analytics');
    // OKAY NA RIN TO
    Route::get('/stall', [StallController::class, 'index'])->name('stall.index');
    Route::get('/stall/create', [StallController::class, 'create'])->name('stall.create');
    Route::post('/stall/store', [StallController::class, 'store'])->name('stall.store');
    Route::delete('/stall/{id}/delete', [StallController::class, 'destroy'])->name('stall.delete');
    Route::get('/stall/{id}/edit', [StallController::class, 'edit'])->name('stall.edit');
    Route::put('/stall/{id}/update', [StallController::class, 'update'])->name('stall.update');

    Route::get('/tenant', [TenantController::class, 'index'])->name('tenant.index');
    Route::get('/tenant/{id}/edit', [TenantController::class, 'edit'])->name('tenant.edit');
    Route::put('/tenant/{id}', [TenantController::class, 'update'])->name('tenant.update');

    //OK NA TO
    Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
    Route::get('/payment/create', [PaymentController::class, 'create'])->name('payment.create');
    Route::post('/payment/store', [PaymentController::class, 'store'])->name('payment.store');
    Route::get('/payment/{id}/edit', [PaymentController::class, 'edit'])->name('payment.edit');
    Route::put('/payment/{payment}', [PaymentController::class, 'update'])->name('payment.update');

    //FOR PARKING
    Route::get('/parking', [ParkingController::class, 'index'])->name('parking.index');
    Route::get('/clear', [ParkingController::class, 'clear'])->name('parking.clear');
    Route::post('/parking', [ParkingController::class, 'store'])->name('parking.store');
    Route::put('/parkings/{id}', [ParkingController::class, 'update'])->name('parking.update');
    Route::get('/parking/create', [ParkingController::class, 'create'])->name('parking.create');
    Route::delete('/parking/deleteSelected', [ParkingController::class, 'deleteSelected'])->name('parking.deleteSelected');

    Route::get('/inventory', [StallController::class, 'showInventory'])->name('admin.inventory');
    Route::get('/generate-analytics', [AdminController::class, 'generateAnalytics'])->name('generate.analytics');

});

Route::middleware('auth')->group(function () {
    Route::get('/concern', [FeedbackController::class, 'index'])->name('feedback.index');
    Route::post('/concern/store', [FeedbackController::class, 'store'])->name('feedback.create');

    Route::get('/revenue', [RevenueController::class, 'index'])->name('revenue.index');
    Route::get('/revenue/create', [RevenueController::class, 'create'])->name('revenue.create');
    Route::post('/revenue/store', [RevenueController::class, 'store'])->name('revenue.store');
    Route::get('/revenue/{id}/edit', [RevenueController::class, 'edit'])->name('revenue.edit');
    Route::post('/revenue/{id}/update', [RevenueController::class, 'update'])->name('revenue.update');

    Route::post('/concern/store', [FeedbackController::class, 'store'])->name('feedback.store');
    Route::get('/user', [UserController::class, 'indexFilter'])->name('user.filter');
    Route::get('/mystall', [TenantController::class, 'mystall'])->name('tenant.stall');
    Route::get('/tenant/apply', [TenantController::class, 'create'])->name('tenant.create');
    Route::post('/tenants/store/{stallId}', [TenantController::class, 'store'])->name('tenant.store');

    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
