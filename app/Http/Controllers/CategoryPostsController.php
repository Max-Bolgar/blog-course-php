<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\Category;
Use DB;

class CategoryPostsController extends Controller {

    public function show(Request $request, $id) {
        $category = Category::find($id);
        $catArticles = $category->articles->sortByDesc('created_at');
        return view('categories.categoryPosts', ['title' => $category->name, 'category' => $category, 'catArticles' => $catArticles]);
    }

}
