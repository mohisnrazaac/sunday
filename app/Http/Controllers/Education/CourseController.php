<?php

namespace App\Http\Controllers\Education;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Services\Back\Educations\CourseAdminService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{

    protected $service;

    public function __construct(CourseAdminService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $this->authorize('course.index');
       // $courses = $this->service->index();


       $courses = DB::table('courses')
       ->select('courses.id as courseId',
            'courses.is_published as is_published',
            'courses.title as courseTitle',
            'departments.title as departmentTitle',
            'courses.created_at',
            'courses.regular_price',
            'courses.discount_price',
            'courses.require_enroll')
       ->join('departments', 'departments.id', '=', 'courses.department_id')
       ->get();

       if(Auth::user()->hasRole('supervisor')){
        $userId = Auth::id();
        $supercourses = DB::table('courses')
        ->select('courses.id as courseId',
             'courses.is_published as is_published',
             'courses.title as courseTitle',
             'departments.title as departmentTitle',
             'courses.created_at',
             'courses.regular_price',
             'courses.discount_price',
             'courses.require_enroll')
        ->join('departments', 'departments.id', '=', 'courses.department_id')
        ->join('course_teacher','course_teacher.course_id','=','courses.id')
        ->where('course_teacher.user_id', $userId)
        ->get();

         // Fetch all departments using DB::table
        $departments = DB::table('departments')->get();
        DB::enableQueryLog();
        $departmentsmodal = DB::table('departments')
        ->leftJoin('courses', 'departments.id', '=', 'courses.department_id')
        ->select(
            'departments.id as department_id',
            'departments.title as department_title',
            DB::raw('IFNULL(courses.id, "") as course_id'),
            DB::raw('IFNULL(courses.title, "Course not found") as course_title')
        )
        ->whereNotNull('courses.id') // Ensure only departments with courses are fetched
        ->get()
        ->groupBy('department_id');
           /* $queries = DB::getQueryLog();
            $lastQuery = end($queries);
            return response()->json([
                'data' => 'last_session_id',
                'last_query' => $lastQuery
            ]);*/

       }
       else{
        $supercourses = DB::table('courses')
        ->select('courses.id as courseId',
             'courses.is_published as is_published',
             'courses.title as courseTitle',
             'departments.title as departmentTitle',
             'courses.created_at',
             'courses.regular_price',
             'courses.discount_price',
             'courses.require_enroll')
        ->join('departments', 'departments.id', '=', 'courses.department_id')
        ->join('course_teacher','course_teacher.course_id','=','courses.id')
        ->where('course_teacher.user_id', 0)
        ->get();
        $departments = [];
        $departmentsmodal=[];

       }

       

      
  //      $sql = $courses->toSql();
//dd($sql);
        return $this->service->view('index', compact('courses','supercourses','departments','departmentsmodal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        $this->authorize('course.create');
       // $get_lang = DB::table('language')->get();
        $creatCommand= $this->service->create();
      /*  $get_lang=DB::table('language')
        ->where('lang_type', 'Audio')->get();*/

      /*  $get_lang_cap=DB::table('language')
        ->where('lang_type', 'Caption')->get();
        $version = DB::table('versions')->get();*/
       // return $this->service->view('form', compact('get_lang','creatCommand','get_lang_cap','version'));
       return $this->service->view('form', compact('creatCommand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CourseRequest $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(CourseRequest $request)
    {

        echo($request->all());

        //print_r($request->all());exit;
       /* $this->authorize('course.create');
        $this->service->store($request->all());
        return $this->service->redirect(); */
    }

   


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $course_id
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit($course_id)
    {
        $this->authorize('course.edit');
       // $course = $this->service->edit($course_id);

        

       // $url = url('course/'.$course_id.'/edit');

        //$get_lang=DB::table('language')
        //->where('lang_type', 'Audio')->get();

        //$get_lang_cap=DB::table('language')
        //->where('lang_type', 'Caption')->get();
       // print_r($get_lang);exit;

      //  $get_lang = DB::table('language')->where('lang_type', 'Audio');
        
        //$get_lang_cap = DB::table('language')->where('lang_type', 'Caption');
      // return $this->service->view('form', compact('course','get_lang','get_lang_cap','url'));
      return $this->service->view('form',$this->service->edit($course_id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CourseRequest $request
     * @param  int  $course_id
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(CourseRequest $request, $course_id)
    {
        $this->authorize('course.edit');
        $this->service->update($request->all(), $course_id);
        return $this->service->redirect('warning');
    }

    /**
     * Remove the specified course from storage.
     *
     * @param  int  $course_id
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function destroy($course_id)
    {
        $this->authorize('course.delete');
        if ($this->service->destroy($course_id))
            return $this->service->redirect('warning');
    }
     /**
     * Publish the specified course from LMS.
     *
     * @param  int  $course_id
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    // public function publish($course_id)
    // {
    //     $this->authorize('course.delete');
    //     DB::table('courses')
    //     ->where('id', $course_id) // Find the user by their email
    //     ->limit(1) // Optional - ensure only one record is updated
    //     ->update(['is_published' => 1]); // Update the record in the database
    //     return $this->service->redirect('warning');
       
    // }

    public function publish($course_id)
    {
        $this->authorize('course.delete');
        
        $course = DB::table('courses')->where('id', $course_id)->first();
        
        if ($course) {
            $newStatus = $course->is_published == 1 ? 0 : 1; // Toggle status
            DB::table('courses')
                ->where('id', $course_id)
                ->update(['is_published' => $newStatus]);
            return response()->json(['success' => true]);
        }
        
        return response()->json(['success' => false], 404);
    }
}
