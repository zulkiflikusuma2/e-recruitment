<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ActiveVacanciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guest()){
            return view('login.index2');
        }else{
            return view('dashboard.jobs.active.index',[
                'jobs' => Job::where('approval', '1')
                        ->where('close_date', '>=', Carbon::now())->latest()->get()     
        ]);}
    }

    public function update(Request $request, Job $activevacancy)
    {
        $validatedData = $request->validate([
            'position' => 'required|max:255',          
            'requirement' => 'required',
            'attachment' => 'required',
            'close_date' => 'required',
            'announ_date' => 'required',
        ]);
        
        if($request->slug != $activevacancy->slug){
            $rules['slug'] = 'required|unique:jobs';
        }

        Job::where('id', $activevacancy->id)
        ->update($validatedData);;

        return redirect('/activevacancies')->with('success', 'Lowongan berhasil diubah!');   
    }

    public function destroy(Job $activevacancy)
    {
        Job::destroy($activevacancy->id);

        return redirect('/activevacancies')->with('success', 'Lowongan berhasil dihapus!');
    }


    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Job::class, 'slug', $request->position);
        return response()->json(['slug' => $slug]);
    }
}
