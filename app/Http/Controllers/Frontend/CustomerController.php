<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendCustomerController extends Controller
{
    public function registration()
    {
        return view('frontend.registration');
    }

    public function login()
    {
        return view('frontend.login');
    }
}
