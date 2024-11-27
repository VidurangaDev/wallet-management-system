<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $query =Transaction::where('user_id', auth()->id());
        //dd($query);

        if ($request->filled('type')) {
            $query->where('type', $request->input('type'));
        }


        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('transaction_date', [
                $request->input('from_date'),
                $request->input('to_date')
            ]);
        }


        $transactions = $query->orderBy('transaction_date', 'desc')->paginate(10);
        //dd($transactions);
        return view('transaction', compact('transactions'));
    }
}
