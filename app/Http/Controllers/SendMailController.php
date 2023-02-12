<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SendMailService;

class SendMailController extends Controller
{
    private $sendMailService;

    public function __construct(
        SendMailService $sendMailService)
    {
        $this->sendMailService = $sendMailService;
    }

    public function sendMail(){
        return $this->sendMailService->sendMail();
    }


}
