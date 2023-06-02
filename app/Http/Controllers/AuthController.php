<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\SigninRequest;
use App\Http\Requests\SignupRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signin()
    {
        $data['title'] = "Sign In";
        return view('auth.signin', $data);
    }

    public function postSignin(SigninRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function signup()
    {
        $data['title'] = "Sign Up";
        return view('auth.signup', $data);
    }
    public function postSignup(SignupRequest $request)
    {
        $validatedData = $request->validated();
        if (User::create($validatedData)) {
            return redirect()->route('signin');
        }
        return redirect()->back();
    }
    public function signout()
    {
        if (Auth::check()) {
            Auth::logout();
        }
        return redirect()->route('signin');
    }
}
