@extends('layouts._header')
@section('section')
    @if ($errors->any())
        <div class="w-50 d-flex justify-content-center alert alert-warning alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('add_role') }}">
        @csrf
        <div class="form-group mt-5">
            <label for="">Add Roles</label>
            <input type="text" class="form-control" name="role">
            </select>
            <label for="">Select Permissions</label>
            <select class="w-100" id="choices-multiple-remove-button" multiple name="permissions[]">
                @foreach ($permissions as $id => $permission)
                    <option value="{{ $id }}">{{ $permission }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">ADD</button>
        </div>
    </form>
@endsection
