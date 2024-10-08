<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CheckUnCheck extends Component
{

    public bool $isChecked;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(bool $isChecked, public int $courseId)
    {
        $this->isChecked = $isChecked;
        $this->courseId = $courseId;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.check-un-check');
    }
}