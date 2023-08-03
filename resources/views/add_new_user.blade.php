@extends('layouts._header')
@section('section')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>
        </div>
    @endif
    <form method="POST" action="/update_or_create{{ isset($user->id) ? '/' . $user->id : null }}">
        @csrf
        <div class="form-group">
            <label for="exampleInputPassword1">Enter Your Name</label>
            <input value="{{ @$user->name }}" name="name" type="text" class="form-control"
                id="exampleInputPassword1">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input value="{{ isset($user->email) ? $user->email : '' }}" name="email" type="email" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Select Role</label>
                <select class="form-control" id="" name="role"
                    {{ isset($user->userRole->name) ? 'selected' : '' }}>
                    @foreach ($roles as $id => $role)
                        <option value={{ $id }}>{{ $role }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input name="password" type="password" class="form-control" id="input_password">
            <input type="checkbox" id="show_password">Show Password
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Confirm Password</label>
            <input name="confirm_password" type="password" class="form-control" id="input_confirm_password">
            <input type="checkbox" id="show_confirm_password">Show Password
        </div>
        <button type="submit" class="btn btn-primary my-2">Submit</button>
    </form>
@endsection
