<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\UploadFiles;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;

class TeacherController extends Controller
{
    //
    public function importcourse($course_id)
    {
       // DB::enableQueryLog();
        $userId = Auth::id();
    

    // Check if the record already exists
    $exists = DB::table('course_teacher')
        ->where('course_id', $course_id)
        ->where('user_id', $userId) 
        ->exists();

    if (!$exists) {
        $values = array('course_id' => $course_id,
        'user_id' => $userId);
        $last_session_id = DB::table('course_teacher')->insertGetId($values);
       /* $queries = DB::getQueryLog();
        $lastQuery = end($queries);
        return response()->json([
            'data' => $last_session_id,
            'last_query' => $lastQuery
        ]);*/
        return redirect()
        ->route("course.index")
        ->with('success', __('item imported successfully'));
    }else{
        return redirect()
        ->route("course.index")
        ->with('success', __('item already available'));
    }
    }

    public function import()
{
    // Fetch the courses from the database
    $courses = Course::with('department') // Ensure that the department relationship is loaded
        ->get()
        ->map(function ($course) {
            $course->courseId = (int) $course->id; // Ensure courseId is an integer
            $course->courseTitle = $course->title; // Map the course title correctly
            $course->departmentTitle = $course->department->title; // Get the department title from the related department
            return $course;
        });

    // Pass the courses to the view
    return view('contents.admin.courses.import', compact('courses'));
}




}
