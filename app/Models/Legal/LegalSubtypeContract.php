<?php

namespace App\Models\Legal;

use Illuminate\Database\Eloquent\Model;

class LegalSubtypeContract extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'agreement_id'
    ];

    public function legalContractDest()
    {
        return $this->hasOne(LegalContractDest::class);
    }
}
