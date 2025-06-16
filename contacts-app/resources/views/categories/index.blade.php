@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-xl font-semibold text-gray-800">Kategorijų sąrašas</h1>
        <a href="{{ route('categories.create') }}" 
           class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Nauja kategorija
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-3 mb-6 text-sm rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-3 py-2 text-xs text-gray-600">ID</th>
                    <th class="px-3 py-2 text-xs text-gray-600">Pavadinimas</th>
                    <th class="px-3 py-2 text-xs text-gray-600">Tipas</th>
                    <th class="px-3 py-2 text-xs text-gray-600">Veiksmai</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($categories as $category)
                <tr class="hover:bg-gray-50">
                    <td class="px-3 py-2 text-sm text-center text-gray-700">{{ $category->id }}</td>
                    <td class="px-3 py-2 text-sm text-center text-gray-700">{{ $category->name }}</td>
                    <td class="px-3 py-2 text-sm text-center">
                        <span class="{{ $category->type == 'income' ? 'text-green-600' : 'text-red-600' }}">
                            {{ $category->type == 'income' ? 'Pajamos' : 'Išlaidos' }}
                        </span>
                    </td>
                    <td class="px-3 py-2 text-sm text-center">
                        <a href="{{ route('categories.edit', $category) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Redaguoti</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Ar tikrai norite ištrinti šią kategoriją?')">Trinti</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection