<?php

namespace App\Traits;

use Illuminate\Support\Str;
/**
 * 
 */
trait MakeTokenTransaction
{
    public function makeRandomTokenKey()
    {
        return Str::random(32);
    }
}
