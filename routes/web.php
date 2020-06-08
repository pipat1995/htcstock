<?php

use Illuminate\Support\Facades\Auth;
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
Auth::routes(['verify' => true]);

Route::get('/dasborad', 'DasboradController@index')->name('dasborad');

// Directory Admin 
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function ()
{
    Route::resource('/users','UsersController',['except' => ['show','create','store']]);
});

Route::get('/accessories', 'AccessoriesController@index')->name('accessories');
Route::get('/accessories/{accessories}', 'AccessoriesController@show')->name('accessories.show');
Route::get('/accessories/{accessories}/edit', 'AccessoriesController@edit')->name('accessories.edit');
Route::post('/accessories', 'AccessoriesController@store')->name('accessories.store');
Route::put('/accessories/{accessories}', 'AccessoriesController@update')->name('accessories.update');
Route::delete('/accessories/{accessories}', 'AccessoriesController@destroy')->name('accessories.destroy');


Route::get('/histories/take','HistoriesController@allTake')->name('histories.take');
Route::get('/histories/take/{histories}','HistoriesController@showTake')->name('histories.take.show');
Route::get('/histories/take/{histories}/edit','HistoriesController@editTake')->name('histories.take.edit');
Route::post('/histories/take','HistoriesController@storeTake')->name('histories.take.store');
Route::put('/histories/take/{histories}','HistoriesController@updateTake')->name('histories.take.update');

Route::get('/histories/lend','HistoriesController@allLend')->name('histories.lend');
Route::get('/histories/lend/{histories}','HistoriesController@showLend')->name('histories.lend.show');
Route::get('/histories/lend/{histories}/edit','HistoriesController@editLend')->name('histories.lend.edit');
Route::post('/histories/lend','HistoriesController@storeLend')->name('histories.lend.store');
Route::put('/histories/lend/{histories}','HistoriesController@updateLend')->name('histories.lend.update');