<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface TransactionsRepositoryInterface
{
    public function all(): Builder;
    public function buyAll(): Builder;
    public function requisitionAll(): Builder;
    public function lendingsAll(): Builder;
    public function find(String $id): Model;
    public function create(array $attributes): Model;
    public function update(array $attributes,String $id): bool;
    public function makeRandomTokenKey(): String;
    public function stock(): Builder;
    public function howMuchAccessorie(String $id);
}
