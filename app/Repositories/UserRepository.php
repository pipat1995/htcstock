<?php

namespace App\Repositories;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserRepository implements UserRepositoryInterface
{
    public function all()
    {
        try {
            return User::all();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function allNgacUserinfo()
    {
        try {
            $response = Http::get('http://190.7.10.27/_sqlsrvConnection/apiStock/userinfo.php');
            $newRes = array();
            foreach ($response->json() as $key => $value) {
                \array_push($newRes, (object) $value);
            }
            return $newRes;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit($id)
    {
        try {
            return User::find($id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
    public function update( Request $request,$id)
    {
        try {
            $user = User::find($id);
            $user->roles()->sync($request->roles);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            return $user;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete($id)
    {
        try {
            $user = User::find($id);
            $user->roles()->detach();
            return $user->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
