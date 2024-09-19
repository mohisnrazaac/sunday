<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RangeSettingController extends Controller
{
    public function settings()
    {
        return view('contents.admin.range.range_settings');
    }
}
