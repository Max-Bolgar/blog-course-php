<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\Comment;
Use DB;
use Auth;

class PostsController extends Controller {

    public function show(Request $request, $id) {
        $article = Article::find($id);
        $tags = $article->tags;
        $comments = Comment::all()->where('article_id', $id)->sortBy("created_at");
        return view('posts', ['title' => $article->name, 'article' => $article, 'tags' => $tags, 'comments' => $comments]);
    }

    public function comments(Request $request) {
        $comment = new Comment;
        $comment->comment = $request['comment'];
        $comment->article_id = $request['article_id'];
        $comment->user_id = Auth::user()->id;
        $comment->save();
        return redirect()->back()->with('message', 'Комментарий добавлен');
    }

}
