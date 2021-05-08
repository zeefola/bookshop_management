<?php

namespace App\Http\Controllers;

use App\Stock;
use App\Http\Requests\StockRequest;

class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $stocks = auth()->user()->stocks()->latest()->paginate(10);
        return view('stock.list_stock')
            ->with('stocks', $stocks);
    }

    public function create()
    {
        return view('stock.add_stock');
    }

    public function store(StockRequest $request)
    {
        //Validate what's coming in
        $validatedData = $request->validated();

        //Store data
        $stock = new Stock();
        $stock->book_id = $validatedData['book_id'];
        $stock->user_id = auth()->user()->id;
        $stock->quantity = $validatedData['quantity'];
        $stock->price = $validatedData['price'];
        $stock->stock_date = $validatedData['stock_date'];
        $stock->save();

        session()->flash('success_report', 'Stock Added Successfully');
        return back();
    }

    public function edit(Stock $stock)
    {
        // $stock = Stock::find($id);
        return view('stock.edit_stock')
            ->with('stock', $stock);
    }

    public function update(StockRequest $request, Stock $stock)
    {

        //Validate what's coming in
        $validatedData = $request->validated();

        $stock->book_id = $validatedData['book_id'];
        $stock->quantity = $validatedData['quantity'];
        $stock->price = $validatedData['price'];
        // $stock->stock_date = $validatedData['stock_date'];
        $stock->save();

        session()->flash('success_report', 'Stock Updated Successfully');
        return back();
    }

    public function destroy(Stock $stock)
    {
        $stock->delete();
        session()->flash('failure_report', 'Stock Deleted Successfully');
        return back();
    }
}