@extends('layouts.app')

@section('content')
    <h1>Pridėti kategoriją</h1>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <label>Pavadinimas:</label><br>
        <input type="text" name="name" value="{{ old('name') }}" required><br><br>

        <label>Tipas:</label><br>
        <select name="type" required>
            <option value="">Pasirinkite tipą</option>
            <option value="income" {{ old('type') == 'income' ? 'selected' : '' }}>Pajamos</option>
            <option value="expense" {{ old('type') == 'expense' ? 'selected' : '' }}>Išlaidos</option>
        </select><br><br>

        <button type="submit">Išsaugoti</button>
    </form>
@endsection
