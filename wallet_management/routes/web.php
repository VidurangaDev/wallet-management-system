<?php

use Illuminate\Support\Facades\DB;
use App\Http\Middleware\CheckIfAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/wallet', [WalletController::class, 'showBalance'])->name('wallet.balance');
    Route::post('/wallet/add', [WalletController::class, 'addMoney'])->name('wallet.add');
    Route::post('/wallet/deduct', [WalletController::class, 'deductMoney'])->name('wallet.deduct');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('wallet.balance');
    })->name('dashboard');


    Route::get('/transaction/view', function () {
        return view('transaction');
    })->name('transaction');
});



Route::middleware('auth')->group(function () {
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/reports/summary', [ReportController::class, 'summary'])->name('reports.summary');
    Route::get('/reports/export/pdf', [ReportController::class, 'exportPDF'])->name('reports.export.pdf');
    Route::get('/reports/export/csv', [ReportController::class, 'exportCSV'])->name('reports.export.csv');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
    Route::get('/admin/users/{user}/transactions', [UserController::class, 'showTransactions'])->name('admin.transactions');
    
});

// Route::middleware('auth', 'CheckIfAdmin')->group(function () {
//     Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
//     Route::get('/admin/users/{user}/transactions', [UserController::class, 'showTransactions'])->name('admin.transactions');
// });





