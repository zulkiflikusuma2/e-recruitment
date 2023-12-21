<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Applicant;
use App\Models\Personal_identity;
use App\Models\Selection_result;
use App\Models\Interview;
use App\Models\Practice_test;
use App\Models\Written_test;
use App\Models\Administration;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ApplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.apply.create', [
            'job' => Job::all(),
            'identity' => Personal_identity::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cv' => 'required|mimes:pdf|max:5120',
            'photo' => 'required|image|file|max:1024',
            'application_letter' => 'required|mimes:pdf|max:5120',
            'certificate' => 'required|mimes:pdf|max:5120',
            'transcript' => 'required|mimes:pdf|max:5120',
            // 'str' => 'nullable|mimes:pdf|max:5120',
            'document' => 'nullable|mimes:pdf|max:5120',
            'personal_identity_id' => 'required',
            'job_id' => 'required',
        ]);

        if ($request->file('cv')) {
            $validatedData['cv'] = $request->file('cv')->store('cv');
        }
        if ($request->file('photo')) {
            $validatedData['photo'] = $request->file('photo')->store('photo');
        }
        if ($request->file('application_letter')) {
            $validatedData['application_letter'] = $request->file('application_letter')->store('application_letter');
        }
        if ($request->file('certificate')) {
            $validatedData['certificate'] = $request->file('certificate')->store('certificate');
        }
        if ($request->file('transcript')) {
            $validatedData['transcript'] = $request->file('transcript')->store('transcript');
        }
        if ($request->file('str')) {
            // $validatedData['str'] = $request->file('str')->store('str');
        }
        if ($request->file('document')) {
            $validatedData['document'] = $request->file('document')->store('document');
        }
        $validatedData['user_id'] = auth()->user()->id;

        $applicant = Applicant::create($validatedData);

        $admin = Administration::create([
            'applicant_id' => $applicant->id
        ]);

        $written = Written_test::create([
            'administration_id' => $admin->id,
            'applicant_id' => $applicant->id
        ]);

        $practice = Practice_test::create(
            [
                'applicant_id' => $applicant->id,
                'writtentest_id' => $written->id
            ]
        );

        $interview = Interview::create([
            'applicant_id' => $applicant->id,
            'practicetest_id' => $practice->id
        ]);

        Selection_result::create([
            'user_id' => auth()->user()->id,
            'applicant_id' => $applicant->id,
            'administration_id' => $admin->id,
            'writtentest_id' => $written->id,
            'practicetest_id' => $practice->id,
            'interview_id' => $interview->id,
        ]);

        return redirect('/history')->with('success', 'Pendaftaran behasil!')
            ->with('failed', 'Pendaftaran gagal');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Applicant  $apply
     * @return \Illuminate\Http\Response
     */
    public function show(Applicant $apply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Applicant  $apply
     * @return \Illuminate\Http\Response
     */
    public function edit(Applicant $apply)
    {
        return view('dashboard.apply.edit', [
            'apply' => $apply,
            'job' => Job::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Applicant  $apply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Applicant $apply)
    {
        $validatedData = $request->validate([
            'document' => 'mimes:pdf|max:5120',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        if ($request->file('document')) {
            if ($request->oldDocument) {
                Storage::delete($request->oldDocument);
            }
            $validatedData['document'] = $request->file('document')->store('document');
        }

        Applicant::where('personal_identity_id', auth()->user()->id)
            ->update($validatedData);

        return redirect('/history')
            ->with('success', 'Pendaftaran behasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Applicant  $apply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicant $apply)
    {
        //
    }
}
