@extends('layouts.app')

@section('content')
    <h1>Transakcijų istorija</h1>

    <a href="{{ route('transactions.create') }}">+ Nauja transakcija</a>

    @if(session('success'))
        <div style="color:green">{{ session('success') }}</div>
    @endif

    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>Data</th>
                <th>Kategorija</th>
                <th>Tipas</th>
                <th>Suma</th>
                <th>Aprašymas</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->date }}</td>
                    <td>{{ $transaction->category->name }}</td>
                    <td>{{ $transaction->category->type == 'income' ? 'Pajamos' : 'Išlaidos' }}</td>
                    <td style="color: {{ $transaction->category->type == 'income' ? 'green' : 'red' }}">
                        {{ number_format($transaction->amount, 2) }} €
                    </td>
                    <td>{{ $transaction->description }}</td>
                </tr>
            @empty
                <tr><td colspan="5">Nėra įrašų</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
