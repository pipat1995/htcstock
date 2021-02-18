<?php

namespace App\Models\KPI;

use Illuminate\Database\Eloquent\Model;

class TargetUnit extends Model
{
    protected $table = 'kpi_target_units';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function rule()
    {
        return $this->hasOne(Rule::class)->withDefault();
    }
}
