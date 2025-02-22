<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\IndividualPageController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\ProductManagementController;
use App\Http\Controllers\WithdrawController;
use App\Http\Controllers\PurchaseHistoryController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home_page', HomePageController::class)->name('home_page');
Route::get('/individual_page', IndividualPageController::class)->name('individual_page');
Route::get('/user_management', UserManagementController::class)->name('user_management');
Route::get('/product_management', ProductManagementController::class)->name('product_management');
Route::get('/withdraw', WithdrawController::class)->name('withdraw');
Route::get('/purchase_history', PurchaseHistoryController::class)->name('purchase_history');

require __DIR__.'/auth.php';
