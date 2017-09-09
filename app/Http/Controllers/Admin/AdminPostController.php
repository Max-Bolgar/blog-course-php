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

class AdminPostController extends Controller {

    //show Form
    public function show() {
        $users = User::all();
        $tags = Tag::pluck('name', 'id');
        $categories = Category::pluck('name', 'id');
        if (Auth::user()->login == 'admin') {
            return view('adminPanel.add_post', ['title' => 'Новый материал', 'users' => $users, 'tags' => $tags, 'categories' => $categories]);
        }
        return redirect('/');
    }

    //new post
    public function create(Request $request) {
        // Select id of tags
        $arrId = [];
        foreach ($request->input('tags') as $value) {
            $value = preg_replace("/[^,0-9]/", '', $value);
            $arrId[] = $value;
        }
        $categoryID = preg_replace("/[^,0-9]/", '', $request->input('category'));
        if (Gate::denies('add-article')) {
            return redirect()->back()->with(['message' => 'У Вас нет прав']);
        }


        $this->validate($request, [
            'name' => 'required'
        ]);
        $tags = $request->input('tags');
        $user = Auth::user();
        $data = $request->all();
        $article = $user->articles()->create([
            'name' => $data['name'],
            'description' => $data['description'],
            'img' => $data['img'],
            'text' => $data['text'],
            'category_id' => $categoryID,
        ]);
        $tagsId = $arrId;
        $article->tags()->attach($tagsId);


        return redirect()->back()->with('message', 'Материал добавлен');
    }

}
