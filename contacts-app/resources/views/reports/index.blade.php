@extends('layouts.app')

@section('content')
    <h1>📊 Finansų ataskaita</h1>

    <form method="GET">
        <label>Laikotarpis nuo:</label>
        <input type="date" name="start_date" value="{{ $start }}">
        <label>iki:</label>
        <input type="date" name="end_date" value="{{ $end }}">
        <button type="submit">Filtruoti</button>
    </form>

    <hr>

    <h2>📥 Pajamos</h2>
    <ul>
        <li><strong>Suma:</strong> {{ number_format($incomeSum, 2) }} €</li>
        <li><strong>Mažiausia:</strong> {{ number_format($incomeStats['min'], 2) }} €</li>
        <li><strong>Didžiausia:</strong> {{ number_format($incomeStats['max'], 2) }} €</li>
        <li><strong>Vidurkis:</strong> {{ number_format($incomeStats['avg'], 2) }} €</li>
    </ul>

    <h2>📤 Išlaidos</h2>
    <ul>
        <li><strong>Suma:</strong> {{ number_format($expenseSum, 2) }} €</li>
        <li><strong>Mažiausia:</strong> {{ number_format($expenseStats['min'], 2) }} €</li>
        <li><strong>Didžiausia:</strong> {{ number_format($expenseStats['max'], 2) }} €</li>
        <li><strong>Vidurkis:</strong> {{ number_format($expenseStats['avg'], 2) }} €</li>
    </ul>

    <h2>📂 Sumos pagal kategorijas</h2>
    <table border="1" cellpadding="5">
        <tr>
            <th>Kategorija</th>
            <th>Suma (€)</th>
        </tr>
        @foreach($byCategory as $category => $sum)
            <tr>
                <td>{{ $category }}</td>
                <td>{{ number_format($sum, 2) }}</td>
            </tr>
        @endforeach
    </table>
@endsection
