<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $incomeTotal = Transaction::where('user_id', $userId)
            ->whereHas('category', fn($q) => $q->where('type', 'income'))
            ->sum('amount');

        $expenseTotal = Transaction::where('user_id', $userId)
            ->whereHas('category', fn($q) => $q->where('type', 'expense'))
            ->sum('amount');

        $balance = $incomeTotal - $expenseTotal;

        return view('dashboard', compact('incomeTotal', 'expenseTotal', 'balance'));
    }
}
