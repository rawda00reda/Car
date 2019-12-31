<?php

namespace App\Http\Controllers;

use App\Message;
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
        $messages = Message::orderBy('created_at', 'desc')->get();
        return view('admin.messages.index')->with('messages', $messages) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate(request(),[
            'name' => 'required|max:50',
            'email'=>'required|max:50',
            'subject'=>'required|max:50',
            'message'=>'required|max:500',
        ]);

        $messages = new Message();
        $messages->name = request('name');
        $messages->email = request('email');
        $messages->subject = request('subject');
        $messages->message = request('message');
        $messages->read = false;
        $messages->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        $message = Message::find($message->id);
        $message->read = true;
        $message->save();
        return view('admin.messages.show')->with('message', $message);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $messages = Message::find($message->id);
        $messages->delete();
        return redirect('/admin/messages')->with('success','Messages has been  deleted');
    }
}
