<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();

        $start = $request->input('start_date', now()->startOfMonth()->toDateString());
        $end = $request->input('end_date', now()->endOfMonth()->toDateString());

        $transactions = Transaction::with('category')
            ->where('user_id', $userId)
            ->whereBetween('date', [$start, $end])
            ->get();

        // Pajamos
        $income = $transactions->filter(fn($t) => $t->category->type === 'income');
        $incomeSum = $income->sum('amount');
        $incomeStats = [
            'min' => $income->min('amount'),
            'max' => $income->max('amount'),
            'avg' => $income->avg('amount'),
        ];

        // Išlaidos
        $expense = $transactions->filter(fn($t) => $t->category->type === 'expense');
        $expenseSum = $expense->sum('amount');
        $expenseStats = [
            'min' => $expense->min('amount'),
            'max' => $expense->max('amount'),
            'avg' => $expense->avg('amount'),
        ];

        // Sumos pagal kategorijas
        $byCategory = $transactions->groupBy('category.name')->map(function ($group) {
            return $group->sum('amount');
        });

        return view('reports.index', compact(
            'start', 'end',
            'incomeSum', 'expenseSum',
            'incomeStats', 'expenseStats',
            'byCategory'
        ));
    }
}
