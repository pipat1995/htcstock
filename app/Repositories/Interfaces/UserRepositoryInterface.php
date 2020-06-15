<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface UserRepositoryInterface
{
    public function all();

    public function allNgacUserinfo();

    public function edit(String $id);
    
    public function update(Request $request,$id);

    public function delete(String $id);
}
