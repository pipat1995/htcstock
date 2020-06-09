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

// Directory Admin   middleware('can:manage-users') เรียกมาจาก AuthServiceProvider manage-users
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function ()
{
    Route::resource('/users','UsersController',['except' => ['show','create','store']]);
});
Route::namespace('Accessories')->prefix('accessories')->group(function () {
    Route::resource('/accessories','AccessoriesController',['only' => ['index','store','edit','update','destroy']]);
});
Route::namespace('Histories')->prefix('histories')->group(function () {
    Route::resource('/take','TakeController',['only' => ['index','store','edit','update','destroy']]);
    Route::resource('/lend','LendController',['only' => ['index','store','edit','update','destroy']]);
});
// Route::get('/histories/take','HistoriesController@allTake')->name('histories.take');
// Route::get('/histories/take/{histories}','HistoriesController@showTake')->name('histories.take.show');
// Route::get('/histories/take/{histories}/edit','HistoriesController@editTake')->name('histories.take.edit');
// Route::post('/histories/take','HistoriesController@storeTake')->name('histories.take.store');
// Route::put('/histories/take/{histories}','HistoriesController@updateTake')->name('histories.take.update');

// Route::get('/histories/lend','HistoriesController@allLend')->name('histories.lend');
// Route::get('/histories/lend/{histories}','HistoriesController@showLend')->name('histories.lend.show');
// Route::get('/histories/lend/{histories}/edit','HistoriesController@editLend')->name('histories.lend.edit');
// Route::post('/histories/lend','HistoriesController@storeLend')->name('histories.lend.store');
// Route::put('/histories/lend/{histories}','HistoriesController@updateLend')->name('histories.lend.update');