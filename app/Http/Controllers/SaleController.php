<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::paginate(10);
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

        $sale = new Sale();
        $sale->book_id = request()->book_id;
        $sale->customer_id = request()->customer_id;
        $sale->employee_id = request()->employee_id;
        $sale->quantity = request()->quantity;
        $sale->price = request()->price;
        $sale->sales_date = request()->sales_date;
        $sale->save();

        session()->flash('success_report', 'Sale Added Successfully');
        return back();
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