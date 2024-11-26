<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $categories = Category::all();
        return view('admin.index', compact('books', 'categories'));
    }

    public function createBook()
    {
        $categories = Category::all();
        return view('admin.createBook', compact('categories'));
    }

    public function storeBook(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        Book::create($request->all());

        return redirect()->route('admin.index')->with('success', 'Book added successfully.');
    }

    public function createCategory()
    {
        return view('admin.createCategory');
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
        ]);

        Category::create($request->all());

        return redirect()->route('admin.index')->with('success', 'Category added successfully.');
    }
}

