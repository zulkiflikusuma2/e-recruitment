<?php

namespace App\Http\Controllers;

use App\Models\message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.message.index', [
            'messages' => message::all()
        ]);
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
        -> with('success', 'Pesan berhasil dikirim!');
    }

    public function destroy(Message $message)
    {
        Message::destroy($message->id);

        return redirect('/messages')->with('success', 'Pesan berhasil dihapus!');
    }
}
