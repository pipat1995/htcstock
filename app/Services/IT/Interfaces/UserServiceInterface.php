<?php

namespace App\Services\IT\Interfaces;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface UserServiceInterface
{
    public function all(): Builder;

    public function find(int $id): Model;

    public function update(array $attributes, int $id): bool;

    public function delete(int $id): bool;
    
    public function create(array $attributes ): Model;

    public function dropdownUser(): Collection;
}
