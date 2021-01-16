<?php

namespace App\Http\Controllers;

use App\Notifications\PaymentNotification;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;


class PaymentController extends Controller
{
    //
    public function create(){
        return view('emails.payment');
    }

    public function store(){
       Notification::send(\request()->user(), new PaymentNotification());
    }
}
