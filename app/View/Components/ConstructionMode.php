<?php

namespace App\View\Components;

use App\Models\Alarms;
use App\Models\Humidity;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ConstructionMode extends Component
{
    public $lastHumidity;
    public $lastAlarm;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->lastHumidity = Humidity::latest()->first();
        $this->lastAlarm = Alarms::latest()->first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.construction-mode');
    }
}
