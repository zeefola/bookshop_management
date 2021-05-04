<?php

namespace App\Http\Controllers;

use App\Supplier;
use App\Book;
use App\Http\Requests\SupplierRequest;

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

    public function store(SupplierRequest $request)
    {
        //Validate what's coming in
        $validatedData = $request > validated();

        //Verify if there's a book record created by the user with that id before inserting record
        $verify_id = Book::where([
            ['id', request()->book_id],
            ['user_id', auth()->user()->id],
        ])->exists();

        if ($verify_id) {
            //Store data
            $supplier = new Supplier();
            $supplier->first_name = $validatedData['first_name'];
            $supplier->last_name = $validatedData['last_name'];
            $supplier->book_id = $validatedData['book_id'];
            $supplier->phone_number = $validatedData['phone_number'];
            $supplier->address = $validatedData['address'];
            $supplier->email = $validatedData['email'];
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

    public function edit(Supplier $supplier)
    {
        // $supplier = Supplier::find($id);
        return view('supplier.edit_supplier')
            ->with('supplier', $supplier);
    }

    public function update(SupplierRequest $request, Supplier $supplier)
    {
        //Validate what's coming in
        $validatedData = $request->validated();

        $supplier->first_name = $validatedData['first_name'];
        $supplier->last_name = $validatedData['last_name'];
        $supplier->book_id = $validatedData['book_id'];
        $supplier->phone_number = $validatedData['phone_number'];
        $supplier->address = $validatedData['address'];
        $supplier->email = $validatedData['email'];
        $supplier->save();

        session()->flash('success_report', 'Supplier Updated Successfully');
        return back();
    }

    public function delete(Supplier $supplier)
    {
        /** Find and delete it */
        // $supplier = Supplier::find($id);
        $supplier->delete();

        return redirect('/suppliers');
    }
}