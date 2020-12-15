<?php

namespace App\Http\Filters\IT;

use App\Http\Filters\AbstractFilter;
use App\Http\Filters\IT\Query\MonthFilter;
use App\Http\Filters\IT\Query\YearFilter;

class BudgetManagementFilter extends AbstractFilter
{
    protected $filters = [
        'year' => YearFilter::class,
        'month' => MonthFilter::class
    ];
}
