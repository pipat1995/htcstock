<?php

namespace App\Http\FormSearches;


class BuyFormSearch
{
    public $access_id, $ir_no, $po_no,$s_created_at,$e_created_at;
    public function __construct(String $access_id = null, String $ir_no = null, String $po_no = null, String $s_created_at = null,String $e_created_at = null)
    {
        $this->access_id = $access_id;
        $this->ir_no = $ir_no;
        $this->po_no = $po_no;
        $this->s_created_at = $s_created_at;
        $this->e_created_at = $e_created_at;
    }
}
