@extends('layouts.app')
@section('content')
    <div class="container mt-5" style="width: 50%">

        <form method="post" action="{{route('send_User_Email')}}">
            @csrf

            <div class="card">
                <div class="card-header background_main">
                    Send Emails
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="sender_email" class="form-label">Sender Email</label>
                        <input type="text" class="form-control" name="sender_email" id="sender_email">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">SMTP password</label>
                        <input type="password" class="form-control" name="password<" id="password">
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" name="subject" id="subject">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" name="message" id="message"></textarea>
                    </div>


                    <div class="mb-3">
                        <label for="emails" class="form-label">Emails</label>
                        <select id="emails" multiple name="emails[]">
                            <?php foreach (\App\Models\User::get() as $users) { ?>
                            <option value="{{$users['email']}}">{{$users['email']}}</option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" name="send_email">Submit</button>
                </div>
            </div>

        </form>
    </div>

@endsection
