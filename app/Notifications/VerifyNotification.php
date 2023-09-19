<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VerifyNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $params =  [
            'id' => $notifiable->getKey(),
            'hash' => sha1($notifiable->getEmailForVerification()),
        ];

        $queryString = http_build_query($params); //http_build_query() dùng để tạo ra một chuỗi query string từ một mảng
        $url = env('FRONT_APP') . '/verify-email?' .  $queryString;
        //$url sau khi được tạo ra sẽ có dạng http://localhost:3000/verify-email?id=1&hash=123456789

        return (new MailMessage)
            ->subject('CARENTAL - Xác thực thông tin!')
            ->view('emails.email_verify', [
                'url' => $url,
                'email' => $notifiable->email,
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}