<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RangeController extends Controller
{
    public function index()
    {
        return view('contents.admin.range.index');
    }
}
