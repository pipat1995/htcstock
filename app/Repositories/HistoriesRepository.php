<?php

namespace App\Repositories;

use App\Histories;
use App\Repositories\Interfaces\HistoriesRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoriesRepository implements HistoriesRepositoryInterface
{
    public function lendAll()
    {
        try {
            $enums = (object) \config('enums.histories_types');
            $histories = Histories::whereIn('status', [$enums->LEND,$enums->BACK])->orderBy('created_at', 'desc')->get();
            return $histories;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function takeAll()
    {
        try {
            $enums = (object) \config('enums.histories_types');
            return Histories::where('status', $enums->TAKE)->orderBy('created_at', 'desc')->get();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function historieEdit(String $id)
    {
        try {
            $histories = Histories::find($id);
            return $histories;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function lendStore(Request $var)
    {
        try {
            $histories = Histories::firstOrNew([
                'access_id' => $var->access_id,
                'qty' => '-'.$var->qty,
                'user_lending' => $var->user_lending,
                'remark' => $var->remark,
                'create_by' => (int) Auth::user()->id,
                'status' => \config('enums.histories_types.LEND')
            ]);
            $histories->save();
            return $histories;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function takeStore(Request $var)
    {
        try {
            $histories = Histories::firstOrNew([
                'access_id' => $var->access_id,
                'qty' => '-'.$var->qty,
                'user_lending' => $var->user_lending,
                'remark' => $var->remark,
                'create_by' => (int) Auth::user()->id,
                'status' => \config('enums.histories_types.TAKE')
            ]);
            $histories->save();
            return $histories;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function lendReturn(Histories $var, String $userReturned)
    {
        try {
            $histories = Histories::firstOrNew([
                'access_id' => $var->access_id,
                'qty' => substr($var->qty,1),
                'user_lending' => $var->user_lending,
                'user_returned' => $userReturned,
                'remark' => $var->remark,
                'create_by' => (int) Auth::user()->id,
                'status' => \config('enums.histories_types.BACK')
            ]);
            $histories->save();
            return $histories;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function lendUpdate(Histories $var, String $id)
    {
        try {
            $histories = Histories::find($id);
            $histories->user_lend = $var->user_lend;
            $histories->status = \config('enums.histories_types.BACK');
            $histories->save();
            return $histories;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function takeUpdate(Histories $var, String $id)
    {
        try {
            \dd('update เบิกอุปกรณ์');
            return $var;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete(String $id)
    {
        try {
            $histories = Histories::find($id);
            $histories->delete();
            return $histories;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function convertHistoriesUserInfo(Collection $histories, array $users)
    {
        try {
            foreach ($histories as $value) {
                foreach ($users as $item) {
                    if ($item->id == $value->user_lending) {
                        $value->user_lending = $item->name;
                    }
                }
            }
            return $histories;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function historiesImport(String $access_id, String $qty)
    {
        try {
            $histories = Histories::firstOrNew([
                'access_id' => $access_id,
                'qty' => $qty,
                'create_by' => (int) Auth::user()->id,
                'status' => \config('enums.histories_types.IMPORT')
            ]);
            $histories->save();
            return $histories;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function historyStockQty(String $access_id)
    {
        try {
            return Histories::where('access_id',$access_id)->get()->sum('qty');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
