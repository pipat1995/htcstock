<?php

namespace App\Http\FormSearches;


class ReportFormSearch
{
    public $access_id, $s_created_at, $e_created_at;
    public function __construct(String $access_id = null, String $s_created_at = null, String $e_created_at = null)
    {
        $this->access_id = $access_id;
        $this->s_created_at = $s_created_at;
        $this->e_created_at = $e_created_at;
    }
}
