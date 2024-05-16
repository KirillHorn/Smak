<?php

namespace App\View\Components;

use Illuminate\View\Component;

class pdf extends Component
{
    public $orders;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($orders)
    {
        $this->orders = $orders;

        $this->completedOrdersCount();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     * 
     * 
     */

    public function render()
    {
        return view('components.pdf');
    }
}
