<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests\PublisherRequest;
use App\Publisher;

class PublisherController extends Controller
{
    public function index()
    {
        $publishers = auth()->user()->publishers()->latest()->paginate(10);
        return view('publisher.list_publisher')
            ->with('publishers', $publishers);
    }

    public function create()
    {
        return view('publisher.add_publisher');
    }

    public function store(PublisherRequest $request)
    {
        //Validate what's coming in
        $validatedData = $request->validated();

        $publisher = new Publisher();
        $publisher->publisher_name = $validatedData['publisher_name'];
        $publisher->user_id = auth()->user()->id;
        $publisher->save();

        session()->flash('success_report', 'Publisher Added Successfully');
        return back();
    }

    public function edit(Publisher $publisher)
    {
        // $publisher = Publisher::find($id);
        return view('publisher.edit_publisher')
            ->with('publisher', $publisher);
    }

    public function update(PublisherRequest $request, Publisher $publisher)
    {
        //Validate what's coming in
        $validatedData = $request->validated();

        $publisher->publisher_name = $validatedData['publisher_name'];
        $publisher->save();

        session()->flash('success_report', 'Publisher Updated Successfully');
        return back();
    }

    public function destroy(Publisher $publisher)
    {
        $publisher->delete();
        session()->flash('failure_report', 'Publisher Deleted Successfully');
        return back();
    }
}