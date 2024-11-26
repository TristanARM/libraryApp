<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->get();
        return view('books.index', compact('books'));
    }

    public function borrow($id)
    {
        $book = Book::findOrFail($id);

        if ($book->is_borrowed) {
            return redirect()->route('books.index')->with('error', 'This book is already borrowed.');
        }

        return view('books.borrow', compact('book'));
    }

    public function borrowStore(Request $request, $id)
    {
        $request->validate([
            'borrower_name' => 'required',
            'due_at' => 'required|date',
        ]);

        $book = Book::findOrFail($id);
        $book->update(['is_borrowed' => true]);

        BorrowRecord::create([
            'book_id' => $book->id,
            'borrower_name' => $request->borrower_name,
            'borrowed_at' => now(),
            'due_at' => $request->due_at,
        ]);

        return redirect()->route('books.index')->with('success', 'Book borrowed successfully.');
    }
}

