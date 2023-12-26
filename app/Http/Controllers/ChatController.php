<?php
// App\Http\Controllers\ChatController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSent;
use App\Models\Message;

class ChatController extends Controller
{
    public function index()
    {
        return view('chat.chat');
    }

    public function sendMessage(Request $request)
    {
        $user = auth()->user();

        $message = Message::create([
            'user_id' => $user->id,
            'team_id' => $user->currentTeam->id,  
            'content' => $request->input('content'),
        ]);

        broadcast(new MessageSent($message));

        return response()->json(['status' => 'Message sent!']);
    }
}
