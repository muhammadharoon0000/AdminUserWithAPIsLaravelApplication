@extends('layouts._header')
@section('section')
@if(session('message'))
                <div class="w-50 d-flex justify-content-center alert alert-warning alert-dismissible fade show" role="alert">
                {{session('message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
    @endif
<div class="container border rounded my-2">
    <h4 class="p-3">User Name: <strong>{{$data["name"]}}</strong></h4>
    <h4 class="p-3">User Email: <strong>{{$data["email"]}}</strong></h4>
    <h4 class="p-3">User Password: <strong>{{$data["password"]}}</strong></h4>
</div>

<h4 class="p-3 border-bottom">User Post: </h4>
@foreach($data->posts()->get() as $post)
    <div class="container">
        <p><strong>{{$post["title"]}}</strong></p>
        <p>{{$post["content"]}}</p>
    </div>
    
@endforeach
<div class="container position-absolute w-100 bottom-0">
    <h6>Add Blog</h6>
    <form method="POST" action="{{route('add_post')}}">
        @csrf
        <div class="form-group">
          <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title">
        </div>
        <div class="form-group">
          <input name="content" type="text" class="form-control" id="exampleInputPassword1" placeholder="Content of Blog">
        </div>
        <input type="hidden" name="id" value={{$data["id"]}}>
        <button type="submit" class="btn btn-dark text-white">Add</button>
      </form>
</div>
@endsection