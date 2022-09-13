<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return view('book.index', compact('books'));
    }

    public function create()
    {
        return view('book.create');
    }
    
    public function store(BookRequest $request)
    {
        if($request->cover) {
            $request->file('cover')->store('public/image/book');
        }

        $book = new Book();
        $book->cover = $request->cover ? $request->file('cover')->hashName() : NULL;
        $book->title = $request->title;
        $book->publish_year = $request->publish_year;
        $book->publisher = $request->publisher;
        $book->save();

        return redirect()->route('book.index');
    }
    
    public function show($id)
    {
        $book = Book::findOrFail($id);

        return view('book.show', compact('book'));
    }
    
    public function edit($id)
    {
        $book = Book::findOrFail($id);

        return view('book.edit', compact('book'));
    }
    
    public function update(BookRequest $request, $id)
    {
        $book = Book::findOrFail($id);
        if($request->cover) {
            Storage::delete('public/image/book/'.$book->cover);

            $request->file('cover')->store('public/image/book');
        }
        $book->cover = $request->cover ? $request->file('cover')->hashName() : $book->cover;
        $book->title = $request->title;
        $book->publish_year = $request->publish_year;
        $book->publisher = $request->publisher;
        $book->update();

        return redirect()->route('book.show', $book->id);
    }
    
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        if($book->cover) {
            Storage::delete('public/image/book/'.$book->cover);
        }
        $book->delete();

        return redirect()->route('book.index');
    }
}
