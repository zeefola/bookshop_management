<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::paginate(10);
        return view('stock.list_stock')
            ->with('stocks', $stocks);
    }

    public function create()
    {
        return view('stock.add_stock');
    }

    public function store()
    {
        //Validate what's coming in
        $this->validate(request(), array(
            'book_id' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'stock_date' => 'required'
        ));

        $stock = new Stock();
        $stock->book_id = request()->book_id;
        $stock->quantity = request()->quantity;
        $stock->price = request()->price;
        $stock->stock_date = request()->stock_date;
        $stock->save();

        session()->flash('success_report', 'Stock Added Successfully');
        return back();
    }

    public function edit($id)
    {
        $stock = Stock::find($id);
        return view('stock.edit_stock')
            ->with('stock', $stock);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $stock = Stock::find($id);
        $stock->book_id = request()->book_id;
        $stock->quantity = request()->quantity;
        $stock->price = request()->price;
        $stock->save();

        session()->flash('success_report', 'Stock Updated Successfully');
        return back();
    }

    public function delete($id)
    {
        /** Find and delete it */
        $stock = Stock::find($id);
        $stock->delete();

        return redirect('/stocks');
    }
}