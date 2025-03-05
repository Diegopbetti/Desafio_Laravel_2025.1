<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\IndividualPageController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\ProductManagementController;
use App\Http\Controllers\WithdrawController;
use App\Http\Controllers\PurchaseHistoryController;
use App\Http\Controllers\SalesHistoryController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home_page', [HomePageController::class, 'index'])->name('home_page');
Route::get('/product/{id}', [IndividualPageController::class, 'show'])->name('individual_page');

Route::get('/user_management', [UserManagementController::class, 'index'])->name('user_management');
Route::post('/user', [UserManagementController::class, 'store'])->name('user.store');
Route::put('/user/{id}', [UserManagementController::class, 'update'])->name('user.update');
Route::delete('/user/{id}', [UserManagementController::class, 'destroy'])->name('user.destroy');

Route::get('/product_management', [ProductManagementController::class, 'index'])->name('product_management');
Route::get('/withdraw', WithdrawController::class)->name('withdraw');
Route::get('/purchase_history', PurchaseHistoryController::class)->name('purchase_history');
Route::get('/sales_history', SalesHistoryController::class)->name('sales_history');

require __DIR__.'/auth.php';    
