<?php

namespace App\Services\KPI\Interfaces;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface RuleTemplateServiceInterface
{
    public function all(): Builder;
    public function create(array $attributes): Model;
    public function find(int $id): Model;

    public function update(array $attributes, int $id): bool;
    public function destroy(int $id);

    public function dropdown(): Collection;
    public function byTemplate(Model $template);
    public function byTemplateGroup(Model $template, $group);
    public function filter(Request $request);
}
