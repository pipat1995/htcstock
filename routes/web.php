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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/accessories', 'AccessoriesController@index')->name('accessories');
Route::get('/accessories/{accessories}', 'AccessoriesController@show')->name('accessories.show');
Route::get('/accessories/{accessories}/edit', 'AccessoriesController@edit')->name('accessories.edit');
Route::post('/accessories', 'AccessoriesController@store')->name('accessories.store');
Route::put('/accessories/{accessories}', 'AccessoriesController@update')->name('accessories.update');
Route::delete('/accessories/{accessories}', 'AccessoriesController@destroy')->name('accessories.destroy');


Route::get('/histories/take','HistoriesController@take')->name('histories.take');
Route::get('/histories/take/{histories}','HistoriesController@showTake')->name('histories.take.show');
Route::get('/histories/take/{histories}/edit','HistoriesController@editTake')->name('histories.take.edit');
Route::post('/histories/take','HistoriesController@storeTake')->name('histories.take.store');
Route::put('/histories/take/{histories}','HistoriesController@updateTake')->name('histories.take.update');

Route::get('/histories/lend','HistoriesController@lend')->name('histories.lend');