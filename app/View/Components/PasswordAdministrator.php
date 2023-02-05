<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PasswordAdministrator extends Component
{
    public $PostData;

    public $Passwords;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($PostData = null, $Passwords = null)
    {
        $this->Passwords = $Passwords;
        $this->PostData = $PostData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.password-administrator');
    }
}
