<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\DB;

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
});

Route::middleware(['auth'])->group(function () {
    Route::get('/wallet', [WalletController::class, 'showBalance'])->name('components.wallet');
    Route::post('/wallet/add', [WalletController::class, 'addMoney'])->name('wallet.add');
    Route::post('/wallet/deduct', [WalletController::class, 'deductMoney'])->name('wallet.deduct');
});
