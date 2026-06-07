<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index','detail');
    }

    public function index(){
        $datas =Article::latest()->paginate(5);
        return view('articles.index',['datas'=>$datas]);
    }
    
    public function detail($id){
            $data = Article::find($id);
            return view('articles.details',['data'=>$data]);
    }

    public function profile(){
        $data =User::find(Auth::id());
        return view('articles.profile',['data'=>$data]);
    }

    public function add()
    {
        return view('articles.add');
    }

    public function create(){
        $validate =request()->validate([
            'title'=>'required',
            'body'=>'required',
            'category_id'=>'required',
        ]);
        $article = new Article;
        $article->title=request()->title;
        $article->body=request()->body;
        $article->category_id=request()->category_id;
        $article->save();
        return redirect('/');
    }

    public function delete($id){
        $data=Article::find($id);
        if(Auth::id() != $data->id){
            return back()->with('info','U have not access');
        }
        $data->delete();
        return redirect('/')->with('info','Deleting success');
    }
}
