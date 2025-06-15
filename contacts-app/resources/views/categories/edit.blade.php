@extends('layouts.app')

@section('content')
    <h1>Redaguoti kategoriją</h1>

    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Pavadinimas:</label><br>
        <input type="text" name="name" value="{{ old('name', $category->name) }}" required><br><br>

        <label>Tipas:</label><br>
        <select name="type" required>
            <option value="income" {{ (old('type', $category->type) == 'income') ? 'selected' : '' }}>Pajamos</option>
            <option value="expense" {{ (old('type', $category->type) == 'expense') ? 'selected' : '' }}>Išlaidos</option>
        </select><br><br>

        <button type="submit">Atnaujinti</button>
    </form>
@endsection
