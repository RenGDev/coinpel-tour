<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Avatar extends Component
{
    public $src;
    public $size;

    public function __construct($src = null, $size = 50)
    {
        $this->src = $src;
        $this->size = $size;
    }

    public function render()
    {
        return view('components.avatar');
    }
}
