<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use App\Utility\Modules\Terms\ParticipantInfoGenerator;
use App\Utility\Modules\Terms\TermModule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MyCourseController extends Controller
{

    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function myCourse()
    {
        $this->authorize('myCourse.index');

        $courses = DB::table('enroll_user')
            ->select('courses.id as course_id', 'courses.title as courseTitle', 'courses.coursetheme as coursetheme', 
                    'departments.title as departmentTitle', 'courses.course_short_desc as courseDesc')
            ->join('courses', 'courses.id', '=', 'enroll_user.course_id')
            ->join('departments', 'departments.id', '=', 'courses.department_id')
            ->where('user_id', Auth::user()->id)
            ->get();

        return view('contents.learn.mycourses.list', compact('courses'));
    }


    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function learn($course_id)
    {
        $courses = DB::table('courses')
       ->select(
           'courses.id as courseId', 
           'courses.is_published as is_published',
           'courses.coursetheme as theme', 
           'courses.description as coursedescription',
           'courses.title as courseTitle',
       )
       ->join('departments', 'departments.id', '=', 'courses.department_id')
       ->join('enroll_user', 'enroll_user.course_id', '=', 'courses.id') // Corrected join condition
       ->where('courses.id', $course_id)
       ->get();


       $sessions = DB::table('sessions')
    ->select(
        'sessions.id as sessionId', 
        'sessions.title as sessionTitle', 
        DB::raw('GROUP_CONCAT(terms.title SEPARATOR "* ") as terms')
    )
    ->leftJoin('terms', 'terms.section_id', '=', 'sessions.id')
    ->where('sessions.course_id', $course_id) // Add this line to filter by session ID
    ->groupBy('sessions.id', 'sessions.title')
    ->get();
    //dd($sessions);


      // dd($courses);


    
        return view('contents.learn.mycourses.show', compact('courses', 'sessions'));
    }

    public function learndetails($course_id,$term_id)
    {
        //$this->authorize('participantAccessToTerm', [$term]);
        //echo $course_id;exit;

        //$participant = ParticipantInfoGenerator::getTermStatistic($participant);

       

    

        $media=DB::table('coursemediafile')
        ->where('course_id', $course_id)->get();


       // print_r($courses);

       $sections=DB::table('sessions')
       ->select('sessions.title as sectiontitle','sessions.id as section_id')
       ->where('sessions.course_id', $course_id)->get();


      /*
      
      
      
      
      
      $sections = DB::table('sessions as sess')
    ->select(
        'sess.id as session_id',
        'sess.title as sectiontitle',
        DB::raw('(
            SELECT GROUP_CONCAT(
               CONCAT( t.id ,"*",t.title, "*", t.description, "*" ,t.video ,"*", t.videoposter ,"*", t.externalurl, "*",t.youtube,"*",t.vimeo,"*",t.embeded , "*" , t.totaltime) SEPARATOR " | "
            ) 
            FROM terms t
            WHERE t.section_id =  sess.id
        ) AS lesson_details')
        
    )
    ->where('sess.course_id', $course_id)->get();*/

    //print_r(json_encode($sections));

   

    $contentdetails=DB::table('terms as t')
    ->where('t.id', $term_id)->get();
    



    
        
        
        return view('contents.learn.mycourses.detail', compact(['course_id',
            'sections','media' , 'contentdetails'
        ]));
    }

    public function grid()
    {
       
        $userId = Auth::id();
        
        //DB::enableQueryLog();
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
       //dd($courses );
        /*$queries = DB::getQueryLog();
           $lastQuery = end($queries);
           return response()->json([
               'data' => $courses,
               'last_query' => $lastQuery
           ]);*/
        return view('contents.learn.mycourses.student-grid', compact('courses'));
    }
}