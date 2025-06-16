@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row gap-8">
        <!-- Main Content -->
        <div class="md:w-3/4">
            <div class="bg-white rounded-xl shadow-md p-6 mb-6">
                <h1 class="text-2xl font-bold text-gray-800 mb-6">Finansinė suvestinė</h1>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                    <!-- Income Card -->
                    <div class="bg-green-50 p-4 rounded-lg border-l-4 border-green-500">
                        <h3 class="text-sm font-medium text-gray-600 mb-1">Pajamos</h3>
                        <p class="text-2xl font-bold text-green-600">{{ number_format($incomeTotal, 2) }} €</p>
                    </div>
                    
                    <!-- Expense Card -->
                    <div class="bg-red-50 p-4 rounded-lg border-l-4 border-red-500">
                        <h3 class="text-sm font-medium text-gray-600 mb-1">Išlaidos</h3>
                        <p class="text-2xl font-bold text-red-600">{{ number_format($expenseTotal, 2) }} €</p>
                    </div>
                    
                    <!-- Balance Card -->
                    <div class="bg-blue-50 p-4 rounded-lg border-l-4 {{ $balance >= 0 ? 'border-blue-500' : 'border-red-500' }}">
                        <h3 class="text-sm font-medium text-gray-600 mb-1">Likutis</h3>
                        <p class="text-2xl font-bold {{ $balance >= 0 ? 'text-blue-600' : 'text-red-600' }}">
                            {{ number_format($balance, 2) }} €
                        </p>
                    </div>
                </div>
                
                <!-- Navigation Squares -->
                <div class="grid grid-cols-2 gap-4">
                    <a href="{{ route('transactions.index') }}" class="flex items-center justify-center p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-50 transition-colors">
                        <div class="text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto text-indigo-600 mb-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 0v12h8V4H6z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm font-medium text-gray-700">Peržiūrėti transakcijas</span>
                        </div>
                    </a>
                    
                    <a href="{{ route('categories.index') }}" class="flex items-center justify-center p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-50 transition-colors">
                        <div class="text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto text-indigo-600 mb-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M17 10a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h10a2 2 0 012 2v5zM5 5h10v5H5V5z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm font-medium text-gray-700">Peržiūrėti kategorijas</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Sidebar -->
        <div class="md:w-1/4">
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="flex items-center mb-4">
                    <div class="bg-indigo-100 p-2 rounded-full mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-800">{{ Auth::user()->name }}</h3>
                </div>
                
                <div class="border-t border-gray-200 pt-4">
                    <a href="" class="block py-2 text-gray-600 hover:text-indigo-600">Profilis</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block py-2 text-gray-600 hover:text-indigo-600 w-full text-left">Atsijungti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection