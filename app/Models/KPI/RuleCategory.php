<?php

namespace App\Models\KPI;

use Illuminate\Database\Eloquent\Model;

class RuleCategory extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'name'
    ];
}
