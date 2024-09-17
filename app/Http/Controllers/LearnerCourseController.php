<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LearnerCourseController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        $courses = $user->courses; // Assuming a User model relationship

        return view('contents.learn.mycourses.dashboard', [
            'courses' => $courses,
        ]);
    }

}
