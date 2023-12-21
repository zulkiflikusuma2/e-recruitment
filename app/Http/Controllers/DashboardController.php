<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Personal_identity;
use App\Models\Applicant;
use App\Models\Schedule;
use App\Models\education;
use App\Models\gender;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // public function index(){
    //     if (request()->user()->role === 'admin' || 'super') {
    //         return view('dashboard.index');
    //     } else {
    //         return view('dashboard.jobs.index');
    //     } 
    // }
    public function index()
    {
        if (Auth::guest()) {
            return view('login.index3');
        } elseif (request()->user()->role === 'applicant' && request()->user()->last_login_at === 1) {
            return view('dashboard.jobs.index3', [
                'jobs' => Job::where('approval', '1')
                    ->where('close_date', '>=', Carbon::now())->latest()->paginate(7)->withQueryString(),
            ]);
        } elseif (request()->user()->role === 'applicant' && request()->user()->last_login_at === null) {
            return view('dashboard.identity.create', [
                'educations' => education::all(),
                'genders' => gender::all()
            ]);
        } elseif (request()->user()->role === 'superadmin' || 'admin') {
            return view('dashboard.index', [
                'jobs' => Job::where('approval', '1')
                    ->where('close_date', '>=', Carbon::now())->latest()->paginate(7)->withQueryString(),
                'applicants' => Applicant::where('status', null)->count(),
                'schedules' => Schedule::where('status', null)->count(),
                'jobsapproval' => Job::where('approval', null)->count()
            ]);
        } else {
            return view('login.index');
        }
    }

    public function show(Job $dashboard)
    {
        return view('dashboard.jobs.show', [
            'job' => $dashboard,
            'identity' => Personal_identity::where('user_id', auth()->user()->id)->get(),
            'applicant' => Applicant::where('job_id', $dashboard->id)->where('user_id', auth()->user()->id)->count()
        ]);
    }
}
