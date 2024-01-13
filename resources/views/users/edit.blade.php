@extends('layouts.app')
@section('content')
    <div class="container mt-5" style="width: 50%">

        <form method="post" action="{{route('update_user')}}">
            @csrf
            <div class="card">
                <div class="card-header background_main" >
                    create User
                </div>
                <div class="card-body">
                    <input type="hidden" class="form-control"  name="id" value="{{$user->id}}">

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">password</label>
                        <div class="valid-feedback" style="display: block;">You can leave the password blank without changing</div>
                        <input type="password" class="form-control" name="password" id="password" >
                    </div>

                    <button type="submit" class="btn btn-primary" name="add_user">Submit</button>
                </div>
            </div>

        </form>
    </div>
@endsection
