<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Experiences extends Component
{
    public $experiences;
    public $experiencesJson;
    /**
     * Create a new component instance.
     * @param  mixed  $experiences
     * @return void
     */
    public function __construct($experiences, $experiencesJson)
    {
        $this->experiences = $experiences;
        $this->experiencesJson = $experiencesJson;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.experiences');
    }
}
