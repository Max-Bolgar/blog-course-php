<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ChatMessage;
Use DB;
use Auth;

class ChatController extends Controller {

    public function show() {
        $messages = ChatMessage::orderBy('created_at', 'DESC')->paginate('7');
        $pagination = $messages->links('pagination.default');
        return view('chat', ['title' => 'Чат', 'messages' => $messages, 'pagination' => $pagination]);
    }

    public function store(Request $request) {
        $message = new ChatMessage;
        $message->message = $request['message'];
        $message->user_id = Auth::user()->id;
        $message->save();
        return redirect()->back();
    }

}
