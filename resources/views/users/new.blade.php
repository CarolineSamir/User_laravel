@extends('layouts.app')
@section('content')
<div class="container mt-5" style="width: 50%">

    <form method="post" action="{{route('add_user')}}">
        @csrf
        <div class="card">
            <div class="card-header background_main" >
                create User
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">email</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>

                <button type="submit" class="btn btn-primary" name="add_user">Submit</button>
            </div>
        </div>

    </form>
</div>
@endsection
