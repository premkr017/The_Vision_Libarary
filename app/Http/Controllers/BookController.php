<?php
namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // 1. READ - Sab books dikhana
    public function index()
    {
        $books = Book::latest()->paginate(10);
        return view('books.index', compact('books'));
    }

    // 2. CREATE - Add Book ka form dikhana
    public function create()
    {
        return view('books.create');
    }

    // 3. STORE - Form se data DB me save karna
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'isbn' => 'required|unique:books',
            'quantity' => 'required|integer|min:1'
        ]);

        Book::create($request->all());
        return redirect()->route('books.index')->with('success','Book add ho gayi!');
    }

    // 4. EDIT - Edit form dikhana
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    // 5. UPDATE - Update karke save
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'isbn' => 'required|unique:books,isbn,'.$book->id,
            'quantity' => 'required|integer|min:1'
        ]);

        $book->update($request->all());
        return redirect()->route('books.index')->with('success','Book update ho gayi!');
    }

    // 6. DELETE
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success','Book delete ho gayi!');
    }
}
