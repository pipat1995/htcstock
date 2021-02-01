<?php

namespace App\Services\IT\Service;

use App\Models\Vendor;
use App\Services\BaseService;
use App\Services\IT\Interfaces\VendorServiceInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class VendorService extends BaseService implements VendorServiceInterface
{
    /**
     * VendorService constructor.
     *
     * @param Vendor $model
     */
    public function __construct(Vendor $model)
    {
        parent::__construct($model);
    }

    public function all(): Builder
    {
        try {
            return Vendor::query();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function filter(Request $request)
    {
        return Vendor::filter($request)->orderBy('created_at', 'desc')->paginate(10);
    }



    public function dropdown(): Collection
    {
        try {
            return Vendor::all();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
