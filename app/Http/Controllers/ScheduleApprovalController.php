<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Selection_type;
use \App\Models\Schedule;
use \App\Models\Job;
use Illuminate\Support\Facades\Auth;

class ScheduleApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.schedule.approval.index',[
            'schedules' => Schedule::latest()->get(),
            'selections' =>Selection_type::all(),
            'jobs' => Job::all()    
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('dashboard.schedule.approval.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_approval(Request $request, Schedule $scheduleapproval)
    {
        $validatedData = $request->validate([
            'status' => 'required',
        ]);
        

        Schedule::where('id', $scheduleapproval->id)
        ->update($validatedData);

        return redirect('/scheduleapproval')->with('success', 'berhasil ditambah!');   
    }

    public function update(Request $request, Schedule $scheduleapproval)
    {
        $validatedData = $request->validate([
            'status' => 'required',
        ]);
        Schedule::where('id', $scheduleapproval->id)
        ->update($validatedData);

        return redirect('/scheduleapproval')->with('success', 'berhasil ditambah!');   
    }

    public function destroy(Schedule $scheduleapproval)
    {
        Schedule::destroy($scheduleapproval->id);

        return redirect('/scheduleapproval')->with('success', 'Jadwal Seleksi berhasil dihapus!');
    }
}