<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view ('backend.master');
    }
    public function changeLang($lang_name)
    {
        session()->put('locale',$lang_name);
        return redirect()->back();
    }
}
