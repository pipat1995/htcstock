<?php

namespace App\Services\Legal\Service;

use App\Models\Legal\LegalComercialTerm;
use App\Services\BaseService;
use App\Services\Legal\Interfaces\ComercialTermServiceInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class ComercialTermService extends BaseService implements ComercialTermServiceInterface
{
    /**
     * UserService constructor.
     *
     * @param LegalComercialTerm $model
     */
    public function __construct(LegalComercialTerm $model)
    {
        parent::__construct($model);
    }

    public function all(): Builder
    {
        try {
            return LegalComercialTerm::whereNotNull('id');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
