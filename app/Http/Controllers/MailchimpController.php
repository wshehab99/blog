<?php

namespace App\Http\Controllers;

use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;
use Exception;
use Illuminate\Validation\ValidationException;

class MailchimpController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function subscribe(Newsletter $newsletter): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        request()->validate(['email'=>['required','email']]);
        try {
            $newsletter->subscribe(request('email'));
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'email'=>$e->getMessage()
            ]);
        }
        return redirect('/')->with('success','You are now subscribed!');
    }
}
