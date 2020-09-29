<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface TransactionsRepositoryInterface
{
    public function all(): Builder;
    public function transactionType(String $type): Builder;
    public function find(int $id): Model;
    public function create(array $attributes): Model;
    public function update(array $attributes,int $id): bool;
    public function stock(): Builder;
    public function quantityAccessorie(int $id);
    public function getAccessoriesType(String $type);
}
