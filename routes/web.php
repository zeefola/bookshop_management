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
// Route::middleware('auth')->group(function () {

//Dashboard Route
Route::get('/dashboard', 'HomeController@index');

// Stocks Route
Route::get('/stocks', 'StockController@index');
Route::get('/create-stock', 'StockController@create');
Route::post('/add-stock', 'StockController@store');
Route::get('/edit-stock/{stock}', 'StockController@edit');
Route::post('/update-stock/{stock}', 'StockController@update');
Route::get('/delete-stock/{stock}', 'StockController@delete');

// Authors Route
Route::get('/authors', 'AuthorController@index');
Route::get('/create-author', 'AuthorController@create');
Route::post('/add-author', 'AuthorController@store');
Route::get('/edit-author/{author}', 'AuthorController@edit');
Route::post('/update-author/{author}', 'AuthorController@update');
Route::get('/delete-author/{author}', 'AuthorController@delete');

// Books Route
Route::get('/books', 'BookController@index');
Route::get('/create-book', 'BookController@create');
Route::post('/add-book', 'BookController@store');
Route::get('/edit-book/{book}', 'BookController@edit');
Route::post('/update-book/{book}', 'BookController@update');
Route::get('/delete-book/{book}', 'BookController@delete');

// Customers Route
Route::get('/customers', 'CustomerController@index');
Route::get('/create-customer', 'CustomerController@create');
Route::post('/add-customer', 'CustomerController@store');
Route::get('/edit-customer/{id}', 'CustomerController@edit');
Route::post('/update-customer/{id}', 'CustomerController@update');
Route::get('/delete-customer/{id}', 'CustomerController@delete');

// Employees Route
Route::get('/employees', 'EmployeeController@index');
Route::get('/create-employee', 'EmployeeController@create');
Route::post('/add-employee', 'EmployeeController@store');
Route::get('/edit-employee/{id}', 'EmployeeController@edit');
Route::post('/update-employee/{id}', 'EmployeeController@update');
Route::get('/delete-employee/{id}', 'EmployeeController@delete');

// Publishers Route
Route::get('/publishers', 'PublisherController@index');
Route::get('/create-publisher', 'PublisherController@create');
Route::post('/add-publisher', 'PublisherController@store');
Route::get('/edit-publisher/{id}', 'PublisherController@edit');
Route::post('/update-publisher/{id}', 'PublisherController@update');
Route::get('/delete-publisher/{id}', 'PublisherController@delete');

// Sales Route
Route::get('/sales', 'SaleController@index');
Route::get('/create-sale', 'SaleController@create');
Route::post('/add-sale', 'SaleController@store');
Route::get('/edit-sale/{id}', 'SaleController@edit');
Route::post('/update-sale/{id}', 'SaleController@update');
Route::get('/delete-sale/{id}', 'SaleController@delete');

// Suppliers Route
Route::get('/suppliers', 'SupplierController@index');
Route::get('/create-supplier', 'SupplierController@create');
Route::post('/add-supplier', 'SupplierController@store');
Route::get('/edit-supplier/{id}', 'SupplierController@edit');
Route::post('/update-supplier/{id}', 'SupplierController@update');
Route::get('/delete-supplier/{id}', 'SupplierController@delete');
// });