<?php

namespace App\Services\Legal\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface PaymentTermServiceInterface
{
    public function create(array $attributes): Model;
    public function find(int $id): Model;

    public function update(array $attributes, int $id): bool;
    public function destroy(int $id);
}
