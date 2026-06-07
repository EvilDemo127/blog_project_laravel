@extends('layouts.app')
@section('content')
    <div class="container">
        @if(session('info'))
           <div class="alert alert-danger alert-dismissible fade show">{{session('info')}}
            <button class="btn btn-close" data-bs-dismiss="alert"></button>
           </div>
           
        @endif
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{$data->title}}</h5>
                <p class="card-text">{{$data->body}}</p>
                <p class="card-text">{{$data->category->category}}</p>
                <a href="/delete/{{$data->id}}" class="btn btn-sm btn-outline-danger">Delete</a>
            </div>
        </div>
        <div class="list-group mt-2">
            <li class="list-group-item active">Comment
                <span class="badge bg-white text-primary rounded-pill">{{count($data->comments)}}</span>
            </li>
            @foreach ($data->comments as $cate)
                <li class="list-group-item border rounded-4 border-secondary d-flex justify-content-between align-items-center p-3 my-1">
                    <div class="">
                        <samp class="fw-bold d-block"> {{$cate->user->name}}</samp>
                    <samp>{{$cate->content}}</samp>
                    </div>
                    <a href="{{url('comment/delete/'.$cate->id)}}" class="btn-close ms-4"></a>
                </li>
                
            @endforeach
            <li class="list-group-item">
                <form action="{{url('comment/add')}}" method="POST">
                @csrf
                <input type="hidden" name="article_id" id="" value="{{$data->id}}">
                <input type="text" name="content" class="form-control" placeholder="Comment">
                </form>
            </li>
        </div>
    </div>
@endsection