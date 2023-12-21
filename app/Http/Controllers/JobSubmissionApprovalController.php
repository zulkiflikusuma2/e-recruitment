<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class JobSubmissionApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.jobs.submissions.approval.index', [
            'jobs' => Job::where('approval', null)->latest()->get()
        ]); 
    }

    public function update(Request $request, Job $submissionsapproval)
    {
        $validatedData = $request->validate([         
            'approval' => 'required',
            'description' => 'nullable'
        ]);

        Job::where('id', $submissionsapproval->id)
        ->update($validatedData);

        return redirect('/submissionsapproval')->with('success', 'Persetujuan berhasil ditambah!');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Job::class, 'slug', $request->position);
        return response()->json(['slug' => $slug]);
    }
}
