<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class UpdatePasswordController extends Controller
{
    public function edit()
    {
        return view('dashboard.password.edit',[
            'users' => User::where('id', auth()->user()->id)->get(),
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8|max:255'
        ]);

        $validatedData['password'] =  Hash::make($request->password);

        if(Hash::check($request->current_password, auth()->user()->password)){
            User::where('id', auth()->user()->id)
            ->update($validatedData);
            return redirect()->route('password.edit')
            ->with('success', 'Password berhasil diubah!');  
        }

        return back()->with('Error', 'Password yang anda masukan salah!');

        // throw ValidationException::withMessages([
        //     'current_password' => 'Password yang Anda masukkan salah'
        // ]);
    }
}
