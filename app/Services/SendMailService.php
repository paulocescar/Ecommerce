<?php

namespace App\Services;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use DB;

class SendMailService
{

    public function sendMail(){
        Mail::send('emails.reminder', ['user' => 'paulo.cr93'], function ($m) {
            $m->to('paulo.cr93@gmail.com', 'paulo.cr93')->subject('email');
        });

        return 'E-mail enviado com sucesso';
    }
}