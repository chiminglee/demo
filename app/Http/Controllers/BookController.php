<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $book = new Book();
        $book->title = $request->input("title");
        $book->author = $request->input("author");
        $book->description = $request->input("description");
        $book->published_at = $request->input("published_at");

        $book->save();
        $message = "新增成功";
        // $validatedData = $request->validate([
        //     'title' => 'required|max:255',
        //     'author' => 'required|max:255',
        //     'description' => 'required|max:2048',
        //     'published_at' => 'required|date',
        // ]);

        // $book = Book::create($validatedData);

        return redirect()->route('books.index', $book)->with("message", $message);
    }
    public function show(Book $book)
    {
        $book = Book::find($book->id);
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        
        $book->title = $request->input("title");
        $book->author = $request->input("author");
        $book->description = $request->input("description");
        $book->published_at = $request->input("published_at");

        $book->save();
        $message = "修改成功";
        // $validatedData = $request->validate([
        //     'title' => 'required|max:255',
        //     'author' => 'required|max:255',
        //     'description' => 'required|max:2048',
        //     'published_at' => 'required|date',
        // ]);

        // $book->update($validatedData);

        return redirect()->route('books.index', $book)->with("message", $message);
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index');
    }
}
