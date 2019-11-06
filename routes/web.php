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
    return view('first');
});

Route::post('/ajaxPincodePost', 'FirstController@ajaxPincodePost');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'CheckUser'], function () {
    Route::get('/', 'AdminController@index');

    Route::delete('products/destroy', 'ProductsController@massDestroy')->name('products.massDestroy');

    Route::resource('products', 'ProductsController');
});

Route::group(['middleware' => 'CheckUser'], function () {
    Route::get('/clock/view', 'WorkHoursController@view')->name('clock.view');

    Route::delete('clock/destroy', 'WorkHoursController@massDestroy')->name('clock.workHours.massDestroy');
    Route::resource('/clock', 'WorkHoursController');
    Route::post('/ajaxTimePost', 'Requests\TimeInOutRequestController@setTime');

});
//Route::get('/login', 'Auth\LoginController@login');