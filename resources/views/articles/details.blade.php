@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{$data->title}}</h5>
                <p class="card-text">{{$data->body}}</p>
                <p class="card-text">{{$data->category->category}}</p>
                <a href="/delete/{{$data->id}}" class="btn btn-sm btn-outline-danger">Delete</a>
            </div>
        </div>
        <div class="list-group mt-2">
            <li class="list-group-item active">Comment</li>
            @foreach ($data->comments as $cate)
                <li class="list-group-item">{{$cate->content}}
                    <a href="{{url('comment/delete/'.$cate->id)}}" class="btn-close float-end d-flex align-items-center"></a>
                </li>
                
            @endforeach
            <li class="list-group-item">
                <form action="{{url('comment/add/')}}" method="POST">
                @csrf
                <input type="hidden" name="article_id" id="" value="{{$data->id}}">
                <input type="text" name="content" class="form-control" placeholder="Comment">
                </form>
            </li>
        </div>
    </div>
@endsection