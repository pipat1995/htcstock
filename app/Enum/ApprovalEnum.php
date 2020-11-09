<?php

namespace App\Enum;

abstract class ApprovalEnum extends BasicEnum
{
    const A = 'approval';
    const R = 'reject';
    public static $types = [self::A, self::R];
}
