<?php

namespace App\Repository;

use App\Transactions;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface TransactionsRepositoryInterface
{
    public function all(): Builder;
    public function transactionType(int $type): Builder;
    public function find(String $id): Model;
    public function create(array $attributes): Model;
    public function update(array $attributes,String $id): bool;
    public function makeRandomTokenKey(): String;
    public function stock(): Builder;
    public function howMuchAccessorie(String $id);
    public function getAccessoriesType(int $type);
}
