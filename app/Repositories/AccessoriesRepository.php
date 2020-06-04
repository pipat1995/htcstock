<?php

namespace App\Repositories;

use App\Accessories;
use Illuminate\Http\Request;

class AccessoriesRepository implements AccessoriesRepositoryInterface
{
    public function all()
    {
        try {
            return Accessories::all()->map->format();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function findById($id)
    {
        try {
            return Accessories::where('id', $id)->firstOrFail()->format();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update($var , $id)
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
