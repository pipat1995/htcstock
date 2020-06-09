<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface UserRepositoryInterface
{
    public function all();

    public function allNgacUserinfo();

    public function edit($id);
    
    public function update(Request $request,$id);

    public function delete($id);
}
