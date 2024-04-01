<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use App\Events\NewMessage;
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
        $messages = $query->with(['sender','recipient'])->orderBy('id', 'DESC')->limit(5)->get();
        // todo  - get only last 10 messages (or we can offer a free time line and keep those messages else start fresh)
        //add where between or get 10 lastest data and reorient them
        $formattedMessage = [];
        foreach($messages as $key =>  $message){
            $formattedMessage[$key]['isSentByMe'] = $message->sender_id === Auth::id();
            $formattedMessage[$key]['message']['id'] = $message->id;
            $formattedMessage[$key]['message']['content'] = $message->message;
            $formattedMessage[$key]['sender']['name'] = $message['sender']['name'];
            $formattedMessage[$key]['sender']['id'] = $message['sender']['id'];
            $formattedMessage[$key]['recipient']['id']  = $message['recipient']['id'];
            $formattedMessage[$key]['recipient']['name']  = $message['recipient']['name'];
            $formattedMessage[$key]['created_at'] = date_format($message->created_at, 'd-m-Y h:i:s A'); //use carbon
        }
        return array_reverse($formattedMessage);
    }

    public function sendMessage(Request $request){
        $user = Auth::user(); // sender of the message
        $message = Message::create([
            'message' => $request->message,
            'recipient_id' => $request->recipient_id,
            'sender_id' => $user->id,
        ]);
        // get the recipient 

        $recipient = User::find($request->recipient_id);
        //fromat the message as the it in fetch :

            $formattedMessage['isSentByMe'] = $message->sender_id === Auth::id();
            $formattedMessage['message']['id'] = $message->id;
            $formattedMessage['message']['content'] = $message->message;
            $formattedMessage['sender']['name'] = $user->name;
            $formattedMessage['sender']['id'] = $user->id;
            $formattedMessage['recipient']['id']  = $request->recipient_id;
            $formattedMessage['recipient']['name']  = $recipient->name;
            $formattedMessage['created_at'] = date_format($message->created_at, 'd-m-Y h:i:s A'); 

        broadcast(new NewMessage($formattedMessage))->toOthers();
        return ['status' => 'Message Sent!'];
    }
}
