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
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function () {
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
});
Route::namespace('Accessories')->prefix('accessories')->group(function () {
    Route::resource('/accessories', 'AccessoriesController', ['only' => ['index', 'store', 'edit', 'update', 'destroy']]);
});
Route::namespace('Histories')->prefix('histories')->group(function () {
    Route::resource('/take', 'TakeController', ['only' => ['index', 'store', 'edit', 'update', 'destroy']]);
    Route::resource('/lend', 'LendController', ['only' => ['index', 'store', 'edit', 'update', 'destroy']]);
});