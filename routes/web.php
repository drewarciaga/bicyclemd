<?php

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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {

Route::get('transactions/checkout/{result?}', 'TransactionController@index')->name('checkout.success');

  Route::resource('inventory', 'InventoryController');
  Route::resource('transactions', 'TransactionController');


  Route::post('computeTotal', 'PurchaseController@computeTotal')->name('purchase.computeTotal');
  Route::get('displayCart', 'PurchaseController@displayCart')->name('purchase.displayCart');
  Route::post('checkout', 'PurchaseController@checkout')->name('purchase.checkout');

  Route::resource('purchase', 'PurchaseController');
  Route::resource('admin', 'AdminController');

  Route::get('displayReport', 'ReportController@displayReport')->name('reports.displayReport');
  Route::resource('reports', 'ReportController');

});
