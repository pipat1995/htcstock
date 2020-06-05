<?php

namespace App\View\Components;

use App\Repositories\Interfaces\AccessoriesRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\View\Component;

class LendModal extends Component
{
    protected $userRepository;
    protected $accessoriesRepository;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(AccessoriesRepositoryInterface $accessoriesRepositoryInterface,UserRepositoryInterface $userRepositoryInterface)
    {
        $this->accessoriesRepository = $accessoriesRepositoryInterface;
        $this->userRepository = $userRepositoryInterface;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $accessories = $this->accessoriesRepository->all();
        $users = $this->userRepository->allNgacUserinfo();
        return view('components.lend-modal',\compact('accessories','users'));
    }
}
