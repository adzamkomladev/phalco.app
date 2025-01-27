<?php

namespace App\Broadcasting\Arkesel;

use App\Support\Gateways\Arkesel;
use Illuminate\Notifications\Notification;

class SmsChannel
{
    /**
     * Create a new channel instance.
     */
    public function __construct(private Arkesel $arkesel)
    {
        //
    }

    /**
     * Send the given notification.
     */
    public function send(object $notifiable, Notification $notification): void
    {
        $message = $notification->toSms($notifiable);

        $this->arkesel->sendSms([$notifiable->phone], $message);
    }
}
