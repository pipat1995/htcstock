<?php

namespace App\Services\IT\Interfaces;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface TransactionsServiceInterface
{
    public function all(): Builder;
    public function transactionType(String $type): Builder;
    public function find(int $id): Model;
    public function create(array $attributes): Model;
    public function update(array $attributes, int $id): bool;
    public function stock(): Builder;
    public function quantityAccessorie(int $id);
    public function getAccessoriesType(String $type);
    public function filterForStock(Request $request);
    public function filterForBuy(Request $request);
    public function filterForRequest(Request $request);
    public function filterForLending(Request $request);
    public function filterForHistory(Request $request);
}
