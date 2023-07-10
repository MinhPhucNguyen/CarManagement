<?php

namespace App\Http\Livewire\Emails;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;


class SendEmail extends Component
{
    public $emailFrom, $emailTo, $name, $subject, $message;

    public function resetInput()
    {
        $this->subject = NULL;
        $this->message = NULL;
    }

    public function sendEmail()
    {
        $validatedData = $this->validate([
            'emailFrom' => 'require|email',
            'emailTo' => 'require|email',
        ]);

        $emailData = [
            'emailFrom' => $validatedData['emailFrom'],
            'emailTo' => $validatedData['emailTo'],
            'name' =>   $this->name,
            'subject' => $this->subject,
            'message' => $this->message,
        ];

        Mail::send('emails.email_template', $emailData, function ($email) use ($emailData) {
            $email->to($emailData['emailTo'])->from($emailData['emailTo'], $emailData['subject']);
        });

        session()->flash('success', 'Send Email Successfully');
        $this->resetInput();
    }

    // public function render()
    // {
    //     return view('livewire.emails.send-email');
    // }
}
