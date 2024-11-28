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

    public function exportPDF()
    {
        $userId = Auth::id();
        $totalCredits = Transaction::where('user_id', $userId)->where('type', 'credit')->sum('amount');
        $totalDebits = Transaction::where('user_id', $userId)->where('type', 'debit')->sum('amount');
        $remainingBalance = $totalCredits - $totalDebits;

        $pdf = Pdf::loadView('reports.pdf', compact('totalCredits', 'totalDebits', 'remainingBalance'));
        return $pdf->download('summary_report.pdf');
    }

    public function exportCSV()
    {
        $userId = Auth::id();
        $totalCredits = Transaction::where('user_id', $userId)->where('type', 'credit')->sum('amount');
        $totalDebits = Transaction::where('user_id', $userId)->where('type', 'debit')->sum('amount');
        $remainingBalance = $totalCredits - $totalDebits;

        $fileName = 'summary_report.csv';
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $columns = ['Total Credits', 'Total Debits', 'Remaining Balance'];

        $callback = function() use ($totalCredits, $totalDebits, $remainingBalance, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            $data = [$totalCredits, $totalDebits, $remainingBalance];
            fputcsv($file, $data);

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
