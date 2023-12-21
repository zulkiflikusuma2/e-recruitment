<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Auth;

class JobSubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Job $submission)
    {
        return view('dashboard.jobs.submissions.index', [
            'jobs' => Job::latest()->get(),
         ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'position' => 'required|max:255',          
            'slug' => 'required|unique:jobs',
            'requirement' => 'required',
            'attachment' => 'required',
            'close_date' => 'required',
            'announ_date' => 'required',
        ]);

        Job::create($validatedData);
        
        return redirect('/submissions')
        -> with('success', 'Pengajuan lowongan berhasil ditambahkan!');
    }

    public function update(Request $request, Job $submission)
    {
        $validatedData = $request->validate([
            'position' => 'required|max:255',          
            'requirement' => 'required',
            'attachment' => 'required',
            'close_date' => 'required',
            'announ_date' => 'required',
        ]);
        
        if($request->slug != $submission->slug){
            $rules['slug'] = 'required|unique:jobs';
        }

        Job::where('id', $submission->id)
        ->update($validatedData);

        return redirect('/submissions')->with('success', 'Pengajuan lowongan berhasil diubah!');   
    }

    public function destroy(Job $submission)
    {
        Job::destroy($submission->id);

        return redirect('/submissions')->with('success', 'Pengajuan lowongan berhasil dihapus!');
    }


    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Job::class, 'slug', $request->position);
        return response()->json(['slug' => $slug]);
    }



}
