<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Trend extends Component
{
    public $records;

    public function __construct($records)
    {
        $this->records = $records;
    }

    public function render()
    {
        return view('components.trend');
    }
}
