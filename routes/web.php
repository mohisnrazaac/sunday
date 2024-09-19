<?php

use App\Http\Controllers\Acl\PermissionController;
use App\Http\Controllers\Acl\RoleController;
use App\Http\Controllers\Acl\UserController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Admin\Badges\BadgeController;
use App\Http\Controllers\Admin\Menu\CourseManagmentController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\Education\CourseController;
use App\Http\Controllers\Education\DepartmentController;
use App\Http\Controllers\Education\Term\TermController;
use App\Http\Controllers\Education\Term\TermSessionController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\Front\CourseController as FrontCourseController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\learn\WorkoutController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\Mentors\MentorCommentsController;
use App\Http\Controllers\Mentors\MyLearnerController;
use App\Http\Controllers\Panel\MyCourseController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\RubricController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AjaxController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseDetailController;
use App\Http\Controllers\CourseGridViewController;
use App\Http\Controllers\ViewCourseController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\RangeController;
use App\Http\Controllers\ViewRangeController;
use App\Http\Controllers\RangeSettingController;
use App\Http\Controllers\RangeAdministrationController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\LearnerCourseController;
use App\Http\Controllers\CourseEditController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ChatController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//echo request()->route()->getActionName();
//exit;

Route::get('/', [FrontController::class, 'index'])->name('home');


Route::group(['prefix' => 'front', 'as' => 'front.'], function () {
    Route::get('/courses', [FrontCourseController::class, 'courses'])->name('courses');
    Route::get('/course/{course_id}', [FrontCourseController::class, 'course'])->name('course');
    Route::get('/plans', [FrontCourseController::class, 'plans'])->name('plans');
});

Route::middleware('auth')->group(function () {
    Route::get('/chat/{userId?}', [ChatController::class, 'index'])->name('chat.index');
    Route::post('/chat/send', [ChatController::class, 'sendMessage'])->name('chat.send');
    Route::get('/chat/messages/{userId}', [ChatController::class, 'fetchMessages'])->name('chat.messages');
});


Route::get('/panel/file/create/{course_id}', [FileController::class, 'create'])->name('create');
Route::get('/panel/file/getmedia/{course_id}', [FileController::class, 'media'])->name('media');
Route::post('/panel/file', [FileController::class, 'store'])->name('store');
Route::patch('panel/course/publish/{course_id}', [CourseController::class, 'publish'])->name('course.publish');


Route::get('panel/statistics', [StatisticsController::class, 'index'])->name('statistics.index');
Route::get('panel/range', [RangeController::class, 'index'])->name('range.index');
Route::get('panel/range/view', [ViewRangeController::class, 'index'])->name('range.view_range');
Route::get('panel/range/settings', [RangeSettingController::class, 'settings'])->name('range.range_settings');
Route::get('panel/range/admin', [RangeAdministrationController::class, 'administration'])->name('range.range_administration');
Route::get('panel/lab', [LabController::class, 'index'])->name('lab.index');



Route::get('panel/termbycourse/{course_id}', [TermController::class, 'gettermsbycourse'])->name('gettermsbycourse');


Route::post('/panel/course/save', [AjaxController::class, 'sectionsave'])->name('sectionsave');
Route::post('/panel/course/addcourse', [AjaxController::class, 'coursesave'])->name('coursesave');
Route::post('/savelecture', [AjaxController::class, 'savelecture'])->name('savelecture');
Route::post('/savequiz', [AjaxController::class, 'savequiz'])->name('savequiz');
Route::post('/savemultichoiceform', [AjaxController::class, 'savemultichoiceform'])->name('savemultichoiceform');
Route::post('/savecoursemedia', [AjaxController::class, 'savecoursemedia'])->name('savecoursemedia');
Route::post('/savesinglechoice', [AjaxController::class, 'savesinglechoice']);
Route::post('/savesmultiline', [AjaxController::class, 'savesmultiline']);
Route::post('/savesingleline', [AjaxController::class, 'savesingleline']);
Route::post('/saveassignment', [AjaxController::class, 'saveassignment']);
Route::post('/fetchcurriculam', [AjaxController::class, 'getallsectionbycourse']);
Route::get('course-grid-view', [CourseGridViewController::class, 'grid'])->name('panel.courses.grid-view');

