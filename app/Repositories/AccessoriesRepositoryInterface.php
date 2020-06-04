<?php

namespace App\Repositories;

interface AccessoriesRepositoryInterface
{
    public function all();

    public function findById($id);

    public function update($var, $id);

    public function delete($id);
}
