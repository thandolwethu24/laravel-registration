<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
    public function show(){
        return view('contact');
    }

    public function store(){
        request()->validate(['email' => 'required']);

//           Mail::raw('It Works', function ($message) {
//               $message->to(\request('email'))
//                   ->subject('Wolupd my nigga');
//           });
        Mail::to(\request('email'))
            ->send(new Contact());

       return redirect('/contact')
           ->with('message','Email is sent');

    }
}
