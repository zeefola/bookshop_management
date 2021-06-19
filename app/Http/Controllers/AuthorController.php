<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Author;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

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
        //Store Image
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            //Get file name
            $fileName = $request->image->getClientOriginalName();
            //Specify image storage folder
            $request->image->storeAs('authors', $fileName, 'public');

            $author->image = $fileName;
        }
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

        //Store Image
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            //Get Image Name
            $fileName = $request->image->getClientOriginalName();
            //Check if Author has image record, if yes Delete it
            if ($author->image) {
                $path = asset('storage/authors/' . $author->image);
                Storage::delete($path);
            }
            //Specify new mage storage path
            $request->image->storeAs('authors', $fileName, 'public');

            $author->image = $fileName;
        }
        $author->user_id = auth()->user()->id;
        $author->save();

        session()->flash('success_report', 'Author Updated Successfully');
        return back();
    }

    public function destroy(Author $author)
    {
        $author->delete();
        session()->flash('failure_report', 'Author Deleted Successfully');
        return back();
    }
}