<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\UploadFiles;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class AjaxController extends Controller
{
    public function fetchSections()
    {
        $course_id = Session::get('course_id');

        if ($course_id) {
            $sections = DB::table('sessions')
                        ->select('id', 'sessions.title as section')
                        ->where('sessions.course_id', $course_id)
                        ->get();

            return response()->json($sections);
        } else {
            return response()->json([]);
        }
    }
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,png,pdf|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('uploads', 'public');

            $fileUpload = "file upload";

            return response()->json(['success' => true, 'file_path' => $filePath, 'fileUpload' => $fileUpload]);
        }

        return response()->json(['success' => false, 'message' => 'File not uploaded']);
    }


    function getallsectionbycourse(Request $request)
    {
        $section = DB::table('sessions')
        ->select('id','sessions.title as section')
        ->where('sessions.course_id', $request->courseid)
        ->get();

        
        $html = '';
         
 $hasContent = false;
        foreach ($section as $key => $value) {
           

            $lecture = DB::table('terms')
            ->select('terms.title as lecture')
            ->where('terms.section_id',  $value->id)
            ->get();

           
            $quize = DB::table('quizzes')
            ->select('quizzes.title as quize')
            ->where('quizzes.session_id',  $value->id)
            ->get();
            $assignment = DB::table('assignment')
            ->select('assignment.title as assignment')
            ->where('assignment.section_id',  $value->id)
            ->get();

           

           
            $html  .= ' <div class="card fs-card mt-4">
                            <div class="card-body fs-subtitle my-2">
                                <div class="row introduction">
                                    <div class="col">
                                        <i class="fa-solid fa-bars color-cyan"></i> '.$value->section.'
                                    </div>
                                    <div class="col text-end">
                                        <i class="fa-regular cursor-pointer fa-pen-to-square mx-3 dark-small-text"></i>
                                        <i class="fa-solid cursor-pointer fa-trash dark-small-text"></i>
                                    </div>
                                </div>
                            </div>
                        </div>';
                        
                        // Initial part of the div without pt-4 pb-3
                        $contentDiv = '<div class="card fs-card">';
                        $contentHtml = '';
                       
                       
                        foreach ($lecture as $key => $value) {
                            $hasContent = true;
                            $contentHtml .= '<div class="card-body fs-subtitle">
                                <div class="row lecture-outer-card">
                                    <div class="col-12">
                                        <div class="card cursor-pointer mx-3 mb-2">
                                            <div class="card-body text-start">
                                                <i class="fa-solid fa-file-lines color-cyan-2"></i> <span>'.$value->lecture.'</span>
                                                <div class="float-end ">
                                                    <small class="ms-4 text-end text-secondary">
                                                    <i class="fa-regular fa-clock"></i> 16:32 
                                                    </small>
                                                    <i class="fa-regular cursor-pointer fa-pen-to-square mx-1 dark-small-text"></i>
                                                    <i class="fa-solid cursor-pointer  fa-trash dark-small-text"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                           </div>';
                        }
                        foreach ($quize as $key => $value) {
                            $hasContent = true;
                            $contentHtml .= '<div class="card-body fs-subtitle">
                                <div class="row lecture-outer-card">
                                    <div class="col-12">
                                        <div class="card cursor-pointer mx-3 mb-2">
                                            <div class="card-body text-start">
                                                <i class="fa-solid fa-bars-staggered color-cyan-2"></i> <span>'.$value->quize.'</span>
                                                <div class="float-end ">
                                                    <small class="ms-4 text-end text-secondary">
                                                    <i class="fa-regular fa-clock"></i> 16:32 
                                                    </small>
                                                    <i class="fa-regular cursor-pointer fa-pen-to-square mx-1 dark-small-text"></i>
                                                    <i class="fa-solid cursor-pointer  fa-trash dark-small-text"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                           </div>';
                        }
                        foreach ($assignment as $key => $value) {
                            $hasContent = true;
                            $contentHtml .= '<div class="card-body fs-subtitle">
                                <div class="row lecture-outer-card"> <div class="col-12">
                                        <div class="card cursor-pointer mx-3 mb-2">
                                            <div class="card-body text-start">
                                                <i class="fa-regular fa-clipboard color-cyan-2"></i> <span>'.$value->assignment.'</span>
                                                <div class="float-end ">
                                                    <small class="ms-4 text-end text-secondary">
                                                    <i class="fa-regular fa-clock"></i> 16:32 
                                                    </small>
                                                    <i class="fa-regular cursor-pointer fa-pen-to-square mx-1 dark-small-text"></i>
                                                    <i class="fa-solid cursor-pointer  fa-trash dark-small-text"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                               </div>';
                        }
                        if ($hasContent) {
                            // Add pt-4 pb-3 class if any content exists
                            $contentDiv = '<div class="card fs-card py-4">';
                        }
                    
                        $html .= $contentDiv . $contentHtml . '</div>';


           


        }

        return   $html;
    }
    //
    function sectionsave(Request $request)
    {
        if($request->ajax()){

            $values = array('title' => $request->title,
                        'course_id' => $request->last_course_id);
           

       $last_session_id = DB::table('sessions')->insertGetId($values);

       return $last_session_id;
            }
            
     }

     function coursesave(Request $request)
     {
        
        $courseTitle = $request->title;

        // Check if a course with the same title already exists
        $existingCourse = DB::table('courses')
            ->where('title', $courseTitle)
            ->where('department_id', $request->department_id)
            ->first();
        
        if ($existingCourse) {
            // Handle the situation where the course already exists
            // For example, you can return a message or redirect with an error
           // return redirect()->back()->with('error', 'A course with this title already exists.');
        } else {
            // If the course does not exist, insert it
            $values = array(
                'department_id' => $request->department_id,
                'title' => $request->title,
                'coursetheme' => $request->coursetheme,
                'description' => $request->descriptiondone,
                'course_short_desc' => $request->course_short_desc,
                'learning_purpose' => $request->learning_purpose,
                'requirements' => $request->requirements,
                'course_level' => $request->course_level,
                'audio_lang' => $request->audio_lang,
                'caption_lang' => $request->caption_lang,
                'image' => 'noimage',
                'ver_id' => $request->ver_id
            );
        
            $last_course_id = DB::table('courses')->insertGetId($values);
        
            // Clear the session and set the new course ID
            Session::forget('course_id');
            Session::put('course_id', $last_course_id);
            
            return response()->json([
                'message' => 'Question saved successfully!',
                'last_course_id' => $last_course_id, // Assuming this is the ID you want to return
            ]);
        }

        
         
        
     }

     function savelecture(Request $request)
{
    // Define the path where files will be saved
    $directory = public_path('uploads');

    // Check if the directory exists
    if (!file_exists($directory)) {
        // Log an error if the directory does not exist
        Log::error("Directory does not exist: $directory");
        return response()->json(['error' => 'Directory does not exist.'], 500);
    }

    // Initialize variables to store file paths
    // Initialize variables to store file paths
    $filePath = "";
    $fileAttachment = "";
    $formFilePath = "";
   

    // Check if the videoAttachment file is present and handle the upload
    if ($request->hasFile('videoAttachment')) {
        try {
            $VfileName = time() . '_' . $request->file('videoAttachment')->getClientOriginalName();
            $filePath = $request->file('videoAttachment')->move($directory, $VfileName);
            Log::info("Video attachment saved successfully at $filePath.");
        } catch (\Exception $e) {
            Log::error("Failed to save video attachment: " . $e->getMessage());
            return response()->json(['error' => 'Failed to save video attachment.'], 500);
        }
    } else {
        Log::info("No video attachment provided.");
    }

    // Check if the fileAttachment file is present and handle the upload
    if ($request->hasFile('fileAttachment')) {
        try {
            $DocufileName = time() . '_' . $request->file('fileAttachment')->getClientOriginalName();
            $fileAttachment = $request->file('fileAttachment')->move($directory, $DocufileName);
            Log::info("File attachment saved successfully at $fileAttachment.");
        } catch (\Exception $e) {
            Log::error("Failed to save file attachment: " . $e->getMessage());
            return response()->json(['error' => 'Failed to save file attachment.'], 500);
        }
    } else {
        Log::info("No file attachment provided.");
    }

    if ($request->hasFile('videoposter')) {
        try {
            $ImagefileName = time() . '_' . $request->file('videoposter')->getClientOriginalName();
            $formFilePath = $request->file('videoposter')->move($directory, $ImagefileName);
            Log::info("Form file saved successfully at $formFilePath.");
        } catch (\Exception $e) {
            Log::error("Failed to save form file: " . $e->getMessage());
            return response()->json(['error' => 'Failed to save form file.'], 500);
        }
    } else {
        Log::info("No form file provided.");
    }

    // Prepare the data to be inserted into the database
    $values = array(
        'title' => $request->lecturetitle,
        'course_id' => $request->last_course_id,
        'section_id' => $request->sectionsDropdown,
        'description' => $request->lecdescription,
        'fileattachment' => "uploads/".$DocufileName,
        'video' => "uploads/".$VfileName,
        'videoposter' => "uploads/".$ImagefileName,
        'externalurl' => $request->externalurllec,
        'youtube' => $request->youtubeurllec,
        'vimeo' => $request->vimeourllec,
        'embeded' => $request->embeddedurllec
    );

    // Insert the data into the database and get the ID of the last inserted record
    try {
        $last_session_id = DB::table('terms')->insertGetId($values);
        Log::info('Lecture saved successfully with ID: ' . $last_session_id);

        // Return a JSON response indicating success
        return response()->json([
            'message' => 'Lecture saved successfully!',
            'last_lec_id' => $last_session_id,
        ]);
    } catch (\Exception $e) {
        Log::error("Failed to save lecture: " . $e->getMessage());
        return response()->json(['error' => 'Failed to save lecture.'], 500);
    }
}



