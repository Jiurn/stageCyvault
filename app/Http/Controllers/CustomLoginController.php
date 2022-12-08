<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;

class CustomLoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    function validate_login(Request $request)
    {
        $request->validate([
        'email' => 'required',
        'password' => 'required'
            ]);
    
        $credentials = $request->only('email', 'password');
    
        if(Auth::attempt($credentials))
        {
            $test = DB::table('test')->get();

            $users = DB::table('users')->get();

            return view('welcome', ['test' => $test, 'users'=> $users]);
        }

        return redirect('login');
    }
    function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('welcome');
    }
}
