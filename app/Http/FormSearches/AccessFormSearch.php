<?php

namespace App\Http\FormSearches;


class AccessFormSearch
{
    public $search;
    public function __construct(String $search = null)
    {
        $this->search = $search;
    }
}
