<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function viewLogin(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function login(Request $request): RedirectResponse
    {

        if (auth()->guard('web')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
            Toastr::success('you loged in successfully', 'success');
            return redirect()->intended(RouteServiceProvider::HOME);
        }else{
            Toastr::error('your username and password are wrong', 'error');
            return back();
        }



    }

    /**
     * Destroy an authenticated session.
     */
    public function logout(Request $request): RedirectResponse
    {

        Auth::guard('web')->logout();
        Session::flush();

        return redirect()->route('login');
    }





}
