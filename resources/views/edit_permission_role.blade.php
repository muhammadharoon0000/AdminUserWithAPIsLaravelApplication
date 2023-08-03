@extends('layouts._header')
@section('section')
    <h1>Edit Permissions and Roles</h1>
    <form method="POST" action="{{ route('update_user_role_permission') }}">
        @csrf
        <div class="form-group mt-5">
            <label for="">Select Permissions</label>
            <select class="w-100" id="choices-multiple-remove-button" multiple name="permissions[]">
                @foreach ($permissions as $id => $permission)
                    <option value="{{ $id }}" {{ in_array($permission, $selected_permissions) ? 'selected' : '' }}>
                        {{ $permission }}</option>
                @endforeach

            </select>
            <label for="">Select Roles</label>
            <select class="w-100" id="choices-multiple-remove-button" name="role">
                @foreach ($role_users as $id => $role_user)
                    <option value="{{ $id }}" {{ $role_user == $selected_role_user->name ? 'selected' : '' }}>
                        {{ $role_user }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection
