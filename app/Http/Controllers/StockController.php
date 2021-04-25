<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::all();
        return view('stock.list_stock')
            ->with('stocks', $stocks);
    }
}