<?php

namespace App\Http\Controllers;

use App\Events\SendMessageEvent;
use App\Http\Requests\SendMessageRequest;
use App\Models\Chat;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{

    private Chat $chat;
    public function SendMessage(SendMessageRequest $request)
    {
        $currentUser = auth("sanctum")->user();

        if ($request->to == $currentUser->name) {
            return response()->json(['message' => "You cannot send message to yourself"]);
        }

        $otherUser = User::where("name", $request->to)->first();
        if (!$otherUser) {
            return response()->json(['message' => "Recipient user not found"], 404);
        }

        // Check if there's a previous chat between the users
        $collection = $this->IsTherePreviousChat($otherUser->id, $currentUser->id);

        // If no previous chat exists, create a new chat
        if ($collection == false) {
            $chat = Chat::create([
                'user_id' => $currentUser->id
            ]);
        } else {
            $chat = $collection[0];
        }

        // Create the message
        $message = Message::create([
            'from_user' => $currentUser->id,
            'to_user' => $otherUser->id,
            'user_id'=>$currentUser->id,
            'content' => $request->message,
            'chat_id' => $chat->id,
        ]);

        broadcast(new SendMessageEvent($message->toArray()))->toOthers();

        return response()->json(['message' => "Message sent successfully"], 201);
    }


    public function IsTherePreviousChat($OtherUserId,$user_id){
        $collection = Message::whereHas('chat' , function($q) use ($OtherUserId,$user_id){
            $q->where('from_user',$OtherUserId)
                ->where('to_user', $user_id);
        })->orWhere(function ($q) use ($OtherUserId,$user_id) {
            $q->where('from_user',$user_id)
                ->where('to_user', $OtherUserId);
        })->get();

        if (count($collection) > 0){
            return $collection;
        }
        return false;
    }
}
