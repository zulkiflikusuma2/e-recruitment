<?php

namespace App\Http\Controllers;

use App\Models\interview;
use App\Models\Selection_result;
use Illuminate\Http\Request;
use Carbon\Carbon;

class InterviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.selection.interview.index', [
            'applicants' => Interview::where('process', 0)->get(),
        ]);
    }

    public function update(Request $request, interview $interview)
    {
        $validatedData = $request->validate([
            'score' => 'nullable',
            'status' => 'nullable',
            'description' => 'nullable'
        ]);
        Interview::where('id', $interview->id)
            ->update($validatedData);

        return redirect('/interview')->with('success', 'Berhasil!');
    }


    public function announcement(Request $request, Interview $interview)
    {
        $ids = $request->ids;

        switch ($request->input('action')) {
            case 'rejected':
                Interview::whereIn('id',  $ids)
                    ->update(['process' => 1, 'status' => 0]);

                Selection_result::whereIn('interview_id', $ids)
                    ->update(['result' => 0]);

                return redirect('/interview')->with('success', 'Berhasil Ditambahkan!');
                break;

            case 'accepted':
                Interview::whereIn('id',  $ids)
                    ->update(['process' => 1, 'status' => 1]);

                $validatedData1 = $request->validate([
                    'date' => 'required',
                    'time' => 'required',
                    'location' => 'required',
                    'provision' => 'required',
                ]);

                $validatedData1['result'] = 1;
                Selection_result::whereIn('interview_id',  $ids)
                    ->update($validatedData1);

                return redirect('/interview')->with('success', 'Berhasil Ditambahkan!');
                break;
        }
    }

    public function destroy(interview $interview)
    {
        interview::destroy($interview->id);

        return redirect('/interview')->with('success', 'Data berhasil dihapus!');
    }
}
