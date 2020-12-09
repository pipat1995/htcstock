<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'system';

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
