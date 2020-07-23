<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface SystemRepositoryInterface
{
    public function all(): Builder;

    public function find(String $id): Model;

    public function update(array $attributes, String $id): bool;
    
    public function create(array $attributes ): Model;
}
