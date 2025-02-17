<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\IndividualPageController;

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

require __DIR__.'/auth.php';
