<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Book;
use App\Http\Requests\BookRequest;
use App\Exports\BooksExport;
use Maatwebsite\Excel\Facades\Excel;

class BookController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function exportable()
    {
        return Excel::download(new BooksExport, 'Books Report.xlsx');
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

        $book = new Book();
        $book->book_title = $validatedData['book_title'];
        $book->author_id = $validatedData['author_id'];
        $book->publisher_id = $validatedData['publisher_id'];
        $book->book_edition = $validatedData['book_edition'];
        //Store Image
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            //Get file Name
            $fileName = $request->image->getClientOriginalName();
            //Specify where file should store
            $request->image->storeAs('books', $fileName, 'public');

            $book->image = $fileName;
        }
        $book->isbn_number = $validatedData['isbn_number'];
        $book->published_date = $validatedData['published_date'];
        $book->published_country = $validatedData['published_country'];
        $book->user_id = auth()->user()->id;
        $book->save();

        session()->flash('success_report', 'Book Added Successfully');
        return back();
    }

    public function edit(Book $book)
    {
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
        //Store Image
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            //Get file Name
            $fileName = $request->image->getClientOriginalName();
            //Specify where file should store
            $request->image->storeAs('books', $fileName, 'public');

            $book->image = $fileName;
        }
        $book->isbn_number = $validatedData['isbn_number'];
        $book->published_date = $validatedData['published_date'];
        $book->published_country = $validatedData['published_country'];
        $book->save();

        session()->flash('success_report', 'Book Updated Successfully');
        return back();
    }

    public function destroy(Book $book)
    {
        $book->delete();
        session()->flash('failure_report', 'Book Deleted Successfully');
        return back();
    }
}