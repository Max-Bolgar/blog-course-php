<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\User;
use Auth;

class AdminUpdateController extends Controller {

    public function show() {
        $users = User::all();
        $articles = Article::all()->sortByDesc('created_at');
        if (Auth::user()->login == 'admin') {
            return view('adminPanel.all_posts', ['title' => 'Статьи', 'articles' => $articles, 'users' => $users]);
        }
        return redirect('/');
    }

}
