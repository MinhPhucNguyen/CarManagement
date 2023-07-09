<?php

namespace App\Http\Livewire\Admin\Emails;

use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Livewire\Component;

class SendEmail extends Component
{
    public $email, $subject, $message;

    public function render()
    {
        return view('livewire.admin.emails.send-email');
    }

    public function sendEmail()
    {
    }
}
