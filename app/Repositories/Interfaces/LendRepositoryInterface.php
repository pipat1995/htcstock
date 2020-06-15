<?php

namespace App\Repositories\Interfaces;

use App\Histories;
use Illuminate\Http\Request;

interface LendRepositoryInterface
{
    public function all();

    public function edit(String $id);

    public function store(Request $var);

    public function lendReturn(Histories $var,String $userReturned);

    public function update(Histories $var, String $id);

    public function delete(String $id);
}
