<?php

namespace App\Livewire\Services\Interfaces;

use App\Models\Subscriber;

interface Notification
{
    public function send(Subscriber $subscriber): void;
}
