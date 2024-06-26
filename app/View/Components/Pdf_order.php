<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Pdf_order extends Component
{
    public $orders;

    /**
     * Create a new component instance.
     *
     * @param $orders
     */
 
    public function __construct($orders)
    {
        $this->orders = $orders;
    }

 

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.pdf', ['orders' => $this->orders]);
    }
}