@extends('layouts.app')
@section('content')
    <div class="container">
        @if (session('info'))
            <div class="alert alert-info alert-dismissible ">{{session('info')}}</div> 
        @endif
         {{$datas->links()}}
        <div class="card">
           
            @foreach ($datas as $data)
            <div class="card-body">
                    <h5 class="card-title">{{$data->title}}</h5>
                    <p class="card-text">{{$data->created_at}}</p>
                    <p class="card-text">{{$data->category->category}}</p>
                    <p class="card-text">{{$data->body}}</p>
                    <a href="/details/{{$data->id}}" class="card-link">View More</a>
            </div>
            @endforeach
        </div>
    </div>
@endsection