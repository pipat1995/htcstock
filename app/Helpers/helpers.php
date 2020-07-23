<?php

use Illuminate\Support\Facades\Request;

function changeDateFormate($date, $date_format)
{
    return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($date_format);
}

function convertToTHB(float $amount)
{
    return number_format($amount, 2)." ฿ ";
}

function isActive(string $route)
{
    return Request::is($route) ? 'mm-active' : '';
}
