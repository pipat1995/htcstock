<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

interface TransactionsRepositoryInterface
{
    public function all();
    public function buyAll();
    public function requisitionAll();
    public function lendingsAll();
    public function find(String $id): Model;
    public function create(array $attributes): Model;
    public function update(array $attributes,String $id): bool;
    public function makeRandomTokenKey(): String;
    public function filterAccessories(String $access_id);
}
