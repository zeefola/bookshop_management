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
        return view('dashboard')
            ->with('author', $author)
            ->with('book', $book)
            ->with('employee', $employee)
            ->with('customer', $customer)
            ->with('stock', $stock)
            ->with('sale', $sale)
            ->with('publisher', $publisher)
            ->with('supplier', $supplier);
    }
}