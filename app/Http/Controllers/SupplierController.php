<?php

namespace App\Http\Controllers;

use App\Supplier;
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
        $validatedData = $request->validated();

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

    public function edit(Supplier $supplier)
    {
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

    public function destroy(Supplier $supplier)
    {

        $supplier->delete();
        session()->flash('failure_report', 'Supplier Deleted Successfully');
        return back();
    }
}