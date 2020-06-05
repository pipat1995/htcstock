<?php

namespace App\Repositories\Interfaces;

interface UserRepositoryInterface
{
    public function all();

    public function allNgacUserinfo();

    public function findById($id);
    
    public function update($var, $id);

    public function delete($id);
}
