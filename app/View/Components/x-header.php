<?php

namespace App\View\Components;

use Illuminate\View\Component;

class x-header extends Component
{
    public $cafeJson;
    public $productJson;
    /**
     * Create a new component instance.
     * 
     *
     * @return void
     */
    public function __construct($cafeJson, $productJson)
    {
        $this->cafeJson = $cafeJson;
        $this->productJson = $productJson;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.x-header');
    }
}
