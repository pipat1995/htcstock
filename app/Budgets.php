<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
