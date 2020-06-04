<?php

namespace App\Repositories\Interfaces;

interface AccessoriesRepositoryInterface
{
    public function all();

    public function findById($id);

    public function store($var);
    
    public function update($var, $id);

    public function delete($id);
}
