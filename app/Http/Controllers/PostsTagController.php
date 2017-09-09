<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\Tag;
Use DB;

class PostsTagController extends Controller
{
    public function show(Request $request, $id) {
        $tag = Tag::find($id);
        $posts = $tag->articles->sortByDesc('created_at');
        return view('tagPosts', ['title' => $tag->name, 'tag' => $tag, 'posts' => $posts]);
    }
}
