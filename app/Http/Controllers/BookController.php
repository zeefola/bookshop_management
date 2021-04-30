<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $books = auth()->user()->books()->paginate(10);
        return view('book.list_book')
            ->with('books', $books);
    }

    public function create()
    {
        return view('book.add_book');
    }

    public function store()
    {
        //Validate what's coming in
        $this->validate(request(), array(
            'book_title' => 'required',
            'author_id' => 'required',
            'publisher_id' => 'required',
            'book_edition' => 'required',
            'isbn_number' => 'required',
            'published_date' => 'required',
            'published_country'
        ));

        $book = new Book();
        $book->book_title = request()->book_title;
        $book->author_id = request()->author_id;
        $book->publisher_id = request()->publisher_id;
        $book->book_edition = request()->book_edition;
        $book->isbn_number = request()->isbn_number;
        $book->published_date = request()->published_date;
        $book->published_country = request()->published_country;
        $book->user_id = auth()->user()->id;
        $book->save();

        session()->flash('success_report', 'Book Added Successfully');
        return back();
    }

    public function edit($id)
    {
        $book = Book::find($id);
        return view('book.edit_book')
            ->with('book', $book);
    }

    public function update()
    {
        $id = request()->id;
        //Validate what's coming in
        $this->validate(request(), array(
            'book_title' => 'required',
            'author_id' => 'required',
            'publisher_id' => 'required',
            'book_edition' => 'required',
            'isbn_number' => 'required',
            'published_date' => 'required',
            'published_country'
        ));
        $book = Book::find($id);
        $book->book_title = request()->book_title;
        $book->author_id = request()->author_id;
        $book->publisher_id = request()->publisher_id;
        $book->book_edition = request()->book_edition;
        $book->isbn_number = request()->isbn_number;
        $book->published_date = request()->published_date;
        $book->published_country = request()->published_country;
        $book->save();

        session()->flash('success_report', 'Book Updated Successfully');
        return back();
    }

    public function delete($id)
    {
        /** Find and delete it */
        $book = Book::find($id);
        $book->delete();

        return redirect('/books');
    }
}