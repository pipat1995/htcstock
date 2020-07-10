<?php

namespace App\Enum;

abstract class TransactionTypeEnum extends BasicEnum
{
    const B = 'Buy';
    const CB = 'CancelBuy';
    const L = 'Lending';
    const CL = 'CancelLending';
    const R = 'Requisition';
    const CR = 'CancelRequisition';
}
