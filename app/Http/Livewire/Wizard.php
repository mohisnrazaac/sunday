<?php
  
namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Team;
use Illuminate\Support\Facades\DB;
use App\Traits\UploadFiles;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
  
class Wizard extends Component
{
    public $currentStep = 1;
    public $title, $image, $Version, $department_id ,$course_short_desc,$learning_purpose,$requirements,$course_level,$audio_lang,$description;
    public $caption_lang,$videotitle,$vdescription,$course_id,$ver_id, $last_course_id;
    public $sectiontitle,$lecturetitle,$lecimage,$lecdescription,$quizetitle,$quizeattempt,$quizduration,$min_pass_score;
    public $is_shuffle,$is_mentor,$show_question,$random_question,$quizdescription,$coursetheme;
    public $videoAttachment,$externalurl,$youtubeurl,$vimeourl,$embeddedurl;
    public $section;
    public $successMsg = '';
  
    /**;
     * Write code on Method
     */
    public function render()
    {

        $version = DB::table('versions')->get();
        $department = DB::table('departments')->get();
        $captionlangs = DB::table('captionlangs')->get();
        $audiolangs = DB::table('audiolangs')->get();
        $sections = DB::table('sessions')
        ->select('id','sessions.title as section')
        ->where('sessions.course_id', Session::get('course_id'))
        ->get();
        
        return view('livewire.wizard',compact('sections','version','department','captionlangs','audiolangs'));
    }
  
    /**
     * Write code on Method
     */
    public function firstStepSubmit()
    {
        /* $validatedData = $this->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'detail' => 'required',
        ]); */

       // print_r($_REQUEST);

       //echo($this->name);
 
       $values = array('department_id' => $this->department_id,
       'title' => $this->title,
       'coursetheme' => $this->coursetheme,
   'description' => $this->description,
   'course_short_desc' => $this->course_short_desc,
   'learning_purpose' => $this->learning_purpose ,
   'requirements'  => $this->requirements ,
   'course_level' => $this->course_level ,
   'audio_lang'   => $this->audio_lang ,
   'caption_lang'  => $this->caption_lang,
   'image' => 'noimage' ,
   'ver_id' => $this->ver_id

);
    $this->last_course_id = DB::table('courses')->insertGetId($values);  

       //$last_course_id = DB::getPdo()->lastInsertId();

       //echo $course_id;

       

      
       
 
        $this->currentStep = 2;
    }
  
    /**
     * Write code on Method
     */
    public function secondStepSubmit()
    {
        /* $validatedData = $this->validate([
            'status' => 'required',
        ]); */

     //   $values = array('title' => $this->sectiontitle);

       // $this->last_course_id = DB::table('sessions')->insertGetId($values);



  
        $this->currentStep = 3;
    }

    public function save()
    {
      /*   Post::create([
            'title' => $this->title,
            'content' => $this->content,
        ]);
 
        $this->redirect('/posts'); */

        //echo($this->title);

        $values = array('id' => 1,'name' => 'Dayle');
        DB::table('courses')->insert($values);
    }
  
    /**
     * Write code on Method
     */
    public function submitForm()
    {
       /*  Team::create([
            'name' => $this->name,
            'price' => $this->price,
            'detail' => $this->detail,
            'status' => $this->status,
        ]);
  
        $this->successMsg = 'Team successfully created.';
  
        $this->clearForm(); */

      
        
       
  
        $this->currentStep = 1;
    }
  
    /**
     * Write code on Method
     */
    public function back($step)
    {
        $this->currentStep = $step;    
    }
  
    /**
     * Write code on Method
     */
    public function clearForm()
    {
        /* $this->name = '';
        $this->price = '';
        $this->detail = '';
        $this->status = 1; */
    }
}