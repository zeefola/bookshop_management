<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use GuzzleHttp\Middleware;
use App\Book;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $suppliers = auth()->user()->suppliers()->latest()->paginate();
        return view('supplier.list_supplier')
            ->with('suppliers', $suppliers);
    }

    public function create()
    {
        return view('supplier.add_supplier');
    }

    public function store()
    {
        //Validate what's coming in
        $this->validate(request(), array(
            'first_name' => 'required',
            'last_name' => 'required',
            'book_id' => 'required',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address' => 'required',
            // 'email' => 'required|email:rfc,dns',
            'email' => 'required|email',
        ));
        //Verify if there's a book record created by the user with that id before inserting record
        $verify_id = Book::where([
            ['id', request()->book_id],
            ['user_id', auth()->user()->id],
        ])->exists();

        if ($verify_id) {

            // return auth()->user()->id . 'The Book Id is:' . request()->book_id;
            //Store data
            $supplier = new Supplier();
            $supplier->first_name = request()->first_name;
            $supplier->last_name = request()->last_name;
            $supplier->book_id = request()->book_id;
            $supplier->phone_number = request()->phone_number;
            $supplier->address = request()->address;
            $supplier->email = request()->email;
            $supplier->user_id = auth()->user()->id;
            $supplier->save();

            session()->flash('success_report', 'Supplier Added Successfully');
            return back();
        }
        //Otherwise Show error message
        else {
            session()->flash('failure_report', 'BookID doesn\'t exist, Create a record & try again!!');
            return back()->withInput();
        }
    }

    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('supplier.edit_supplier')
            ->with('supplier', $supplier);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        //Validate what's coming in
        $this->validate(request(), array(
            'first_name' => 'required',
            'last_name' => 'required',
            'book_id' => 'required',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address' => 'required',
            'email' => 'required|email:rfc,dns',
        ));
        $supplier = Supplier::find($id);
        $supplier->first_name = request()->first_name;
        $supplier->last_name = request()->last_name;
        $supplier->book_id = request()->book_id;
        $supplier->phone_number = request()->phone_number;
        $supplier->address = request()->address;
        $supplier->email = request()->email;
        $supplier->save();

        session()->flash('success_report', 'Supplier Updated Successfully');
        return back();
    }

    public function delete($id)
    {
        /** Find and delete it */
        $supplier = Supplier::find($id);
        $supplier->delete();

        return redirect('/suppliers');
    }
}