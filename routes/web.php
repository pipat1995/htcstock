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
})->name('welcome');
Auth::routes(['verify' => true]);
// IT

// Directory Admin   middleware('can:for-admin-author') เรียกมาจาก AuthServiceProvider for-admin-author 'can:for-admin-author',
Route::namespace('IT\Admin')->prefix('admin')->name('admin.')->middleware(['can:for-admin-author', 'auth', 'verified'])->group(function () {
    Route::resource('/users', 'UsersController', ['only' => ['index', 'destroy', 'update', 'edit','updateusers']]);
    Route::get('/users/fetchdatas','UsersController@fetchdatas')->name('users.fetchdatas');
    Route::resource('/budgets', 'BudgetController', ['only' => ['index', 'edit', 'create', 'store', 'update']]);
});
Route::namespace('Auth')->prefix('me')->name('me.')->middleware(['auth','verified'])->group(function () {
    Route::resource('/user', 'UsersController', ['only' => ['edit', 'update']]);
});

Route::namespace('IT')->prefix('it')->name('it.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::get('/accessories/buy/list', 'TransactionsController@buyIndex')->name('accessories.buy_list');
    Route::get('/accessories/buy/create', 'TransactionsController@buyCreate')->name('accessories.buy_create');
    Route::post('/accessories/buy/create', 'TransactionsController@buyStore')->name('accessories.buy_store');
    Route::get('/accessories/buy/edit/{id}', 'TransactionsController@buyEdit')->name('accessories.buy_edit');
    Route::put('/accessories/buy/update/{id}', 'TransactionsController@buyUpdate')->name('accessories.buy_update');

    Route::get('/accessories/requisition/list', 'TransactionsController@requisitionIndex')->name('accessories.requisition_list');
    Route::get('/accessories/requisition/create', 'TransactionsController@requisitionCreate')->name('accessories.requisition_create');
    Route::post('/accessories/requisition/create', 'TransactionsController@requisitionStore')->name('accessories.requisition_store');
    Route::get('/accessories/requisition/edit/{id}', 'TransactionsController@requisitionEdit')->name('accessories.requisition_edit');
    Route::put('/accessories/requisition/update/{id}', 'TransactionsController@requisitionUpdate')->name('accessories.requisition_update');

    Route::get('/accessories/lendings/list', 'TransactionsController@lendingsIndex')->name('accessories.lendings_list');
    Route::get('/accessories/lendings/create', 'TransactionsController@lendingsCreate')->name('accessories.lendings_create');
    Route::post('/accessories/lendings/create', 'TransactionsController@lendingsStore')->name('accessories.lendings_store');
    Route::get('/accessories/lendings/edit/{id}', 'TransactionsController@lendingsEdit')->name('accessories.lendings_edit');
    Route::put('/accessories/lendings/update/{id}', 'TransactionsController@lendingsUpdate')->name('accessories.lendings_update');

    Route::get('/check/transactions', 'ReportController@reportTransactions')->name('check.transactions_list');
    Route::get('/check/stocks', 'ReportController@reportStocks')->name('check.stocks_list');
});


// Account
Route::namespace('Accounts')->prefix('accounts')->name('accounts.')->middleware(['auth','verified'])->group(function ()
{
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
});
