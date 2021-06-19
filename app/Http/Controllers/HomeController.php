<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $author = auth()->user()->authors->count();
        $book = auth()->user()->books->count();
        $employee = auth()->user()->employees->count();
        $customer = auth()->user()->customers->count();
        $stock = auth()->user()->stocks->sum('quantity');
        $sale = auth()->user()->sales->sum('quantity');
        $publisher = auth()->user()->publishers->count();
        $supplier = auth()->user()->suppliers->count();
        $current_stock = auth()->user()->stocks->sum('quantity') - auth()->user()->sales->sum('quantity');
        $sold_item = auth()->user()->sales->sum('price');
        return view('dashboard', compact(
            ['author', 'book', 'employee', 'customer', 'stock', 'sale', 'publisher', 'supplier', 'current_stock', 'sold_item']
        ));
    }
}