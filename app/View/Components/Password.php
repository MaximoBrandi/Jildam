<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Password extends Component
{
    public $Password_Data;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->Password_Data = $data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.password');
    }
}
