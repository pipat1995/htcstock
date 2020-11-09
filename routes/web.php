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

Route::get('optimize-clear', function () {
    Artisan::call('optimize:clear');
    // echo Artisan::output();
    return redirect()->back();
})->name('optimize-clear');

Route::get('language/{locale}', [App\Http\Controllers\LocalizationController::class, 'language'])->name('switch.language');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Auth::routes(['verify' => true, 'register' => false]);

// Directory Admin   middleware('can:for-superadmin-admin') เรียกมาจาก AuthServiceProvider for-superadmin-admin 'can:for-superadmin-admin',
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('updateusers', [App\Http\Controllers\Admin\UsersController::class, 'updateusers'])->name('users.updateusers');
    Route::resource('users', 'UsersController', ['only' => ['index', 'destroy', 'update', 'edit']]);
    Route::resource('permissions', 'PermissionsController', ['only' => ['index', 'edit', 'create', 'store', 'update', 'destroy']]);
    Route::resource('roles', 'RoleController', ['only' => ['index', 'edit', 'create', 'store', 'update', 'destroy']]);
});

Route::namespace('Auth')->prefix('me')->name('me.')->middleware(['auth', 'verified'])->group(function () {
    Route::resource('user', 'UsersController', ['only' => ['edit', 'update']]);
});
// IT
Route::namespace('IT')->prefix('it')->name('it.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', 'HomeController@index')->name('dashboard');
    Route::resource('budgets', 'BudgetController', ['only' => ['index', 'create', 'store', 'edit', 'update']]);
    Route::resource('buy', 'BuyTransactionController', ['only' => ['index', 'create', 'store', 'edit', 'update']]);
    Route::resource('requisition', 'RequisitionTransactionController', ['only' => ['index', 'create', 'store', 'edit', 'update']]);
    Route::resource('lendings', 'LendingsTransactionController', ['only' => ['index', 'create', 'store', 'edit', 'update']]);

    Route::get('check/transactions', 'ReportController@reportTransactions')->name('check.transactions_list');
    Route::get('check/stocks', 'ReportController@reportStocks')->name('check.stocks_list');
    Route::get('download/accessories/PDF', 'ReportController@generateAccessoriesPDF')->name('generateAccessoriesPDF');
    Route::resource('manage/accessories', 'AccessoriesController', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
});


// Account
Route::namespace('Accounts')->prefix('accounts')->name('accounts.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', 'HomeController@index')->name('dashboard');
});


// Legal
Route::get('legal/approval/verify/{id}/{contract}','Auth\LoginController@authenticatedById')->name('legal.approval.verify');
Route::namespace('Legal')->prefix('legal')->name('legal.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', 'HomeController@index')->name('dashboard');

    Route::resource('contract-request', 'ContractRequestController', ['only' => ['index', 'create', 'store', 'edit','show', 'update']]);
    Route::post('uploadfile', 'ContractRequestController@uploadFile')->name('uploadfile');
    Route::get('contract/{id}/pdf', 'ContractRequestController@generatePDF')->name('pdf');
    Route::post('contract-request/{id}/approval','ContractRequestController@approvalContract')->name('contract.approval');
    Route::namespace('ContractRequest')->prefix('contract-request')->name('contract-request.')->group(function () {
        Route::resource('workservicecontract', 'WorkServiceContractController', ['only' => ['index', 'create', 'edit', 'show', 'update']]);
        Route::resource('purchaseequipment', 'PurchaseEquipmentController', ['only' => ['index', 'create', 'edit', 'update']]);
        Route::resource('purchaseequipmentinstall', 'PurchaseEquipmentInstallController', ['only' => ['index', 'create', 'edit','show', 'update']]);
        Route::resource('mould', 'MouldController', ['only' => ['index', 'create', 'edit','show', 'update']]);
        Route::resource('scrap', 'ScrapController', ['only' => ['index', 'create', 'edit','show', 'update']]);
        Route::resource('vendorservicecontract', 'VendorServiceContractController', ['only' => ['index', 'create', 'edit','show', 'update']]);
        Route::resource('leasecontract', 'LeaseContractController', ['only' => ['index', 'create', 'edit','show', 'update']]);
        Route::resource('projectbasedagreement', 'ProjectBasedAgreementController', ['only' => ['index', 'create', 'edit','show', 'update']]);
        Route::resource('marketingagreement', 'MarketingAgreementController', ['only' => ['index', 'create', 'edit','show', 'update']]);

        Route::resource('comerciallists', 'ComercialListsController', ['only' => ['store', 'edit', 'destroy']]);
    });

    Route::namespace('AdminManagement')->prefix('adminmanagement')->name('adminmanagement.')->group(function () {
        Route::resource('approval','ApprovalController',['only' => ['index', 'create', 'edit', 'show', 'update','store','destroy']]);
        Route::put('approval/{id}/level/up','ApprovalController@levelUp')->name('approval.levelup');
        Route::put('approval/{id}/level/down','ApprovalController@levelDown')->name('approval.leveldown');
    });
});

