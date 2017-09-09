<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Tag;
use App\Article;
use Auth;
use Gate;

class AdminTagController extends Controller
{
    public function create(Request $request) {
        
         if (Gate::denies('add-article')) {
            return redirect()->back()->with(['message' => 'У Вас нет прав']);
        }
        
        $this->validate($request, [
            'tag' => 'required'
        ]);
        
        $tag = Tag::create([
            'name' => $request->input('tag'),
        ]);
        
        return redirect()->back()->with('message', 'Тег добавлен');
    }
}
