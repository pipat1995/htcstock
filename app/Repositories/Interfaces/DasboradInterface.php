<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface AccessoriesRepositoryInterface
{
    public function all();

    public function edit($id);

    public function store(Request $request);
    
    public function update(Request $request,  $id);

    public function delete( $id);
}
