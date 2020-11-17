<?php

namespace App\Http\Filters\IT;

use App\Http\Filters\AbstractFilter;
use App\Http\Filters\IT\Query\AccessorieFilter;

class StockManagementFilter extends AbstractFilter
{
    protected $filters = [
        'access_id' => AccessorieFilter::class,
    ];
}
