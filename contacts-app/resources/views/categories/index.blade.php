@extends('layouts.app')

@section('content')
    <h1>Kategorijų sąrašas</h1>

    <a href="{{ route('categories.create') }}">+ Nauja kategorija</a>

    @if(session('success'))
        <div style="color:green">{{ session('success') }}</div>
    @endif

    <table border="1" cellpadding="5" style="margin-top:15px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pavadinimas</th>
                <th>Tipas</th>
                <th>Veiksmai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->type == 'income' ? 'Pajamos' : 'Išlaidos' }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category) }}">Redaguoti</a> |
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Ar tikrai trinti?')">Trinti</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
