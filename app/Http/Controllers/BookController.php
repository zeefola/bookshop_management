<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Book;
use App\Publisher;
use App\Author;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $books = auth()->user()->books()->latest()->paginate(10);
        return view('book.list_book')
            ->with('books', $books);
    }

    public function create()
    {
        return view('book.add_book');
    }

    public function store(BookRequest $request)
    {
        //Validate what's coming in
        $validatedData = $request->validated();

        //Verify if there's a publisher and author record created by the user with that id before inserting record
        $verify_publisher = Publisher::where([
            ['id', request()->publisher_id],
            ['user_id', auth()->user()->id],
        ])->exists();

        $verify_author = Author::where([
            ['id', request()->author_id],
            ['user_id', auth()->user()->id],
        ])->exists();

        if ($verify_author) {
            if ($verify_publisher) {
                $book = new Book();
                $book->book_title = $validatedData['book_title'];
                $book->author_id = $validatedData['author_id'];
                $book->publisher_id = $validatedData['publisher_id'];
                $book->book_edition = $validatedData['book_edition'];
                $book->isbn_number = $validatedData['isbn_number'];
                $book->published_date = $validatedData['published_date'];
                $book->published_country = $validatedData['published_country'];
                $book->user_id = auth()->user()->id;
                $book->save();

                session()->flash('success_report', 'Book Added Successfully');
                return back();
            }
            //Otherwise Show error message
            else {
                session()->flash('failure_report', 'PublisherID doesn\'t exist, Create a record & try again!!');
                return back()->withInput();
            }
        }
        //Otherwise Show error message
        else {
            session()->flash('failure_report', 'AuthorID doesn\'t exist, Create a record & try again!!');
            return back()->withInput();
        }
    }

    public function edit(Book $book)
    {
        // $book = Book::find($id);
        return view('book.edit_book')
            ->with('book', $book);
    }

    public function update(BookRequest $request, Book $book)
    {
        //Validate what's coming in
        $validatedData = $request->validated();

        $book->book_title = $validatedData['book_title'];
        $book->author_id = $validatedData['author_id'];
        $book->publisher_id = $validatedData['publisher_id'];
        $book->book_edition = $validatedData['book_edition'];
        $book->isbn_number = $validatedData['isbn_number'];
        $book->published_date = $validatedData['published_date'];
        $book->published_country = $validatedData['published_country'];
        $book->save();

        session()->flash('success_report', 'Book Updated Successfully');
        return back();
    }

    public function delete(Book $book)
    {
        /** Find and delete it */
        // $book = Book::find($id);
        $book->delete();

        return redirect('/books');
    }
}