<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wallet;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{

    public function showBalance()
    {
        $wallet = Auth::user()->wallet;
        //dd($wallet);

        return view('dashboard', compact('wallet'));
    }

    public function addMoney(Request $request)
    {
        $request->validate(['amount' => 'required|numeric|min:1']);

        $wallet = Auth::user()->wallet;
        $wallet->balance += $request->amount;
        $wallet->save();

        Transaction::create([
            'user_id' => Auth::id(),
            'type' => 'debit',
            'amount' => $request->amount,
            'transaction_date' => now()
        ]);

        return redirect()->back()->with('success', 'Money added successfully!');
    }

    public function deductMoney(Request $request)
    {
        $request->validate(['amount' => 'required|numeric|min:1']);

        $wallet = Auth::user()->wallet;
        if ($wallet->balance < $request->amount) {
            return redirect()->back()->with('error', 'Insufficient balance!');
        }

        $wallet->balance -= $request->amount;
        $wallet->save();

        Transaction::create([
            'user_id' => Auth::id(),
            'type' => 'credit',
            'amount' => $request->amount,
            'transaction_date' => now()
        ]);

        return redirect()->back()->with('success', 'Money deducted successfully!');
    }
}
