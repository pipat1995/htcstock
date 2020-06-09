<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\AccessoriesRepositoryInterface;
use App\Repositories\Interfaces\LendRepositoryInterface;
use App\Repositories\Interfaces\TakeRepositoryInterface;

class DasboradController extends Controller
{
    private $accessoriesRepository;
    private $takeRepository;
    private $lendRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AccessoriesRepositoryInterface $accessoriesRepositoryInterface, TakeRepositoryInterface $takeRepositoryInterface, LendRepositoryInterface $lendRepositoryInterface)
    {
        $this->accessoriesRepository = $accessoriesRepositoryInterface;
        $this->takeRepository = $takeRepositoryInterface;
        $this->lendRepository = $lendRepositoryInterface;
        $this->middleware(['auth', 'verified']);
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
            $take = $this->takeRepository->all()->count();
            $lend = $this->lendRepository->all()->count();
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
