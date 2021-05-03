<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Author;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $authors = auth()->user()->authors()->latest()->paginate(10);
        return view('author.list_author')
            ->with('authors', $authors);
    }

    public function create()
    {
        return view('author.add_author');
    }

    public function store(AuthorRequest $request)
    {
        //Validate what's coming in
        $validatedData = $request->validated();

        $author = new Author();
        $author->first_name = $validatedData['first_name'];
        $author->last_name = $validatedData['last_name'];
        $author->user_id = auth()->user()->id;
        $author->save();

        session()->flash('success_report', 'Author Added Successfully');
        return back();
    }

    public function edit(Author $author)
    {
        // $author = Author::find($id);
        return view('author.edit_author')
            ->with('author', $author);
    }

    public function update(AuthorRequest $request, Author $author)
    {
        //Validate what's coming in
        $validatedData = $request->validated();

        $author->first_name = $validatedData['first_name'];
        $author->last_name = $validatedData['last_name'];
        $author->user_id = auth()->user()->id;
        $author->save();

        session()->flash('success_report', 'Author Updated Successfully');
        return back();
    }

    public function delete(Author $author)
    {
        /** Find and delete it */
        // $author = Author::find($id);
        $author->delete();
        return redirect('/authors');
    }
}