<?php

namespace App\View\Components;

use App\Accessories;
use App\Histories;
use App\User;
use Illuminate\View\Component;

class TakeModal extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $accessories = Accessories::all();
        $users = User::userinfo();
        return view('components.take-modal',\compact('accessories','users'));
    }
}
