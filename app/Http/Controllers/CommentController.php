<?php

namespace App\Http\Controllers;

use App\Models\Comment;


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
        $comment->save();
        return back();
    }

    public function delete(){

    }
}
