<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Schedule;
use App\Models\Selection_type;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function index()
    {
        return view('dashboard.schedule.index',[
            'schedules' => Schedule::latest()->get(),
            'selections' => Selection_type::all(),
            'jobs' => Job::where('approval', 1)
                    ->where('close_date', '>=', Carbon::now())->get()
        ]);
    }
        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('dashboard.schedule.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'job_id' => 'required',
            'selection_id' => 'required',  
            'location' => 'required',        
            'date' => 'required',
            'time' => 'required',
            'provision' => 'required',
        ]);
        
        Schedule::create($validatedData);
        
        return redirect('/schedules')
        -> with('success', 'Pengajuan jadwal seleksi berhasil ditambahkan!');
    }

    // public function edit(Schedule $schedule)
    // {
    //     return view('dashboard.schedule.edit', [
    //         'schedule' => $schedule
    //     ]);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Schedule $schedule)
    {
        $validatedData = $request->validate([
            'job_id' => 'required',
            'selection_id' => 'required',    
            'location' => 'required',           
            'date' => 'required',
            'time' => 'required',
            'provision' => 'required',
        ]);
        
        Schedule::where('id', $schedule->id)
        ->update($validatedData);
        
        return redirect('/schedules')
        -> with('success', 'Pengajuan jadwal seleksi berhasil diubah!');   

    }

    public function destroy(Schedule $schedule)
    {
        Schedule::destroy($schedule->id);

        return redirect('/schedules')->with('success', 'Jadwal Seleksi berhasil dihapus!');
    }

}
