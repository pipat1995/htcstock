<?php

namespace App\Repositories\Interfaces;

interface UserRepositoryInterface
{
    public function all();

    public function allNgacUserinfo();

    public function findById($id);

    public function store($var);
    
    public function update($var, $id);

    public function delete($id);
}
