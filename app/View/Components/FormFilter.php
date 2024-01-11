<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormFilter extends Component
{
    /**
     * Create a new component instance.
     */

    public $filter;
    public function __construct($filter)
    {
        $this->filter = $filter;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-filter');
    }
}
