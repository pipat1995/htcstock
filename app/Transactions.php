<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'access_id', 'qty', 'trans_type', 'trans_by', 'trans_desc', 'ir_no', 'po_no', 'invoice_no', 'unit_cost', 'vendor_id', 'ref_no','created_by'
    ];

    public function user()
    {
        return $this->belongsTo(\App\User::class, 'id', 'trans_by');
    }

    public function accessorie()
    {
        return $this->hasOne(\App\Accessories::class, 'access_id','access_id','id');
    }
}
