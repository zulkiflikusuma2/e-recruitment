<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Job;
use App\Models\Applicant;
use App\Models\Schedule;
use App\Models\Written_test;
use App\Models\Practice_test;
use App\Models\Interview;
use App\Models\Selection_result;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Nullable;

class ReportController extends Controller
{
    // public function print_job(){
    //     $data = [
    //         'title' => 'Welcome to ItSolutionStuff.com',
    //         'date' => date('m/d/Y')
    //     ];

    //     $pdf = PDF::loadView('dashboard.report.job', $data);

    //     return $pdf->download('itsolutionstuff.pdf');
    // }

    public function print_job()
    {
        return view('dashboard.report.job', [
            'jobs' => Job::latest()->get()
        ]);
    }

    public function print_applicant()
    {
        return view('dashboard.report.applicant', [
            'applicants' => Applicant::latest()->get()
        ]);
    }

    public function print_result()
    {
        return view('dashboard.report.result', [
            'selectionresults' => Selection_result::where('result', '1')->orWhere('result', '0')->latest()->get()
        ]);
    }


    public function written_attendance()
    {
        return view('dashboard.report.writtenattend', [
            'applicants' => Written_test::where('attendance', 0)->orWhere('attendance', 1)->latest()->get(),
        ]);
    }

    public function practice_attendance()
    {
        return view('dashboard.report.practiceattend', [
            'applicants' => Practice_test::where('attendance', 0)->orWhere('attendance', 1)->latest()->get(),
        ]);
    }

    public function interview_attendance()
    {
        return view('dashboard.report.interviewattend', [
            'applicants' => Interview::where('attendance', 0)->orWhere('attendance', 1)->latest()->get(),
        ]);
    }
    public function result_attendance()
    {
        return view('dashboard.report.resultattend', [
            'applicants' => Selection_result::where('attendance', 0)->orWhere('attendance', 1)->latest()->get(),
        ]);
    }

    public function print_schedule()
    {
        return view('dashboard.report.schedule', [
            'schedules' => schedule::latest()->get(),
        ]);
    }
}
