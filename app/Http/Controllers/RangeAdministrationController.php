<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RangeAdministrationController extends Controller
{
    public function administration()
    {
        return view('contents.admin.range.range_administration');
    }
}
