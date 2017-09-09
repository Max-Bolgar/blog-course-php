<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Gate;

class AdminController extends Controller {

    //


    public function __construct() {

        $this->middleware('auth');
    }

    public function show(Request $request) {

        $users = User::all()->except(8)->sortBy('login');
        if (Auth::user()->login == 'admin') {
            return view('adminPanel.main', ['title' => 'Админ-панель', 'users' => $users]);
        }
        return redirect('/');
    }

}
