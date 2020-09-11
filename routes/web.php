<?php

use Illuminate\Support\Facades\Artisan;
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
Route::get('/clear-all', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return "Cache is cleared";
});
Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Auth::routes(['verify' => true]);

// Directory Admin   middleware('can:for-admin-author') เรียกมาจาก AuthServiceProvider for-admin-author 'can:for-admin-author',
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware(['can:for-admin-author', 'auth', 'verified'])->group(function () {
    Route::resource('/users', 'UsersController', ['only' => ['index', 'destroy', 'update', 'edit']]);
    Route::get('/updateusers','UsersController@updateusers')->name('users.updateusers');
    // Route::resource('/budgets', 'BudgetController', ['only' => ['index', 'edit', 'create', 'store', 'update']]);
    Route::resource('permissions', 'PermissionsController', ['only' => ['index', 'edit', 'create', 'store', 'update','destroy']]);
});

Route::namespace('Auth')->prefix('me')->name('me.')->middleware(['auth','verified'])->group(function () {
    Route::resource('/user', 'UsersController', ['only' => ['edit', 'update']]);
});
// IT
Route::namespace('IT')->prefix('it')->name('it.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::resource('/budgets', 'BudgetController', ['only' => ['index', 'create', 'store', 'edit', 'update']]);
    Route::resource('/buy','BuyTransactionController', ['only' => ['index', 'create', 'store', 'edit', 'update']]);
    Route::resource('/requisition','RequisitionTransactionController', ['only' => ['index', 'create', 'store', 'edit', 'update']]);
    Route::resource('/lendings','LendingsTransactionController', ['only' => ['index', 'create', 'store', 'edit', 'update']]);

    Route::get('/check/transactions', 'ReportController@reportTransactions')->name('check.transactions_list');
    Route::get('/check/stocks', 'ReportController@reportStocks')->name('check.stocks_list');
    Route::resource('/manage/accessories','AccessoriesController', ['only' => ['index', 'create', 'store', 'edit', 'update','destroy']]);
});


// Account
Route::namespace('Accounts')->prefix('accounts')->name('accounts.')->middleware(['auth','verified'])->group(function ()
{
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
});
