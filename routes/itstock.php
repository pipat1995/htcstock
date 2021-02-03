<?php

use Illuminate\Support\Facades\Route;

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

    Route::get('equipment/all', 'AccessoriesController@test')->name('equipment.all.index');


    Route::get('check/transactions', 'ReportController@reportTransactions')->name('check.transactions_list');
    Route::get('check/stocks', 'ReportController@reportStocks')->name('check.stocks_list');
    Route::resource('check/budgets', 'BudgetController', [
        'only' => ['index', 'create', 'store', 'edit', 'update'],
        'names' => ['index' => 'check.budgets.index', 'create' => 'check.budgets.create', 'store' => 'check.budgets.store', 'edit' => 'check.budgets.edit', 'update' => 'check.budgets.update']
    ]);

    Route::get('download/accessories/PDF', 'ReportController@generateAccessoriesPDF')->name('generateAccessoriesPDF');
});
