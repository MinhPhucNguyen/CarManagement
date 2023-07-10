<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index(){
        $emailData = [
            'title' => "Testing Email",
            'body' =>   "ABC",
        ];

        Mail::send('emails.email_template', $emailData, function($email) use ($emailData){
            $email->to('johnnynguyen1619@gmail.com')->from('johnnynguyen1619@gmail.com');
        });

        dd('send email successfully');
    }
}