Route::get('/fetch-sections', [AjaxController::class, 'fetchSections'])->name('fetch.sections');
Route::post('/mediaupload', [AjaxController::class, 'upload'])->name('file.upload');
Route::get('/panel/importcourse/{course_id}', [TeacherController::class, 'importcourse'])->name('importcourse');


/*
|--------------------------------------------------------------------------
| Web Routes for learner access
|--------------------------------------------------------------------------
*/
Route::prefix('learn')->middleware(['verified'])->group(function () {

    Route::get('/task/{participant}/{sessionable}', [WorkoutController::class, 'task'])->name('taskLearner');
    Route::post('/task/{participant}/{sessionable}', [WorkoutController::class, 'prepared'])->name('taskLearnerPrepared');
    Route::post('/quiz/workout', [WorkoutController::class, 'workout'])->name('quizWorkout');

    // my course route
    Route::get('my/course', [MyCourseController::class, 'myCourse'])->name('myCourse');
    Route::get('my/course/{participant}', [MyCourseController::class, 'learn'])->name('learningCourse');
    Route::get('my/course/{course_id}', [MyCourseController::class, 'learn'])->name('learningCourse')->middleware('role:admin,student');
    Route::get('my/coursedetails/{course_id}/{term_id}', [MyCourseController::class, 'learndetails'])->name('learningCourse');

    // doing workout || excercise || quiz
    Route::get('/completeAndNext/{workout}', [WorkoutController::class, 'completedAndNext'])->name('completedAndNext');

     // Courses grid view under learn prefix
     Route::get('course-grid-view', [MyCourseController::class, 'grid'])->name('learn.courses.grid-view')->middleware('role:student');

    Route::middleware(['auth', 'role:student'])->group(function () {
        Route::get('my/courses/dashboard', [LearnerCourseController::class, 'dashboard'])->name('learner.courses.dashboard');
    });
});


/*
|--------------------------------------------------------------------------
| Web Routes for mentors and super-visor access
|--------------------------------------------------------------------------
*/
Route::prefix('mentor')->middleware(['verified'])->group(function () {

    Route::get('/learners', [MyLearnerController::class, 'myLearners'])->name('myLearners');
    Route::get('/learner/{user}', [ParticipantController::class, 'participantTerms'])->name('learnerShowTerms');
    Route::get('/workout/{participant}', [ParticipantController::class, 'participantWorkout'])->name('learnerParticipantWorkout');
    Route::get('/review/workout/{participant}/{workout}', [ParticipantController::class, 'reviewWorkout'])->name('reviewWorkout');
    Route::post('/review/update', [ParticipantController::class, 'reviewWorkoutUpdate'])->name('workoutMentorReviewUpdate');

    Route::resource('mentor-comments', MentorCommentsController::class);
});


