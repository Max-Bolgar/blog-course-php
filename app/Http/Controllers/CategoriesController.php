<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\Category;
Use DB;

class CategoriesController extends Controller
{
    
    public function show() {
         $categories = Category::all()->sortBy('name');
        return view('categories.categories', ['title' => 'Категории', 'categories' => $categories]);
    }
}
