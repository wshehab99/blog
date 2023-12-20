<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('register.create');
    }
    public function store(): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $user= User::create(request()->validate([
            'name'=>['required','max:255','min:3'],
            'username'=>['required','max:255','min:5','unique:users,username'],
            'email'=>['required','max:255','email','unique:users,email'],
            'password'=>['required','max:255','min:8'],
        ]));
        //login
        auth()->login($user);
        return redirect('/')->with('success','Your Account Has Been Created Successfully!');
    }
}
