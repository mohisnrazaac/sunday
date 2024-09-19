<?php

namespace App\Http\Livewire\Container;

use App\Models\Session;
use App\Models\Term;
use Livewire\Component;

use Illuminate\Support\Facades\DB;

class SessionPanel extends Component
{

    public string $search = '';

    public string $route;
    public int $parent;

    /**
     * render
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        /**
         *  get the current term
         **/
        $term = Term::findorfail($this->parent);
        //print_r($this->parent);exit;

        /**
         *  this part is created to make all sessions available for current term.
         **/
        //print_r($request->route('id'));exit;
        $search = '%' . $this->search . '%';
       /* $sessions = Session::where('title', 'LIKE', $search)
            ->whereNotIn('id', $term->Sessions->pluck('id')->toArray())
            ->orderby('updated_at', 'desc')
            ->paginate();*/
            $sessions =   DB::table('sessions')
            ->where('sessions.term_id', $this->parent)
            ->get();

        return view('livewire.container.session-panel', [
            'sessions' => $sessions
        ]);
    }
}
