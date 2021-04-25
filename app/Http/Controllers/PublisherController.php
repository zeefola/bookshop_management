<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publisher;

class PublisherController extends Controller
{
    public function index()
    {
        $publishers = Publisher::all();
        return view('publisher.list_publisher')
            ->with('publishers', $publishers);
    }
    public function create()
    {
        return view('publisher.add_publisher');
    }

    public function store()
    {
        //Validate what's coming in
        $this->validate(request(), array(
            'publisher_name' => 'required',
        ));

        $publisher = new Publisher();
        $publisher->publisher_name = request()->publisher_name;
        $publisher->save();

        session()->flash('success_report', 'Publisher Added Successfully');
        return back();
    }

    public function edit($id)
    {
        $publisher = Publisher::find($id);
        return view('publisher.edit_publisher')
            ->with('publisher', $publisher);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $publisher = Publisher::find($id);
        $publisher->publisher_name = request()->publisher_name;
        $publisher->save();

        session()->flash('success_report', 'Publisher Updated Successfully');
        return back();
    }

    public function delete($id)
    {
        /** Find and delete it */
        $publisher = Publisher::find($id);
        $publisher->delete();

        return redirect('/publishers');
    }
}