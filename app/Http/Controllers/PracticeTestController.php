<?php

namespace App\Http\Controllers;

use App\Models\Interview;
use App\Models\practice_test;
use App\Models\Schedule;
use App\Models\Selection_result;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PracticeTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(practice_test $practicetest)
    {
        return view('dashboard.selection.practicetest.index',[
            'applicants' => Practice_test::where('process', 0)->get(),
            'schedules' => Schedule::where('date', '>=', Carbon::now())
            ->where('status', 1)
            ->where('selection_id', 3)->latest()->get(),
        ]);
    }

    public function update(Request $request, practice_test $practicetest)
    {
        $validatedData = $request->validate([
            'score' => 'nullable',
            'status' => 'nullable',
        ]);

        practice_test::where('id', $practicetest->id)
        ->update($validatedData);

        return redirect('/practicetest')->with('success', 'Berhasil!'); 
    }

    public function announcement(Request $request)
    {
        $ids = $request->ids;

        switch ($request->input('action')) {
            case 'rejected':
                Practice_test::whereIn('id',  $ids)
                ->update(['process' => 1, 'status' => 0]);
        
                Selection_result::whereIn('practicetest_id', $ids)
                ->update(['result' => 0 ]);
        
                return redirect('practicetest')->with('success', 'Berhasil Ditambahkan!');
                break;
    
            case 'accepted':
                Practice_test::whereIn('id',  $ids)
                ->update(['process' => 1, 'status' => 1]);
        
                $validatedData1 = $request->validate([
                    'schedule_id' => 'required',
                ]);
        
                $validatedData1['process'] = 0;
                Interview::whereIn('practicetest_id',  $ids)
                ->update($validatedData1);
                
                return redirect('/practicetest')->with('success', 'Berhasil Ditambahkan!');
                break;
    
        }
    }

    public function destroy(practice_test $practicetest)
    {
        practice_test::destroy($practicetest->id);

        return redirect('/practicetest')->with('success', 'Data berhasil dihapus!');
    }
}
