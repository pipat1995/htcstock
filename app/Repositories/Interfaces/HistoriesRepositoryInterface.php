<?php

namespace App\Repositories\Interfaces;

interface HistoriesRepositoryInterface
{
    public function allTake();

    public function allLend();

    public function findById($id);

    public function store($var);

    public function update($var, $id);

    public function delete($id);
}
