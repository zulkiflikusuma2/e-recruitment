<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\gender;
use App\Models\education;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        // return view('register.index3',[
        //     'educations' => education::all(),
        //     'genders' => gender::all() 
        // ]);
        return view('register.index4');
    }

    // public function store(){
    //     return request()->all();
    // }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|confirmed|min:5|max:255'
        ]);

        // $validateData['password'] = bcrypt($validateData['password']);
        $validateData['password'] = Hash::make($validateData['password']);

        $validateData['role'] = 'applicant';

        User::create($validateData);

        // $request->session()->flash('success', 'Registration successfull!! Please Login!');

        return redirect('/login')->with('success', 'Pendaftaran akun berhasil!');
    }
}
