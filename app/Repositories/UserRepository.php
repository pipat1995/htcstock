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

    public function findById($id)
    {
        try {
            return User::where('id', $id)->firstOrFail();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function store($var)
    {
        try {
            $accessories = User::firstOrNew(['name' => $var->name, 'unit' => $var->unit]);
            $accessories->save();
            return $accessories;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function update($var, $id)
    {
        try {
            $accessories = User::where('id', $id)->firstOrFail();
            $accessories->name = $var->name;
            $accessories->unit = $var->unit;
            $accessories->save();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete($id)
    {
        try {
            $accessories = User::where('id', $id)->firstOrFail();
            $accessories->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
