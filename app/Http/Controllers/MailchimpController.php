<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Exception;
use Illuminate\Validation\ValidationException;

class MailchimpController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function subscribe(): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        request()->validate(['email'=>['required','email']]);
        try {
            $newsletter= new Newsletter();
            $newsletter->subscribe(request('email'));
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'email'=>$e->getMessage()
            ]);
        }
        return redirect('/')->with('success','You are now subscribed!');
    }
}
