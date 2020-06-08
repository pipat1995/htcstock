<?php

namespace App\Repositories\Interfaces;

use App\User;
use Illuminate\Http\Request;

interface UserRepositoryInterface
{
    public function all();

    public function allNgacUserinfo();

    public function edit(User $user);
    
    public function update(Request $request,User $user);

    public function delete(User $user);
}
