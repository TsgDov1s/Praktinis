@extends('layouts.app')

@section('content')
    <h1>{{ isset($transaction) ? 'Redaguoti' : 'Nauja' }} transakcija</h1>

    <form method="POST" action="{{ isset($transaction) ? route('transactions.update', $transaction) : route('transactions.store') }}">
        @csrf
        @if(isset($transaction))
            @method('PUT')
        @endif

        <label for="category_id">Kategorija:</label>
        <select name="category_id" id="category_id" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    @if(isset($transaction) && $transaction->category_id == $category->id) selected @endif>
                    {{ $category->name }} ({{ $category->type }})
                </option>
            @endforeach
        </select><br>

        <label for="amount">Suma:</label>
        <input type="number" step="0.01" name="amount" value="{{ $transaction->amount ?? '' }}" required><br>

        <label for="date">Data:</label>
        <input type="date" name="date" value="{{ $transaction->date ?? now()->toDateString() }}" required><br>

        <label for="description">Aprašymas:</label>
        <textarea name="description">{{ $transaction->description ?? '' }}</textarea><br>

        <button type="submit">Išsaugoti</button>
    </form>
@endsection
