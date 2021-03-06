<?php

use Illuminate\Support\Facades\Route;

// KPI
Route::namespace('KPI')->prefix('kpi')->name('kpi.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', 'HomeController@index')->name('dashboard');
    Route::resource('self-evaluation', 'SelfEvaluation\SelfEvaluationController', ['only' => ['index', 'create', 'edit', 'show', 'update', 'store', 'destroy']]);
    Route::resource('evaluation-review', 'EvaluateReview\EvaluateReviewController', ['only' => ['index', 'create', 'edit', 'show', 'update', 'store', 'destroy']]);
    Route::resource('rule-list', 'Rule\RuleController', ['only' => ['index', 'create', 'edit', 'show', 'update', 'store', 'destroy']]);
    Route::get('rule-dropdown/{group}', 'Rule\RuleController@dropdown')->name('rule-dropdown');
    Route::resource('template', 'Template\TemplateController', ['only' => ['index', 'create', 'edit', 'show', 'update', 'store', 'destroy']]);
    Route::group(['prefix' => 'template/{template}/edit'], function () {
        Route::resource('rule-template', 'RuleTemplate\RuleTemplateController', ['only' => ['index', 'create', 'edit', 'show', 'update', 'store']]);
        Route::get('ruletemplate/bytemplate', 'RuleTemplate\RuleTemplateController@bytemplate')->name('rule-template.list');
        Route::put('ruletemplate/switch','RuleTemplate\RuleTemplateController@switchrow')->name('rule-template.switch');
        Route::delete('ruletemplate/destroy','RuleTemplate\RuleTemplateController@deleteRuleTemplate')->name('rule-template.destroy');
    });


    Route::get('evaluation-form', 'EvaluationForm\EvaluationFormController@index')->name('evaluation-form.index');
    Route::get('evaluation-form/staff-data/{staff_data}/edit', 'EvaluationForm\StaffDataController@index')->name('staff-data.edit');
    Route::get('evaluation-form/staff-data/{staff_data}/evaluation/{evaluation_form}/edit', 'EvaluationForm\EvaluationFormController@edit')->name('evaluation-form.edit');

    Route::resource('set-target', 'SetTarget\SetTargetController', ['only' => ['index', 'create', 'edit', 'show', 'update', 'store', 'destroy']]);
    Route::resource('set-actual', 'SetActual\SetActualController', ['only' => ['index', 'create', 'edit', 'show', 'update', 'store', 'destroy']]);
});
