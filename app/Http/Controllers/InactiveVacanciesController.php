<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class InactiveVacanciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.jobs.inactive.index',[
            'jobs' => Job::where('approval', '1')
                    ->where('close_date', '<=', Carbon::now())->latest()->get()        
        ]);
    }


    public function update(Request $request, Job $inactivevacancy)
    {
        $validatedData = $request->validate([
            'position' => 'required|max:255',          
            'requirement' => 'required',
            'attachment' => 'required',
            'close_date' => 'required',
            'announ_date' => 'required',
        ]);
        
        if($request->slug != $inactivevacancy->slug){
            $rules['slug'] = 'required|unique:jobs';
        }

        $validatedData['excerpt'] = Str::limit(strip_tags($request->requirement, 300));
        $validatedData['slug'] = Str::slug($request->position);

        Job::where('id', $inactivevacancy->id)
        ->update($validatedData);

        return redirect('/inactivevacancies')->with('success', 'Lowongan berhasil diubah!');  
    }

    public function destroy(Job $inactivevacancy)
    {
        Job::destroy($inactivevacancy->id);

        return redirect('/inactivevacancies')->with('success', 'Lowongan berhasil dihapus!');
    }


    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Job::class, 'slug', $request->position);
        return response()->json(['slug' => $slug]);
    }
}

