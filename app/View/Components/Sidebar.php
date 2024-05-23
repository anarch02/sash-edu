<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
{
    public array $sidebar = [];
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $dashboard = new \App\Http\Controllers\DashboardController();
        $this->sidebar = $dashboard->get_sidebar();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sidebar');
    }
}
