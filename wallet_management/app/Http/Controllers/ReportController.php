<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function summary()
    {
        $userId = Auth::id();


        $totalCredits = Transaction::where('user_id', $userId)
            ->where('type', 'credit')
            ->sum('amount');


        $totalDebits = Transaction::where('user_id', $userId)
            ->where('type', 'debit')
            ->sum('amount');


        $remainingBalance = $totalDebits - $totalCredits ;


        return view('reports', compact('totalCredits', 'totalDebits', 'remainingBalance'));
    }
}
