<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.users.index', [
            'users' => User::where('role', 'admin')
                ->orWhere('role', 'superadmin')->latest()->get()
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|confirmed|min:5|max:255',
            'role' => 'required',
            'last_login_at' => 'required'
        ]);

        $validateData['password'] = Hash::make($validateData['password']);
        User::create($validateData);
        return redirect('/users')->with('success', 'Akun berhasil ditambahkan!');
    }


    public function edit(User $user)
    {
        return view('dashboard.users.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $rules = ([
            'username' => ['required', Rule::unique('users')->ignore($user->id)],
            'email' => ['required', 'email:dns', Rule::unique('users')->ignore($user->id)],
            'role' => 'required',
            'password' => 'required|confirmed|'
        ]);

        $validatedData = $request->validate($rules);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::where('id', $user->id)
            ->update($validatedData);

        return redirect('/users')->with('success', 'Akun berhasil diubah!');
    }

    public function destroy(User $user)
    {
        User::destroy($user->id);

        return redirect('/users')->with('success', 'Akun berhasil dihapus!');
    }

    public function edit_password()
    {
        return view('dashboard.password.edit', [
            'users' => User::where('id', auth()->user()->id)->get(),
        ]);
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:5|max:255'
        ]);

        $validatedData['password'] =  Hash::make($request->password);

        if (Hash::check($request->current_password, auth()->user()->password)) {
            User::where('id', auth()->user()->id)
                ->update($validatedData);
            return redirect()->route('password.edit')
                ->with('success', 'Password berhasil diubah!');
        }
    }
}
