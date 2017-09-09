<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Tag;
use App\Article;
use App\Category;
use Auth;
use Gate;

class AdminCategoryController extends Controller
{
     public function create(Request $request) {
        
         if (Gate::denies('add-article')) {
            return redirect()->back()->with(['message' => 'У Вас нет прав']);
        }
        
        $this->validate($request, [
            'cat' => 'required'
        ]);
        
        $tag = Category::create([
            'name' => $request->input('cat'),
        ]);
        
        return redirect()->back()->with('message', 'Категория добавлена');
    }
}
