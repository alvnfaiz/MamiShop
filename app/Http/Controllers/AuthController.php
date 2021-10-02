<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //login view
    public function login()
    {
        return view('User.auth.login');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }
        return redirect()->back()->withInput($request->only('email'));
    }

    //view register dan postRegister
    public function register()
    {
        return view('User.auth.register');
    }

    public function postRegister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = new \App\User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('login')->with('success', 'Register Success');
    }

    //forget password view
    public function forgetPassword()
    {
        return view('User.auth.forgetPassword');
    }

    //forget password post
    public function postForgetPassword(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string|email|max:255',
        ]);

        $user = \App\User::where('email', $request->email)->first();

        if ($user) {
            $token = \App\User::generateToken();
            $user->update(['forget_password_token' => $token]);

            \Mail::to($user)->send(new \App\Mail\ForgetPassword($user, $token));

            return redirect()->route('login')->with('success', 'Please check your email');
        }
        return redirect()->back()->with('error', 'Email not found');
    }

    //reset password token
    public function resetPassword($token)
    {
        $user = \App\User::where('forget_password_token', $token)->first();

        if ($user) {
            return view('User.auth.resetPassword', compact('user'));
        }
        return redirect()->route('login')->with('error', 'Token not found');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
