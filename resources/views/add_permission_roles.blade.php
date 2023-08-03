{{-- $role_permissions --}}
{{-- $user_role --}}
@extends('layouts._header')
@section('section')
    <form method="POST" action="{{ route('add_permission_and_role') }}">
        @csrf
        <div class="form-group mt-5">
            <label for="">Select Permissions</label>
            <select class="w-100" id="choices-multiple-remove-button" multiple name="permissions[]">
                @foreach ($permissions as $id => $permission)
                    <option value="{{ $id }}">{{ $permission }}</option>
                @endforeach

            </select>
            <label for="">Select Roles</label>
            <select class="w-100" id="choices-multiple-remove-button" name="role">
                @foreach ($roles as $id => $role)
                    <option value="{{ $id }}">{{ $role }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">ADD</button>
        </div>
    </form>
@endsection
