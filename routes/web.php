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

    Route::resource('/buy','BuyTransactionController', ['only' => ['index', 'create', 'store', 'edit', 'update']]);

    Route::resource('/requisition','RequisitionTransactionController', ['only' => ['index', 'create', 'store', 'edit', 'update']]);

    Route::resource('/lendings','LendingsTransactionController', ['only' => ['index', 'create', 'store', 'edit', 'update']]);

    Route::get('/check/transactions', 'ReportController@reportTransactions')->name('check.transactions_list');
    Route::get('/check/stocks', 'ReportController@reportStocks')->name('check.stocks_list');
});


// Account
Route::namespace('Accounts')->prefix('accounts')->name('accounts.')->middleware(['auth','verified'])->group(function ()
{
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
});
