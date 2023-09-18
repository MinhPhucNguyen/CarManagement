<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Mail\SendEmails;
use App\Models\User;
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
            return response()->json([
                'message' => 'Mail has been sent to ' . $emailData['emailTo'] . ' successfully!',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Send Email Failed',
            ], 404);
        }
    }
}
