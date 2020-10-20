<?php

namespace App\Services\Legal\Service;

use App\Models\Legal\LegalPaymentTerm;
use App\Services\BaseService;
use App\Services\Legal\Interfaces\PaymentTermServiceInterface;

class PaymentTermService extends BaseService implements PaymentTermServiceInterface
{
    /**
     * UserService constructor.
     *
     * @param LegalPaymentTerm $model
     */
    public function __construct(LegalPaymentTerm $model)
    {
        parent::__construct($model);
    }
}
