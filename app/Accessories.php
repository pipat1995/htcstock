<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accessories extends Model
{
    protected $table = 'accessories';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'unit'
    ];

    /**
     * format for dataTable Frontend
     *
     * @var array
     */
    public function format()
    {
        return [
            'action'=> '<botton class="edit btn btn-primary btn-sm" data-toggle="modal" data-target="#accessoriesModal" data-param="' . $this->id . '">ข้อมูล</botton>',
            'id' => $this->id,
            'name' => $this->name,
            'unit' => $this->unit,
            'created' => $this->created_at,
            'updated' => $this->updated_at
        ];
    }

    public function historie()
    {
        return $this->hasMany(\App\Histories::class,'access_id');
    }
}
