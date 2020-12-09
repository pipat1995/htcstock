<?php

namespace App\Models\Legal;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class LegalApprovalDetail extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'legal_approval_details';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'contract_id', 'user_id', 'status', 'levels', 'comment'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }

    public function contract()
    {
        return $this->belongsTo(LegalContract::class, 'contract_id')->withDefault();
    }
}
