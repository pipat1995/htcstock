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
    return view('pages.welcome');
});
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('dasborad')->middleware('auth');
// Directory Admin   middleware('can:for-admin-author') เรียกมาจาก AuthServiceProvider for-admin-author 'can:for-admin-author',
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware([ 'can:for-admin-author','auth', 'verified'])->group(function () {
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
    Route::resource('/budgets', 'BudgetController', ['only' => ['index', 'edit', 'create', 'store', 'update']]);
});


Route::namespace('Transactions')->prefix('transactions')->name('transactions.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/buy/list', 'TransactionsController@buyIndex')->name('buy.list');
    Route::get('/buy/create', 'TransactionsController@buyCreate')->name('buy.create');
    Route::post('/buy/create', 'TransactionsController@buyStore')->name('buy.store');
    Route::get('/buy/edit/{id}', 'TransactionsController@buyEdit')->name('buy.edit');
    Route::put('/buy/update/{id}', 'TransactionsController@buyUpdate')->name('buy.update');

    Route::get('/requisition/list', 'TransactionsController@requisitionIndex')->name('requisition.list');
    Route::get('/requisition/create', 'TransactionsController@requisitionCreate')->name('requisition.create');
    Route::post('/requisition/create', 'TransactionsController@requisitionStore')->name('requisition.store');
    Route::get('/requisition/edit/{id}', 'TransactionsController@requisitionEdit')->name('requisition.edit');
    Route::put('/requisition/update/{id}', 'TransactionsController@requisitionUpdate')->name('requisition.update');

    Route::get('/lendings/list', 'TransactionsController@lendingsIndex')->name('lendings.list');
    Route::get('/lendings/create', 'TransactionsController@lendingsCreate')->name('lendings.create');
    Route::post('/lendings/create', 'TransactionsController@lendingsStore')->name('lendings.store');
    Route::get('/lendings/edit/{id}', 'TransactionsController@lendingsEdit')->name('lendings.edit');
    Route::put('/lendings/update/{id}', 'TransactionsController@lendingsUpdate')->name('lendings.update');
});

Route::namespace('Reports')->prefix('reports')->name('reports.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/transactions', 'ReportController@reportTransactions')->name('transactions.list');
    Route::get('/stocks', 'ReportController@reportStocks')->name('stocks.list');
});

Route::namespace('Users')->prefix('users')->name('users.')->middleware(['auth', 'verified'])->group(function () {
    Route::resource('/me', 'UsersController', ['only' => ['edit', 'update']]);
});
