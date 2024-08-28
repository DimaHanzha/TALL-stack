<?php

namespace App\Livewire\Services;

use App\Livewire\Services\Interfaces\Notification;
use App\Models\Subscriber;
use Carbon\Carbon;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\URL;

class EmailNotification implements Notification
{
    public function send(Subscriber $subscriber): void
    {
        $notification = new VerifyEmail();

        $this->createVerifyUrl($notification);
        $subscriber->notify($notification);
    }

    private function createVerifyUrl(VerifyEmail $notification): void
    {
        $notification->createUrlUsing(function ($notifiable){
            return URL::temporarySignedRoute(
                'subscribers.verify',
                Carbon::now()->addMinutes(30),
                [
                    'subscriber' => $notifiable->getKey(),
                ],
            );
        });
    }
}
