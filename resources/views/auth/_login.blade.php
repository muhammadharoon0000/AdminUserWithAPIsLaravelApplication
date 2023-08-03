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
    <form method="POST" action='{{ Request::path() == 'admin/login' ? '/admin/login' : '/login' }}'>
        @csrf
        <div class="form-group">
            <label>Email address</label>
            <input name="email" type="email" class="form-control" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label>Enter Password</label>
            <input name="password" type="password" class="form-control" value="{{ old('password') }}">
        </div>
        <div class="form-group form-check">
            <input value="1" type="checkbox" class="form-check-input" name="remember">
            <label class="form-check-label">Remember Me</label>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
@endsection
