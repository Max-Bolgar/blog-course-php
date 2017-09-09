<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Article;
use App\User;
use App\Country;
use App\Role;

class AboutController extends Controller {

    public function show() {
        return view('about', ['title' => 'О проекте']);
    }

}
