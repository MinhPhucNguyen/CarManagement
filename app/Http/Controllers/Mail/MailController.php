<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Mail\SendEmails;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $validatedEmailData = $request->validate([
            'emailFrom' => 'required|email',
            'emailTo' => 'required|email',
        ]);

        $emailData = [
            'emailFrom' => $validatedEmailData['emailFrom'],
            'emailTo' => $validatedEmailData['emailTo'],
            'name' => $request->name,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        try {
            Mail::to($emailData['emailTo'])->send(new SendEmails($emailData));
            return redirect()->back()->with('message', 'Send Email Successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', "Send Email Failed");
        }
    }
}
