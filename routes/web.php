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

Route::get('/', function () {
    return view('dashboard');
});

// Stocks Route
Route::get('/stocks', 'StockController@index');

// Authors Route
Route::get('/authors', 'AuthorController@index');
Route::get('/create-author', 'AuthorController@create');
Route::post('/add-author', 'AuthorController@store');
Route::get('/edit-author/{id}', 'AuthorController@edit');
Route::post('/update-author/{id}', 'AuthorController@update');
Route::get('/delete-author/{id}', 'AuthorController@delete');

// Books Route
Route::get('/books', 'BookController@index');

// Customers Route
Route::get('/customers', 'CustomerController@index');

// Employees Route
Route::get('/employees', 'EmployeeController@index');

// Publishers Route
Route::get('/publishers', 'PublisherController@index');
Route::get('/create-publisher', 'PublisherController@create');
Route::post('/add-publisher', 'PublisherController@store');
Route::get('/edit-publisher/{id}', 'PublisherController@edit');
Route::post('/update-publisher/{id}', 'PublisherController@update');
Route::get('/delete-publisher/{id}', 'PublisherController@delete');

// Sales Route
Route::get('/sales', 'SaleController@index');

// Suppliers Route
Route::get('/suppliers', 'SupplierController@index');