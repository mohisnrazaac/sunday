<?php

// app/Http/Controllers/StatisticsController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    /**
     * Show the statistics page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('contents.admin.statistics.statistics');
    }
}
