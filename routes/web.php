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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['middleware'=>'auth'],function(){

Route::prefix('users')->group(function(){
		Route::get('/view','Backend\UserController@view')->name('users.view');
		Route::get('/add','Backend\UserController@add')->name('users.add');
		Route::post('/store','Backend\UserController@store')->name('users.store');
		Route::get('/edit/{id}','Backend\UserController@edit')->name('users.edit');
		Route::post('/update/{id}','Backend\UserController@update')->name('users.update');
		Route::get('/delete/{id}','Backend\UserController@delete')->name('users.delete');
	});


	Route::prefix('profiles')->group(function(){
		Route::get('/view','Backend\ProfileController@view')->name('profiles.view');
		Route::get('/edit','Backend\ProfileController@edit')->name('profiles.edit');
		Route::post('/store','Backend\ProfileController@update')->name('profiles.update');
		Route::get('/password/view','Backend\ProfileController@passwordView')->name('profiles.password.view');
		Route::post('/password/update','Backend\ProfileController@passwordUpdate')->name('profiles.password.update');
	});



	Route::prefix('suppliers')->group(function(){
		Route::get('/view','Backend\SupplierController@view')->name('suppliers.view');
		Route::get('/add','Backend\SupplierController@add')->name('suppliers.add');
		Route::post('/store','Backend\SupplierController@store')->name('suppliers.store');
		Route::get('/edit/{id}','Backend\SupplierController@edit')->name('suppliers.edit');
		Route::post('/update/{id}','Backend\SupplierController@update')->name('suppliers.update');
		Route::get('/delete/{id}','Backend\SupplierController@delete')->name('suppliers.delete');
		
	});

	Route::prefix('customers')->group(function(){
		Route::get('/view','Backend\CustomerController@view')->name('customers.view');
		Route::get('/add','Backend\CustomerController@add')->name('customers.add');
		Route::post('/store','Backend\CustomerController@store')->name('customers.store');
		Route::get('/edit/{id}','Backend\CustomerController@edit')->name('customers.edit');
		Route::post('/update/{id}','Backend\CustomerController@update')->name('customers.update');
		Route::get('/delete/{id}','Backend\CustomerController@delete')->name('customers.delete');
		Route::get('/credit','Backend\CustomerController@credit')->name('customers.credit');
		Route::get('/credit/pdf','Backend\CustomerController@creditpdf')->name('customers.credit.pdf');
		Route::get('/invoice/edit/{invoice_id}','Backend\CustomerController@invoiceedit')->name('invoice.edit');
		Route::post('/invoice/update/{invoice_id}','Backend\CustomerController@invoiceupdate')->name('invoice.update');
		Route::get('/invoice/details/{invoice_id}','Backend\CustomerController@invoicedetails')->name('invoice.details');
		Route::get('/paid','Backend\CustomerController@paid')->name('customers.paid');
		Route::get('/paid/pdf','Backend\CustomerController@paidpdf')->name('customers.paid.pdf');
		Route::get('/customer/wise/report','Backend\CustomerController@customerswise')->name('customers.wise.report');
		Route::get('/customer/credit/report','Backend\CustomerController@customerscredit')->name('customers.credit.report');
		Route::get('/customer/paid/report','Backend\CustomerController@customerspaid')->name('customers.paid.report');

		
		
	});

	Route::prefix('units')->group(function(){
		Route::get('/view','Backend\UnitController@view')->name('units.view');
		Route::get('/add','Backend\UnitController@add')->name('units.add');
		Route::post('/store','Backend\UnitController@store')->name('units.store');
		Route::get('/edit/{id}','Backend\UnitController@edit')->name('units.edit');
		Route::post('/update/{id}','Backend\UnitController@update')->name('units.update');
		Route::get('/delete/{id}','Backend\UnitController@delete')->name('units.delete');
	});


	Route::prefix('categorys')->group(function(){
		Route::get('/view','Backend\CategoryCategory@view')->name('categorys.view');
		Route::get('/add','Backend\CategoryCategory@add')->name('categorys.add');
		Route::post('/store','Backend\CategoryCategory@store')->name('categorys.store');
		Route::get('/edit/{id}','Backend\CategoryCategory@edit')->name('categorys.edit');
		Route::post('/update/{id}','Backend\CategoryCategory@update')->name('categorys.update');
		Route::get('/delete/{id}','Backend\CategoryCategory@delete')->name('categorys.delete');
	});


	Route::prefix('products')->group(function(){
		Route::get('/view','Backend\ProductController@view')->name('products.view');
		Route::get('/add','Backend\ProductController@add')->name('products.add');
		Route::post('/store','Backend\ProductController@store')->name('products.store');
		Route::get('/edit/{id}','Backend\ProductController@edit')->name('products.edit');
		Route::post('/update/{id}','Backend\ProductController@update')->name('products.update');
		Route::get('/delete/{id}','Backend\ProductController@delete')->name('products.delete');
	});


	Route::prefix('purchases')->group(function(){
		Route::get('/view','Backend\PurchaseController@view')->name('puschases.view');
		Route::get('/add','Backend\PurchaseController@add')->name('puschases.add');
		Route::post('/store','Backend\PurchaseController@store')->name('puschases.store');
		Route::get('/pending','Backend\PurchaseController@pending')->name('puschases.pending');
		Route::get('/approve/{id}','Backend\PurchaseController@approve')->name('puschases.approve');
		Route::get('/delete/{id}','Backend\PurchaseController@delete')->name('puschases.delete');
		Route::get('/get/category','Backend\PurchaseController@getcategory')->name('get.category');
		Route::get('/get/product','Backend\PurchaseController@getproduct')->name('get.product');
		Route::get('/daily/purchases/report','Backend\PurchaseController@dailyreport')->name('daily.report.purchases');
		Route::get('/daily/purchases/pdf','Backend\PurchaseController@dailyreportpdf')->name('daily.purchases.pdf');
	});



	Route::prefix('invoices')->group(function(){
		Route::get('/view','Backend\InvoiceController@view')->name('invoices.view');
		Route::get('/add','Backend\InvoiceController@add')->name('invoices.add');
		Route::post('/store','Backend\InvoiceController@store')->name('invoices.store');
		Route::get('/pending','Backend\InvoiceController@pending')->name('invoices.pending');
		Route::get('/approve/{id}','Backend\InvoiceController@approve')->name('invoices.approve');
		Route::post('/approve/store/{id}','Backend\InvoiceController@approvestore')->name('approve.store');
		Route::get('/print/{id}','Backend\InvoiceController@print')->name('invoices.print');
		Route::get('/delete/{id}','Backend\InvoiceController@delete')->name('invoices.delete');
		Route::get('/get/stock','Backend\InvoiceController@getstock')->name('get.stock');
		Route::get('/get/product','Backend\InvoiceController@getproduct')->name('get.product');
		Route::get('/daily/report','Backend\InvoiceController@dailyreport')->name('daily.report');
		Route::get('/daily/report/pdf','Backend\InvoiceController@dailyreportpdf')->name('daily.report.pdf');
	});



	Route::prefix('stocks')->group(function(){
		Route::get('/report','Backend\StockReportController@stockreport')->name('stocks.report');
		Route::get('/report/pdf','Backend\StockReportController@stockreportpdf')->name('stocks.report.pdf');
	
	
	});









});