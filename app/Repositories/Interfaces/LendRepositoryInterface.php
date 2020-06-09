<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface LendRepositoryInterface
{
    public function all();

    public function edit($id);

    public function store(Request $var);

    public function update(Request $var, $id);

    public function delete($id);
}
