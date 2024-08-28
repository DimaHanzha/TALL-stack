<?php

namespace App\Livewire\Services\Interfaces;

use App\Models\Subscriber as SubscriberModel;
use Illuminate\Database\Eloquent\Collection;

interface Subscriber
{
    public function create(string $email): SubscriberModel;

    public function get(string $search): ?Collection;
}
