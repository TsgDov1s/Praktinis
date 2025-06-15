<?php

use App\Models\TransactionCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionCategoryController extends Controller
{
    public function index()
    {
        $categories = TransactionCategory::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:income,expense',
        ]);

        TransactionCategory::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Kategorija sukurta!');
    }

    public function edit(TransactionCategory $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, TransactionCategory $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:income,expense',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Kategorija atnaujinta!');
    }

    public function destroy(TransactionCategory $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Kategorija ištrinta!');
    }
}