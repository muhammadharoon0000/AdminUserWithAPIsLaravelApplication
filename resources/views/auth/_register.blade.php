@extends('layouts._header')
@section('section')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{route('register')}}">
    @csrf
    <div class="form-group">
        <label>Enter Name</label>
        <input name="name" type="text" class="form-control" value="{{ old('name') }}">
      </div>
    <div class="form-group">
      <label>Email address</label>
      <input name="email" type="email" class="form-control" value="{{ old('email') }}">
    </div>
    <div class="form-group">
      <label>Password</label>
      <input name="password" type="password" class="form-control" value="{{ old('password') }}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection