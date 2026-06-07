@extends('layouts.app')

@section('content')
    <div class="container w-50">
        <div class="list-group">
            <li class="list-group-item">{{$data->name}}</li>
            <li class="list-group-item">{{$data->email}}</li>
            <li class="list-group-item">{{ $data->created_at->format('d.m.Y')}}</li>
        </div>
    </div>
@endsection