function savecoursemedia(Request $request)
{
    // Define the path where files will be saved
    $directory = public_path('uploads');

    // Check if the directory exists
    if (!file_exists($directory)) {
        Log::error("Directory does not exist: $directory");
        return response()->json(['error' => 'Directory does not exist.'], 500);
    }

    // Initialize variables to store file paths
    $filePath = "";
    $formFilePath = "";
    $VfileName = "";
    $ImagefileName = "";

    // Check if the videoAttachment file is present and handle the upload
    if ($request->hasFile('videoAttachment')) {
        try {
            $VfileName = time() . '_' . $request->file('videoAttachment')->getClientOriginalName();
            $filePath = $request->file('videoAttachment')->move($directory, $VfileName);
            Log::info("Video attachment saved successfully at $filePath.");
        } catch (\Exception $e) {
            Log::error("Failed to save video attachment: " . $e->getMessage());
            return response()->json(['error' => 'Failed to save video attachment.'], 500);
        }
    } else {
        Log::info("No video attachment provided.");
    }

    if ($request->hasFile('videoposter')) {
        try {
            $ImagefileName = time() . '_' . $request->file('videoposter')->getClientOriginalName();
            $formFilePath = $request->file('videoposter')->move($directory, $ImagefileName);
            Log::info("Form file saved successfully at $formFilePath.");
        } catch (\Exception $e) {
            Log::error("Failed to save form file: " . $e->getMessage());
            return response()->json(['error' => 'Failed to save form file.'], 500);
        }
    } else {
        Log::info("No form file provided.");
    }

    // Prepare the data to be inserted into the database
    $values = array(
        'course_id' => $request->last_course_id,
        'video' => $VfileName ? "uploads/".$VfileName : null, // Set to null if no file uploaded
        'videoposter' => $ImagefileName ? "uploads/".$ImagefileName : null, // Set to null if no file uploaded
        'externalurl' => $request->externalurl ? $request->externalurl : null,
        'youtube' => $request->youtubeurl ? $request->youtubeurl : null,
        'vimeo' => $request->vimeourl ? $request->vimeourl : null,
        'embeded'  => $request->embeddedurl ? $request->embeddedurl : null
    );

    // Insert the data into the database and get the ID of the last inserted record
    //$last_course_id = DB::table('coursemediafile')->insertGetId($values); 
    try {
        $last_course_id = DB::table('coursemediafile')->insertGetId($values); 
        Log::info('Lecture saved successfully with ID: ' . $last_course_id);

        // Return a JSON response indicating success
        return response()->json([
            'message' => 'Media saved successfully!',
            'last_media' => $last_course_id,
        ]);
    } catch (\Exception $e) {
        Log::error("Failed to save Media: " . $e->getMessage());
        return response()->json(['error' => 'Failed to save Media.'], 500);
    }
}
     function savequiz(Request $request)
     {
        if($request->ajax())
        {
            $values = array('title' => $request->quizetitle,
             'course_id' => $request->last_course_id,
            'session_id' => $request->sectionsDropdownQ,
            'description'   => $request->quizdescription,
            'attempt' => $request->quizeattempt,
            'duration' => $request->quizduration,
            'is_shuffle'   => 1,
            'min_pass_score'   => $request->min_pass_score,
            'show_question' => $request->show_question,
            'random_question'   => $request->random_question,
            'is_mentor' => 1
        );

        $last_session_id = DB::table('quizzes')->insertGetId($values);
        return $last_session_id;

        }
        return "http";

     }

     function savesmultiline(Request $request)
     {


        

       // $endofarray =  array_key_last($request->all());
       
       
         
                if(isset($request['multiText'])){
                    $values = array('title' => "Question1",
                'quiz_id'  => $request->last_quize_id,
                'question_body' => $request['multiText'],
               'answer' => "no ans",
               'question_type_id'   => 4 );

               $last_session_id = DB::table('questions')->insertGetId($values);

                }

                

      
            return true; 

         
     }  

     function saveassignment(Request $request)
     {
       
       
                
            // $file = $request->file('videoAttachment');
             //$filename = time() . '_' . $file->getClientOriginalName();
             //$videoAttachment = $file->storeAs('course', $filename, 'public');
             $filePath = $request->file('uploadfile')->store('uploads', 'public');

            // Define the path where files will be saved
    $directory = public_path('uploads');

    // Check if the directory exists
    if (!file_exists($directory)) {
        // Log an error if the directory does not exist
        Log::error("Directory does not exist: $directory");
        return response()->json(['error' => 'Directory does not exist.'], 500);
    }

    // Initialize variables to store file paths
    // Initialize variables to store file paths
    $filePath = "";
   
   

    // Check if the videoAttachment file is present and handle the upload
    if ($request->hasFile('uploadfile')) {
        try {
            $VfileName = time() . '_' . $request->file('uploadfile')->getClientOriginalName();
            $filePath = $request->file('uploadfile')->move($directory, $VfileName);
            Log::info("Video attachment saved successfully at $filePath.");
        } catch (\Exception $e) {
            Log::error("Failed to save video attachment: " . $e->getMessage());
            return response()->json(['error' => 'Failed to save video attachment.'], 500);
        }
    } else {
        Log::info("No video attachment provided.");
    }
           

         

          $values = array('course_id' => $request->last_course_id,
          'section_id' =>$request->sectionsDropdownA,
          'description' =>$request->description,
          'title' =>$request->title,
     'uploadfile' =>  "uploads/".$VfileName ,
     'timeduration' => $request->timeduration,
 'totalnumbers' => $request->totalnumbers,
 'passingmarks' => $request->passingmarks,
 'uploadlimit' => $request->uploadlimit,
 'uploadsize'  => $request->uploadsize );

 try {
    $last_session_id =DB::table('assignment')->insertGetId($values);
    Log::info('Assignment saved successfully with ID: ' . $last_session_id);

    // Return a JSON response indicating success
    return response()->json([
        'message' => 'Assignment saved successfully!',
        'last_lec_id' => $last_session_id,
    ]);
} catch (\Exception $e) {
    Log::error("Failed to save Assignment: " . $e->getMessage());
    return response()->json(['error' => 'Failed to save Assignment.'], 500);
}

 
  
     }
     function savesingleline(Request $request)
     {


        

       // $endofarray =  array_key_last($request->all());
       
       
         
                if(isset($request['singleText'])){
                    $values = array('title' => "Question1",
                'quiz_id'  => $request->last_quize_id,
                'question_body' => $request['singleText'],
               'answer' => "No ans ",
               'question_type_id'   => 3 );

               $last_session_id = DB::table('questions')->insertGetId($values);

                }

                

      
            return true; 

         
     }     function savemultichoiceform(Request $request)
     {


        

        $endofarray =  array_key_last($request->all());
       
       
          /// $totalQuestions  = $request->totalmultiplechoic;
           $totalQuestions=    intdiv(count($request->all()), 6);

            //return $totalQuestions;
            // Initialize an empty array
            
           // return $request->all();

           $startrow = explode("-",$request['uniquekey']);

           //return $request['questionquizBtn-3'];


            // Loop to populate the array
            for ($i = (int)$startrow[1]; $i <= $endofarray;  $i++ ) {
                $fieldname = "question".$i;
                $question  = $request['questionquizBtn-'.$i];

                //return $question;
                $options = [];
                
                for($j=1; $j<=4 ;$j++)
                {
                   
                    $options[] = [
                        'option'.$j => $request['option'.$j.'quizBtn-'.$i]
                        ];

                }
               
                   
                    for($k=1 ; $k <=4 ; $k++)
                    {
                       // $corrtansfield = "correctans".$k;
                        $options[] = ["correctAnswers" => $request['correctansquizBtn-'.$k]];


                    }

               

                    //$options[] = ["correctAnswer" => $request->correctans."".$i ];

                
               
                $jsonData = json_encode($options);
                if(isset($question)){
                    $values = array('title' => "Question".$i,
                'quiz_id'  => $request->last_quize_id,
                'question_body' => $question,
               'answer' => $jsonData,
               'question_type_id'   => 2 );

               $last_session_id = DB::table('questions')->insertGetId($values);

                }

                

       // return $last_session_id;
            }

            return true; 

         
     }

     function savesinglechoice(Request $request)
     {
      
      
      $totalQuestions=    intdiv(count($request->all()), 6);

        
           // $totalQuestions  = $request->totalmultiplechoic;

            //return $totalQuestions;
            // Initialize an empty array
            
           // return $request->all();

           //questionquizBtn-4
            //correctansquizBtn-4


            // Loop to populate the array
            for ($i = 1; $i <= $totalQuestions; $i++) {
                $fieldname = "question".$i;
                $question  = $request['questionquizBtn-'.$i];

                //return $question;
                $options = [];
                
                for($j=1; $j<=4 ;$j++)
                {
                   
                    $options[] = [
                        'option'.$j => $request['option'.$j.'qquizBtn-'.$i]
                        ];

                }
                
                   
                    for($k=$i ; $k <=$i ; $k++)
                    {
                        $corrtansfield = "correctansquizBtn-".$k;
                        $options[] = ["correctAnswers" => $request['correctansquizBtn-'.$k]];


                    }

                
               
                $jsonData = json_encode($options);

                $values = array('title' => "Question".$i,
                'quiz_id'  => $request->last_quize_id,
                'question_body' => $question,
               'answer' => $jsonData,
               'question_type_id'   => 1 );

               $last_session_id = DB::table('questions')->insertGetId($values);

       // return $last_session_id;
            }

            return true;

           
            //return "ajax";
        
     }

     

     function submitprogress()
     {
        
     }
}
