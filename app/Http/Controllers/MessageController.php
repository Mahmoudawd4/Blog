<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //

    public function create()
    {
        return view('messages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:100',
            'email'=>'required|email|max:100',
            'phone'=>'required|string|min:5|max:50',
            'message'=>'required|string'
        ]);

        Message::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'message'=> $request->message
        ]);

        return redirect(route('message.create'));

    }

    public function allMessage()
    {
        $messages=Message::get();
        return view('messages.all',[
            'Messages'=>$messages
        ]);
    }

    public function delete($id)
    {

        $admin=Message::findOrFail($id);
        $admin->delete();
        return redirect(route('message.all'));

    }

}
