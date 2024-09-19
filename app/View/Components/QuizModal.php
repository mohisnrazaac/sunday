<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Http\Request; 


class QuizModal extends Component
{
   public int $data;
   
    
   
    /**
     * Create a new component instance.
     *
     * @return void
     */
public function __construct(int $data)
    {
        $this->data =  $data;

      //  print_r($data."micasony");exit;
        
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modals.quiz')->withData($this->data);
    }
}
