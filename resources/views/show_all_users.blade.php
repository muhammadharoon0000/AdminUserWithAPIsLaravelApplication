<?php $serialNo = 1; ?>
@extends('layouts._header')
@section('section')
    @if (session('message'))
        <div class="w-50 d-flex justify-content-center alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <table class="table my-5" id="myTable">
        <thead>
            <tr>
                <th scope="col">Serial Number</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $user)
                <tr>
                    <th scope="row">{{ $serialNo++ }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>Hidden</td>
                    <td>
                        <button class="btn btn-md bg-primary">
                            <a href="{{ route('show_or_edit_form', ['id' => $user->id]) }}" class="text-white">Edit</a>
                        </button>
                        <button class="btn btn-md bg-danger">
                            <a href="{{ route('delete_user', ['id' => $user->id]) }}" class="text-white">Delete</a>
                        </button>
                        <button class="btn btn-md bg-secondary">
                            <a href="{{ route('show_user', ['id' => $user->id]) }}" class="text-white">Show
                                Posts</a>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
