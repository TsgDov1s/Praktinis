@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-xl font-semibold text-gray-800">Transakcijų istorija</h1>
        <a href="{{ route('transactions.create') }}" 
           class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Nauja transakcija
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
                    <th class="px-3 py-2 text-xs text-gray-600">Data</th>
                    <th class="px-3 py-2 text-xs text-gray-600">Kategorija</th>
                    <th class="px-3 py-2 text-xs text-gray-600">Tipas</th>
                    <th class="px-3 py-2 text-xs text-gray-600">Suma</th>
                    <th class="px-3 py-2 text-xs text-gray-600">Aprašymas</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($transactions as $transaction)
                <tr class="hover:bg-gray-50">
                    <td class="px-3 py-2 text-sm text-center text-gray-700">{{ $transaction->date }}</td>
                    <td class="px-3 py-2 text-sm text-center text-gray-700">{{ $transaction->category->name }}</td>
                    <td class="px-3 py-2 text-sm text-center {{ $transaction->category->type == 'income' ? 'text-green-600' : 'text-red-600' }}">
                        {{ $transaction->category->type == 'income' ? 'Pajamos' : 'Išlaidos' }}
                    </td>
                    <td class="px-3 py-2 text-sm text-center font-medium {{ $transaction->category->type == 'income' ? 'text-green-600' : 'text-red-600' }}">
                        {{ number_format($transaction->amount, 2) }} €
                    </td>
                    <td class="px-3 py-2 text-sm text-center text-gray-700">{{ $transaction->description ?: '-' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-3 py-3 text-sm text-center text-gray-500">Nėra transakcijų</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection