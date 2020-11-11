<?php

namespace App\Http\Filters\Legal;

use App\Http\Filters\AbstractFilter;

class ContractFilter extends AbstractFilter
{
    protected $filters = [
        'status' => StatusFilter::class,
        'agreement' => AgreementFilter::class
    ];
}
