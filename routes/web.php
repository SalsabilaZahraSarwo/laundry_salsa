<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SalsabilaServiceController;
use App\Http\Controllers\SalsabilaOrderController;
use App\Http\Controllers\SalsabilaUserOrderController;
use App\Http\Controllers\SalsabilaPaymentController;
use App\Http\Controllers\SalsabilaUserController;

// =============================
// 🔓 Halaman Publik (tanpa login)
// =============================

Route::get('/', [SalsabilaUserController::class, 'publicHome'])->name('home');

// =============================
// 🔐 Autentikasi (Login, Register, Logout)
// =============================

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// =============================
// 🛠️ Halaman Admin (akses hanya admin)
// =============================

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index']);

    // ✅ CRUD Layanan Laundry
    Route::get('/services', [SalsabilaServiceController::class, 'index']);
    Route::get('/services/create', [SalsabilaServiceController::class, 'create']);
    Route::post('/services', [SalsabilaServiceController::class, 'store']);
    Route::get('/services/{id}/edit', [SalsabilaServiceController::class, 'edit']);
    Route::post('/services/{id}', [SalsabilaServiceController::class, 'update']);
    Route::delete('/services/{id}', [SalsabilaServiceController::class, 'destroy']);

    // ✅ Manajemen Pesanan
    Route::get('/orders', [SalsabilaOrderController::class, 'index']);
    Route::get('/orders/{id}', [SalsabilaOrderController::class, 'show'])->name('admin.orders.show');
    Route::get('/orders/{id}/edit', [SalsabilaOrderController::class, 'edit']);
    Route::put('/orders/{id}', [SalsabilaOrderController::class, 'update']);

    // ✅ Manajemen Pembayaran
    Route::get('/payments', [SalsabilaPaymentController::class, 'index']);
    Route::get('/payments/{id}/edit', [SalsabilaPaymentController::class, 'edit']);
    Route::put('/payments/{id}', [SalsabilaPaymentController::class, 'update']);
    
    // ✅ Simpan pembayaran dari admin
    Route::post('/payment/{order}', [SalsabilaPaymentController::class, 'store']);

    // ✅ Konfirmasi Pembayaran
    Route::post('/admin/payments/{id}/confirm', [SalsabilaPaymentController::class, 'confirm'])->name('payments.confirm');

});

// =============================
// 👤 Halaman User (akses login user biasa)
// =============================

Route::get('/order', [SalsabilaUserOrderController::class, 'create']);
Route::post('/order', [SalsabilaUserOrderController::class, 'store']);

Route::get('/orders', [SalsabilaUserOrderController::class, 'index']);
Route::get('/orders/{id}', [SalsabilaUserOrderController::class, 'show'])->name('orders.show');
