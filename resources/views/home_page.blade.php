<?php $serialNo = 1; ?>
@extends('layouts._header')
@section('section')
    @if (Auth::check() && Auth::user()->isAdmin())
        <h1>Logged in as admin</h1><br>
        <table class="table mt-5" id="myTable2">
            <thead>
                <tr>
                    <th scope="row">Serial</th>
                    <th scope="row">Roles</th>
                    <th scope="row">Permissions</th>
                    <th scope="row">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user_roles as $user_role)
                    <tr>
                        <td scope="col">{{ $serialNo++ }}</td>
                        <td scope="col">{{ $user_role->name }}</td>
                        <td scope="col">
                            <?php $permission_count = 1; ?>
                            @foreach ($user_role->permission as $permission)
                                <p> <span>{{ $permission_count++ }}. </span>{{ $permission->name }}</p><br>
                            @endforeach
                        </td>
                        <td>
                            <button class="btn btn-md bg-primary">
                                <a href="{{ route('edit_user_role_permission', ['id' => $user_role->id]) }}"
                                    class="text-white">Edit</a>
                            </button>
                            <button class="btn btn-md bg-danger" disabled>
                                <a href="" class="text-white">Delete</a>
                            </button>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h1>Logged in as Customer</h1>
    @endif
@endsection
