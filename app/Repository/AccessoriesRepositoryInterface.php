<?php

namespace App\Repository;

use App\Accessories;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Boolean;

interface AccessoriesRepositoryInterface
{
    public function all(): Builder;

    public function find(String $id): Model;

    public function store(Request $request): Model;
    public function update(array $attributes,String $id): bool;
    public function delete(String $id);
}
