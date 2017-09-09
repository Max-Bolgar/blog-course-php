<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Article;
use Auth;
use DateTime;
class ProfileController extends Controller {

    public function show(Request $request, $id) {
        $user = User::find($id);
        $days = date_diff(new DateTime($user->created_at), new DateTime())->d;
        return view('profile.profile_cab', ['title' => 'Личный кабинет', 'user' => $user, 'days' => $days]);
    }

    public function create(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:100',
            'login' => 'required|max:100',
            'password' => 'required|max:100',
            'email' => 'required|max:100',
        ]);
        $saving = Auth::user();
        $data = $request;
        $user = User::find($data['id']);

        if (Auth::user()->id == $data['id']) {

            $user->name = $data['name'];
            $user->login = $data['login'];
            $user->email = $data['email'];
            $user->password = bcrypt($data['password']);
            $user->save();
            return redirect()->back()->with('message', 'Профиль обновлен');
        }
        return redirect()->back()->with(['message' => 'У Вас нет прав']);
    }

}
