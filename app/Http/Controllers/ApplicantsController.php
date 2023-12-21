<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\education;
use App\Models\Personal_Identity;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ApplicantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.applicants.index', [
            'applicants' => Applicant::where('status', null)->get()
        ]);
    }

    public function show(Applicant $applicant)
    {
        return view('dashboard.applicants.show',[
            'applicant' => $applicant
        ]);
    }

    public function destroy(Applicant $applicant)
    {
        Job::destroy($applicant->id);

        return redirect('/applicants')->with('success', 'Data berhasil dihapus!');
    }
}
