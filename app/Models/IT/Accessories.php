<?php

namespace App\Models\IT;

use App\Http\Filters\IT\AccessoriesManagementFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Accessories extends Model
{
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'access_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'access_name', 'unit', 'created_at'
    ];

    public function transaction()
    {
        return $this->belongsTo(Transactions::class, 'access_id', 'access_id');
    }
    
    public function scopeFilter(Builder $builder, $request)
    {
        return (new AccessoriesManagementFilter($request))->filter($builder);
    }
}
