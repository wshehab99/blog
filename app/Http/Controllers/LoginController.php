<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        auth()->login();
        return redirect('/')->with('success','Welcome back');
    }
}