/*
|--------------------------------------------------------------------------
| Web Routes for only Admin Access
|--------------------------------------------------------------------------
*/
Route::prefix('panel')->middleware(['verified'])->group(function () {

    // Admin Menu
    Route::get('/menu/education', [CourseManagmentController::class, 'courses'])->name('adminMenuCourse');
    Route::get('/menu/plugins', [CourseManagmentController::class, 'plugins'])->name('adminMenuPlugins');

    Route::get('/dashboard', [GeneralController::class, 'dashboard'])->name('dashboard');
    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::patch('/setting/{user}', [SettingController::class, 'update'])->name('setting.update');

    // Repository
    Route::resource('department', DepartmentController::class);
    Route::resource('course', CourseController::class);
    Route::resource('term', TermController::class);
    Route::resource('session', SessionController::class);
    Route::resource('file', FileController::class);
    Route::resource('activity', ActivityController::class);
    Route::resource('document', DocumentController::class);
    Route::resource('quiz', QuizController::class);
    Route::resource('question', QuestionController::class);
    Route::resource('rubric', RubricController::class);
    Route::resource('feedback', FeedbackController::class);
    Route::resource('plan', PlanController::class);
    Route::resource('badges', BadgeController::class);

    // Course and statistic pages
    Route::prefix('course/item')->group(function () {
        Route::get('detail', [CourseDetailController::class, 'show'])->name('courses.detail');
        Route::get('course-grid-view', [CourseGridViewController::class, 'grid'])->name('courses.grid-view');
        Route::get('view-course', [ViewCourseController::class, 'view'])->name('courses.view');
    });
    Route::get('statistics', [StatisticsController::class, 'index'])->name('statistics.index');
    Route::get('courses/import', [TeacherController::class, 'import'])->name('courses.import');
    Route::post('course/importcourse/{course_id}', [TeacherController::class, 'importcourse'])->name('course.importcourse');
    Route::get('courses/dashboard', [ViewCourseController::class, 'dashboard'])->name('course.dashboard');
    Route::get('teams', [TeamController::class, 'index'])->name('admin.manageTeam');
    Route::get('teams/create', [TeamController::class, 'create'])->name('admin.createTeam');
    Route::get('announcements', [AnnouncementController::class, 'index'])->name('admin.manageAnnouncements');
    Route::get('announcements/create', [AnnouncementController::class, 'create'])->name('admin.createAnnouncements');


    Route::middleware(['auth', 'role:Super-Admin'])->group(function () {
        Route::get('course/{course}/edit', [CourseEditController::class, 'edit'])->name('courses.edit');
        Route::patch('course/{course}', [CourseEditController::class, 'update'])->name('courses.update');
    });


    // signle functions:
    Route::get('logs', [LogController::class, 'index'])->name('logs');

    Route::get('/document/order/{from}/{move}', [DocumentController::class, 'orderChangeFiles'])->name("changeOrderFile");
    Route::get('/document/file/add/{document}/{file}', [DocumentController::class, 'addFileToDocument'])->name("addFileToDocument");
    Route::get('/document/file/delete/{documentFile}', [DocumentController::class, 'deleteFileAsDocument'])->name("deleteFileDocument");
    Route::get('/session/document/{session}/{active_id}', [SessionController::class, 'addDocumentToSession'])->name("addDocumentToSession");
    Route::get('/session/file/{session}/{active_id}', [SessionController::class, 'addFileToSession'])->name("addFileToSession");
    Route::get('/session/order/{from}/{move}', [SessionController::class, 'changeOrderSessionable'])->name("changeOrderSessionable");
    Route::get('/session/quiz/{session}/{active_id}', [SessionController::class, 'addQuizToSession'])->name("addQuizToSession");
    Route::get('/session/delete/{session_id}', [SessionController::class, 'deleteActivityAsSession'])->name("deleteActivityAsSession");


    // Global Configuration (Admin Only)
    Route::resource('/configuration', ConfigurationController::class)->middleware('role:Super-Admin');

    // rubric add to session
    Route::get('/session/rubric/{session}/{active_id}', [SessionController::class, 'addRubricToSession'])->name("addRubricToSession");

    // Quiz Question Relationship
    Route::get('/quiz/order/{from}/{move}', [QuizController::class, 'orderChangeQuestion'])->name("orderChangeQuestion");
    Route::get('/quiz/question/add/{parent}/{question}', [QuizController::class, 'addQuestionToQuiz'])->name("addQuestionToQuiz");
    Route::get('/quiz/question/delete/{quizQuestion}', [QuizController::class, 'deleteQuestionAsQuiz'])->name("deleteQuestionAsQuiz");

    // feedback question relationship
    Route::get('/feedback/order/{from}/{move}', [FeedbackController::class, 'orderChangeQuestionFeedback'])->name("orderChangeQuestionFeedback");
    Route::get('/feedback/question/add/{parent}/{question}', [FeedbackController::class, 'addQuestionToFeedback'])->name("addQuestionToFeedback");
    Route::get('/feedback/question/delete/{feedbackQuestion}', [FeedbackController::class, 'deleteQuestionAsFeedback'])->name("deleteQuestionAsFeedback");
    Route::get('/session/feedback/{session}/{active_id}', [SessionController::class, 'addFeedbackToSession'])->name("addFeedbackToSession");


    // add session  to term
    Route::get('/term/add/{term}/session/{session}', [TermSessionController::class, 'store'])->name("addSessionToTerm");
    Route::get('/term/remove/{term}/session/{session}', [TermSessionController::class, 'destroy'])->name("deleteSessionAsTerm");
    Route::get('/term/order/{from}/{move}', [TermSessionController::class, 'order'])->name("orderChangeSession");

    // ACL Route
    Route::resource('user', UserController::class)->middleware('role:Super-Admin');
    Route::resource('role', RoleController::class)->middleware('role:Super-Admin');
    Route::resource('permission', PermissionController::class)->middleware('role:Super-Admin');
    Route::post('role/permission/{role}', [RoleController::class, 'permission'])->name("role_permissions");
});
