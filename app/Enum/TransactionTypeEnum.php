<?php

namespace App\Enum;

abstract class TransactionTypeEnum extends BasicEnum
{
    const BUY = 0;
    const CANCELBUY = 1;
    const LENDINGS = 2;
    const CANCELLENDINGS = 3;
    const REQUISITION = 4;
    const CANCELREQUISITION = 5;
}
