<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\AccessoriesRepositoryInterface;
use App\Repositories\Interfaces\HistoriesRepositoryInterface;
use App\Repositories\Interfaces\LendRepositoryInterface;
use App\Repositories\Interfaces\TakeRepositoryInterface;

class DasboradController extends Controller
{
    private $accessoriesRepository;
    private $historiesRepository;
    private $lendRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AccessoriesRepositoryInterface $accessoriesRepositoryInterface,HistoriesRepositoryInterface $historiesRepositoryInterface)
    {
        $this->accessoriesRepository = $accessoriesRepositoryInterface;
        $this->historiesRepository = $historiesRepositoryInterface;
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        try {
            $accessories = $this->accessoriesRepository->all()->count();
            $take = $this->historiesRepository->takeAll()->count();
            $lend = $this->historiesRepository->lendAll()->count();
            return view('dasborad')->with([
                'accessories' => $accessories,
                'take' => $take,
                'lend' => $lend
                ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
