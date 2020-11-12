<?php
namespace App\Services\Legal\Service;

use App\Models\Legal\LegalContract;
use App\Services\BaseService;
use App\Services\Legal\Interfaces\ContractRequestServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function getByCreated()
    {
        try {
            return LegalContract::where('created_by',Auth::id())->orderBy('created_at', 'desc')->paginate(10);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function filter(Request $request)
    {
        return LegalContract::filter($request)->where('trash',false)->orderBy('created_at', 'desc')->paginate(10);
    }
}