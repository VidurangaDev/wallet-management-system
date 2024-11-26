<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{

    public function showBalance()
    {
        // $wallet = Auth::user()->wallet;
        // return view('components.wallet', compact('wallet'));

        try {

            $wallet = DB::table('wallet')->get();
            dd($wallet);
            // return view('components.wallet', compact('wallet'));

        }
            catch (Exception $error) { dd($error); }
    }

    public function addMoney(Request $request)
    {
        $request->validate(['amount' => 'required|numeric|min:1']);

        $wallet = Auth::user()->wallet;
        $wallet->balance += $request->amount;
        $wallet->save();

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

        return redirect()->back()->with('success', 'Money deducted successfully!');
    }
}
