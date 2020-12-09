<?php

namespace App\Services\Legal\Interfaces;

use App\Models\Legal\LegalContract;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface ApprovalDetailServiceInterface
{
    public function query(): Builder;
    public function create(array $attributes): Model;
    public function find(int $id): Model;

    public function update(array $attributes, int $id): bool;
    public function destroy(int $id);

    public function byContract(LegalContract $contract): Collection;

    public function userActive(User $user,LegalContract $contract): Model;
    public function approvalByLevel(LegalContract $contract,int $levels);
    public function contractLastTime(LegalContract $contract);
}
