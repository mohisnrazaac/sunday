<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseGridViewController extends Controller
{
    public function grid()
    {
        // Fetch courses or any other data needed for the grid view
     //   $courses = Course::all(); 
     exit;
     $userId = Auth::id();
     DB::enableQueryLog();
     $courses = DB::table('courses')
    ->select(
        'courses.id as courseId', 
        'courses.is_published as is_published',
        'courses.coursetheme as theme', 
        'courses.course_short_desc as coursedescription',
        'courses.title as courseTitle', 
        'departments.title as departmentTitle',
        'coursemediafile.video as video',
        'coursemediafile.videoposter as courseimage'
    )
    ->join('departments', 'departments.id', '=', 'courses.department_id')
    ->join('coursemediafile', 'coursemediafile.course_id', '=', 'courses.id')
    ->join('enroll_user', 'enroll_user.course_id', '=', 'courses.id') // Corrected join condition
    ->where('enroll_user.user_id', $userId)
    ->get();
     $queries = DB::getQueryLog();
        $lastQuery = end($queries);
        return response()->json([
            'data' => $courses,
            'last_query' => $lastQuery
        ]);
     return view('contents.learn.mycourses.student-grid', compact('courses'));
    }
}
