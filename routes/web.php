<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\IndividualPageController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\AdminManagementController;
use App\Http\Controllers\ProductManagementController;
use App\Http\Controllers\WithdrawController;
use App\Http\Controllers\PurchaseHistoryController;
use App\Http\Controllers\SalesHistoryController;
use App\Http\Controllers\PagSeguroController;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Transaction;
use Illuminate\Http\Request;

use App\Http\Middleware\AutenticadoMiddleware;

use App\Http\Middleware\AdminMiddleware;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/home', function () {
    return redirect()->route('login');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(AdminMiddleware::class)->name('admin.dashboard'); 
});

Route::get('/erro', function(){
    return view('erro');
})->name('erro');

Route::middleware(AutenticadoMiddleware::class)->group(function () {
    Route::get('/home_page', [HomePageController::class, 'index'])->name('home_page');
    Route::get('/product/{id}', [IndividualPageController::class, 'show'])->name('individual_page');
    Route::post('/checkout', [PagSeguroController::class, 'createCheckout']);
    Route::get('/product_management', [ProductManagementController::class, 'index'])->name('product_management');
    Route::post('/product', [ProductManagementController::class, 'store'])->name('product.store');
    Route::put('/product/{id}', [ProductManagementController::class, 'update'])->name('product.update');
    Route::delete('/product/{id}', [ProductManagementController::class, 'destroy'])->name('product.destroy');

    Route::get('/sales_history', SalesHistoryController::class)->name('sales_history');

    Route::middleware('web')->group(function () {
        Route::get('/withdraw', WithdrawController::class)->name('withdraw');
        Route::post('/withdraw', [WithdrawController::class, 'withdraw'])->name('withdraw.process');
        Route::get('/purchase_history', PurchaseHistoryController::class)->name('purchase_history');
        Route::get('/user/profile', [UserProfileController::class, 'show'])->name('user_profile');
        Route::put('/user/profile/update', [UserProfileController::class, 'update'])->name('user_profile.update');
        Route::delete('/user/profile/delete', [UserProfileController::class, 'destroy'])->name('user_profile.destroy');
    });


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/compras/pdf', function (Request $request) {
        $user = Auth::user();

        $query = Transaction::with(['product', 'seller'])
                    ->where('buyer_id', $user->id);

        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('date', [$request->start_date, $request->end_date]);
        }

        $transactions = $query->get();

        $pdf = PDF::loadView('pdf.compras', compact('transactions'));
        return $pdf->stream('historico_compras.pdf');
    })->name('compras.pdf');

    Route::get('/vendas/pdf', function (Request $request) {
        $user = Auth::user();

        $query = Transaction::with(['product', 'buyer'])
                    ->where('seller_id', $user->id);

        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('date', [$request->start_date, $request->end_date]);
        }

        $transactions = $query->get();

        $pdf = PDF::loadView('pdf.vendas', compact('transactions'));
        return $pdf->stream('historico_vendas.pdf');
    })->name('vendas.pdf');
});

Route::middleware(AdminMiddleware::class)->group(function () {
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
    Route::get('/user_management', [UserManagementController::class, 'index'])->name('user_management');
    Route::post('/user', [UserManagementController::class, 'store'])->name('user.store');
    Route::put('/user/{id}', [UserManagementController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserManagementController::class, 'destroy'])->name('user.destroy');
    Route::get('/admin_management', [AdminManagementController::class, 'index'])->name('admin_management');
    Route::post('/admin', [AdminManagementController::class, 'store'])->name('admin.store');
    Route::put('/admin/edit/{admin}', [AdminManagementController::class, 'update'])->name('admin.update');
    Route::delete('/admin/delete/{admin}', [AdminManagementController::class, 'destroy'])->name('admin.destroy');
});

require __DIR__.'/auth.php';   