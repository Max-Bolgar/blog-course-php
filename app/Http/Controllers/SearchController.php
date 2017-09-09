<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\Tag;
Use DB;

class SearchController extends Controller
{
     public function show(Request $request) {
         $articles = Article::where('text', 'LIKE', '%' . $request['search'] . '%')->get();
         return view('search_result', ['title' => 'Результаты поиска', 'articles' => $articles]);
     }
}
