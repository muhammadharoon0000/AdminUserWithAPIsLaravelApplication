@extends('layouts._header')
@section('section')
<h3 class="p-5 m-5">Edit User</h3>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{route('update_user', ['id' => $data->id])}}" >
    @csrf
    <div class="form-group">
        <label for="exampleInputPassword1">Enter Your Name</label>
        <input name="name" value="{{$data->name}}" type="text" class="form-control" id="exampleInputPassword1">
      </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input name="email" value="{{$data->email}}"  type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input name="password" value="{{$data->password}}" type="password" class="form-control" id="exampleInputPassword1">
      </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>

@endsection