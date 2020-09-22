<?php

use App\Http\Controllers\LocalizationController;
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

Route::get('clear-all', function () {
    Artisan::call('optimize:clear');
    // echo Artisan::output();
    return Artisan::output();
});

Route::get('language/{locale}', [App\Http\Controllers\LocalizationController::class,'language'])->name('switch.language');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Auth::routes(['verify' => true, 'register' => false]);

// Directory Admin   middleware('can:for-superadmin-admin') เรียกมาจาก AuthServiceProvider for-superadmin-admin 'can:for-superadmin-admin',
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('updateusers', [App\Http\Controllers\Admin\UsersController::class,'updateusers'])->name('users.updateusers');
    Route::resource('users', 'UsersController', ['only' => ['index', 'destroy', 'update', 'edit']]);
    Route::resource('permissions', 'PermissionsController', ['only' => ['index', 'edit', 'create', 'store', 'update', 'destroy']]);
    Route::resource('roles', 'RoleController', ['only' => ['index', 'edit', 'create', 'store', 'update', 'destroy']]);
});

Route::namespace('Auth')->prefix('me')->name('me.')->middleware(['auth', 'verified'])->group(function () {
    Route::resource('/user', 'UsersController', ['only' => ['edit', 'update']]);
});
// IT
Route::namespace('IT')->prefix('it')->name('it.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', 'HomeController@index')->name('dashboard');
    Route::resource('/budgets', 'BudgetController', ['only' => ['index', 'create', 'store', 'edit', 'update']]);
    Route::resource('/buy', 'BuyTransactionController', ['only' => ['index', 'create', 'store', 'edit', 'update']]);
    Route::resource('/requisition', 'RequisitionTransactionController', ['only' => ['index', 'create', 'store', 'edit', 'update']]);
    Route::resource('/lendings', 'LendingsTransactionController', ['only' => ['index', 'create', 'store', 'edit', 'update']]);

    Route::get('/check/transactions', 'ReportController@reportTransactions')->name('check.transactions_list');
    Route::get('/check/stocks', 'ReportController@reportStocks')->name('check.stocks_list');
    Route::resource('/manage/accessories', 'AccessoriesController', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
});


// Account
Route::namespace('Accounts')->prefix('accounts')->name('accounts.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
});


// Legal
Route::namespace('Legal')->prefix('legal')->name('legal.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', 'HomeController@index')->name('dashboard');
});
