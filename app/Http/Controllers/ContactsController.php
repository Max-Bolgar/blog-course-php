<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests\ContactRequest;
use App\Mail\MailClass;
use App\Article;
use Illuminate\Support\Facades\Mail;

class ContactsController extends Controller {

    public function store(ContactRequest $request) {
        $name = $request->name;
        $email = $request->email;
        $msg = $request->msg;

        Mail::to('Makc00766@gmail.com')->send(new MailClass($name, $email, $msg));
        return redirect()->back()->with('message', 'Запрос отправлен, ожидайте сообщения на почту');
    }

    public function show() {
        return view('contacts', ['title' => 'Контакты']);
    }

}
