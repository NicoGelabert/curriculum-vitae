<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Educations extends Component
{
    public $educations;
    public $educationsJson;
    /**
     * Create a new component instance.
     * @param  mixed  $educations
     * @return void
     */
    public function __construct($educations, $educationsJson)
    {
        $this->educations = $educations;
        $this->educationsJson = $educationsJson;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.educations');
    }
}
