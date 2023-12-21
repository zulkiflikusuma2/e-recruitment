<?php

namespace App\Http\Controllers;

use App\Models\Practice_test;
use App\Models\written_test;
use App\Models\Selection_result;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class WrittenTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.selection.writtentest.index',[
            'applicants' => Written_test::where('process', 0)->get(),
            'schedules' => Schedule::where('date', '>=', Carbon::now())
                            ->where('status', 1)
                            ->where('selection_id', 2)->latest()->get(),
        ]);
    }

    public function update(Request $request, written_test $writtentest)
    {
        $validatedData = $request->validate([
            'score' => 'nullable',
            'status' => 'nullable',
        ]);
        written_test::where('id', $writtentest->id)
        ->update($validatedData);

        return redirect('/writtentest')->with('success', 'Berhasil!'); 
    }

    public function announcement(Request $request, written_test $writtentest)
    {
        $ids = $request->ids;

        switch ($request->input('action')) {
            case 'rejected':
                Written_test::whereIn('id',  $ids)
                ->update(['process' => 1, 'status' => 0]);
        
                Selection_result::whereIn('writtentest_id', $ids)
                ->update(['result' => 0 ]);
        
                return redirect('/writtentest')->with('success', 'Berhasil Ditambahkan!');
                break;
    
            case 'accepted':
                Written_test::whereIn('id',  $ids)
                ->update(['process' => 1, 'status' => 1]);
        
                $validatedData1 = $request->validate([
                    'schedule_id' => 'required',
                ]);
        
                $validatedData1['process'] = 0;
                Practice_test::whereIn('writtentest_id',  $ids)
                ->update($validatedData1);
                
                return redirect('/writtentest')->with('success', 'Berhasil Ditambahkan!');
                break;
    
        }
    }

    public function destroy(written_test $writtentest)
    {
        written_test::destroy($writtentest->id);

        return redirect('/writtentest')->with('success', 'Data berhasil dihapus!');
    }
}
