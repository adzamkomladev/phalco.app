<?php

namespace App\Notifications\Voting\Agents;

use App\Broadcasting\Arkesel\SmsChannel;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Created extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        public readonly string $organizationName,
        public readonly string $pollingStationName,
        public readonly string $password
    ) {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return [SmsChannel::class];
    }

    /**
     * Get the SMS representation of the notification.
     *
     * @param  \App\Models\User  $notifiable
     * @return string
     */
    public function toSms(User $notifiable): string
    {
        $loginUrl = route('login');
        return "Hello {$notifiable->name}\n Welcome to {$this->organizationName}! You've been assigned as an agent for {$this->pollingStationName} polling station.\nYour login details are\nemail: {$notifiable->email}\npassword: {$this->password}\n\nVisit {$loginUrl} to login.";
    }
}
