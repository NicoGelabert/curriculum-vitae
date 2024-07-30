<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Skills extends Component
{
    public $skills;
    /**
     * Create a new component instance.
     * @param  mixed  $skills
     * @return void
     */
    public function __construct($skills)
    {
        $this->skills = $skills;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.skills');
    }
}