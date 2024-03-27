<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index() {
        return view('chats.index');
    }

    public function fetchMessages(){
        return Message::where('user_id', Auth::id())->with(['user' => function($query){
            $query->where('id', Auth::id());
        }])->get();
    }

    public function sendMessage(Request $request){
        $user = Auth::user();
        $message = $user->messages()->create([
            'message' => $request->message
        ]);
        return ['status' => 'Message Sent!'];
    }
}
