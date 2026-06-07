<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add(){
        $validate = request()->validate([
            'article_id'=>'required',
            'content'=>'required',
        ]);   
        $comment =new Comment;
        $comment->content =request()->content;
        $comment->article_id =request()->article_id;
        $comment->user_id =Auth::user()->id;
        $comment->save();
        return back();
    }

    public function delete($id){
        
        $comment=Comment::find($id);
        if(Auth::user()->id != $comment->user_id){
            return back()->with('info','U can not access');
        }
        $comment->delete();
        return back();
    }
}
