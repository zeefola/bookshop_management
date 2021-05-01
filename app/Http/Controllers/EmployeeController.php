<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $employees = auth()->user()->employees()->latest()->paginate(10);
        return view('employee.list_employee')
            ->with('employees', $employees);
    }

    public function create()
    {
        return view('employee.add_employee');
    }

    public function store()
    {
        //Validate what's coming in
        $this->validate(request(), array(
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address' => 'required',
            'email' => 'required|email:rfc,dns',
            'gender' => 'required'
        ));

        $employee = new Employee();
        $employee->first_name = request()->first_name;
        $employee->last_name = request()->last_name;
        $employee->phone_number = request()->phone_number;
        $employee->address = request()->address;
        $employee->email = request()->email;
        $employee->gender = request()->gender;
        $employee->user_id = auth()->user()->id;
        $employee->save();

        session()->flash('success_report', 'Employee Added Successfully');
        return back();
    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('employee.edit_employee')
            ->with('employee', $employee);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        //Validate what's coming in
        $this->validate(request(), array(
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address' => 'required',
            'email' => 'required|email:rfc,dns',
            'gender' => 'required'
        ));
        $employee = Employee::find($id);
        $employee->first_name = request()->first_name;
        $employee->last_name = request()->last_name;
        $employee->phone_number = request()->phone_number;
        $employee->address = request()->address;
        $employee->email = request()->email;
        $employee->gender = request()->gender;
        $employee->save();

        session()->flash('success_report', 'Employee Updated Successfully');
        return back();
    }

    public function delete($id)
    {
        /** Find and delete it */
        $employee = employee::find($id);
        $employee->delete();

        return redirect('/employees');
    }
}