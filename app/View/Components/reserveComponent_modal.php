<?php

namespace App\View\Components;

use App\Models\Clinic;
use Illuminate\View\Component;

class reserveComponent_modal extends Component
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
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $clinics = Clinic::ofUnBlocked(Clinic::UN_BLOCKED)->get();
        return view('components.reserve-component_modal',['clinics'=>$clinics]);
    }
}
