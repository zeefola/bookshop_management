<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clear', function () {
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return view('welcome');
});

// Application Routes

Route::middleware('auth')->group(function () {
    //Dashboard Route
    Route::get('/dashboard', 'HomeController@index');

    // Books Route
    Route::post('/books-export', 'BookController@exportable')->name('books.export');
    Route::resource('book', 'BookController');

    // Customers Route
    Route::resource('customer', 'CustomerController');

    // Employees Route
    Route::resource('employee', 'EmployeeController');

    // Publishers Route
    Route::resource('publisher', 'PublisherController');

    // Sales Route
    Route::resource('sale', 'SaleController');

    // Suppliers Route
    Route::resource('supplier', 'SupplierController');

    // Authors Route
    Route::resource('author', 'AuthorController', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);

    // Stocks Route
    Route::resource('stock', 'StockController');
});