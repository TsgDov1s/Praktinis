@extends('layouts.app')

@section('content')
    <h1>Finansinė suvestinė</h1>

    <p><strong>📥 Pajamos:</strong> {{ number_format($incomeTotal, 2) }} €</p>
    <p><strong>📤 Išlaidos:</strong> {{ number_format($expenseTotal, 2) }} €</p>
    <p><strong>💼 Likutis:</strong> 
        <span style="color: {{ $balance >= 0 ? 'green' : 'red' }}">
            {{ number_format($balance, 2) }} €
        </span>
    </p>

    <a href="{{ route('transactions.index') }}">➡️ Peržiūrėti transakcijas</a>
@endsection
