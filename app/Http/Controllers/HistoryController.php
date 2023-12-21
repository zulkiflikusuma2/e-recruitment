<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Interview;
use App\Models\Selection_result;
use App\Models\Written_test;
use App\Models\Practice_test;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.history.index2', [
            'applicants' => Selection_result::where('user_id', auth()->user()->id)->latest()->paginate(7)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function show(Applicant $applicant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function edit(Applicant $applicant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Applicant $applicant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicant $applicant)
    {
        //
    }

    public function writtenconfirm(Request $request, Selection_result $history)
    {
        $validatedData = $request->validate([
            'attendance' => 'required',
        ]);

        Written_test::where('id', $history->writtentest_id)
            ->update($validatedData);

        return redirect('/history')->with('success', 'Konfirmasi kehadiran berhasil dikirim!');
    }

    public function practiceconfirm(Request $request, Selection_result $history)
    {
        $validatedData = $request->validate([
            'attendance' => 'required',
        ]);

        Practice_test::where('id', $history->practicetest_id)
            ->update($validatedData);

        return redirect('/history')->with('success', 'Konfirmasi kehadiran berhasil dikirim!');
    }

    public function interviewconfirm(Request $request, Selection_result $history)
    {
        $validatedData = $request->validate([
            'attendance' => 'required',
        ]);

        Interview::where('id', $history->interview_id)
            ->update($validatedData);

        return redirect('/history')->with('success', 'Konfirmasi kehadiran berhasil dikirim!');
    }

    public function resultconfirm(Request $request, Selection_result $history)
    {
        $validatedData = $request->validate([
            'attendance' => 'required',
        ]);

        Selection_result::where('id', $history->id)
            ->update($validatedData);

        return redirect('/history')->with('success', 'Konfirmasi kehadiran berhasil dikirim!');
    }
}
