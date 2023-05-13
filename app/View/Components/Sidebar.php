<?php

namespace App\View\Components;

use App\Models\Humidity;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
{
    public $humids;

    /**
     *
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->humids = Humidity::latest()->take(6)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sidebar');
    }
}
