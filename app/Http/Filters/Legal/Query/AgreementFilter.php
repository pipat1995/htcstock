<?php
namespace App\Http\Filters\Legal\Query;

class AgreementFilter
{
    public function filter($builder, $value)
    {
        return $builder->whereIn('agreement_id', [...$value]);
    }
}
