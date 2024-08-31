<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\User;
use Auth;
use App\Events\FetchMessage;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $users = User::where('id','!=',Auth::id())->get();
        return view('chat.chat_list',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $message = new Chat();
        $message->sender_id = auth()->id();
        $message->receiver_id = $request->receiver_id;
        $message->message = $request->message;
        $message->save();

        event(new FetchMessage(intval($message->sender_id)));

        return response()->json(['status' => 'Message sent!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {   
        $messages = Chat::where(function ($query) use ($request) {
                $query->where('sender_id', auth()->id())
                    ->where('receiver_id', $request->userId);
            })->orWhere(function ($query) use ($request) {
                $query->where('receiver_id', auth()->id())
                    ->where('sender_id', $request->userId);
            })->get();


             return view('chat.chat',compact('messages'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
