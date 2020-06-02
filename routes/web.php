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
Route::post('/accessories', 'AccessoriesController@store')->name('accessories.store');
Route::get('/accessories/{accessories}/edit', 'AccessoriesController@edit')->name('accessories.edit');
Route::put('/accessories/{accessories}', 'AccessoriesController@update')->name('accessories.update');
Route::delete('/accessories/{accessories}', 'AccessoriesController@destroy')->name('accessories.destroy');


Route::get('/history/take','HistoryController@take')->name('history.take');
Route::post('/history/take','HistoryController@storeTake')->name('history.take.store');

Route::get('/history/lend','HistoryController@lend')->name('history.lend');