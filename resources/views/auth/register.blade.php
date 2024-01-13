<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
            integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <link rel="stylesheet" href="resources/css/app.css"/>

    <title>users</title>

</head>

<body class="auth-pages">
<div class="container " style="width: 50%">
    <form method="POST" action="{{ route('new_register') }}">
        @csrf
        <div class="card">
            <div class="card-header background_main">
                register
            </div>
            <div class="card-body ">
                <div class="form-group m-2">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name"
                           placeholder="name">
                </div>
                <div class="form-group m-2">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                           placeholder="Enter email" name="email"
                           value="{{old('email')}}">
                </div>
                <div class="form-group m-2">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                </div>

                <div class="form-group m-2">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" placeholder="password_confirmation"
                           name="password_confirmation">
                </div>

                <button type="submit" class="btn btn-primary m-2">Submit</button>
                <a href="{{route('login')}}" class="m-2">login in</a>
            </div>
        </div>
    </form>

</div>



<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}



@if ($errors->any())
    <script>

        @foreach($errors->all() as $error)

        toastr.error('{{$error}}', {
            CloseButton: true,
            ProgressBar: true
        });
        @endforeach
    </script>
@endif


</body>

