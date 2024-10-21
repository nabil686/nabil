<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function loginForm()
    {
        return view('backend.login');
    }
    public function doLogin(Request $request)
    {
        $credentials=$request->except("_token");
        $check=Auth::attempt($credentials);

        if($check)
        {
            return redirect()->route('dashboard');
        }
        else
        {
            return redirect()->back();
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    
}
