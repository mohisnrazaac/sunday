<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class ViewCourseController extends Controller
{
    public function view()
    {
        $course = Course::find(1); 
        return view('contents.admin.courses.view-course', compact('course'));
    }

    public function dashboard()
    {
        return view('contents.admin.courses.dashboard'); // Ensure this matches your view file path
    }
}
