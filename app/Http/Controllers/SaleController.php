<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Http\Requests\SaleRequest;

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

    public function store(SaleRequest $request)
    {
        //Validate what's coming in
        $validatedData = $request->validated();

        $sale = new Sale();
        $sale->book_id = $validatedData['book_id'];
        $sale->customer_id = $validatedData['customer_id'];
        $sale->employee_id = $validatedData['employee_id'];
        $sale->quantity = $validatedData['quantity'];
        $sale->price = $validatedData['price'];
        $sale->sales_date = $validatedData['sales_date'];
        $sale->user_id = auth()->user()->id;
        $sale->save();

        session()->flash('success_report', 'Sale Added Successfully');
        return back();
    }

    public function edit(Sale $sale)
    {
        // $sale = Sale::find($id);
        return view('sale.edit_sale')
            ->with('sale', $sale);
    }

    public function update(SaleRequest $request, Sale $sale)
    {

        //Validate what's coming in
        $validatedData = $request->validated();

        $sale->book_id = $validatedData['book_id'];
        $sale->quantity = $validatedData['quantity'];
        $sale->price = $validatedData['price'];
        $sale->save();

        session()->flash('success_report', 'Sales Updated Successfully');
        return back();
    }

    public function delete(Sale $sale)
    {
        /** delete the record */
        $sale->delete();

        return redirect('/sales');
    }
}