<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\message;
use App\Models\Personal_identity;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'jobs' => Job::where('approval', '1')
                ->where('close_date', '>=', Carbon::now())->latest()->paginate(9)->withQueryString(),
        ]);
    }

    public function show(Job $home)
    {
        if (Auth::guest()) {
            return view('job', [
                'job' => $home,
            ]);
        } elseif (auth::user()->role === 'applicant') {
            return view('job', [
                'job' => $home,
                // 'identity' => Personal_identity::where('user_id', auth()->user()->id)->get(),
            ]);
        } else {
            return view('job', [
                'job' => $home,
            ]);
        }
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        Message::create($validatedData);

        return redirect('/')
            ->with('success', 'Pesan berhasil dikirim!');
    }
}
