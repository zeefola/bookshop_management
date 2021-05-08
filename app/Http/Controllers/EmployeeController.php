<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
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

    public function store(EmployeeRequest $request)
    {
        //Validate what's coming in
        $validatedData = $request->validated();

        $employee = new Employee();
        $employee->first_name = $validatedData['first_name'];
        $employee->last_name = $validatedData['last_name'];
        $employee->phone_number = $validatedData['phone_number'];
        $employee->address = $validatedData['address'];
        $employee->email = $validatedData['email'];
        $employee->gender = $validatedData['gender'];
        $employee->user_id = auth()->user()->id;
        $employee->save();

        session()->flash('success_report', 'Employee Added Successfully');
        return back();
    }

    public function edit(Employee $employee)
    {
        // $employee = Employee::find($id);
        return view('employee.edit_employee')
            ->with('employee', $employee);
    }

    public function update(EmployeeRequest $request, Employee $employee)
    {
        //Validate what's coming in
        $validatedData = $request->validated();

        $employee->first_name = $validatedData['first_name'];
        $employee->last_name = $validatedData['last_name'];
        $employee->phone_number = $validatedData['phone_number'];
        $employee->address = $validatedData['address'];
        $employee->email = $validatedData['email'];
        $employee->gender = $validatedData['gender'];
        $employee->save();

        session()->flash('success_report', 'Employee Updated Successfully');
        return back();
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        session()->flash('failure_report', 'Employee Deleted Successfully');
        return back();
    }
}