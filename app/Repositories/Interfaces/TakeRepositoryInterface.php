<?php

namespace App\Repositories\Interfaces;

use App\Histories;
use Illuminate\Http\Request;

interface TakeRepositoryInterface
{
    public function all();

    public function edit(String $id);

    public function store(Request $var);

    public function update(Histories $var, String $id);

    public function delete(String $id);
}
