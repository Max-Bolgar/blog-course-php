<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
Use DB;

class MainPageController extends Controller
{
    public function show() {
        $articles = Article::orderBy('created_at', 'DESC')->paginate('5');
        $pagination = $articles->links('pagination.default');
        
        return view('welcome', ['title' => 'Blog', 'articles' => $articles, 'pagination' => $pagination]);
    }
}
