<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::all();
        return view('sale.list_sale')
            ->with('sales', $sales);
    }
}