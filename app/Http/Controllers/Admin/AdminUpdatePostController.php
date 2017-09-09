<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\User;
use Auth;
use Gate;

class AdminUpdatePostController extends Controller {

    //show Form
    public function show(Request $request, $id) {
        $users = User::all();
        $article = Article::find($id);
        if (Auth::user()->login == 'admin') {
            return view('adminPanel.update_post', ['title' => 'Редактирование материала', 'article' => $article, 'users' => $users]);
        }
        return redirect('/');
    }

    //new post
    public function create(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:254'
        ]);

        $user = Auth::user();
        $data = $request;
        $article = Article::find($data['id']);

        if (Gate::allows('update-article', $article)) {
            if (isset($data['delete']) && Gate::allows('update-article', $article)) {
                $article->delete();
                return redirect('/admin/update/post/')->with('message', 'Материал удален');
            }

            $article->name = $data['name'];
            $article->img = $data['img'];
            $article->text = $data['text'];
            $article->description = $data['description'];
            $res = $user->articles()->save($article);
            return redirect()->back()->with('message', 'Материал обновлен');
        }
        return redirect()->back()->with(['message' => 'У Вас нет прав']);
    }

}
