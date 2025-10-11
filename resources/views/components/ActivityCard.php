<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ActivityCard extends Component
{
    public $activity;

    public function __construct($activity)
    {
        $this->activity = $activity;
    }

    public function render()
    {
        return view('components.activity-card');
    }
}
