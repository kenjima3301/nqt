<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Usercontroller extends Controller
{   
    function login()
    {
        return view('auth.login');
    }
    
    function admin()
    {
        if(Auth::check())
        {
            return view('admin.dashboard');
        }

        return redirect('login')->with('success', 'you are not allowed to access');
    }
    
    function validate_login(Request $request)
    {
        $request->validate([
            'email' =>  'required',
            'password'  =>  'required'
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials))
        {
            return redirect('admin');
        }

        return redirect('login')->with('success', 'Login details are not valid');
    }
    
    function logout()
    {
        Session::flush();

        Auth::logout();

        return Redirect('/');
    }
}
