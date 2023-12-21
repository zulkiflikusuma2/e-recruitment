<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JobSubmissionController;
use App\Http\Controllers\JobSubmissionApprovalController;
use App\Http\Controllers\ActiveVacanciesController;
use App\Http\Controllers\InactiveVacanciesController;
use App\Http\Controllers\ApplicantsController;
use App\Http\Controllers\SelectionResultController;
use App\Http\Controllers\AdministrationController;
use App\Http\Controllers\WrittenTestController;
use App\Http\Controllers\PracticeTestController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IdentityController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ScheduleApprovalController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ReportController;

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


// Route::resource('/', HomeController::class);

Route::get('/', [HomeController::class, 'index']);
Route::get('/detail-{home}', [HomeController::class, 'show']);
Route::post('/', [MessageController::class, 'store']);
// Route::get('/{home}', [HomeController::class, 'show'])->name('detail.show');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/password', [UserController::class, 'edit_password'])->name('password.edit');
Route::patch('/password', [UserController::class, 'update_password'])->name('password.update');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::resource('/dashboard', DashboardController::class);

Route::group(['middleware' => 'adminNsuper'], function () {

    Route::get('/activevacancies/checkSlug', [ActiveVacanciesController::class, 'checkSlug']);
    Route::resource('/activevacancies', ActiveVacanciesController::class);

    Route::get('/inactivevacancies/checkSlug', [InactiveVacanciesController::class, 'checkSlug']);
    Route::resource('/inactivevacancies', InactiveVacanciesController::class);

    Route::get('/applicants/checkSlug', [ApplicantsController::class, 'checkSlug']);
    Route::resource('/applicants', ApplicantsController::class);

    Route::resource('/messages', MessageController::class);

    //Selection

    // Route::get('/administration', [AdministrationController::class]);
    Route::resource('/administration', AdministrationController::class);

    Route::get('/administration/{administration}/add', [AdministrationController::class, 'add_edit']);
    Route::patch('/administration/{administration}/add', [AdministrationController::class, 'add_update']);
    // Route::patch('/rejectedadministration', [AdministrationController::class, 'announ1_update'])->name('announ1');
    // Route::patch('/acceptedadministration', [AdministrationController::class, 'announ2_update'])->name('announ2');
    Route::patch('/administration', [AdministrationController::class, 'announcement']);


    Route::patch('/writtentest', [WrittenTestController::class, 'announcement']);
    Route::resource('/writtentest', WrittenTestController::class);

    Route::patch('/practicetest', [practiceTestController::class, 'announcement']);
    Route::resource('/practicetest', PracticeTestController::class);

    Route::patch('/interview', [interviewController::class, 'announcement']);
    Route::resource('/interview', InterviewController::class);

    Route::resource('/selectionresults', SelectionResultController::class);

    //    
    // Route::get('/selectionresults/checkSlug', [AdministrationController::class, 'checkSlug']);
    // Route::resource('/selectionresults', AdministrationController::class);

    //ReportPDF

    Route::get('/jobsreport', [ReportController::class, 'print_job']);
    Route::get('/applicantsreport', [ReportController::class, 'print_applicant']);
    Route::get('/resultsreport', [ReportController::class, 'print_result']);
    Route::get('/writtenattend', [ReportController::class, 'written_attendance']);
    Route::get('/practiceattend', [ReportController::class, 'practice_attendance']);
    Route::get('/interviewattend', [ReportController::class, 'interview_attendance']);
    Route::get('/resultattend', [ReportController::class, 'result_attendance']);
    Route::get('/schedulesreport', [ReportController::class, 'print_schedule']);
});

Route::group(['middleware' => 'admin'], function () {

    Route::get('/submissions/checkSlug', [JobSubmissionController::class, 'checkSlug']);
    Route::resource('/submissions', JobSubmissionController::class);

    Route::resource('/schedules', ScheduleController::class);
    // Route::get('/schedules', [ScheduleController::class, 'index']);
    // Route::post('/schedules', [ScheduleController::class, 'store'])->name('schedule.store');
    // Route::patch('/schedules', [ScheduleController::class, 'update'])->name('schedule.update');

});

Route::group(['middleware' => 'superadmin'], function () {


    // Route::get('/scheduleapproval/{id}/add', [ScheduleController::class, 'add'])->name('approval.add');
    // Route::patch('/scheduleapproval', [ScheduleController::class, 'update_approval'])->name('approval.update');

    Route::resource('/scheduleapproval', ScheduleApprovalController::class);

    Route::get('/submissionsapproval/checkSlug', [JobSubmissionApprovalController::class, 'checkSlug']);
    Route::resource('/submissionsapproval', JobSubmissionApprovalController::class);

    Route::resource('/users', UserController::class);
});

Route::group(['middleware' => 'applicant'], function () {

    Route::get('/apply', [ApplyController::class, 'create'])->name('apply.create');
    Route::post('/apply', [ApplyController::class, 'store'])->name('apply.store');

    Route::get('/history/CheckSlug', [HistoryController::class, 'checkSlug']);
    Route::resource('/history', HistoryController::class);

    Route::get('/profile/create', [IdentityController::class, 'create'])->name('profile.create');
    Route::post('/profile', [IdentityController::class, 'store'])->name('profile.store');

    Route::get('/profile', [IdentityController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [IdentityController::class, 'update'])->name('profile.update');

    Route::patch('/history/{history}/writtenconfirm', [HistoryController::class, 'writtenconfirm']);
    Route::patch('/history/{history}/practiceconfirm', [HistoryController::class, 'practiceconfirm']);
    Route::patch('/history/{history}/interviewconfirm', [HistoryController::class, 'interviewconfirm']);
    Route::patch('/history/{history}/resultconfirm', [HistoryController::class, 'resultconfirm']);
});
