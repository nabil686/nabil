<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SignUpController extends Controller
{
    public function sign_up()
    {
       return view('frontend.sign_up');

    }

    public function login()
    {
        return view('frontend.login');
    }
}
