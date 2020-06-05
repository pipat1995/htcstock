<?php

namespace App\Repositories;

use App\Accessories;
use App\Repositories\Interfaces\AccessoriesRepositoryInterface;
use Illuminate\Http\Request;

class AccessoriesRepository implements AccessoriesRepositoryInterface
{
    public function all()
    {
        try {
            return Accessories::all();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function findById($id)
    {
        try {
            return Accessories::where('id', $id)->firstOrFail();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function store($var)
    {
        try {
            $accessories = Accessories::firstOrNew(['name' => $var->name, 'unit' => $var->unit]);
            $accessories->save();
            return $accessories;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function update($var, $id)
    {
        try {
            $accessories = Accessories::where('id', $id)->firstOrFail();
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
            $accessories = Accessories::where('id', $id)->firstOrFail();
            $accessories->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}