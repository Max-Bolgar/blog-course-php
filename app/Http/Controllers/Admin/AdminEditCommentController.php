<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Comment;
use App\User;
use Auth;
use Gate;

class AdminEditCommentController extends Controller
{
    public function show(Request $request, $id) {
        $users = User::all();
        $comment = Comment::find($id);
        if (Auth::user()->login == 'admin') {
            return view('adminPanel.edit_comment', ['title' => 'Редактирование комментария', 'comment' => $comment, 'users' => $users]);
        }
        return redirect('/');
    }
    
    //upd comment
    public function create(Request $request) {
        $this->validate($request, [
            'comment' => 'required|max:254'
        ]);
;
        $data = $request;
        $comment = Comment::find($data['id']);


            if (isset($data['delete'])) {
                $comment->delete();
                return redirect('/admin/edit/comments')->with('message', 'Комментарий удален');
            }

            $comment->comment = $data['comment'];
            $comment->save();
            return redirect()->back()->with('message', 'Комментарий обновлен');

    }
}
