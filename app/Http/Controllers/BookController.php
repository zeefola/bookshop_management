<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(10);
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
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address' => 'required',
            'email' => 'required|email',
            'gender' => 'required'
        ));

        $book = new Book();
        $book->first_name = request()->first_name;
        $book->last_name = request()->last_name;
        $book->phone_number = request()->phone_number;
        $book->address = request()->address;
        $book->email = request()->email;
        $book->gender = request()->gender;
        $book->save();

        session()->flash('success_report', 'book Added Successfully');
        return back();
    }

    public function edit($id)
    {
        $book = Book::find($id);
        return view('book.edit_book')
            ->with('book', $book);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $book = Book::find($id);
        $book->first_name = request()->first_name;
        $book->last_name = request()->last_name;
        $book->phone_number = request()->phone_number;
        $book->address = request()->address;
        $book->email = request()->email;
        $book->gender = request()->gender;
        $book->save();

        session()->flash('success_report', 'book Updated Successfully');
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