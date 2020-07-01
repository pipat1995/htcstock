<?php

namespace App\Http\FormSearches;


class UserFormSearch
{
    public $search;
    public function __construct(String $search = null)
    {
        $this->search = $search;
    }
}
