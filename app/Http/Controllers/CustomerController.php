<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use App\Customer;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $customers = auth()->user()->customers()->latest()->paginate(10);
        return view('customer.list_customer')
            ->with('customers', $customers);
    }

    public function create()
    {
        return view('customer.add_customer');
    }

    public function store(CustomerRequest $request)
    {
        //Validate what's coming in
        $validatedData = $request->validated();

        $customer = new Customer();
        $customer->first_name = $validatedData['first_name'];
        $customer->last_name = $validatedData['last_name'];
        $customer->phone_number = $validatedData['phone_number'];
        $customer->address = $validatedData['address'];
        $customer->email = $validatedData['email'];
        $customer->gender = $validatedData['gender'];
        $customer->user_id = auth()->user()->id;
        $customer->save();

        session()->flash('success_report', 'Customer Added Successfully');
        return back();
    }

    public function edit(Customer $customer)
    {
        // $customer = Customer::find($id);
        return view('customer.edit_customer')
            ->with('customer', $customer);
    }

    public function update(CustomerRequest $request, Customer $customer)
    {
        //Validate what's coming in
        $validatedData = $request->validated();

        $customer->first_name = $validatedData['first_name'];
        $customer->last_name = $validatedData['last_name'];
        $customer->phone_number = $validatedData['phone_number'];
        $customer->address = $validatedData['address'];
        $customer->email = $validatedData['email'];
        $customer->gender = $validatedData['gender'];
        $customer->save();

        session()->flash('success_report', 'Customer Updated Successfully');
        return back();
    }

    public function delete(Customer $customer)
    {
        /** Find and delete it */
        // $customer = Customer::find($id);
        $customer->delete();

        return redirect('/customers');
    }
}