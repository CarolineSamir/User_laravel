@extends('layouts.app')
@section('content')


    <div class="container mt-5 ">

        <div class=" d-flex justify-content-end">
            <a type="button" class="btn btn-primary m-2" href="{{route('new_user')}}">Add New User</a>
            <a type="button" class="btn btn-primary m-2" href="{{route('send_email')}}">send email</a>

        </div>

        <table class="table">
            <thead class="background_main">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th>{{$user->id}}</th>
                    <th>{{$user->name}}</th>
                    <th>{{$user->email}}</th>
                    <th class="actions">
                        <a href="{{route('edit_user', $user->id)}}" style="color: green"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="{{route('delete_user', $user->id)}}" style="color: red"><i class="fa-solid fa-trash-can"></i></a>
                    </th>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>

@endsection
