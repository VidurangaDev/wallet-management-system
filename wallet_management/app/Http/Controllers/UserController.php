<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.user', compact('users'));
    }


    public function showTransactions(User $user)
    {
        $transactions = $user->transactions()->orderBy('created_at', 'desc')->get();
        //$transactions = $user->transactions()->paginate(10);
        return view('admin.transaction', compact('user', 'transactions'));
    }
}
