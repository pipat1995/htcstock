<?php

namespace App\Repositories\Interfaces;

use App\Accessories;
use Illuminate\Http\Request;

interface AccessoriesRepositoryInterface
{
    public function all();

    public function edit(String $id);

    public function store(Request $request);
    
    public function update(Accessories $accessories, Request $request);

    public function delete(String $id);
}
