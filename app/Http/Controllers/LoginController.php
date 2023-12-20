<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $attrs=request()->validate([
            'email'=>['required','email','exists:users,email'],
            'password'=>['required']
        ]);
        if(auth()->attempt($attrs))
        {
            session()->regenerate();
            return redirect('/')->with('success','Welcome back!');
        }

        else
            throw ValidationException::withMessages(['email'=>'Your provided credential could not be verified']);
//        return back()->withErrors(['email'=>'Your provided credential could not be verified']);
    }
}
