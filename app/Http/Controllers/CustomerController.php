<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::paginate(10);
        return view('customer.list_customer')
            ->with('customers', $customers);
    }

    public function create()
    {
        return view('customer.add_customer');
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

        $customer = new Customer();
        $customer->first_name = request()->first_name;
        $customer->last_name = request()->last_name;
        $customer->phone_number = request()->phone_number;
        $customer->address = request()->address;
        $customer->email = request()->email;
        $customer->gender = request()->gender;
        $customer->save();

        session()->flash('success_report', 'Customer Added Successfully');
        return back();
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('customer.edit_customer')
            ->with('customer', $customer);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $customer = Customer::find($id);
        $customer->first_name = request()->first_name;
        $customer->last_name = request()->last_name;
        $customer->phone_number = request()->phone_number;
        $customer->address = request()->address;
        $customer->email = request()->email;
        $customer->gender = request()->gender;
        $customer->save();

        session()->flash('success_report', 'Customer Updated Successfully');
        return back();
    }

    public function delete($id)
    {
        /** Find and delete it */
        $customer = Customer::find($id);
        $customer->delete();

        return redirect('/customers');
    }
}