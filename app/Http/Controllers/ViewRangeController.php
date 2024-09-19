<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewRangeController extends Controller
{
    public function index()
    {
        return view('contents.admin.range.view_range');
    }
}
