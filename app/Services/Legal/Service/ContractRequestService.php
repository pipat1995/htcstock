<?php
namespace App\Services\Legal\Service;

use App\Models\Legal\LegalContract;
use App\Services\BaseService;
use App\Services\Legal\Interfaces\ContractRequestServiceInterface;

class ContractRequestService extends BaseService implements ContractRequestServiceInterface
{
    /**
     * UserService constructor.
     *
     * @param LegalContract $model
     */
    public function __construct(LegalContract $model)
    {
        parent::__construct($model);
    }

    public function all()
    {
        try {
            return LegalContract::orderBy('created_at', 'desc')->paginate(10);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}