<?php

namespace App\Http\Controllers;

use App\Models\education;
use App\Models\gender;
use App\Models\user;
use App\Models\Personal_identity;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class IdentityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('dashboard.identity.index',[
        //     'personalidentity' => Personal_identity::where('user_id', auth()->user()->id)->get()
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.identity.create',[
            'educations' => education::all(),
            'genders' => gender::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',          
            'gender_id' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'edu_id' => 'required',
            'phone' => 'required',
        ]);
        
        $validatedData['user_id'] = auth()->user()->id;

        Personal_identity::create($validatedData);

        User::where('id', auth::user()->id)
        ->update(['last_login_at' => 1]);

        return redirect('/dashboard')->with('success', 'Data diri berhasil disimpan!'); 
    }

    public function edit(Personal_identity $personalidentity)
    {
        return view('dashboard.identity.edit', [
            'identity' => Personal_identity::where('user_id', auth()->user()->id)->get(),
            'educations' => education::all(),
            'genders' => gender::all()
        ]);
    }

    public function update(Request $request, Personal_identity $personalidentity)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',          
            'gender_id' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'edu_id' => 'required',
            'phone' => 'required',
        ]);
               
        $validatedData['user_id'] = auth()->user()->id;

        Personal_identity::where('user_id', auth()->user()->id)
        ->update($validatedData);

        return redirect('/dashboard')->with('success', 'Data diri berhasil diubah!');  
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personal_identity  $personalidentity
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Personal_identity $personalidentity)
    // {
    //     //
    // }
}
