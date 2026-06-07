<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $datas =Article::latest()->paginate(5);
        return view('articles.index',['datas'=>$datas]);
    }
    
    public function detail($id){
            $data = Article::find($id);
            return view('articles.details',['data'=>$data]);
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
        return redirect('/articles');
    }

    public function delete($id){
        $data=Article::find($id);
        $data->delete();
        return redirect('/articles')->with('info','Deleting success');
    }
}
