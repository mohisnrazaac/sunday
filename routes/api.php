<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Route::get('/panel/course/save', [CourseController::class, 'save'])->name('save');
Route::post('/panel/course/save', [AjaxController::class, 'sectionsave'])->name('sectionsave');
Route::post('/savelecture', [AjaxController::class, 'savelecture'])->name('savelecture');