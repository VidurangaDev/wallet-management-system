<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/transaction/view', function () {
        return view('transaction');
    })->name('transaction');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/wallet', [WalletController::class, 'showBalance'])->name('wallet.balance');
    Route::post('/wallet/add', [WalletController::class, 'addMoney'])->name('wallet.add');
    Route::post('/wallet/deduct', [WalletController::class, 'deductMoney'])->name('wallet.deduct');
});

Route::middleware('auth')->group(function () {
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
});

