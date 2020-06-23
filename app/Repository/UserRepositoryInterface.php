<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

interface UserRepositoryInterface
{
    public function all();

    public function find(String $id): Model;

    public function update(array $attributes,String $id): bool;

    public function delete(String $id);
}
