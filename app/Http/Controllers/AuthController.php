<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function store_login()
    {
        $validation = request()->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required',
        ]);

        if ($validation) {
            $auth = Auth::attempt(['email' => $validation['email'], 'password' => $validation['password']]);

            if ($auth) {
                return redirect()->route('user.home');
            } else {
                return back()->with('auth-error', "Authentication failed!");
            }
        } else {
            return back()->withErrors('error', $validation);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }
}
