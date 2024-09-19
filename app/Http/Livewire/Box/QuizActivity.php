<?php

namespace App\Http\Livewire\Box;

use App\Models\Quiz;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class QuizActivity extends Component
{
    use WithPagination;
    protected string $paginationTheme = 'bootstrap';
    
    public $session;


    

    public function mount($session)
    {
        $this->session = $session;
        
    }
    

    /**
     * render
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
       
        
        //$quizes =  Quiz::paginate();
        $quizes=DB::table('quizzes')
        ->where('session_id', $this->session)->get();
        return view('livewire.box.quiz-activity', compact([
            'quizes'
        ]));
    }
}
