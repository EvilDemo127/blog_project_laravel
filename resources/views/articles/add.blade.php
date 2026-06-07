@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 600px">
        @if ($errors->any())
            @foreach ($errors->all() as $err)
                
                    <li class="text-danger">{{$err}}</li>
               
            @endforeach   
        @endif
        <form action="{{url('/articles/create')}}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Body</label>
                <textarea name="body" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <select name="category_id" id="" class="form-control">
                    <option value="1">News</option>
                    <option value="2">Tech</option>
                </select>
            </div>
            <div class="mb-3">
                <button class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
@endsection
