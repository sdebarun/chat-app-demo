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

    public function fetchMessages(Request $request){

        $query = Message::whereIn('sender_id', [Auth::id(), $request->recipient_id])->whereIn('recipient_id', [Auth::id(), $request->recipient_id]);
        $messages = $query->with(['sender','recipient'])->orderBy('id')->limit(10)->get();
        $formattedMessage = [];
        foreach($messages as $key =>  $message){
            $formattedMessage[$key]['isSentByMe'] = $message->sender_id === Auth::id();
            $formattedMessage[$key]['message']['id'] = $message->id;
            $formattedMessage[$key]['message']['content'] = $message->message;
            $formattedMessage[$key]['sender']['name'] = $message['sender']['name'];
            $formattedMessage[$key]['sender']['id'] = $message['sender']['id'];
            $formattedMessage[$key]['recipient']['id']  = $message->id;
            $formattedMessage[$key]['recipient']['name']  = $message['recipient']['name'];
            $formattedMessage[$key]['created_at'] = $message->created_at;
        }
        return $formattedMessage;
    }

    public function sendMessage(Request $request){
        $user = Auth::user(); // sender of the message
        Message::create([
            'message' => $request->message,
            'recipient_id' => $request->recipient_id,
            'sender_id' => $user->id,
        ]);
        return ['status' => 'Message Sent!'];
    }
}
