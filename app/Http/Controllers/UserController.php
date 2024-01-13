<?php

namespace App\Http\Controllers;

use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

class UserController extends Controller
{
    public function view(){
        $users = User::get();
        return view('users.view', compact('users'));
    }

    public function create(){
        return view('users.new');
    }



    public function add(Request $request){
        $validator =  Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email'  => 'required',

        ]);
        if ($validator->fails())
        {
            return back()->withErrors($validator);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('user_view');
    }

    public function edit($id){
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request){
        $validator =  Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email'  => 'required',

        ]);
        if ($validator->fails())
        {

            return back()->withErrors($validator);
        }

        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password !== null){
            $user->password = Hash::make($request->password);
        }
        $user->save();
        Toastr::success('updated successfully', 'success');
        return redirect()->route('user_view');
    }

    public function delete($id){
        User::find($id)->delete();
        Toastr::success('deleted successfully', 'success');
        return redirect()->route('user_view');
    }

    public function sendEmail(){
        return view('users.email');
    }

    public function sendUserEmail(Request $request){
        $mail = new PHPMailer(true);
        try {
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = $request->sender_email;
            $mail->Password   = $request->password;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            foreach ($request->emails as $email){
                $mail->setFrom('carolinesamir98@gmail.com', 'Mailer');
                $mail->addAddress($email);               //Name is optional
                $mail->addReplyTo('carolinesamir98@gmail.com', 'Information');
            }

            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $request->subject;
            $mail->Body    = $request->message;
            $mail->AltBody = $request->message;

            $mail->send();
            Toastr::success('Message has been sent', 'success');

        } catch (Exception $e) {
            Toastr::error('Message has been sent', $mail->ErrorInfo);
        }

        return redirect()->route('user_view');
    }
}
