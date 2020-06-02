<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Http;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function userinfo()
    {
        try {
            $response = Http::get('http://190.7.10.27/_sqlsrvConnection/apiStock/userinfo.php');
            $newRes = array();
            foreach ($response->json() as $key => $value) {
                
                \array_push($newRes,(object)$value);
            }
            return $newRes;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
