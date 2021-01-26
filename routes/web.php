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

Auth::routes(['verify' => true, 'register' => false]);
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('optimize-clear', function () {
        Artisan::call('optimize:clear');
        return redirect()->back();
    })->name('optimize-clear');

    Route::get('language/{locale}', 'LocalizationController@language')->name('switch.language');
    Route::get('/', 'HomeController@index')->name('welcome');
    Route::get('/systemset/{name}', 'HomeController@systemset')->name('system-set');

    Route::namespace('Auth')->prefix('me')->name('me.')->group(function () {
        Route::resource('user', 'UsersController', ['only' => ['edit', 'update']]);
    });
});


// Directory Admin   middleware('can:for-superadmin-admin') เรียกมาจาก AuthServiceProvider for-superadmin-admin 'can:for-superadmin-admin',
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('updateusers', 'UsersController@updateusers')->name('users.updateusers');
    Route::resources([
        'users' => 'UsersController',
        'permissions' => 'PermissionsController',
        'roles' => 'RoleController'
    ]);
    Route::post('{id}/addrole', 'UsersController@addrole')->name('users.addrole');
    Route::delete('{user}/removerole', 'UsersController@removerole')->name('users.removerole');
    Route::post('{id}/addsystem', 'UsersController@addsystem')->name('users.addsystem');
    Route::delete('{user}/removesystem', 'UsersController@removesystem')->name('users.removesystem');
    Route::post('uploadfileequipment', 'AccessoriesController@uploadfileequipment')->name('uploadfileequipment');
});


// IT
Route::namespace('IT')->prefix('it')->name('it.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', 'HomeController@index')->name('dashboard');
    Route::resource(
        'equipment/management',
        'AccessoriesController',
        [
            'only' => ['index', 'create', 'store', 'edit', 'update', 'destroy'],
            'names' => ['index' => 'equipment.management.index', 'create' => 'equipment.management.create', 'store' => 'equipment.management.store', 'edit' => 'equipment.management.edit', 'update' => 'equipment.management.update', 'destroy'  => 'equipment.management.destroy']
        ]
    );
    Route::resource(
        'equipment/buy',
        'BuyTransactionController',
        [
            'only' => ['index', 'create', 'store', 'edit', 'update'],
            'names' => ['index' => 'equipment.buy.index', 'create' => 'equipment.buy.create', 'store' => 'equipment.buy.store', 'edit' => 'equipment.buy.edit', 'update' => 'equipment.buy.update']
        ]
    );
    Route::resource(
        'equipment/requisition',
        'RequisitionTransactionController',
        [
            'only' => ['index', 'create', 'store', 'edit', 'update'],
            'names' => ['index' => 'equipment.requisition.index', 'create' => 'equipment.requisition.create', 'store' => 'equipment.requisition.store', 'edit' => 'equipment.requisition.edit', 'update' => 'equipment.requisition.update']
        ]
    );
    Route::resource(
        'equipment/lendings',
        'LendingsTransactionController',
        [
            'only' => ['index', 'create', 'store', 'edit', 'update'],
            'names' => ['index' => 'equipment.lendings.index', 'create' => 'equipment.lendings.create', 'store' => 'equipment.lendings.store', 'edit' => 'equipment.lendings.edit', 'update' => 'equipment.lendings.update']
        ]
    );

    Route::get('equipment/all' , 'AccessoriesController@test')->name('equipment.all.index');


    Route::get('check/transactions', 'ReportController@reportTransactions')->name('check.transactions_list');
    Route::get('check/stocks', 'ReportController@reportStocks')->name('check.stocks_list');
    Route::resource('check/budgets', 'BudgetController', [
        'only' => ['index', 'create', 'store', 'edit', 'update'],
        'names' => ['index' => 'check.budgets.index', 'create' => 'check.budgets.create', 'store' => 'check.budgets.store', 'edit' => 'check.budgets.edit', 'update' => 'check.budgets.update']
    ]);

    Route::get('download/accessories/PDF', 'ReportController@generateAccessoriesPDF')->name('generateAccessoriesPDF');
});


// Account
Route::namespace('Accounts')->prefix('accounts')->name('accounts.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', 'HomeController@index')->name('dashboard');
});


// Legal
Route::get('legal/approval/verify/{id}/{contract}', 'Auth\LoginController@authenticatedById')->name('legal.approval.verify');
Route::namespace('Legal')->prefix('legal')->name('legal.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', 'HomeController@index')->name('dashboard');

    Route::resource('contract-request', 'ContractRequestController', ['only' => ['index', 'create', 'store', 'edit', 'show', 'update', 'destroy']]);
    Route::post('uploadfilecontract', 'ContractRequestController@uploadfilecontract')->name('uploadfilecontract');
    Route::get('contract/{id}/pdf', 'ContractRequestController@generatePDF')->name('pdf');
    Route::post('contract-request/{id}/approval', 'ContractRequestController@approvalContract')->name('contract.approval');
    Route::namespace('ContractRequest')->prefix('contract-request')->name('contract-request.')->group(function () {
        Route::resource('workservicecontract', 'WorkServiceContractController', ['only' => ['index', 'create', 'edit', 'show', 'update']]);
        Route::resource('purchaseequipment', 'PurchaseEquipmentController', ['only' => ['index', 'create', 'edit', 'update']]);
        Route::resource('purchaseequipmentinstall', 'PurchaseEquipmentInstallController', ['only' => ['index', 'create', 'edit', 'show', 'update']]);
        Route::resource('mould', 'MouldController', ['only' => ['index', 'create', 'edit', 'show', 'update']]);
        Route::resource('scrap', 'ScrapController', ['only' => ['index', 'create', 'edit', 'show', 'update']]);
        Route::resource('vendorservicecontract', 'VendorServiceContractController', ['only' => ['index', 'create', 'edit', 'show', 'update']]);
        Route::resource('leasecontract', 'LeaseContractController', ['only' => ['index', 'create', 'edit', 'show', 'update']]);
        Route::resource('projectbasedagreement', 'ProjectBasedAgreementController', ['only' => ['index', 'create', 'edit', 'show', 'update']]);
        Route::resource('marketingagreement', 'MarketingAgreementController', ['only' => ['index', 'create', 'edit', 'show', 'update']]);

        Route::resource('comerciallists', 'ComercialListsController', ['only' => ['store', 'edit', 'destroy']]);
    });

    Route::namespace('AdminManagement')->prefix('adminmanagement')->name('adminmanagement.')->group(function () {
        Route::resource('approval', 'ApprovalController', ['only' => ['index', 'create', 'edit', 'show', 'update', 'store', 'destroy']]);
        Route::put('approval/{id}/level/up', 'ApprovalController@levelUp')->name('approval.levelup');
        Route::put('approval/{id}/level/down', 'ApprovalController@levelDown')->name('approval.leveldown');
    });
});


// Account
Route::namespace('KPI')->prefix('kpi')->name('kpi.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', 'HomeController@index')->name('dashboard');
});
