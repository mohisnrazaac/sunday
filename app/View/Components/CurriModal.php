<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class CurriModal extends Component
{
    public $data;
    public $course_id;
    public $sections = [];

    public function __construct($data)
    {
        $this->data = $data;
    }
    public function mount()
    {
        $this->course_id = Session::get('course_id');
        dd('course_id'.$this->course_id);
       
    }

    public function render()
    {
       $sections= DB::table('sessions')
        ->select('id', 'sessions.title as section')
        ->where('sessions.course_id', $this->course_id)
        ->get()
        ->toArray();
        
        return view('components.modals.curriculum', ['sections' => $sections]);
    }
}
