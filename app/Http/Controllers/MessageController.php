<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $slug)
    {
        $user = Auth::user();
        $otherUser = User::findBySlugOrFail($slug);

        $request->validate([
            'content' => 'required|max:360',
        ]);

        $inputs = $request->all();
        $inputs['from_user_id'] = $user->id;
        $inputs['to_user_id'] = $otherUser->id;

        Message::create($inputs);

        return back()->with('message', 'Votre message a bien été envoyé !');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $user = Auth::user();
        $otherUser = User::findBySlugOrFail($slug);
        $users = User::where('id','!=', Auth::user()->id)->get();

        $otherUserId = $otherUser->id;
        $userId = $user->id;


        $messages = Message::findConversation($userId, $otherUserId)->get();

        return view ('conversation.index', ['users' => $users, 'otherUser' => $otherUser, 'user' => $user, 'messages' => $messages]);
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
        //
    }
}
