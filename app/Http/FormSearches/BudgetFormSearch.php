<?php

namespace App\Http\FormSearches;


class BudgetFormSearch
{
    public $month;
    public $year;
    public function __construct(String $year = null,String $month = null)
    {
        $this->year = $year;
        $this->month = $month;
    }
}
