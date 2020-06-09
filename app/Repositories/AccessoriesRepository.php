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
            return Accessories::orderBy('created_at','desc')->get();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit($id)
    {
        try {
            $accessories = Accessories::find($id);
            return $accessories;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function store(Request $request)
    {
        try {
            $accessories = Accessories::firstOrNew(['name' => $request->name, 'unit' => $request->unit]);
            $accessories->save();
            return $accessories;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function update(Request $request,  $id)
    {
        try {
            $accessories = Accessories::find($id);
            $accessories->name = $request->name;
            $accessories->unit = $request->unit;
            $accessories->save();
            return $accessories;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete( $id)
    {
        try {
            $accessories = Accessories::find($id);
            return $accessories->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
