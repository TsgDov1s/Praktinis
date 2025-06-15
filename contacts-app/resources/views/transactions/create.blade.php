@extends('layouts.app')

@section('content')
    <h1>Pridėti naują transakciją</h1>

    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf
        <label>Data:</label><br>
        <input type="date" name="date" value="{{ old('date') }}" required><br><br>

        <label>Kategorija:</label><br>
        <select name="category_id" required>
            <option value="">Pasirinkite kategoriją</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }} ({{ $category->type == 'income' ? 'Pajamos' : 'Išlaidos' }})
                </option>
            @endforeach
        </select><br><br>

        <label>Suma (€):</label><br>
        <input type="number" step="0.01" name="amount" value="{{ old('amount') }}" required><br><br>

        <label>Aprašymas:</label><br>
        <textarea name="description">{{ old('description') }}</textarea><br><br>

        <button type="submit">Išsaugoti</button>
    </form>
@endsection
