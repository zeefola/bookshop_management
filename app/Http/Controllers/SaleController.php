<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\Book;
use App\Customer;
use App\Employee;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sales = auth()->user()->sales()->latest()->paginate(10);
        return view('sale.list_sale')
            ->with('sales', $sales);
    }

    public function create()
    {
        return view('sale.add_sale');
    }

    public function store()
    {
        //Validate what's coming in
        $this->validate(request(), array(
            'book_id' => 'required',
            'customer_id' => 'required',
            'employee_id' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'sales_date' => 'required'
        ));

        //Verify if there's a book, customer and employee record created by the user with that id before inserting record
        $verify_book = Book::where([
            ['id', request()->book_id],
            ['user_id', auth()->user()->id],
        ])->exists();

        $verify_customer = Customer::where([
            ['id', request()->customer_id],
            ['user_id', auth()->user()->id],
        ])->exists();

        $verify_employee = Employee::where([
            ['id', request()->employee_id],
            ['user_id', auth()->user()->id],
        ])->exists();
        if ($verify_book) {
            if ($verify_customer) {
                if ($verify_employee) {
                    $sale = new Sale();
                    $sale->book_id = request()->book_id;
                    $sale->customer_id = request()->customer_id;
                    $sale->employee_id = request()->employee_id;
                    $sale->quantity = request()->quantity;
                    $sale->price = request()->price;
                    $sale->sales_date = request()->sales_date;
                    $sale->user_id = auth()->user()->id;
                    $sale->save();

                    session()->flash('success_report', 'Sale Added Successfully');
                    return back();
                }
                //Otherwise Show error message
                else {
                    session()->flash('failure_report', 'EmployeeID doesn\'t exist, Create a record & try again!!');
                    return back()->withInput();
                }
            }
            //Otherwise Show error message
            else {
                session()->flash('failure_report', 'CustomerID doesn\'t exist, Create a record & try again!!');
                return back()->withInput();
            }
        }
        //Otherwise Show error message
        else {
            session()->flash('failure_report', 'BookID doesn\'t exist, Create a record & try again!!');
            return back()->withInput();
        }
    }

    public function edit($id)
    {
        $sale = Sale::find($id);
        return view('sale.edit_sale')
            ->with('sale', $sale);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        //Validate what's coming in
        $this->validate(request(), array(
            'book_id' => 'required',
            'customer_id' => 'required',
            'employee_id' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'sales_date' => 'required'
        ));
        $sale = Sale::find($id);
        $sale->book_id = request()->book_id;
        $sale->quantity = request()->quantity;
        $sale->price = request()->price;
        $sale->save();

        session()->flash('success_report', 'Sales Updated Successfully');
        return back();
    }

    public function delete($id)
    {
        /** Find and delete it */
        $sale = sale::find($id);
        $sale->delete();

        return redirect('/sales');
    }
}