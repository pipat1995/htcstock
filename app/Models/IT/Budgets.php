<?php

namespace App\Models\IT;

use App\Http\Filters\IT\BudgetManagementFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Budgets extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'budgets_of_month', 'month', 'year'
    ];

    public function scopeFilter(Builder $builder, $request)
    {
        return (new BudgetManagementFilter($request))->filter($builder);
    }
}
