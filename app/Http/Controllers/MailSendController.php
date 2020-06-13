<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\SendTestMail;

class MailSendController extends Controller
{
    //
    
    public function send(){

        $name = 'ララベル太郎';
        $text = 'これからもよろしくお願いいたします。';
        $to = 'dirty.cross.37@icloud.com';
        Mail::to($to)->send(new SendTestMail($name, $text));
    }

    
}
