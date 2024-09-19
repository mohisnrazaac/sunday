<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseDetailController extends Controller
{
    /**
     * Display the course detail page.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('contents.admin.courses.detail', compact('course'));
    }
}
