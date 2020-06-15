<?php

namespace App\Repositories\Interfaces;

use App\Histories;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface HistoriesRepositoryInterface
{
    public function lendAll();
    public function takeAll();

    public function historieEdit(String $id);

    public function lendStore(Request $historie);
    public function takeStore(Request $historie);

    public function lendReturn(Histories $historie,String $userReturned);

    public function lendUpdate(Histories $historie, String $id);
    public function takeUpdate(Histories $historie, String $id);

    public function Delete(String $id);

    public function convertHistoriesUserInfo(Collection $histories ,array $users);

    public function historiesImport(String $access_id,String $qty);

    public function historyStockQty(String $access_id);
}
